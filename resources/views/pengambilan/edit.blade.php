<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Karyawan</h5>
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
                                <label for="namapengambilan" class="form-label">Pengambilan BBM</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                                    </div>
                                    <select
                                        class="form-control form-control-alternative @error('bbm') is-invalid @enderror"
                                        name="bbm" id="bbm_edit">
                                        <option value="">Pilih Pengambilan</option>
                                        <option value="Depo" {{ old('depo') == 'depo' ? 'selected' : '' }}>Depo
                                        </option>
                                        <option value="Shell" {{ old('shell') == 'shell' ? 'selected' : '' }}>
                                            shell</option>
                                    </select>
                                </div>
                                @error('bbm')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nopol" class="form-label">Nopol</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('nopol') is-invalid @enderror"
                                        value="{{ old('nopol') }}" placeholder="Masukkan Nopol" type="text"
                                        name="nopol" id="nopol_edit">
                                </div>
                                @error('nopol')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="driver" class="form-label">Driver</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('driver') is-invalid @enderror"
                                        value="{{ old('driver') }}" placeholder="Masukkan Driver" type="text"
                                        name="driver" id="driver_edit">
                                </div>
                                @error('driver')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="volume" class="form-label">Volume</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-city"></i></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('volume') is-invalid @enderror"
                                        value="{{ old('volume') }}" placeholder="Masukkan Tempat Lahir" type="number"
                                        name="volume" id="volume_edit">
                                </div>
                                @error('volume')
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
                    $('#bbm_edit').val(data.bbm);
                    $('#nopol_edit').val(data.nopol);
                    $('#driver_edit').val(data.driver);
                    $('#volume_edit').val(data.volume);
                    $('#edit-modal').modal('show');
                }
            });
        }
    </script>
@endpush
