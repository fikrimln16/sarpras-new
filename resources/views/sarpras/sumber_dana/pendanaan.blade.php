@extends('layout')

@section('content')
<!-- <div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><i cl   ass="fa fa-fw fa-group"></i> Pilih skema biaya</h5>
            </div>
            <div class="ibox-content">
                <div class="mb-3">
                    <label for="skemaBiaya" class="form-label">Skema Biaya:</label>
                    <select class="form-select full-width" id="skemaBiaya">
                        <option value="sbsn" @yield('sbsnSelected')>SBSN</option>
                        <option value="phln" @yield('phlnSelected')>PHLN</option>
                    </select>
                </div>
            </div>
            <div class="ibox-footer clearfix">
                <button id="tambahBtnSBSN" class="btn btn-primary mb-2">Tambah SBSN</button>
                <button id="tambahBtnPHLN" class="btn btn-primary mb-2">Tambah PHLN</button>
                <button id="cariBtn" class="btn btn-success noborder-radius pull-right"><i class="fa fa-search"></i> Cari</button>
            </div>
        </div>
    </div>
</div> -->


<div class="tabs-container">
    <ul class="nav nav-tabs">
        <li class=""><a href="{{route('perolehan_aset.pendanaan.sbsn')}}">SBSN</a></li>
        <li class=""><a href="{{route('perolehan_aset.pendanaan.phln')}}">PHLN</a></li>

    </ul>
    <div class="float-end">
        <button id="tambahBtnSBSN" class="btn btn-primary mb-2">Tambah SBSN</button>
        <button id="tambahBtnPHLN" class="btn btn-primary mb-2">Tambah PHLN</button>
    </div>
    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">
            <div class="ibox-content">
                @yield('biayaTabel')
            </div>
        </div>
    </div>
</div>


@if(session('success'))
<div class="success-message">
    <button class="close-button" onclick="closeMessage(this)">X</button>
    {{ session('success') }}
</div>
@endif

@include('sarpras.sumber_dana.components.form_create_sbsn')
@include('sarpras.sumber_dana.components.form_create_phln')
@include('sarpras.sumber_dana.components.form_data_pagu')
@include('sarpras.sumber_dana.components.form_edit_sbsn')
@include('sarpras.sumber_dana.components.form_edit_phln')





<script>
    document.addEventListener('DOMContentLoaded', function() {
        var currentUrl = window.location.href;

        // Mengecek apakah URL berakhir dengan "sbsn" atau "phln"
        if (currentUrl.endsWith("sbsn")) {
            // Menampilkan tombol Tambah SBSN jika URL berakhir dengan "sbsn"
            document.getElementById('tambahBtnSBSN').style.display = 'block';
            // Menyembunyikan tombol Tambah PHLN
            document.getElementById('tambahBtnPHLN').style.display = 'none';
        } else if (currentUrl.endsWith("phln")) {
            // Menampilkan tombol Tambah PHLN jika URL berakhir dengan "phln"
            document.getElementById('tambahBtnPHLN').style.display = 'block';
            // Menyembunyikan tombol Tambah SBSN
            document.getElementById('tambahBtnSBSN').style.display = 'none';
        } else {
            // Menampilkan keduanya jika URL tidak berakhir dengan "sbsn" atau "phln"
            document.getElementById('tambahBtnSBSN').style.display = 'block';
            document.getElementById('tambahBtnPHLN').style.display = 'block';
        }

    });
</script>


<style>
    .full-width {
        width: 100%;
    }

    .pull-right {
        float: right;
    }
</style>
<style>
    .float-end {
        float: right;
    }

    .tab-header-pendanaan {
        text-align: center;
        display: flex;
        justify-content: center;
    }

    /* Styles for success message */
    .success-message {
        position: relative;
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        padding: 1rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;
    }

    /* Styles for close button */
    .close-button {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        background: none;
        border: none;
        font-size: 1rem;
        cursor: pointer;
        color: #155724;
    }
</style>
<script>
    function changeSkema() {
        var skema = $('#skemaBiaya').val();
        $('#skema').val(skema);
    }

    function closeMessage(button) {
        button.parentNode.style.display = 'none';
    }
</script>
<script>
    document.getElementById('showAdditionalForm').addEventListener('change', function() {
        var additionalForm = document.getElementById('additionalForm');
        if (this.checked) {
            additionalForm.style.display = 'block';
        } else {
            additionalForm.style.display = 'none';
        }
    });
</script>

