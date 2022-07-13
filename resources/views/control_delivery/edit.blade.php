<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Control Delivery</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="action-modal-edit" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode" class="form-label">Kode</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('kode') is-invalid @enderror"
                                        value="{{ old('kode') }}" placeholder="Masukkan Kode" type="text"
                                        name="kode" id="kode_edit">
                                </div>
                                @error('kode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="isi" class="form-label">Jam Isi</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('jam_isi') is-invalid @enderror"
                                        value="{{ old('jam_isi') }}" type="time" name="jam_isi" id="jam_isi_edit">
                                </div>
                                @error('jam_isi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="finish" class="form-label">Jam Finish</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('jam_finish') is-invalid @enderror"
                                        value="{{ old('jam_finish') }}" type="time" name="jam_finish"
                                        id="jam_finish_edit">
                                </div>
                                @error('jam_finish')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sj" class="form-label">No Surat Jalan</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    </div>
                                    <select name="surat_jalan_id" id="surat_jalan_id_edit"
                                        class="form-control form-control-alternative @error('surat_jalan_id') is-invalid @enderror">
                                        <option value="">Pilih No Surat Jalan</option>
                                        @foreach ($suratjalan as $sj)
                                            <option value="{{ $sj->id }}"
                                                {{ old('surat_jalan_id') == $sj->id ? 'selected' : '' }}>
                                                {{ $sj->no_sj }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('surat_jalan_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('keterangan') is-invalid @enderror"
                                        value="{{ old('keterangan') }}" placeholder="Masukkan Keterangan"
                                        type="text" name="keterangan" id="keterangan_edit">
                                </div>
                                @error('keterangan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
    <script>
        function showEditModal(id, url_edit, url_update) {
            // ajax show edit modal
            $.ajax({
                url: url_edit,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    console.log(data)
                    $('#action-modal-edit').attr('action', url_update);
                    $('#kode_edit').val(data.kode);
                    $('#jam_isi_edit').val(data.jam_isi);
                    $('#jam_finish_edit').val(data.jam_finish);
                    $('#surat_jalan_id_edit').val(data.surat_jalan_id);
                    $('#keterangan_edit').val(data.keterangan);
                    $('#edit-modal').modal('show');
                }
            });
        }
    </script>
@endpush
