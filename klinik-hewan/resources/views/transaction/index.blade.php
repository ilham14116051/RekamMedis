@extends('layouts.main')



@section('title', 'Data Transaction')


@section('content')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Transaksi <small></small></h3>
                </div>

          
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Daftar Transaksi<small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <button onclick="addForm()" class="btn btn-success btn-xs btn-flat"><i
                                        class="fa fa-plus-circle"></i> Tambah Transaksi</button>
                                @empty(!session('transaction_id'))
                                    <a href="{{ route('transaction_detail.index') }}" class="btn btn-info btn-xs btn-flat"><i
                                            class="fa fa-pencil"></i> Transaksi Aktif</a>
                                @endempty
                                </a>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-striped table-bordered data-table table-transaction">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Pasien</th>
                                        <th>Total Item</th>
                                        <th>Grand Total</th>
                                        <th>Total Diskon</th>
                                        <th>Total Invoice</th>
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

    @includeIf('transaction.pasien')
    @includeIf('transaction.detail')

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>


    <script>
        // $(document).ready(function() {
        //     $('#pasien_id').select2({
        //         dropdownParent: $('#modal-form'),
        //         width: '200'
        //     });
        // });


        let table, table1;

        $(function() {
            table = $('.table-transaction').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('transaction.data') }}',
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
                        data: 'invoice'
                    },
                    {
                        data: 'tgl_transaction'
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
                        data: 'total_invoice'
                    },
                    {
                        data: 'remarks'
                    },
                ]
            });

            // $('.table-pasien').DataTable();
            // table1 = $('.table-detail').DataTable({
            //     processing: true,
            //     bSort: false,
            //     dom: 'Brt',
            //     columns: [{
            //             data: 'DT_RowIndex',
            //             searchable: false,
            //             sortable: false
            //         },
            //         {
            //             data: 'kode_produk'
            //         },
            //         {
            //             data: 'nama_produk'
            //         },
            //         {
            //             data: 'harga_beli'
            //         },
            //         {
            //             data: 'jumlah'
            //         },
            //         {
            //             data: 'subtotal'
            //         },
            //     ]
            // })
        });

        function addForm() {
            $('#modal-pasien').modal('show');
        }

        // function addForm(url) {
        //     $('#modal-form').modal('show');
        //     $('#modal-form .modal-title').text('Tambah Rekam Medis');

        //     $('#modal-form form')[0].reset();
        //     $('#modal-form form').attr('action', url);
        //     $('#modal-form [name=_method]').val('post');
        //     $('#modal-form [name=no_rm]').focus();
        // }

        // function editForm(url) {
        //     $('#modal-form').modal('show');
        //     $('#modal-form .modal-title').text('Edit Rekam Medis');

        //     $('#modal-form form')[0].reset();
        //     $('#modal-form form').attr('action', url);
        //     $('#modal-form [name=_method]').val('put');
        //     $('#modal-form [name=no_rm]').focus();

        //     $.get(url)
        //         .done((response) => {
        //             $('#modal-form [name=no_rm]').val(response.no_rm);
        //             $('#modal-form [name=tgl_rm]').val(response.tgl_rm);
        //             $('#modal-form [name=pasien_id]').val(response.pasien_id);
        //             $('#modal-form [name=suhu_tubuh]').val(response.suhu_tubuh);
        //             $('#modal-form [name=berat_badan]').val(response.berat_badan);
        //             $('#modal-form [name=age]').val(response.age);
        //             $('#modal-form [name=keluhan]').val(response.keluhan);
        //             $('#modal-form [name=kondisi]').val(response.kondisi);
        //             $('#modal-form [name=diagnosa]').val(response.diagnosa);
        //             $('#modal-form [name=tindakan]').val(response.tindakan);
        //             $('#modal-form [name=remarks]').val(response.remarks);
        //         })
        //         .fail((errors) => {
        //             alert('Tidak dapat menampilkan data');
        //             return;
        //         });
        // }

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
