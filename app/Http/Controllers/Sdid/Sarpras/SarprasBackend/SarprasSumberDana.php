<?php

namespace App\Http\Controllers\Sdid\Sarpras\SarprasBackend;

use App\Models\DataLokasiKampus;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;

use App\Models\Sbsn;


class SarprasSumberDana extends Controller
{

    protected $data_phln = [
        [
            "uuid_phln" => "12asf-as215-asf2",
            'nama_proyek' => "AKSI",
            'singkatan_proyek' => "PGDA",
            'jenis_kontrak' => "Multi Year",
            'sign_date' => "2024-01-01",
            'closed_date' => "2025-01-01",
            'pemberi_pinjaman' => "ADB",
            'pagu_loan' => 32000000000,
            'mata_uang_pagu_loan' => "IDR",
            'pagu_goi' => 1250000000,
            'mata_uang_pagu_goi' => "IDR",
            'mata_uang_valas' => "IDR",
            'kode_loan' => "ID-DitjenDikti-PKPI-2024-08",
            'no_registrasi' => "REG2024001"
        ],
        [
            "uuid_phln" => "12asf-as215-asf2",
            'nama_proyek' => "AKSI",
            'singkatan_proyek' => "PGDA",
            'jenis_kontrak' => "Multi Year",
            'sign_date' => "2024-01-01",
            'closed_date' => "2025-01-01",
            'pemberi_pinjaman' => "ADB",
            'pagu_loan' => 32000000000,
            'mata_uang_pagu_loan' => "IDR",
            'pagu_goi' => 1250000000,
            'mata_uang_pagu_goi' => "IDR",
            'mata_uang_valas' => "IDR",
            'kode_loan' => "ID-DitjenDikti-PKPI-2024-08",
            'no_registrasi' => "REG2024001"
        ],
        [
            "uuid_phln" => "asasd-asd-asd23",
            'nama_proyek' => "Project ABC",
            'singkatan_proyek' => "ABC",
            'jenis_kontrak' => "Single Year",
            'sign_date' => "2023-05-15",
            'closed_date' => "2024-05-15",
            'pemberi_pinjaman' => "World Bank",
            'pagu_loan' => 50000000000,
            'mata_uang_pagu_loan' => "USD",
            'pagu_goi' => 2000000000,
            'mata_uang_pagu_goi' => "USD",
            'mata_uang_valas' => "USD",
            'kode_loan' => "WB-ProjectABC-2023-05",
            'no_registrasi' => "REG2023001"
        ],
        [
            "uuid_phln" => "sdf23-asd-asdf",
            'nama_proyek' => "Project XYZ",
            'singkatan_proyek' => "XYZ",
            'jenis_kontrak' => "Multi Year",
            'sign_date' => "2022-07-01",
            'closed_date' => "2025-07-01",
            'pemberi_pinjaman' => "Asian Development Bank",
            'pagu_loan' => 75000000000,
            'mata_uang_pagu_loan' => "IDR",
            'pagu_goi' => 3000000000,
            'mata_uang_pagu_goi' => "IDR",
            'mata_uang_valas' => "IDR",
            'kode_loan' => "ADB-ProjectXYZ-2022-07",
            'no_registrasi' => "REG2022001"
        ],
        [
            "uuid_phln" => "123as-asdf-sdf2",
            'nama_proyek' => "Project PQR",
            'singkatan_proyek' => "PQR",
            'jenis_kontrak' => "Multi Year",
            'sign_date' => "2023-03-20",
            'closed_date' => "2026-03-20",
            'pemberi_pinjaman' => "International Monetary Fund",
            'pagu_loan' => 90000000000,
            'mata_uang_pagu_loan' => "IDR",
            'pagu_goi' => 3500000000,
            'mata_uang_pagu_goi' => "IDR",
            'mata_uang_valas' => "IDR",
            'kode_loan' => "IMF-ProjectPQR-2023-03",
            'no_registrasi' => "REG2023002"
        ],
        [
            "uuid_phln" => "qwer1-qwer-qwer",
            'nama_proyek' => "Project LMN",
            'singkatan_proyek' => "LMN",
            'jenis_kontrak' => "Single Year",
            'sign_date' => "2022-09-10",
            'closed_date' => "2023-09-10",
            'pemberi_pinjaman' => "Asian Infrastructure Investment Bank",
            'pagu_loan' => 60000000000,
            'mata_uang_pagu_loan' => "USD",
            'pagu_goi' => 2400000000,
            'mata_uang_pagu_goi' => "USD",
            'mata_uang_valas' => "USD",
            'kode_loan' => "AIIB-ProjectLMN-2022-09",
            'no_registrasi' => "REG2022002"
        ],
        [
            "uuid_phln" => "sdf23-asd-asdf",
            'nama_proyek' => "Project XYZ",
            'singkatan_proyek' => "XYZ",
            'jenis_kontrak' => "Multi Year",
            'sign_date' => "2022-07-01",
            'closed_date' => "2025-07-01",
            'pemberi_pinjaman' => "Asian Development Bank",
            'pagu_loan' => 75000000000,
            'mata_uang_pagu_loan' => "IDR",
            'pagu_goi' => 3000000000,
            'mata_uang_pagu_goi' => "IDR",
            'mata_uang_valas' => "IDR",
            'kode_loan' => "ADB-ProjectXYZ-2022-07",
            'no_registrasi' => "REG2022001"
        ],
        [
            "uuid_phln" => "123as-asdf-sdf2",
            'nama_proyek' => "Project PQR",
            'singkatan_proyek' => "PQR",
            'jenis_kontrak' => "Multi Year",
            'sign_date' => "2023-03-20",
            'closed_date' => "2026-03-20",
            'pemberi_pinjaman' => "International Monetary Fund",
            'pagu_loan' => 90000000000,
            'mata_uang_pagu_loan' => "IDR",
            'pagu_goi' => 3500000000,
            'mata_uang_pagu_goi' => "IDR",
            'mata_uang_valas' => "IDR",
            'kode_loan' => "IMF-ProjectPQR-2023-03",
            'no_registrasi' => "REG2023002"
        ],
        [
            "uuid_phln" => "qwer1-qwer-qwer",
            'nama_proyek' => "Project LMN",
            'singkatan_proyek' => "LMN",
            'jenis_kontrak' => "Single Year",
            'sign_date' => "2022-09-10",
            'closed_date' => "2023-09-10",
            'pemberi_pinjaman' => "Asian Infrastructure Investment Bank",
            'pagu_loan' => 60000000000,
            'mata_uang_pagu_loan' => "USD",
            'pagu_goi' => 2400000000,
            'mata_uang_pagu_goi' => "USD",
            'mata_uang_valas' => "USD",
            'kode_loan' => "AIIB-ProjectLMN-2022-09",
            'no_registrasi' => "REG2022002"
        ],
        [
            "uuid_phln" => "sdf23-asd-asdf",
            'nama_proyek' => "Project XYZ",
            'singkatan_proyek' => "XYZ",
            'jenis_kontrak' => "Multi Year",
            'sign_date' => "2022-07-01",
            'closed_date' => "2025-07-01",
            'pemberi_pinjaman' => "Asian Development Bank",
            'pagu_loan' => 75000000000,
            'mata_uang_pagu_loan' => "IDR",
            'pagu_goi' => 3000000000,
            'mata_uang_pagu_goi' => "IDR",
            'mata_uang_valas' => "IDR",
            'kode_loan' => "ADB-ProjectXYZ-2022-07",
            'no_registrasi' => "REG2022001"
        ],
        [
            "uuid_phln" => "123as-asdf-sdf2",
            'nama_proyek' => "Project PQR",
            'singkatan_proyek' => "PQR",
            'jenis_kontrak' => "Multi Year",
            'sign_date' => "2023-03-20",
            'closed_date' => "2026-03-20",
            'pemberi_pinjaman' => "International Monetary Fund",
            'pagu_loan' => 90000000000,
            'mata_uang_pagu_loan' => "IDR",
            'pagu_goi' => 3500000000,
            'mata_uang_pagu_goi' => "IDR",
            'mata_uang_valas' => "IDR",
            'kode_loan' => "IMF-ProjectPQR-2023-03",
            'no_registrasi' => "REG2023002"
        ],
        [
            "uuid_phln" => "qwer1-qwer-qwer",
            'nama_proyek' => "Project LMN",
            'singkatan_proyek' => "LMN",
            'jenis_kontrak' => "Single Year",
            'sign_date' => "2022-09-10",
            'closed_date' => "2023-09-10",
            'pemberi_pinjaman' => "Asian Infrastructure Investment Bank",
            'pagu_loan' => 60000000000,
            'mata_uang_pagu_loan' => "USD",
            'pagu_goi' => 2400000000,
            'mata_uang_pagu_goi' => "USD",
            'mata_uang_valas' => "USD",
            'kode_loan' => "AIIB-ProjectLMN-2022-09",
            'no_registrasi' => "REG2022002"
        ],
    ];

