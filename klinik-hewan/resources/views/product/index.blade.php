@extends('layouts.main')



@section('title', 'Data Product')


@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Produk <small></small></h3>
                </div>

   
            </div>

            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <!-- Notifikasi menggunakan flash session data -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-error">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="x_title">
                            <h2>Daftar Obat<small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <button onclick="addForm('{{ route('products.store') }}')"
                                    class="btn btn-success btn-sm btn-flat"><i class="fa fa-plus-circle"></i>
                                    Tambah Obat</button>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" id="read">

                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Kategori</th>
                                        <th>Kelas</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
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


    @includeIf('product.form')

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#kategori_product_id').select2({
                dropdownParent: $('#modal-form'),
                width: '200'
            });

            $('#kelas_product_id').select2({
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
                    url: '{{ route('product.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'kd_product'
                    },
                    {
                        data: 'nm_product'
                    },
                    {
                        data: 'kategori_product_id'
                    },
                    {
                        data: 'kelas_product_id'
                    },
                    {
                        data: 'purchase_price'
                    },
                    {
                        data: 'sale_price'
                    },
                    {
                        data: 'stock'
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
                            toastr.success("Data Berhasil di tambahkan");
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
            $('#modal-form .modal-title').text('Tambah Product');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');
            $('#modal-form [name=kategori_product_id]').focus();
        }

        function editForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Edit Product');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('put');
            $('#modal-form [name=kategori_product_id]').focus();

            $.get(url)
                .done((response) => {
                    $('#modal-form [name=kategori_product_id]').val(response.kategori_product_id);
                    $('#modal-form [name=kelas_product_id]').val(response.kelas_product_id);
                    $('#modal-form [name=kd_product]').val(response.kd_product);
                    $('#modal-form [name=nm_product]').val(response.nm_product);
                    $('#modal-form [name=purchase_price]').val(response.purchase_price);
                    $('#modal-form [name=sale_price]').val(response.sale_price);
                    $('#modal-form [name=stock]').val(response.stock);
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

@push('scripts')
@endpush
