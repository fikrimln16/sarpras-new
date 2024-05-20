@extends('sarpras.manajemen_aset.index_prasarana')

@section('prasarana_table')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="fright">
                @if (auth()->user()->role == '2')
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        Tambah
                    </button>
                @endif

            </div>
        </div>

        <div class="table-container">

            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Prasarana</th>
                        <th>Luas</th>
                        <th>Alamat</th>
                        <th>Nilai Perolehan</th>
                        <th>Tanggal Mutasi Keluar</th>
                        <th>Batas</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Modal Delete -->
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
    @include('sarpras.manajemen_aset.components.form_create_tanah')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                let button = event.relatedTarget;
                let id = button.getAttribute('data-id');
                let modalBody = deleteModal.querySelector('.modal-body #prasaranaDetails');
                let deleteForm = deleteModal.querySelector('#deleteForm');
                deleteForm.action = `{{ url('manajemen_aset/tanah/delete') }}/${id}`;

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('manajemen_aset.getDataTanah') }}',
                columns: [{
                        data: 'nama_prasarana',
                        name: 'nama_prasarana'
                    },
                    {
                        data: 'luas',
                        name: 'luas'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'nilai_perolehan',
                        name: 'nilai_perolehan'
                    },
                    {
                        data: 'tanggal_mutasi_keluar',
                        name: 'tanggal_mutasi_keluar'
                    },
                    {
                        data: 'batas',
                        name: 'batas'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

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
@endsection
