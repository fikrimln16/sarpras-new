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

//import models
use App\Models\Bangunan;
use App\Models\Ruangan;
use App\Models\PenempatanSarana;
use App\Models\Sarana;
use App\Models\Prasarana;


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




    public function index_ruang()
    {
        return view('sarpras.manajemen_aset.index_ruang');
    }

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


    // public function index_prasarana()
    // {
    //     $dataPrasarana = [
    //         [
    //             'id' => 1,
    //             'nama_prasarana' => 'TULT',
    //             'jenis_prasarana' => 'Gedung Kafetaria',
    //             'alamat' => 'Jl. Lingkar, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424',
    //             'latitude' => -6.360338292,
    //             'longitude' => 106.8272188,
    //             'panjang' => 15,
    //             'lebar' => 15,
    //             'luas_bangunan' => 320,
    //             'luas_tanah' => 1591,
    //             'jumlah_lantai' => 18,
    //             'objek_infrastruktur' => 'Universitas Indonesia',
    //             'BMN_satker' => 'TULT-BRG-2345',
    //             'BMN_kode_barang' => 1,
    //             'BMN_nup' => '05-05-2020',
    //             'tanggal_perolehan' => '2020-05-05',
    //             'nilai_perolehan' => 50000000000,
    //             'nilai_buku' => 45000000,
    //             'merk' => '',
    //             'KD_KAB_KOTA' => 'DKI-12512',
    //             'NM_KAB_KOTA' => 'Jakarta Timur',
    //             'KD_PROV' => 'DKI',
    //             'NM_PROV' => 'DKI Jakarta',
    //             'penggunaan' => 'peneltian, dll',
    //             'kondisi' => 'baik',
    //             'NO_DOK_KEPEMILIKAN' => 'DOK-12512',
    //             'DOK_KEPEMILIKAN' => '',
    //             'JNS_DOK_KEPEMILIKAN' => 'Sertifikat',
    //             'KD_SATKER_TANAH' => '1234567890',
    //             'NM_SATKER_TANAH' => 'Universitas Indonesia',
    //             'KD_BRG_TANAH' => 1,
    //             'NM_BRG_TANAH' => 'Gedung Utama',
    //             'NUP_BRG_TANAH' => '12345678901',
    //             'TGL_SK_PEMAKAIAN' => '2000-01-01',
    //             'kapasitas' => 1000,
    //             'tanggal_hapus_buku' => '',
    //             'keterangan' => 'Gedung utama Universitas Indonesia'
    //         ],
    //         [
    //             'id' => 2,
    //             'nama_prasarana' => 'Gedung Sekolah',
    //             'jenis_prasarana' => 'Gedung Sekolah',
    //             'alamat' => 'Jl. Pahlawan, No. 123, Kota Bandung',
    //             'latitude' => -6.934469,
    //             'longitude' => 107.604858,
    //             'panjang' => 20,
    //             'lebar' => 25,
    //             'luas_bangunan' => 500,
    //             'luas_tanah' => 2000,
    //             'jumlah_lantai' => 10,
    //             'objek_infrastruktur' => 'Sekolah XYZ',
    //             'BMN_satker' => 'SekolahXYZ-BRG-5678',
    //             'BMN_kode_barang' => 2,
    //             'BMN_nup' => '10-10-2019',
    //             'tanggal_perolehan' => '2019-10-10',
    //             'nilai_perolehan' => 75000000000,
    //             'nilai_buku' => 60000000,
    //             'merk' => '',
    //             'KD_KAB_KOTA' => 'BDG-54321',
    //             'NM_KAB_KOTA' => 'Bandung',
    //             'KD_PROV' => 'JBR',
    //             'NM_PROV' => 'Jawa Barat',
    //             'penggunaan' => 'Pendidikan',
    //             'kondisi' => 'Baik',
    //             'NO_DOK_KEPEMILIKAN' => 'DOK-98765',
    //             'DOK_KEPEMILIKAN' => '',
    //             'JNS_DOK_KEPEMILIKAN' => 'Sertifikat',
    //             'KD_SATKER_TANAH' => '0987654321',
    //             'NM_SATKER_TANAH' => 'Sekolah XYZ',
    //             'KD_BRG_TANAH' => 2,
    //             'NM_BRG_TANAH' => 'Gedung Utama Sekolah',
    //             'NUP_BRG_TANAH' => '98765432101',
    //             'TGL_SK_PEMAKAIAN' => '2005-05-01',
    //             'kapasitas' => 800,
    //             'tanggal_hapus_buku' => '',
    //             'keterangan' => 'Gedung utama Sekolah XYZ'
    //         ],
    //         [
    //             'id' => 3,
    //             'nama_prasarana' => 'Gedung Kantor',
    //             'jenis_prasarana' => 'Gedung Kantor',
    //             'alamat' => 'Jl. Sudirman, No. 456, Kota Surabaya',
    //             'latitude' => -7.257472,
    //             'longitude' => 112.752090,
    //             'panjang' => 30,
    //             'lebar' => 35,
    //             'luas_bangunan' => 1000,
    //             'luas_tanah' => 3000,
    //             'jumlah_lantai' => 5,
    //             'objek_infrastruktur' => 'Kantor Pemerintah',
    //             'BMN_satker' => 'KantorPem-BRG-91011',
    //             'BMN_kode_barang' => 3,
    //             'BMN_nup' => '20-02-2018',
    //             'tanggal_perolehan' => '2018-02-20',
    //             'nilai_perolehan' => 100000000000,
    //             'nilai_buku' => 80000000,
    //             'merk' => '',
    //             'KD_KAB_KOTA' => 'SBY-98765',
    //             'NM_KAB_KOTA' => 'Surabaya',
    //             'KD_PROV' => 'JTM',
    //             'NM_PROV' => 'Jawa Timur',
    //             'penggunaan' => 'Administrasi',
    //             'kondisi' => 'Sangat Baik',
    //             'NO_DOK_KEPEMILIKAN' => 'DOK-45678',
    //             'DOK_KEPEMILIKAN' => '',
    //             'JNS_DOK_KEPEMILIKAN' => 'Sertifikat',
    //             'KD_SATKER_TANAH' => '5678901234',
    //             'NM_SATKER_TANAH' => 'Kantor Pemerintah',
    //             'KD_BRG_TANAH' => 3,
    //             'NM_BRG_TANAH' => 'Gedung Utama Kantor',
    //             'NUP_BRG_TANAH' => '45678901234',
    //             'TGL_SK_PEMAKAIAN' => '2010-10-15',
    //             'kapasitas' => 500,
    //             'tanggal_hapus_buku' => '',
    //             'keterangan' => 'Gedung utama Kantor Pemerintah'
    //         ]
    //     ];

    //     $data = $this->data;

    //     return redirect()->to('/manajemen_aset/prasarana/bangunan');
    // }


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
        if($id){
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
        return redirect()->route('manajemen_aset.prasarana')->with('success', 'Prasarana created successfully.');
    }

    public function delete_prasarana($id)
    {
        $prasarana = Prasarana::findOrFail($id);

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
         // dd($ruangan);
         return view('sarpras.manajemen_aset.components.ruangan_table', compact('ruangan'));
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

      //   return view('sarpras.manajemen_aset.index_sarana', compact('data'));

         $penempatanSarana = PenempatanSarana::with(['ruangan', 'sarana'])->get();
         // dd($penempatanSarana);
         return view('sarpras.manajemen_aset.index_sarana', compact('penempatanSarana'));
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

    public function tambah_sarana(Request $request): JsonResponse
    {
        try {
            // Validasi input (jika diperlukan)

            // Proses input untuk universitas, bangunan, dan ruangan
            $universitas = $request->nama_universitas;
            $bangunan = $request->bangunan;
            $ruangan = $request->ruangan;

            // Masukkan data barang ke tabel 'sarana' dan ambil UUID
            $data_sarana = [];
            $data_penempatan = [];
            foreach ($request->nama_sarana as $key => $value) {
                $uuid = uniqid('', true); // Menghasilkan UUID yang unik

                // Simpan data barang
                $data_sarana[] = [
                    'uuid' => $uuid,
                    'nama_sarana' => $value,
                    'jenis_sarana' => $request->jenis_sarana[$key],
                    'tanggal_perolehan' => $request->tanggal_perolehan[$key],
                    'nilai_perolehan' => $request->nilai_perolehan[$key],
                    'kondisi' => $request->kondisi[$key],
                    'status' => $request->status[$key],
                    //    'universitas' => $universitas,
                    //    'bangunan' => $bangunan,
                    //    'ruangan' => $ruangan,
                ];

                // Simpan data penempatan barang
                for ($i = 0; $i < $request->jumlah_barang[$key]; $i++) {
                    $data_penempatan[] = [
                        'uuid_sarana' => $uuid,
                        'lokasi' => $ruangan // Contoh field lokasi, sesuaikan dengan kebutuhan
                    ];
                }
            }

            // Berhasil
            return response()->json([
                'message' => 'Data diterima',
                'data_sarana' => $data_sarana,
                'data_penempatan' => $data_penempatan,
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
    //         $universitas = $request->nama_universitas;
    //         $bangunan = $request->bangunan;
    //         $ruangan = $request->ruangan;

    //         // Masukkan data barang ke tabel 'sarana' dan ambil UUID
    //         $data_sarana = [];
    //         $data_penempatan = [];
    //         foreach ($request->nama_sarana as $key => $value) {
    //             $uuid = uniqid('', true); // Menghasilkan UUID yang unik

    //             // Simpan data barang ke dalam model Sarana
    //             $sarana = new Sarana();
    //             $sarana->uuid = $uuid;
    //             $sarana->nama_sarana = $value;
    //             $sarana->jenis_sarana = $request->jenis_sarana[$key];
    //             $sarana->tanggal_perolehan = $request->tanggal_perolehan[$key];
    //             $sarana->nilai_perolehan = $request->nilai_perolehan[$key];
    //             $sarana->kondisi = $request->kondisi[$key];
    //             $sarana->status = $request->status[$key];
    //             $sarana->universitas = $universitas;
    //             $sarana->bangunan = $bangunan;
    //             $sarana->ruangan = $ruangan;
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
    //                 'universitas' => $universitas,
    //                 'bangunan' => $bangunan,
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
}