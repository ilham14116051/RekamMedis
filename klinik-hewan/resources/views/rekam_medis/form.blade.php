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
                        <label for="no_rm" class="col-lg-2 col-lg-offset-1 control-label">No Rekam Medis</label>
                        <div class="col-lg-3">
                            <input type="text" name="no_rm" id="no_rm" value="{{ $nomer }}"
                                class="form-control" required readonly>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_rm" class="col-lg-2 col-lg-offset-1 control-label">Tgl Rekam
                            Medis</label>
                        <div class="col-lg-3">
                            <input type="date" name="tgl_rm" id="tgl_rm" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pasien_id" class="col-lg-2 col-lg-offset-1 control-label">Pasien</label>
                        <div class="col-sm-6">
                            <select name="pasien_id" id="pasien_id" class="form-control js-example-responsive" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($pasien as $item)
                                    <option value="{{ $item->id }}">{{ $item->nm_hewan }}</option>
                                @endforeach

                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="suhu_tubuh" class="col-lg-2 col-lg-offset-1 control-label">Suhu Tubuh</label>
                        <div class="col-lg-6">
                            <input type="text" name="suhu_tubuh" id="suhu_tubuh" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="berat_badan" class="col-lg-2 col-lg-offset-1 control-label">Berat Badan</label>
                        <div class="col-lg-6">
                            <input type="text" name="berat_badan" id="berat_badan" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-lg-2 col-lg-offset-1 control-label">Umur</label>
                        <div class="col-lg-6">
                            <input type="text" name="age" id="age" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keluhan" class="col-lg-2 col-lg-offset-1 control-label">Keluhan</label>
                        <div class="col-lg-6">
                            <input type="text" name="keluhan" id="keluhan" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kondisi" class="col-lg-2 col-lg-offset-1 control-label">Kondisi</label>
                        <div class="col-lg-6">
                            <input type="text" name="kondisi" id="kondisi" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="diagnosa" class="col-lg-2 col-lg-offset-1 control-label">Diagnosa</label>
                        <div class="col-lg-6">
                            <input type="text" name="diagnosa" id="diagnosa" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tindakan" class="col-lg-2 col-lg-offset-1 control-label">Tindakan</label>
                        <div class="col-lg-6">
                            <input type="text" name="tindakan" id="tindakan" class="form-control" required>
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
