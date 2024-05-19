<?php

namespace App\Http\Controllers\Sdid\Sarpras\SarprasBackend;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Collection;
// use App\Sdid\Sarpras\Models\Sarana;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

//import models
use App\Models\Bangunan;
use App\Models\Ruangan;
use App\Models\PenempatanSarana;
use App\Models\PenempatanPrasarana;
use App\Models\Sarana;
use App\Models\Prasarana;
use App\Models\SumberPendanaan;
use App\Models\DataLokasiKampus;
use App\Models\SumberDayaManusia;
use App\Models\PenempatanSdmRuang;
use App\Models\Phln;
use App\Models\Sbsn;


class SarprasManajemenAset extends Controller
{

    #nanti lihat contoh dari pengambildan data serverside dari daftar asesor
    public function serverside_table()
    {
        // Your data array
        $data = [
            ["id" => 1, "name" => "John Doe", "email" => "johndoe@example.com"],
            ["id" => 2, "name" => "Jane Doe", "email" => "janedoe@example.com"],
            ["id" => 3, "name" => "Peter Jones", "email" => "peterjones@example.com"],
        ];

        // Convert data to Eloquent Collection
        $users = Sarana::collection($data);

        return DataTables::of($users)
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('email', function ($row) {
                return $row->email;
            })
            ->make(true);
    }


    public function index_prasarana(Request $request)
    {
        $id = $request->query('id');

        $universities = auth()->user()->universities;
        $universityCode = $universities->first()->id;

        $role = auth()->user()->role;
        // dd($role);
        // dd($universityCode);

        $data = Prasarana::all();
        if ($role == "2") {
            $data = Prasarana::select('prasarana.*')
                ->join('penempatan_prasarana', 'penempatan_prasarana.id_prasarana', '=', 'prasarana.id')
                ->where('penempatan_prasarana.id_data_lokasi_kampus', $universityCode)
                ->get();
        }


        // dd($data);
        $bangunan = DataLokasiKampus::find($universityCode)->prasarana;

        $kategori = $request->query('tab', 'default');

        // if ($kategori != 'default') {
        //     $bangunan = Bangunan::where('kategori', $kategori)->get(); // Filter bangunan berdasarkan kategori
        // } else {
        // }
        // //   dd($data);
        // $activeTab = $kategori; 

        // $data = Prasarana::all(); // Ambil semua bangunan jika tidak ada filter
        if ($id) {
            $prasarana = Prasarana::find($id);

            if (!$prasarana) {
                abort(404, 'Prasarana tidak ditemukan');
            }

            return view('sarpras.manajemen_aset.components.prasarana_detail', compact('prasarana', 'id'));
        } else {
            return view('sarpras.manajemen_aset.components.prasarana_table', compact('data'));
        }

        // dd($bangunan);
        // return view('sarpras.manajemen_aset.components.prasarana_table', compact('data', 'activeTab'));
    }


    public function create_prasarana(Request $request)
    {
        // Validate the incoming data
        // $validated = $request->validate([
        //     // Validation rules for Prasarana fields, e.g., 'name' => 'required|string|max:255'
        // ]);

        $universities = auth()->user()->universities;
        $universityCode = $universities->first()->id;

        DB::beginTransaction();

        try {
            $prasarana = Prasarana::create($request->all());

            PenempatanPrasarana::create([
                'id_prasarana' => $prasarana->id,
                'id_data_lokasi_kampus' => $universityCode
            ]);

            DB::commit();

            return redirect()->route('manajemen_aset.prasarana')->with('success', 'Prasarana created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Error creating Prasarana: ' . $e->getMessage());
        }
    }

    public function delete_prasarana($id)
    {
        $prasarana = Prasarana::findOrFail($id);
        SumberPendanaan::where('id_prasarana', $id)->delete();
        // Lakukan penghapusan
        $prasarana->delete();

        return redirect()->route('manajemen_aset.prasarana')->with('success', 'Prasarana created successfully.');
    }

    public function get_data_prasarana(Request $request)
    {
        // dd($request);
        $prasarana = Prasarana::find($request->id);
        return response()->json($prasarana);
    }

    public function get_data_ruangan_by_bangunan(Request $request)
    {
        $ruangan = Ruangan::where('id_prasarana', $request->id_bangunan)->get();
        return response()->json($ruangan);
    }

