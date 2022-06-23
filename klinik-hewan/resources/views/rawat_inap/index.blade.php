@extends('layouts.main')



@section('title', 'Data Rawat Inap')


@section('content')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Rawat Inap <small></small></h3>
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
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Daftar Rawat Inap<small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <button onclick="addForm()" class="btn btn-success btn-xs btn-flat"><i
                                        class="fa fa-plus-circle"></i> Add New Rawat Inap</button>
                                @empty(!session('rawat_inap_id'))
                                    <a href="{{ route('ranap_detail.index') }}" class="btn btn-info btn-xs btn-flat"><i
                                            class="fa fa-pencil"></i> Transaksi Aktif</a>
                                @endempty
                                </a>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-striped table-bordered data-table table-ranap">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>No Ranap</th>
                                        <th>Tanggal Transaction</th>
                                        <th>Rekam Medis</th>
                                        <th>Pasien</th>
                                        <th>Total Item</th>
                                        <th>Grand Total</th>
                                        <th>Total Diskon</th>
                                        <th>Total Invoice Ranap</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @includeIf('rawat_inap.rekam_medis')
    {{-- @includeIf('ranap.detail') --}}

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>


    <script>
        let table;

        $(function() {
            table = $('.table-ranap').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('ranap.data') }}',
                },
                columns: [{
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'no_ranap'
                    },
                    {
                        data: 'tgl_ranap'
                    },
                    {
                        data: 'rekam_medis_id'
                    },
                    {
                        data: 'pasien_id'
                    },
                    {
                        data: 'total_item'
                    },
                    {
                        data: 'grand_total'
                    },
                    {
                        data: 'total_diskon'
                    },
                    {
                        data: 'total_invoice_ranap'
                    },
                    {
                        data: 'remarks'
                    },
                ]
            });

        });

        function addForm() {
            $('#modal-rekamMedis').modal('show');
        }

        function deleteData(url) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'delete'
                    })
                    .done((response) => {
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        }
    </script>

@endsection