    protected $data_sbsn = [
        [
            "uuid_sbsn" => "asgi2-1kv0a-2mfoa-1mgic",
            "tahun_start" => "2020",
            "tahun_end" => "2024",
            "jenis_kontrak" => "myc",
            "tgl_mulai_kontrak" => "2023-01-10",
            "tgl_selesai_kontrak" => "2025-01-10",
            "penanda_aset" => "Ada",
            "perguruan_tinggi" => "Universitas Indonesia",
            "nama_proyek" => "Higher Education For Technology And Innovation Project (HETI)",
            "nilai_dpp" => 3000000000,
            "no_registrasi" => "REG2020001",
            // "nilai_pagu_akhir" => "95000000",
            // "nilai_realisasi_setelah_nilai_dpp" => null
        ],
        [
            "uuid_sbsn" => "asgi2-1kv0a-2mfoa-1mgic",
            "tahun_start" => "2020",
            "tahun_end" => "2024",
            "jenis_kontrak" => "myc",
            "tgl_mulai_kontrak" => "2023-01-10",
            "tgl_selesai_kontrak" => "2025-01-10",
            "penanda_aset" => "Ada",
            "perguruan_tinggi" => "Universitas Indonesia",
            "nama_proyek" => "Higher Education For Technology And Innovation Project (HETI)",
            "nilai_dpp" => 3000000000,
            "no_registrasi" => "REG2020001",
            // "nilai_pagu_akhir" => "95000000",
            // "nilai_realisasi_setelah_nilai_dpp" => null
        ],
        [
            "uuid_sbsn" => "asgi2-1kv0a-2mfoa-1mgic",
            "tahun_start" => "2020",
            "tahun_end" => "2024",
            "jenis_kontrak" => "myc",
            "tgl_mulai_kontrak" => "2023-01-10",
            "tgl_selesai_kontrak" => "2025-01-10",
            "penanda_aset" => "Ada",
            "perguruan_tinggi" => "Universitas Indonesia",
            "nama_proyek" => "Higher Education For Technology And Innovation Project (HETI)",
            "nilai_dpp" => 3000000000,
            "no_registrasi" => "REG2020001",
            // "nilai_pagu_akhir" => "95000000",
            // "nilai_realisasi_setelah_nilai_dpp" => null
        ],
        [
            "uuid_sbsn" => "asgi2-1kv0a-2mfoa-1mgic",
            "tahun_start" => "2020",
            "tahun_end" => "2024",
            "jenis_kontrak" => "myc",
            "tgl_mulai_kontrak" => "2023-01-10",
            "tgl_selesai_kontrak" => "2025-01-10",
            "penanda_aset" => "Ada",
            "perguruan_tinggi" => "Universitas Indonesia",
            "nama_proyek" => "Higher Education For Technology And Innovation Project (HETI)",
            "nilai_dpp" => 3000000000,
            "no_registrasi" => "REG2020001",
            // "nilai_pagu_akhir" => "95000000",
            // "nilai_realisasi_setelah_nilai_dpp" => null
        ],
        [
            "uuid_sbsn" => "asgi2-1kv0a-2mfoa-1mgic",
            "tahun_start" => "2020",
            "tahun_end" => "2024",
            "jenis_kontrak" => "myc",
            "tgl_mulai_kontrak" => "2023-01-10",
            "tgl_selesai_kontrak" => "2025-01-10",
            "penanda_aset" => "Ada",
            "perguruan_tinggi" => "Universitas Indonesia",
            "nama_proyek" => "Higher Education For Technology And Innovation Project (HETI)",
            "nilai_dpp" => 3000000000,
            "no_registrasi" => "REG2020001",
            // "nilai_pagu_akhir" => "95000000",
            // "nilai_realisasi_setelah_nilai_dpp" => null
        ],
        [
            "uuid_sbsn" => "asgi2-1kv0a-2mfoa-1mgic",
            "tahun_start" => "2020",
            "tahun_end" => "2024",
            "jenis_kontrak" => "myc",
            "tgl_mulai_kontrak" => "2023-01-10",
            "tgl_selesai_kontrak" => "2025-01-10",
            "penanda_aset" => "Ada",
            "perguruan_tinggi" => "Universitas Indonesia",
            "nama_proyek" => "Higher Education For Technology And Innovation Project (HETI)",
            "nilai_dpp" => 3000000000,
            "no_registrasi" => "REG2020001",
            // "nilai_pagu_akhir" => "95000000",
            // "nilai_realisasi_setelah_nilai_dpp" => null
        ],
        [
            "uuid_sbsn" => "asgi2-1kv0a-2mfoa-1mgic",
            "tahun_start" => "2020",
            "tahun_end" => "2024",
            "jenis_kontrak" => "myc",
            "tgl_mulai_kontrak" => "2023-01-10",
            "tgl_selesai_kontrak" => "2025-01-10",
            "penanda_aset" => "Ada",
            "perguruan_tinggi" => "Universitas Indonesia",
            "nama_proyek" => "Higher Education For Technology And Innovation Project (HETI)",
            "nilai_dpp" => 3000000000,
            "no_registrasi" => "REG2020001",
            // "nilai_pagu_akhir" => "95000000",
            // "nilai_realisasi_setelah_nilai_dpp" => null
        ]
    ];