    public function index_bangunan_kuliah()
    {

        $bangunan = Bangunan::all();
        $activeTab = 'kuliah';

        // dd($bangunan);
        return view('sarpras.manajemen_aset.components.bangunan_table', compact('bangunan', 'activeTab'));
    }

    public function index_bangunan_laboratorium()
    {

        $bangunan = Bangunan::all();
        $activeTab = 'kuliah';

        // dd($bangunan);
        return view('sarpras.manajemen_aset.components.bangunan_table', compact('bangunan', 'activeTab'));
    }



    public function index_bangunan_detail()
    {
        return view('sarpras.manajemen_aset.components.detail_bangunan');
    }



    public function index_ruangan(Request $request)
    {
        $universities = auth()->user()->universities;
        $id = $request->query('id');
        $universityCode = $universities->first()->id;
        // $ruangan = Ruangan::with('prasarana')->get();
        $role = auth()->user()->role;

        $ruangan = Ruangan::all();
        if ($role == "2") {
            $ruangan = Ruangan::join('penempatan_prasarana', 'ruangan.id_prasarana', '=', 'penempatan_prasarana.id_prasarana')
                ->join('prasarana', 'penempatan_prasarana.id_prasarana', '=', 'prasarana.id')
                ->where('penempatan_prasarana.id_data_lokasi_kampus', '=', $universityCode)
                ->get(['ruangan.*']);
        }

        // $prasarana = Prasarana::all();
        $universities = auth()->user()->universities;
        $universityCode = $universities->first()->id;

        // dd($universityCode);

        $prasarana = Prasarana::select('prasarana.*')
            ->join('penempatan_prasarana', 'penempatan_prasarana.id_prasarana', '=', 'prasarana.id')
            ->where('penempatan_prasarana.id_data_lokasi_kampus', $universityCode)
            ->get();

        // dd($ruangan);

        if ($id) {
            $ruangan = Ruangan::find($id);

            if (!$ruangan) {
                abort(404, 'Ruangan tidak ditemukan');
            }

            return view('sarpras.manajemen_aset.components.ruangan_detail', compact('ruangan', 'id'));
        } else {
            return view('sarpras.manajemen_aset.components.ruangan_table', compact('ruangan', 'prasarana'));
        }
    }

    public function create_ruangan(Request $request)
    {
        // Validate and store data
        // dd($request);
        Ruangan::create($request->all());
        return redirect()->route('manajemen_aset.ruangan')->with('success', 'Ruangan created successfully.');
    }

    public function get_data_ruangan(Request $request)
    {
        // dd($request);
        $ruangan = Ruangan::find($request->id);
        return response()->json($ruangan);
    }

    public function delete_ruangan($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        PenempatanSarana::where('id_ruang', $id)->delete();

        // Lakukan penghapusan
        $ruangan->delete();

        return redirect()->route('manajemen_aset.ruangan')->with('success', 'Prasarana created successfully.');
    }

    public function penempatan_sarana($id_ruangan)
    {
        $penempatanSarana = PenempatanSarana::with(['ruangan', 'sarana'])->get();
        dd($penempatanSarana);
        return view('sarpras.manajemen_aset.index_sarana', compact('penempatanSarana'));
    }

