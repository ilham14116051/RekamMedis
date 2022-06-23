<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="kategori_product_id" class="col-lg-2 col-lg-offset-1 control-label">Kategori
                            </label>
                        <div class="col-lg-6">
                            <select name="kategori_product_id" id="kategori_product_id" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($kategoriProduct as $item)
                                    <option value="{{ $item->id }}">{{ $item->nm_kategori_product }}</option>
                                @endforeach

                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kelas_product_id" class="col-lg-2 col-lg-offset-1 control-label">Kelas
                            </label>
                        <div class="col-lg-6">
                            <select name="kelas_product_id" id="kelas_product_id" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($kelasProduct as $item)
                                    <option value="{{ $item->id }}">{{ $item->nm_kelas_product }}</option>
                                @endforeach

                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kd_product" class="col-lg-2 col-lg-offset-1 control-label">Kode Obat</label>
                        <div class="col-lg-6">
                            <input type="text" name="kd_product" id="kd_product" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nm_product" class="col-lg-2 col-lg-offset-1 control-label">Nama Obat</label>
                        <div class="col-lg-6">
                            <input type="text" name="nm_product" id="nm_product" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="purchase_price" class="col-lg-2 col-lg-offset-1 control-label">Harga Beli</label>
                        <div class="col-lg-3">
                            <input type="number" name="purchase_price" id="purchase_price" class="form-control"
                                required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sale_price" class="col-lg-2 col-lg-offset-1 control-label">Harga Jual</label>
                        <div class="col-lg-3">
                            <input type="number" name="sale_price" id="sale_price" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stock" class="col-lg-2 col-lg-offset-1 control-label">Stok</label>
                        <div class="col-lg-3">
                            <input type="number" name="stock" id="stock" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="remarks" class="col-lg-2 col-lg-offset-1 control-label">Remarks</label>
                        <div class="col-lg-6">
                            <textarea name="remarks" id="remarks" rows="3" class="form-control"></textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i
                            class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
