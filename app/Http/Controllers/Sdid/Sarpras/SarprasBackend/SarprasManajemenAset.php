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

//import models
use App\Models\Bangunan;
use App\Models\Ruangan;
use App\Models\PenempatanSarana;
use App\Models\Sarana;
use App\Models\Prasarana;
use App\Models\SumberPendanaan;


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




    // public function index_ruang()
    // {
    //     return view('sarpras.manajemen_aset.index_ruang');
    // }

    #nanti ambil data dari db di fungsi index
    protected $data = [
        [
            "id_sarana" => 1,
            "Nama Sarana" => "Laptop HP ProBook 450 G8",
            "Kategori" => "Alat",
            "Kategori" => null,
            "jenis_sarana" => "Laptop",
            "spesifikasi" => "Intel Core i5-1135G7, RAM 8GB, SSD 512GB, Layar 15.6\" FHD",
            "tanggal_perolehan" => "2023-01-10",
            "tahun_produksi" => 2023,
            "nilai_perolehan" => "13.000.000",
            "nilai_buku" => "13.000.000",
            "penggunaan" => "Laboratorium Informatika",
            "kondisi" => "Baik",
            "tanggal_hapus_buku" => "-",
            "status" => "Aktif"
        ],
        [
            "id_sarana" => 2,
            "Nama Sarana" => "Laptop Lenovo ThinkPad E14 Gen 4",
            "Kategori" => "Mebeulair",
            "Kategori" => null,
            "jenis_sarana" => "Laptop",
            "spesifikasi" => "AMD Ryzen 5 5500U, RAM 8GB, SSD 256GB, Layar 14\" FHD",
            "tanggal_perolehan" => "2023-03-05",
            "tahun_produksi" => 2023,
            "nilai_perolehan" => "9.500.000",
            "nilai_buku" => "9.500.000",
            "penggunaan" => "Ruang Kelas A1",
            "kondisi" => "Baik",
            "tanggal_hapus_buku" => "-",
            "status" => "Aktif"
        ],
        [
            "id_sarana" => 3,
            "Nama Sarana" => "Epson EB-S41",
            "Kategori" => "Alat",
            "Kategori" => null,
            "jenis_sarana" => "Proyektor",
            "spesifikasi" => "WXGA (1280x800), 3.300 Lumens, Kontras 15.000:1",
            "tanggal_perolehan" => "2022-12-15",
            "tahun_produksi" => 2022,
            "nilai_perolehan" => "7.000.000",
            "nilai_buku" => "5.600.000",
            "penggunaan" => "Aula",
            "kondisi" => "Baik",
            "tanggal_hapus_buku" => "-",
            "status" => "Aktif"
        ]
    ];


    public function index_prasarana(Request $request)
    {

        $id = $request->query('id');

        $bangunan = Prasarana::all();
        $kategori = $request->query('tab', 'default');

        // if ($kategori != 'default') {
        //     $bangunan = Bangunan::where('kategori', $kategori)->get(); // Filter bangunan berdasarkan kategori
        // } else {
        // }
        // //   dd($data);
        // $activeTab = $kategori; 

        $data = Prasarana::all(); // Ambil semua bangunan jika tidak ada filter
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
        // Validate and store data
        // dd($request);
        Prasarana::create($request->all());

        $rules = [
            'kode_paket' => 'required|string|max:50',
            'KD_SATKER_TANAH' => 'required|integer',
            'NM_SATKER_TANAH' => 'required|string|max:255',
            'KD_BRG_TANAH' => 'required|integer',
            'NM_BRG_TANAH' => 'required|string|max:255',
            'NUP_BRG_TANAH' => 'required|integer',
            'TGL_SK_PEMAKAIAN' => 'required|date',
            'kapasitas' => 'required|integer',
            'tanggal_hapus_buku' => 'nullable|string|max:20',
            'keterangan' => 'required|string|max:255',
            // 'id_prasarana' => 'required|integer|exists:prasarana,id',
            // 'id_tanah' => 'required|integer|exists:tanah,id',
            'kategori' => 'nullable|string|max:50'
        ];

        $validatedData = $request->validate($rules);
        Bangunan::create($validatedData);

        return redirect()->route('manajemen_aset.prasarana')->with('success', 'Prasarana created successfully.');
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



    public function index_ruangan()
    {

        $ruangan = Ruangan::with('bangunan')->get();
        $prasarana = Prasarana::all();
        // dd($ruangan);
        return view('sarpras.manajemen_aset.components.ruangan_table', compact('ruangan', 'prasarana'));
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

        // $sarana = (new Sarana())->getDataSaranaByIdRuang($id_ruangan);
        // dd($sarana);

        $penempatanSarana = PenempatanSarana::with(['ruangan', 'sarana'])->get();
        dd($penempatanSarana);
        return view('sarpras.manajemen_aset.index_sarana', compact('penempatanSarana'));
    }

    public function index_sarana()
    {
        //   $data = $this->data;
        $prasarana = Prasarana::all();
        //   return view('sarpras.manajemen_aset.index_sarana', compact('data'));

        $penempatanSarana = PenempatanSarana::with(['ruangan', 'sarana'])->get();
        // dd($penempatanSarana);
        return view('sarpras.manajemen_aset.index_sarana', compact('penempatanSarana', 'prasarana'));
    }

    public function index_inventaris()
    {
        $data = [
            [
                'kode_penempatan' => 'KP001',
                'Nama Dosen' => 'John Doe',
                'Ruangan' => 'A-1',
                'tanggal_mulai_penempatan' => '2024-05-10',
                'tanggal_akhir_penempatan' => '2024-06-10',
                'status' => 'aktif',
                'deskripsi' => 'digunakan untuk penelitian',
                'detail' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'kode_penempatan' => 'KP002',
                'Nama Dosen' => 'Jane Doe',
                'Ruangan' => 'B-1',
                'tanggal_mulai_penempatan' => '2024-05-15',
                'tanggal_akhir_penempatan' => '2024-06-15',
                'status' => 'aktif',
                'deskripsi' => 'digunakan untuk asisten lab',
                'detail' => 'Consectetur adipiscing elit'
            ],
        ];

        $bangunan = [
            ['id' => 1, 'nama_bangunan' => 'Bangunan A'],
            ['id' => 2, 'nama_bangunan' => 'Bangunan B'],
        ];

        $nama_dosen = [
            'John Doe',
            'Jane Doe',
            'Alice',
            'Bob'
        ];

        return view('sarpras.manajemen_aset.index_inventaris', compact('data', 'bangunan', 'nama_dosen'));
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

    public function tambah_pemetaan_dosen(Request $request): JsonResponse
    {
        try {
            // Proses input
            $bangunan = $request->bangunan;
            $ruangan = $request->ruangan;

            // Simpan data pemetaan dosen
            $dataPemetaan = [];
            foreach ($request->nama_dosen as $key => $value) {
                $dataPemetaan[] = [
                    'nama_dosen' => $request->nama_dosen[$key],
                    'tanggal_mulai_penempatan' => $request->tanggal_mulai_penempatan[$key],
                    'tanggal_akhir_penempatan' => $request->tanggal_akhir_penempatan[$key],
                    'status' => $request->status[$key],
                    'deskripsi' => $request->deskripsi[$key],
                    'ruangan' => $ruangan,
                ];
            }

            // Berhasil
            return response()->json([
                'message' => 'Data diterima',
                'data_pemetaan' => $dataPemetaan,
            ], 200);
        } catch (\Exception $e) {
            // Gagal
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    // public function tambah_sarana(Request $request): JsonResponse
    // {
    //     try {
    //         // Validasi input (jika diperlukan)

    //         // Proses input untuk universitas, bangunan, dan ruangan
    //         $bangunan = $request->prasarana;
    //         $ruangan = $request->ruangan;

    //         // Masukkan data barang ke tabel 'sarana' dan ambil UUID
    //         $data_sarana = [];
    //         $data_penempatan = [];
    //         foreach ($request->nama_sarana as $key => $value) {
    //             $uuid = uniqid('', true); // Menghasilkan UUID yang unik

    //             // Simpan data barang
    //             $data_sarana[] = [
    //                 'uuid' => $uuid,
    //                 'nama_sarana' => $value,
    //                 'jenis_sarana' => $request->jenis_sarana[$key],
    //                 'tanggal_perolehan' => $request->tanggal_perolehan[$key],
    //                 'nilai_perolehan' => $request->nilai_perolehan[$key],
    //                 'kondisi' => $request->kondisi[$key],
    //                 'status' => $request->status[$key],
    //                 //    'universitas' => $universitas,
    //                 //    'bangunan' => $bangunan,
    //                 //    'ruangan' => $ruangan,
    //             ];

    //             // Simpan data penempatan barang
    //             for ($i = 0; $i < $request->jumlah_barang[$key]; $i++) {
    //                 $data_penempatan[] = [
    //                     'uuid_sarana' => $uuid,
    //                     'lokasi' => $ruangan // Contoh field lokasi, sesuaikan dengan kebutuhan
    //                 ];
    //             }
    //         }

    //         // Berhasil
    //         return response()->json([
    //             'message' => 'Data diterima',
    //             'data_sarana' => $data_sarana,
    //             'data_penempatan' => $data_penempatan,
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Gagal
    //         return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
    //     }
    // }


    // public function tambah_sarana(Request $request): JsonResponse
    // {
    //     try {
    //         // Validasi input (jika diperlukan)
    //         dd($request);
    //         // Proses input untuk universitas, bangunan, dan ruangan
    //         // $universitas = $request->nama_universitas;
    //         $prasarana = $request->prasarana;
    //         $ruangan = $request->ruangan;

    //         // Masukkan data barang ke tabel 'sarana' dan ambil UUID
    //         $data_sarana = [];
    //         $data_penempatan = [];
    //         foreach ($request->nama_sarana as $key => $value) {
    //             $uuid = uniqid('', true); // Menghasilkan UUID yang unik

    //             // Simpan data barang ke dalam model Sarana
    //             $sarana = new Sarana();
    //             $sarana->nama_sarana = $value;
    //             $sarana->jenis_sarana = $request->jenis_sarana[$key];
    //             $sarana->tanggal_perolehan = $request->tanggal_perolehan[$key];
    //             $sarana->nilai_perolehan = $request->nilai_perolehan[$key];
    //             $sarana->kondisi = $request->kondisi[$key];
    //             $sarana->status = $request->status[$key];
    //             $sarana->save();

    //             // Simpan data penempatan barang ke dalam model PenempatanSarana
    //             for ($i = 0; $i < $request->jumlah_barang[$key]; $i++) {
    //                 $penempatan = new PenempatanSarana();
    //                 $penempatan->uuid_sarana = $uuid;
    //                 $penempatan->lokasi = $ruangan; // Contoh field lokasi, sesuaikan dengan kebutuhan
    //                 $penempatan->save();
    //             }

    //             // Simpan data barang untuk response JSON
    //             $data_sarana[] = [
    //                 'uuid' => $uuid,
    //                 'nama_sarana' => $value,
    //                 'jenis_sarana' => $request->jenis_sarana[$key],
    //                 'tanggal_perolehan' => $request->tanggal_perolehan[$key],
    //                 'nilai_perolehan' => $request->nilai_perolehan[$key],
    //                 'kondisi' => $request->kondisi[$key],
    //                 'status' => $request->status[$key],
    //                 'bangunan' => $prasarana,
    //                 'ruangan' => $ruangan,
    //             ];
    //         }

    //         // Berhasil
    //         return response()->json([
    //             'message' => 'Data diterima',
    //             'data_sarana' => $data_sarana,
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Gagal
    //         return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
    //     }
    // }

    public function tambah_sarana(Request $request): JsonResponse
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'prasarana' => 'required|integer|exists:prasarana,id',
            'ruangan' => 'required|integer|exists:ruangan,id',
            'nama_sarana.*' => 'required|string|max:255',
            'jenis_sarana.*' => 'required|string|max:255',
            'tanggal_perolehan.*' => 'required|date',
            'nilai_perolehan.*' => 'required|numeric',
            'kondisi.*' => 'required|string|max:255',
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
                    'jenis_sarana' => $request->jenis_sarana[$key],
                    'tanggal_perolehan' => $request->tanggal_perolehan[$key],
                    'nilai_perolehan' => $request->nilai_perolehan[$key],
                    'kondisi' => $request->kondisi[$key],
                    'status' => $request->status[$key]
                ]);

                for ($i = 0; $i < $request->jumlah_barang[$key]; $i++) {
                    PenempatanSarana::create([
                        'id_sarana' => $sarana->id,
                        'id_ruang' => $request->ruangan
                    ]);
                }

                // $data_sarana[] = [
                //     'id' => $sarana->id,
                //     'nama_sarana' => $value,
                //     'jenis_sarana' => $request->jenis_sarana[$key],
                //     'tanggal_perolehan' => $request->tanggal_perolehan[$key],
                //     'nilai_perolehan' => $request->nilai_perolehan[$key],
                //     'kondisi' => $request->kondisi[$key],
                //     'status' => $request->status[$key],
                //     'prasarana' => $request->prasarana,
                //     'ruangan' => $request->ruangan,
                // ];
            }

            DB::commit();
            return response()->json(['message' => 'Data diterima', 'data_sarana' => $data_sarana], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}