    public function index_sarana(Request $request)
    {
        $id = $request->query('id');
        $universities = auth()->user()->universities;
        $universityCode = $universities->first()->id;

        $prasarana = Prasarana::select('prasarana.*')
            ->join('penempatan_prasarana', 'penempatan_prasarana.id_prasarana', '=', 'prasarana.id')
            ->where('penempatan_prasarana.id_data_lokasi_kampus', $universityCode)
            ->get();

        // dd($penempatanSarana);
        $role = auth()->user()->role;
        if ($role == '1') {
            $penempatanSarana = DB::table('penempatan_sarana as ps')
                ->join('ruangan as r', 'ps.id_ruang', '=', 'r.id')
                ->join('prasarana as p', 'r.id_prasarana', '=', 'p.id')
                ->join('penempatan_prasarana as pp', 'p.id', '=', 'pp.id_prasarana')
                ->leftJoin('sarana as s', 'ps.id_sarana', '=', 's.id')
                ->select('s.*', 'p.*', 'r.*', 'ps.*')
                ->get();
        } else {
            $penempatanSarana = DB::table('penempatan_sarana as ps')
                ->join('ruangan as r', 'ps.id_ruang', '=', 'r.id')
                ->join('prasarana as p', 'r.id_prasarana', '=', 'p.id')
                ->join('penempatan_prasarana as pp', 'p.id', '=', 'pp.id_prasarana')
                ->leftJoin('sarana as s', 'ps.id_sarana', '=', 's.id')
                ->where('pp.id_data_lokasi_kampus', '=', $universityCode)
                ->select('s.*', 'p.*', 'r.*', 'ps.*')
                ->get();
        }

        $skema_biaya = Sbsn::where('id_data_lokasi_kampus', $universityCode)->get();
        $phln_data = Phln::all();




        if ($id) {
            $sarana = DB::table('penempatan_sarana as ps')
                ->join('ruangan as r', 'ps.id_ruang', '=', 'r.id')
                ->join('prasarana as p', 'r.id_prasarana', '=', 'p.id')
                ->join('penempatan_prasarana as pp', 'p.id', '=', 'pp.id_prasarana')
                ->leftJoin('sarana as s', 'ps.id_sarana', '=', 's.id')
                ->where('ps.id', '=', $id)
                ->select('s.*', 'p.*', 'r.*', 'ps.*')
                ->first(); // Mengubah dari get() ke first()

            if (!$sarana) {
                abort(404, 'Sarana tidak ditemukan');
            }
            // dd($sarana);

            return view('sarpras.manajemen_aset.components.sarana_detail', compact('sarana', 'id'));
        } else {
            return view('sarpras.manajemen_aset.index_sarana', compact('penempatanSarana', 'prasarana', 'skema_biaya', 'phln_data'));
        }

        // dd($skema_biaya);

        // dd($penempatanSarana);
        // ->get();

        // dd($penempatanSarana);
    }

    public function delete_sarana($id_ruang, $id)
    {
        // $sarana = Sarana::findOrFail($id);
        PenempatanSarana::where('id', $id)->delete();

        // Lakukan penghapusan
        // $sarana->delete();

        return redirect()->route('manajemen.aset.inventaris.index_ruang_sarana', ['id_ruang' => $id_ruang])->with('success', 'Sarana deleted successfully.');    }

    public function index_inventaris(Request $request)
    {

        // $data = PenempatanSdmRuang::with(['sumber_daya_manusia', 'ruang.prasarana'])
        // ->get();
        // $data = SumberDayaManusia::all();
        // dd($data);
        $id = $request->query('id_ruang');
        if ($id) {
            $ruangan = Ruangan::find($id);
            $penempatan_sdm_ruang = PenempatanSdmRuang::where('id_ruang', $id)->get();
            $sdm_list = SumberDayaManusia::all();

            return view('sarpras.manajemen_aset.components.inventaris_detail', compact('id', 'ruangan', 'penempatan_sdm_ruang', 'sdm_list'));
        }


        $universities = auth()->user()->universities;
        $universityCode = $universities->first()->id;

        $role = auth()->user()->role;
        if ($role == '1') {
            $data = DB::table('penempatan_sdm_ruang as psr')
                ->join('ruangan as r', 'psr.id_ruang', '=', 'r.id')
                ->join('prasarana as p', 'r.id_prasarana', '=', 'p.id')
                ->join('penempatan_prasarana as pp', 'p.id', '=', 'pp.id_prasarana')
                ->leftJoin('sumber_daya_manusia as sdm', 'psr.id_sdm', '=', 'sdm.id')
                ->select('psr.*', 'r.*', 'p.*', 'sdm.*')
                ->get();
        } else {
            $data = DB::table('penempatan_sdm_ruang as psr')
                ->join('ruangan as r', 'psr.id_ruang', '=', 'r.id')
                ->join('prasarana as p', 'r.id_prasarana', '=', 'p.id')
                ->join('penempatan_prasarana as pp', 'p.id', '=', 'pp.id_prasarana')
                ->leftJoin('sumber_daya_manusia as sdm', 'psr.id_sdm', '=', 'sdm.id')
                ->where('pp.id_data_lokasi_kampus', '=', $universityCode)
                ->select('psr.*', 'r.*', 'p.*', 'sdm.*')
                ->get();
        }


        // dd($data);

        // $bangunan = [
        //     ['id' => 1, 'nama_bangunan' => 'Bangunan A'],
        //     ['id' => 2, 'nama_bangunan' => 'Bangunan B'],
        // ];

        $prasarana = Prasarana::select('prasarana.*')
            ->join('penempatan_prasarana', 'penempatan_prasarana.id_prasarana', '=', 'prasarana.id')
            ->where('penempatan_prasarana.id_data_lokasi_kampus', $universityCode)
            ->get();

        // dd($bangunan);
        $nama_dosen = SumberDayaManusia::all();

        return view('sarpras.manajemen_aset.index_inventaris', compact('data', 'prasarana', 'nama_dosen'));
    }

