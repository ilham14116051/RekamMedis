@extends('layouts.main')



@section('title', 'Data Kontrol Rawat Inap')


@section('content')

    <style>
        .tampil-bayar {
            font-size: 5em;
            text-align: center;
            height: 100px;
        }

        .tampil-terbilang {
            padding: 10px;
            background: #f0f0f0;
        }

        .table-ranap-detail tbody tr:last-child {
            display: none;
        }

        @media(max-width: 768px) {
            .tampil-bayar {
                font-size: 3em;
                height: 70px;
                padding-top: 5px;
            }
        }

    </style>

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Kontrol Rawat Inap <small></small></h3>
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



                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <form class="form-product">
                                @csrf
                                <div class="form-group row">
                                    <label for="waktu" class="col-lg-2 control-label">
                                        Waktu</label>
                                    <div class="col-sm-3">
                                        <input type="datetime-local" class="form-control" id="waktu" name="waktu"
                                            required>&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <input type="hidden" name="rawat_inap_id" id="rawat_inap_id"
                                        value="{{ $rawat_inap_id }}">
                                    <label for="product_id" class="col-lg-2 control-label">
                                        Product</label>
                                    <div class="col-sm-4">
                                        <select name="product_id" id="product_id" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            @foreach ($product as $item)
                                                <option value="{{ $item->id }}">{{ $item->kd_product }} ||
                                                    {{ $item->nm_product }}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                                <input type="hidden" class="control-label" id="qty" name="qty" value="1">
                                <div class="form-group row">
                                    <label for="discount" class="col-lg-2 control-label">
                                        Discount Amount</label>
                                    <div class="col-sm-3" style="display:inline;">
                                        <input type="number" class="form-control" id="disc_amount" name="disc_amount"
                                            placeholder="example : Rp.0">&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="discount" class="col-lg-2 control-label">
                                        Discount Percent</label>
                                    <div class="col-sm-3" style="display:inline;">
                                        <input type="number" class="form-control" id="disc_percent" name="disc_percent"
                                            placeholder="example : 0%">
                                        <span class="help-block with-errors"></span><br>
                                        <button type="submit" class="btn btn-primary btn-sm btn-round"
                                            onclick="tambahProduk()">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                    </div>
                                </div>

                            </form>
                            <ul class="nav navbar-right panel_toolbox">

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Pasien<small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                {{-- aa --}}
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <h2>{{ $pasien->nm_hewan }}</h2>
                            <p><strong>Jenis: </strong> {{ $pasien->jenis_hewan }}</p>
                            <p><strong>Spesies: </strong> {{ $pasien->spesies }}</p>
                            <p><strong>Sex: </strong> {{ $pasien->sex }}</p>
                            <p><strong>Pemilik: </strong> {{ $pasien->nm_pemilik }} </p>
                            <p><i class="fa fa-building"></i> Address: {{ $pasien->address }} </p>
                            <p><i class="fa fa-phone"></i> Phone #: {{ $pasien->phone }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Kontrol Rawat Inap<small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                {{-- aa --}}
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <table class="table table-striped table-bordered table-ranap-detail">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu</th>
                                    <th>Kode Product</th>
                                    <th>Nama Product</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Discount Amount</th>
                                    <th>Discount Percent</th>
                                    <th>Total Discount Lines</th>
                                    <th>Total</th>
                                    <th width="15%"><i class="fa fa-cog"></i></th>
                                </tr>
                            </thead>
                        </table>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="tampil-bayar bg-primary"></div>
                                <div class="tampil-terbilang"></div>
                            </div>
                            <div class="col-lg-4">
                                <form action="{{ route('ranaps.store') }}" class="form-ranap-detail" method="post">
                                    @csrf
                                    <input type="hidden" name="rawat_inap_id" value="{{ $rawat_inap_id }}">
                                    <input type="hidden" name="total" id="total">
                                    <input type="hidden" name="total_item" id="total_item">
                                    <input type="hidden" name="total_diskon" id="total_diskon">
                                    <input type="hidden" name="bayar" id="bayar">

                                    <div class="form-group row">
                                        <label for="totalrp" class="col-lg-4 control-label">Grand Total</label>
                                        <div class="col-lg-8">
                                            <b><input type="text" id="totalrp" class="form-control" readonly></b>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="total_diskonrp" class="col-lg-4 control-label">Total Diskon</label>
                                        <div class="col-lg-8">
                                            <b><input type="text" name="total_diskonrp" id="total_diskonrp"
                                                    class="form-control" value="{{ $totalDiskon }} " readonly></b>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="total_invoice" class="col-lg-4 control-label">Total Invoice</label>
                                        <div class="col-lg-8">
                                            <b><input type="text" id="bayarrp" class="form-control" readonly></b>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm btn-flat pull-right btn-simpan"><i
                                            class="fa fa-floppy-o"></i> Simpan Transaksi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#product_id').select2();
        });

        let table, table2;

        $(function() {
            // $('body').addClass('sidebar-collapse');

            table = $('.table').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    autoWidth: false,
                    ajax: {
                        url: '{{ route('ranap_detail.data', $rawat_inap_id) }}',
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            searchable: false,
                            sortable: false
                        },
                        {
                            data: 'waktu'
                        },
                        {
                            data: 'kd_product'
                        },
                        {
                            data: 'nm_product'
                        },
                        {
                            data: 'harga'
                        },
                        {
                            data: 'qty'
                        },
                        {
                            data: 'subtotal'
                        },
                        {
                            data: 'disc_amount'
                        },
                        {
                            data: 'disc_percent'
                        },
                        {
                            data: 'total_disc_line'
                        },
                        {
                            data: 'total'
                        },
                        {
                            data: 'aksi',
                            searchable: false,
                            sortable: false
                        },
                    ],
                    // dom: 'Brt',
                    bSort: false,
                    paginate: false
                })
                .on('draw.dt', function() {
                    loadForm($('#diskon').val());
                });



            $(document).on('input', '.quantity', function() {
                let id = $(this).data('id');
                let qty = parseInt($(this).val());

                if (qty < 1) {
                    $(this).val(1);
                    alert('qty tidak boleh kurang dari 1');
                    return;
                }
                if (qty > 10000) {
                    $(this).val(10000);
                    alert('qty tidak boleh lebih dari 10000');
                    return;
                }

                $.post(`{{ url('/ranap_detail') }}/${id}`, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'put',
                        'qty': qty
                    })
                    .done(response => {
                        $(this).on('focusout', function() {
                            table.ajax.reload();
                            toastr.success("Qty berhasil di ubah");
                        });
                    })
                    .fail(errors => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            });

            $('.btn-simpan').on('click', function() {
                $('.form-ranap').submit();
            });

        });

        function tambahProduk() {
            // if (!e.preventDefault()) {
            $.post('{{ route('ranap_detail.store') }}', $('.form-product').serialize())
                .done(response => {
                    $('#product_id').focus();
                    table.ajax.reload(() => loadForm($('#diskon').val()));
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
            // }
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

        function loadForm() {
            $('#total').val($('.total').text());
            $('#total_item').val($('.total_item').text());
            $('#total_diskon').val($('.total_diskon').text());

            $.get(`{{ url('/ranap_detail/loadform') }}/${$('.total_diskon').text()}/${$('.total').text()}`)
                .done(response => {
                    $('#totalrp').val(response.totalrp);
                    $('#total_diskonrp').val(response.total_diskonrp);
                    $('#bayarrp').val(response.bayarrp);
                    $('#bayar').val(response.bayar);
                    $('.tampil-bayar').text(response.bayarrp);
                    $('.tampil-terbilang').text(response.terbilang);
                })
                .fail(errors => {
                    alert('Tidak dapat menampilkan data');
                    return;
                })
        }
    </script>

@endsection
