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
                        <label for="kd_kategori_product" class="col-lg-2 col-lg-offset-1 control-label">Kode Kategori
                            Produk</label>
                        <div class="col-lg-6">
                            <input type="text" name="kd_kategori_product" id="kd_kategori_product"
                                class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nm_kategori_product" class="col-lg-2 col-lg-offset-1 control-label">Nama Kategori
                            Produk</label>
                        <div class="col-lg-6">
                            <input type="text" name="nm_kategori_product" id="nm_kategori_product"
                                class="form-control" required>
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