    public function getRuangan($id_bangunan)
    {
        #nanti ambil data nya dari database

        $ruangan = [];
        if ($id_bangunan == 1) {
            $ruangan = ['A-1', 'A-2', 'A-3'];
        } elseif ($id_bangunan == 2) {
            $ruangan = ['B-1', 'B-2', 'B-3'];
        }
        // tambahkan logika lainnya untuk bangunan dan ruangan lainnya
        return response()->json($ruangan);
    }

    public function tambah_pemetaan_dosen(Request $request)
    {
        // $request->validate([
        //     'id_ruang' => 'required|exists:ruangan,id',
        //     'id_sdm' => 'required|array',
        //     'id_sdm.*' => 'required|exists:sdm,id',
        //     'tanggal_mulai_penempatan' => 'required|array',
        //     'tanggal_mulai_penempatan.*' => 'required|date',
        // ]);

        try {
            foreach ($request->id_sdm as $key => $value) {
                PenempatanSdmRuang::create([
                    'id_sdm' => $value,
                    'tanggal_mulai_penempatan' => $request->tanggal_mulai_penempatan[$key],
                    'id_ruang' => $request->id_ruang,
                ]);
            }

            return redirect()->route('manajemen_aset.inventaris', ['id_ruang' => $request->id_ruang])->with('success', 'Pemetaan dosen berhasil ditambahkan.');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function hapus_pemetaan_dosen($id_ruang, $id)
    {
        try {
            $pemetaan = PenempatanSdmRuang::findOrFail($id);
            $pemetaan->delete();

            return redirect()->route('manajemen_aset.inventaris', ['id_ruang' => $id_ruang])->with('success', 'SDM deleted successfully.');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }


    public function tambah_sarana(Request $request)
    {
        // dd($request->all());
        // Validation rules
        $validator = Validator::make($request->all(), [
            'prasarana' => 'required|integer|exists:prasarana,id',
            'ruangan' => 'required|integer|exists:ruangan,id',
            'nama_sarana.*' => 'required|string|max:255',
            'kategori.*' => 'required|string|max:255',
            'jenis_sarana.*' => 'required|string|max:255',
            'spesifikasi.*' => 'required|string|max:255',
            'tanggal_perolehan.*' => 'required|date',
            'tahun_produksi.*' => 'required|numeric',
            'nilai_perolehan.*' => 'required|numeric',
            'nilai_buku.*' => 'required|numeric',
            'penggunaan.*' => 'required|string|max:255',
            'kondisi.*' => 'required|string|max:255',
            'tanggal_hapus_buku.*' => 'required|date',
            'status.*' => 'required|string|max:255',
            'jumlah_barang.*' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation errors', 'errors' => $validator->errors()], 422);
        }

        try {
            DB::beginTransaction();

            $data_sarana = [];
            foreach ($request->nama_sarana as $key => $value) {
                $sarana = Sarana::create([
                    'nama_sarana' => $value,
                    'kategori' => $request->kategori[$key],
                    'jenis_sarana' => $request->jenis_sarana[$key],
                    'spesifikasi' => $request->spesifikasi[$key],
                    'tanggal_perolehan' => $request->tanggal_perolehan[$key],
                    'tahun_produksi' => $request->tahun_produksi[$key],
                    'nilai_perolehan' => $request->nilai_perolehan[$key],
                    'nilai_buku' => $request->nilai_buku[$key],
                    'tanggal_hapus_buku' => $request->tanggal_hapus_buku[$key] ?? null, // Handle nullable field
                ]);

                if ($request->skema_biaya == 'sbsn') {
                    SumberPendanaan::create([
                        'uuid_sbsn' => $request->uuid_sbsn,
                        'id_sarana' => $sarana->id
                    ]);
                } else {
                    SumberPendanaan::create([
                        'id_phln' => $request->id_phln,
                        'id_sarana' => $sarana->id
                    ]);
                }


                for ($i = 0; $i < $request->jumlah_barang[$key]; $i++) {
                    PenempatanSarana::create([
                        'kode_unik' => strtoupper(Str::random(10)),
                        'id_sarana' => $sarana->id,
                        'id_ruang' => $request->ruangan,
                        'penggunaan' => $request->penggunaan[$key],
                        'kondisi' => $request->kondisi[$key],
                        'status' => $request->status[$key]
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('manajemen_aset.sarana')->with('success', 'sarana created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function update_sarana(Request $request)
    {
        $penempatan = PenempatanSarana::find($request->id);
        $penempatan->penggunaan = $request->penggunaan;
        $penempatan->kondisi = $request->kondisi;
        $penempatan->status = $request->status;
        $penempatan->save();

        return redirect()->back()->with('success', 'Data sarana berhasil diupdate');
    }

    public function tambah_sarana_import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('file');
        // dd($file);
        $data = Excel::toArray([], $file);
        // dd($data);

        $data_file = [];

        foreach ($data[0] as $row) {
            $data_file[] = [
                'nama' => $row[0],
                'spesifikasi' => $row[1]
            ];
        }

        return response()->json(['data' => $data_file], 200);
    }

    public function get_data_inventaris_ruang_sdm()
    {
        $data = DB::table('ruangan as r')
        ->leftJoin('penempatan_sdm_ruang as prs', 'r.id', '=', 'prs.id_ruang')
        ->select(
            'r.id',
            'r.kode_ruang',
            'r.nama_ruangan',
            'r.kapasitas',
            DB::raw('COUNT(prs.id_sdm) as jumlah_orang_terisi')
        )
        ->groupBy('r.id', 'r.kode_ruang', 'r.nama_ruangan', 'r.kapasitas')
        ->get()
        ->map(function ($item) {
            $item->tersisa = $item->kapasitas - $item->jumlah_orang_terisi;
            return $item;
        });

        return datatables()->of($data)
            ->addColumn('aksi', function ($row) {
                return '
                <a href="' . route('manajemen_aset.inventaris', ['id_ruang' => $row->id]) . '" class="btn btn-sm btn-primary">Details</a>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function get_detail_inventaris_ruang_sdm($id)
    {
        $ruangan = DB::table('ruangan as r')
            ->leftJoin('penempatan_sdm_ruang as prs', 'r.id', '=', 'prs.id_ruang')
            ->leftJoin('sdm as s', 'prs.id_sdm', '=', 's.id')
            ->select('r.id', 'r.kode_ruang', 'r.nama_ruangan', 'r.kapasitas', 's.nama as nama_sdm', 'prs.id_sdm')
            ->where('r.id', $id)
            ->get();

        if ($ruangan->isEmpty()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        return view('ruangan.detail', compact('ruangan'));
    }

    public function index_inventaris_ruang_sarana(Request $request)
    {

        $id = $request->query('id_ruang');
        if ($id) {
            $ruangan = Ruangan::find($id);
            $penempatan_sarana = PenempatanSarana::where('id_ruang', $id)->get();
            // $sdm_list = SumberDayaManusia::all();

            return view('sarpras.manajemen_aset.components.inventaris_ruang_sarana_detail', compact('id', 'ruangan', 'penempatan_sarana'));
        }
        return view('sarpras.manajemen_aset.components.inventaris_table_ruang_sarana');
    }

    public function get_data_inventaris_ruang_sarana()
    {
        $data = DB::table('ruangan as r')
        ->leftJoin('penempatan_sarana as ps', 'r.id', '=', 'ps.id_ruang')
        ->leftJoin('sarana as s', 'ps.id_sarana', '=', 's.id')
        ->select(
            'r.id',
            'r.kode_ruang',
            'r.nama_ruangan',
            DB::raw('COUNT(ps.id_sarana) as jumlah_sarana_terisi'),
            DB::raw('SUM(s.nilai_perolehan) as total_biaya')
        )
        ->groupBy('r.id', 'r.kode_ruang', 'r.nama_ruangan')
        ->get();
        // ->map(function ($item) {
        //     $item->tersisa = $item->kapasitas - $item->jumlah_orang_terisi;
        //     return $item;
        // });

        return datatables()->of($data)
            ->addColumn('aksi', function ($row) {
                return '
                <a href="' . route('manajemen.aset.inventaris.index_ruang_sarana', ['id_ruang' => $row->id]) . '" class="btn btn-sm btn-primary">Details</a>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}