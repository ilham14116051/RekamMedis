<div class="modal fade" id="modal-rekamMedis" tabindex="-1" role="dialog" aria-labelledby="modal-rekamMedis">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Rekam Medis</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-rekam-medis">
                    <thead>
                        <th width="5%">No</th>
                        <th>No Rekam Medis</th>
                        <th>Tgl Rekam Medis</th>
                        <th>Pasien</th>
                        <th>Keluhan</th>
                        <th>Kondisi</th>
                        <th>Diagnosa</th>
                        <th>Tindakan</th>
                        <th><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($rekamMedis as $key => $item)
                            <tr>
                                <td width="5%">{{ $key + 1 }}</td>
                                <td>{{ $item->no_rm }}</td>
                                <td>{{ $item->tgl_rm }}</td>
                                <td>{{ $item->pasien->nm_hewan }}</td>
                                <td>{{ $item->keluhan }}</td>
                                <td>{{ $item->kondisi }}</td>
                                <td>{{ $item->diagnosa }}</td>
                                <td>{{ $item->tindakan }}</td>
                                <td>
                                    <a href="/ranap/{{ $item->id }}/{{ $item->pasien_id }}/create"
                                        class="btn btn-primary btn-xs btn-flat">
                                        <i class="fa fa-check-circle"></i>
                                        Pilih
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