<script>
    function toggleTanggalAkhir() {
        var jenisSarana = document.getElementById("jenis_kontrak");
        var tanggalAkhirGroup = document.getElementById("tanggal_akhir_group");

        if (jenisSarana.value === "multi_year") {
            tanggalAkhirGroup.style.display = "block";
        } else {
            tanggalAkhirGroup.style.display = "none";
        }
    }

    function toggleTanggalAkhirPHLN() {
        var jenisSarana = document.getElementById("jenis_kontrak_phln");
        var tanggalAkhirGroup = document.getElementById("tanggal_akhir_group_phln");

        if (jenisSarana.value === "multi_year") {
            tanggalAkhirGroup.style.display = "block";
        } else {
            tanggalAkhirGroup.style.display = "none";
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script>
    $(document).ready(function() {
        // Tampilkan modal saat tombol Tambah ditekan
        $("#tambahBtnSBSN").click(function() {
            $("#modalSBSN").modal('show');
        });

        $("#tambahBtnPHLN").click(function() {
            $("#modalPHLN").modal('show');
        });

        // Sembunyikan modal saat tombol Tutup di modal ditekan
        $(".modal").on("hidden.bs.modal", function() {
            $(this).find('form')[0].reset(); // Reset form saat modal tertutup
        });

        // Sembunyikan modal saat form di-submit
        // $("#myForm").submit(function(e) {
        //     e.preventDefault(); // Hindari reload halaman
        //     $("#modalSBSN").modal('hide');
        // });
    });
</script>
<script>
    function showDataPagu(uuid) {
        //nanti fetch data untuk mengambil data dari database, lalu tempel ke value nya
        $("#editDataPagu").modal('show');
        document.getElementById('editPaguAkhir').value = "12510000";
        document.getElementById('editNilaiRealisasikan').value = "12350000";
    }

    function editFormPHLN(uuid_phln) {
        //nanti fetch data untuk mengambil data dari database, lalu tempel ke value nya

        // $("modalEditSBSN").modal('show')
        document.getElementById('nama_proyek_edit').value = "HETI";
        // document.getElementById('tahun_start_edit').value = item.tahun_start;
        // document.getElementById('nama_proyek_edit').value = item.nama_proyek;
        // Menentukan opsi yang dipilih berdasarkan jenis kontrak dari data
        var jenisKontrak = "multi_year";
        var selectElement = document.getElementById('jenis_kontrak_edit');
        for (var i = 0; i < selectElement.options.length; i++) {
            if (selectElement.options[i].value === jenisKontrak) {
                selectElement.selectedIndex = i;
                break;
            }
        }
        // document.getElementById('penanda_aset_edit').value = item.penanda_aset;
        // document.getElementById('nilai_dpp_edit').value = item.nilai_dpp;
        // document.getElementById('no_registrasi_edit').value = item.no_registrasi;
        // document.getElementById('tanggal_mulai_kontrak_edit').value = item.tanggal_mulai_kontrak;
        // document.getElementById('tanggal_akhir_kontrak_edit').value = item.tanggal_akhir_kontrak;

        // Menampilkan form edit
        $('#modalEditPHLN').modal('show');
    }

    function editForm(uuid_sbsn) {
        //nanti fetch data untuk mengambil data dari database, lalu tempel ke value nya

        // $("modalEditSBSN").modal('show')
        document.getElementById('nama_proyek_edit').value = "HETI";
        // document.getElementById('tahun_start_edit').value = item.tahun_start;
        // document.getElementById('nama_proyek_edit').value = item.nama_proyek;
        // Menentukan opsi yang dipilih berdasarkan jenis kontrak dari data
        var jenisKontrak = "multi_year";
        var selectElement = document.getElementById('jenis_kontrak_edit');
        for (var i = 0; i < selectElement.options.length; i++) {
            if (selectElement.options[i].value === jenisKontrak) {
                selectElement.selectedIndex = i;
                break;
            }
        }
        document.getElementById('perguruan_tinggi_edit').value = "Universitas Indonesia";
        // document.getElementById('penanda_aset_edit').value = item.penanda_aset;
        // document.getElementById('nilai_dpp_edit').value = item.nilai_dpp;
        // document.getElementById('no_registrasi_edit').value = item.no_registrasi;
        // document.getElementById('tanggal_mulai_kontrak_edit').value = item.tanggal_mulai_kontrak;
        // document.getElementById('tanggal_akhir_kontrak_edit').value = item.tanggal_akhir_kontrak;

        // Menampilkan form edit
        $('#modalEditSBSN').modal('show');
    }

    function updateData() {
        // your updateData function code here
    }
</script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endsection