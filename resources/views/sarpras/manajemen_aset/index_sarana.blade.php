@extends('layout')

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="fright">

                @if (auth()->user()->role == '2')
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Metakan
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#uploadModal">
                                    Upload Excel
                                </button>


                                <!-- Modal -->
                                <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog"
                                    aria-labelledby="uploadModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="uploadModalLabel">Upload File Excel</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="{{ route('manajemen_aset.sarana.download_template') }}"
                                                    class="">Download Excel Template</a>
                                                <form action="{{ route('manajemen_aset.sarana.import') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="file">Pilih File Excel</label>
                                                        <input type="file" name="file" class="form-control"
                                                            id="file">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Modal -->
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="table-container">
            <table id="sarana-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Sarana</th>
                        <th>is_mapped</th>
                    </tr>
                </thead>
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
                        <div id="prasaranaDetails"></div>
                    </div>
                    <!-- Modal Footer within a Bootstrap Modal -->
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
    @include('sarpras.manajemen_aset.components.form_edit_sarana')
    @include('sarpras.manajemen_aset.components.form_create_sarana')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                let button = event.relatedTarget;
                let id = button.getAttribute('data-id');
                let deleteForm = deleteModal.querySelector('#deleteForm');
                // console.log(id);
                deleteForm.action = /manajemen_aset/sarana / delete / $ {
                    id
                };
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $('#sarana-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('manajemen_aset.sarana.get_data_sarana') !!}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'nama_sarana',
                    name: 'nama_sarana'
                },
                {
                    data: 'pemetaan',
                    name: 'pemetaan'
                },
            ]
        });

        $(document).ready(function() {
            $('#dataTable').DataTable();

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
