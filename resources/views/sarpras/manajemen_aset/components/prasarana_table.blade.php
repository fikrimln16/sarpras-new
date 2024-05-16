@extends('sarpras.manajemen_aset.index_prasarana')

@section('prasarana_table')

    <div class="ibox float-e-margins">
        @if (session('success'))
            <p>{{ session('success') }} {{ session('userName') }}</p>
        @endif
        <div class="ibox-title">
            <div class="fright">
                @if (auth()->user()->role == '2')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Tambah
                </button>
                @endif
            </div>
        </div>
        <div class="table-container">
            <table id="dataTable" class="table table-bordered table-striped tabel-prasarana">
                <thead>
                    <tr>
                        <th>Nama prasarana</th>
                        <!-- <th>Panjang</th> -->
                        <!-- <th>Lebar</th> -->
                        <th>Luas</th>
                        <th>Alamat</th>
                        <!-- <th>Lintang</th> -->
                        <!-- <th>Bujur</th> -->
                        <th>BMN satker</th>
                        <!-- <th>BMN kode barang</th> -->
                        <th>BMN nup</th>
                        {{-- <th>Tanggal perolehan</th> --}}
                        <th>Nilai perolehan</th>
                        <th>Nilai buku</th>
                        <th>Detail</th>
                        <th>Delete</th>
                        {{-- <th>MERK</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item['nama_prasarana'] }}</td>
                            <!-- <td>{{ $item['panjang'] }}</td> -->
                            <!-- <td>{{ $item['lebar'] }}</td> -->
                            <td>{{ $item['luas_bangunan'] }}</td>
                            <td class="truncate" title="Click to expand">{{ $item['alamat'] }}</td>
                            <!-- <td>{{ $item['latitude'] }}</td> -->
                            <!-- <td>{{ $item['longitude'] }}</td> -->
                            <td>{{ $item['bmn_satker'] }}</td>
                            <!-- <td>{{ $item['bmn_kode_barang'] }}</td> -->
                            <td>{{ $item['bmn_nup'] }}</td>
                            {{-- <td>{{ $item['tanggal_perolehan']}}</td> --}}
                            <td>{{ number_format($item['nilai_perolehan'], 2) }}</td>
                            <td>{{ number_format($item['nilai_buku'], 2) }}</td>
                            {{-- <td>{{ $item['merk'] }}</td> --}}
                            <td>
                                <a href="{{ route('manajemen_aset.prasarana', ['id' => $item['id']]) }}"
                                    class="btn btn-primary">Details</a>
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-id="{{ $item['id'] }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this item?</p>
                        <div id="prasaranaDetails"></div> <!-- Details will be loaded here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form id="deleteForm" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    @include('sarpras.manajemen_aset.components.form_create_prasarana')


    <style>
        .ibox-title {
            font-size: 17px;
            font-weight: bold;
            padding-top: 10px;
            padding-bottom: 10px;
            letter-spacing: -1px;
            color: #2d2d2d;
        }

        .fright {
            float: right !important;
        }

        .truncate {
            max-width: 250px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            cursor: pointer;
        }

        .not-truncated {
            max-width: none;
            white-space: pre-line;
        }



        .table-container {
            max-height: 100vh;
            /* Set the max height for the table container */
            overflow-y: auto;
            /* Enable vertical scrolling */
            width: 100%;
            /* Ensure the table container uses full width of its parent */
        }

        .tabel-prasarana {
            height: 100%;
            width: 100%;
            /* Make the table take the full width of the container */
            border-collapse: collapse;
            /* Ensure borders are collapsed */
        }

        .tabel-prasarana th,
        .tabel-prasarana td {
            border: 1px solid #ddd;
            /* Add border to table cells */
            padding: 8px;
            /* Padding for table cells */
        }

        .tabel-prasarana th {
            background-color: #f2f2f2;
            /* Background color for table header */
            text-align: left;
            /* Align text to the left in table header */
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                let button = event.relatedTarget;
                let id = button.getAttribute('data-id');
                let modalBody = deleteModal.querySelector('.modal-body #prasaranaDetails');
                let deleteForm = deleteModal.querySelector('#deleteForm');

                fetch(`/manajemen_aset/prasarana/${id}`) // API endpoint that returns prasarana details
                    .then(response => response.json())
                    .then(data => {
                        modalBody.innerHTML = `
                        <p>Nama: ${data.nama_prasarana}</p>
                        <p>Jenis Prasarana: ${data.jenis_prasarana || 'N/A'}</p>
                        <p>Alamat: ${data.alamat || 'N/A'}</p>
                        <p>Lintang: ${data.lintang || 'N/A'}</p>
                        <p>Bujur: ${data.bujur || 'N/A'}</p>
                        <p>Panjang (m): ${data.panjang || 'N/A'}</p>
                        <p>Lebar (m): ${data.lebar || 'N/A'}</p>
                        <p>Luas Bangunan (m²): ${data.luas_bangunan || 'N/A'}</p>
                        <p>Luas Tanah (m²): ${data.luas_tanah || 'N/A'}</p>
                        <p>Jumlah Lantai: ${data.jumlah_lantai || 'N/A'}</p>
                        <p>BMN Satker: ${data.bmn_satker || 'N/A'}</p>
                        <p>BMN Kode Barang: ${data.bmn_kode_barang || 'N/A'}</p>
                        <p>BMN NUP: ${data.bmn_nup || 'N/A'}</p>
                        <p>Tanggal Perolehan: ${data.tanggal_perolehan || 'N/A'}</p>
                        <p>Nilai Perolehan (Rp): ${data.nilai_perolehan || 'N/A'}</p>
                        <p>Nilai Buku (Rp): ${data.nilai_buku || 'N/A'}</p>
                        <p>MERK: ${data.merk || 'N/A'}</p>
                        <p>Penggunaan: ${data.penggunaan || 'N/A'}</p>
                        <p>Kondisi: ${data.kondisi || 'N/A'}</p>
                        <p>KD Kab/Kota: ${data.KD_KAB_KOTA || 'N/A'}</p>
                        <p>NM Kab/Kota: ${data.NM_KAB_KOTA || 'N/A'}</p>
                        <p>KD Prov: ${data.KD_PROV || 'N/A'}</p>
                        <p>NM Prov: ${data.NM_PROV || 'N/A'}</p>
                        <p>No Dok Kepemilikan: ${data.NO_DOK_KEPEMILIKAN || 'N/A'}</p>
                        <p>Dok Kepemilikan: ${data.DOK_KEPEMILIKAN || 'N/A'}</p>
                        <p>JNS Dok Kepemilikan: ${data.JNS_DOK_KEPEMILIKAN || 'N/A'}</p>
                        <h5>Bangunan: </h5>
                        <p>KD_BRG_TANAH: ${data.KD_BRG_TANAH || 'N/A'}</p>
                        <p>NM_BRG_TANAH: ${data.NM_BRG_TANAH || 'N/A'}</p>
                        <p>NUP_BRG_TANAH: ${data.NUP_BRG_TANAH || 'N/A'}</p>
                        <p>TGL_SK_PEMAKAIAN: ${data.TGL_SK_PEMAKAIAN || 'N/A'}</p>
                        <p>kapasitas: ${data.kapasitas || 'N/A'}</p>
                        <p>tanggal_hapus_buku: ${data.tanggal_hapus_buku || 'N/A'}</p>
                        <p>keterangan: ${data.keterangan || 'N/A'}</p>
                        
                    `;
                        deleteForm.action = `/manajemen_aset/prasarana/delete/${data.id}`;
                    });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addressCells = document.querySelectorAll('.truncate');

            addressCells.forEach(cell => {
                cell.addEventListener('click', function() {
                    this.classList.toggle('not-truncated');
                });
            });
        });


        $(document).ready(function() {

            $('#dataTable').DataTable(); // Memastikan DataTables diaktifkan untuk tabel ini

            // Tampilkan modal saat tombol Tambah ditekan
            $("#tambahBtn").click(function() {
                $("#myModal").modal('show');
            });

            // Sembunyikan modal saat tombol Tutup di modal ditekan
            $(".modal").on("hidden.bs.modal", function() {
                $(this).find('form')[0].reset(); // Reset form saat modal tertutup
            });

            // Sembunyikan modal saat form di-submit
            $("#myForm").submit(function(e) {
                e.preventDefault(); // Hindari reload halaman
                $("#myModal").modal('hide');
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
@endsection
