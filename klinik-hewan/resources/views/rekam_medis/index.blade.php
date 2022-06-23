@extends('layouts.main')



@section('title', 'Data Rekam Medis')


@section('content')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Rekam Medis <small></small></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <!-- <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Daftar Rekam Medis<small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <button onclick="addForm('{{ route('rekam_medis.store') }}')"
                                    class="btn btn-success btn-sm btn-flat"><i class="fa fa-plus-circle"></i>
                                    Tambah Rekam Medis</button>
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

                            <table class="table table-striped table-bordered data-table wrap" >
                                <thead>
                                    <tr>
                                        
                                        <th>No</th>
                                        <th>No Rekam Medis</th>
                                        <th>Tanggal</th>
                                        <th>Pasien</th>
                                        <th>Suhu</th>
                                        <th>Berat</th>
                                        <th>Umur</th>
                                        <th>Keluhan</th>
                                        <th>Kondisi</th>
                                        <th>Diagnosa</th>
                                        <th>Tindakan</th>
                                        <th>Remarks</th>
                                        <th>Aksi</th>
                                        
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @includeIf('rekam_medis.form')


    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>



    <script>
        $(document).ready(function() {
            $('#pasien_id').select2({
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
                    url: '{{ route('rekam_medice.data') }}',
                },
                columns: [

                    
                    {
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'no_rm'
                    },
                    {
                        data: 'tgl_rm'
                    },
                    {
                        data: 'pasien_id'
                    },
                    {
                        data: 'suhu_tubuh'
                    },
                    {
                        data: 'berat_badan'
                    },
                    {
                        data: 'age'
                    },
                    {
                        data: 'keluhan'
                    },
                    {
                        data: 'kondisi'
                    },
                    {
                        data: 'diagnosa'
                    },
                    {
                        data: 'tindakan'
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
            $('#modal-form .modal-title').text('Tambah Rekam Medis');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');
            $('#modal-form [name=no_rm]').focus();
        }

        function editForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Edit Rekam Medis');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('put');
            $('#modal-form [name=no_rm]').focus();

            $.get(url)
                .done((response) => {
                    $('#modal-form [name=no_rm]').val(response.no_rm);
                    $('#modal-form [name=tgl_rm]').val(response.tgl_rm);
                    $('#modal-form [name=pasien_id]').val(response.pasien_id);
                    $('#modal-form [name=suhu_tubuh]').val(response.suhu_tubuh);
                    $('#modal-form [name=berat_badan]').val(response.berat_badan);
                    $('#modal-form [name=age]').val(response.age);
                    $('#modal-form [name=keluhan]').val(response.keluhan);
                    $('#modal-form [name=kondisi]').val(response.kondisi);
                    $('#modal-form [name=diagnosa]').val(response.diagnosa);
                    $('#modal-form [name=tindakan]').val(response.tindakan);
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
