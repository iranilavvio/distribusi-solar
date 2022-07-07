<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Order & Real</h5>
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
                                <label for="namadriver" class="form-label">Nama Driver</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    </div>
                                    <select name="karyawan_id" id="karyawan_id_edit"
                                        class="form-control form-control-alternative @error('karyawan_id') is-invalid @enderror">
                                        <option value="">Pilih Driver</option>
                                        @foreach ($karyawan as $kary)
                                            <option value="{{ $kary->id }}">{{ $kary->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('karyawan_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nopol" class="form-label">No Polisi</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    </div>
                                    <select name="truck_id" id="truck_id_edit"
                                        class="form-control form-control-alternative @error('truck_id') is-invalid @enderror">
                                        <option value="">Pilih No Polisi</option>
                                        @foreach ($truck as $mobil)
                                            <option value="{{ $mobil->id }}">{{ $mobil->no_pol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('truck_id')
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
                    $('#karyawan_id_edit').val(data.karyawan_id);
                    $('#truck_id_edit').val(data.truck_id);
                    $('#edit-modal').modal('show');
                }
            });
        }
    </script>
@endpush
