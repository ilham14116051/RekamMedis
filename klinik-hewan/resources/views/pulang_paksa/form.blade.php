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
                        <label for="rekam_medis_id" class="col-lg-2 col-lg-offset-1 control-label">Rekam Medis</label>
                        <div class="col-lg-6">
                            <select name="rekam_medis_id" id="rekam_medis_id" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($rekamMedis as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->no_rm }} || {{ $item->pasien->nm_hewan }}
                                    </option>
                                @endforeach

                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_pulang" class="col-lg-2 col-lg-offset-1 control-label">Tanggal Pulang</label>
                        <div class="col-lg-3">
                            <input type="date" name="tgl_pulang" id="tgl_pulang" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alasan_pulang" class="col-lg-2 col-lg-offset-1 control-label">Alasan Pulang</label>
                        <div class="col-lg-6">
                            <input type="text" name="alasan_pulang" id="alasan_pulang" class="form-control" required>
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