    public function index()
    {
        return view('sarpras.sumber_dana.sumber_dana');
    }

    // public function index_pendanaan_skema()
    // {
    //    $data_sbsn = $this->data_sbsn;

    //    return view('sarpras.sumber_dana.pendanaan', compact('data_sbsn'));
    // }

    public function index_pendanaan()
    {
        $data_sbsn = $this->data_sbsn;
        $data_phln = $this->data_phln;


        return redirect()->to('/perolehan_aset/pendanaan/sbsn');
    }


    public function index_pendanaan_sbsn()
    {
        $data_sbsn = Sbsn::all();
        $data_lokasi_kampus = DataLokasiKampus::all();
        // dd($data_lokasi_kampus);
        return view('sarpras.sumber_dana.components.sbsn_table', compact('data_sbsn', 'data_lokasi_kampus'));
    }

    public function index_pendanaan_phln()
    {
        $data_phln = $this->data_phln;
        return view('sarpras.sumber_dana.components.phln_table', compact('data_phln'));
    }

    public function index_data_paket()
    {
        return view('sarpras.sumber_dana.data_paket');
    }

    public function index_data_realisasi()
    {
        return view('sarpras.sumber_dana.data_realisasi');
    }

    public function insert_sbsn(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'nama_proyek' => 'required|string|max:255',
            'jenis_kontrak' => 'required|string|max:255',
            'tanggal_mulai_kontrak' => 'required|date',
            'tanggal_akhir_kontrak' => 'required|date',
            'id_data_lokasi_kampus' => 'required|integer',
            'penanda_aset' => 'nullable|string|max:5',
            'nilai_dpp' => 'nullable|numeric',
            'no_registrasi' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        try {
            // Mengambil tahun dari tanggal_mulai_kontrak dan tanggal_akhir_kontrak
            $tahunStart = date('Y', strtotime($data['tanggal_mulai_kontrak']));
            $tahunEnd = date('Y', strtotime($data['tanggal_akhir_kontrak']));

            // Create a new SBSN record using the Sbsn model
            Sbsn::create([
                'nama_proyek' => $data['nama_proyek'],
                'jenis_kontrak' => $data['jenis_kontrak'],
                'tgl_mulai_kontrak' => $data['tanggal_mulai_kontrak'],
                'tgl_selesai_kontrak' => $data['tanggal_akhir_kontrak'],
                'tahun_start' => $tahunStart,
                'tahun_end' => $tahunEnd,
                'id_data_lokasi_kampus' => $data['id_data_lokasi_kampus'],
                'penanda_aset' => $data['penanda_aset'],
                'nilai_dpp' => $data['nilai_dpp'],
                'no_registrasi' => $data['no_registrasi'],
            ]);

            // Redirect with success message
            return redirect()->route('perolehan_aset.pendanaan.sbsn')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            // Redirect with error message if an exception occurred
            return redirect()->route('perolehan_aset.pendanaan.sbsn')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function insert_phln(Request $request)
    {
        // Mengambil data dari request tanpa validasi
        $data = $request->all();

        // Mengambil tahun dari tanggal_mulai_kontrak dan tanggal_akhir_kontrak
        $tahunStart = date('Y', strtotime($data['tanggal_mulai_kontrak']));
        $tahunEnd = date('Y', strtotime($data['tanggal_mulai_kontrak']));
        if ($data['tanggal_akhir_kontrak']) {
            $tahunEnd = date('Y', strtotime($data['tanggal_akhir_kontrak']));
        }

        // Membuat array response dengan data yang sama seperti yang dimasukkan
        //  $response = [
        //      'nama_proyek' => $data['nama_proyek'],
        //      'jenis_kontrak' => $data['jenis_kontrak'],
        //      'tanggal_mulai_kontrak' => $data['tanggal_mulai_kontrak'],
        //      'tanggal_akhir_kontrak' => $data['tanggal_akhir_kontrak'],
        //      'tahun_start' => $tahunStart,
        //      'tahun_end' => $tahunEnd,
        //      'perguruan_tinggi' => $data['perguruan_tinggi'],
        //      'penanda_aset' => $data['penanda_aset'],
        //      'nilai_dpp' => $data['nilai_dpp'],
        //      'no_registrasi' => $data['no_registrasi'],
        //  ];

        // Mengembalikan response dengan data yang diterima
        return redirect()->route('perolehan_aset.pendanaan.phln')->with('success', 'Data berhasil ditambahkan');
    }



}