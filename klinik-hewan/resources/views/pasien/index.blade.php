@extends('layouts.main')



@section('title', 'Data Pasien')


@section('content')
    <div class="right_col" role="main">
        <div class="">
            <!-- <div class="page-title">
                <div class="title_left">
                    <h3>Pasien <small></small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Daftar Pasien<small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <button onclick="addForm('{{ route('pasiens.store') }}')"
                                    class="btn btn-success btn-sm btn-flat"><i class="fa fa-plus-circle"></i>
                                    Tambah Pasien</button>
                                </a>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {{-- <p class="text-muted font-13 m-b-30">
                                Responsive is an extension for DataTables that resolves that problem by
                                optimising the table's layout for different screen sizes through the dynamic
                                insertion and removal of columns from the table.
                            </p> --}}

                            <table class="table table-striped table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Hewan</th>
                                        <th>Jenis Hewan</th>
                                        <th>Spesies</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nama Pemilik</th>
                                        <th>No. Hp</th>
                                        <th>Alamat</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @includeIf('pasien.form')


    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>



    <script>
        $(document).ready(function() {
            $('#sex').select2({
                dropdownParent: $('#modal-form'),
                width: '200'
            });
        });


        let table;

        $(function() {
            table = $('.table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('pasien.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nm_hewan'
                    },
                    {
                        data: 'jenis_hewan'
                    },
                    {
                        data: 'spesies'
                    },
                    {
                        data: 'sex'
                    },
                    {
                        data: 'nm_pemilik'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'remarks'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });

            $('#modal-form').validator().on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                        .done((response) => {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            toastr.success("Data Berhasil di Tambahkan");
                        })
                        .fail((errors) => {
                            alert('Tidak dapat menyimpan data');
                            return;
                        });
                }
            });
        });

        function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Tambah Pasien');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');
            $('#modal-form [name=nm_hewan]').focus();
        }

        function editForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Edit Pasien');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('put');
            $('#modal-form [name=nm_hewan]').focus();

            $.get(url)
                .done((response) => {
                    $('#modal-form [name=nm_hewan]').val(response.nm_hewan);
                    $('#modal-form [name=jenis_hewan]').val(response.jenis_hewan);
                    $('#modal-form [name=spesies]').val(response.spesies);
                    $('#modal-form [name=sex]').val(response.sex);
                    $('#modal-form [name=nm_pemilik]').val(response.nm_pemilik);
                    $('#modal-form [name=phone]').val(response.phone);
                    $('#modal-form [name=address]').val(response.address);
                    $('#modal-form [name=remarks]').val(response.remarks);
                })
                .fail((errors) => {
                    alert('Tidak dapat menampilkan data');
                    return;
                });
        }

        function deleteData(url) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'delete'
                    })
                    .done((response) => {
                        table.ajax.reload();
                        toastr.success("Data Berhasil di Hapus");
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        }
    </script>
@endsection
