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
                                <label for="namakaryawan" class="form-label">Nama Karyawan</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('name') is-invalid @enderror"
                                        placeholder="Masukkan Nama Karyawan" type="text" name="name"
                                        id="name_edit">
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik" class="form-label">NIK</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('nik') is-invalid @enderror"
                                        placeholder="Masukkan NIK" type="number" name="nik" id="nik_edit">
                                </div>
                                @error('nik')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempatlahir" class="form-label">Tempat Lahir</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-city"></i></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('tempat_lahir') is-invalid @enderror"
                                        placeholder="Masukkan Tempat Lahir" type="text" name="tempat_lahir"
                                        id="tempat_lahir_edit">
                                </div>
                                @error('tempat_lahir')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="dd-mm-yyyy" value="" type="date"
                                        id="tanggal_lahir_edit" name="tanggal_lahir">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('alamat') is-invalid @enderror"
                                        placeholder="Masukkan Alamat" type="text" name="alamat" id="alamat_edit">
                                </div>
                                @error('alamat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="posisi" class="form-label">Posisi</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                                    </div>
                                    <select
                                        class="form-control form-control-alternative @error('posisi') is-invalid @enderror"
                                        name="posisi" id="posisi_edit">
                                        <option value="">Pilih Posisi</option>
                                        <option value="Karyawan">Karyawan</option>
                                        <option value="Driver">Driver</option>
                                    </select>
                                </div>
                                @error('posisi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telp" class="form-label">Nomor Telpon</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('no_telp') is-invalid @enderror"
                                        placeholder="Masukkan Nomor Telpon" type="text" name="no_telp"
                                        id="no_telp_edit">
                                </div>
                                @error('no_telp')
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
                    $('#name_edit').val(data.name);
                    $('#nik_edit').val(data.nik);
                    $('#tempat_lahir_edit').val(data.tempat_lahir);
                    $('#tanggal_lahir_edit').val(data.tanggal_lahir);
                    $('#alamat_edit').val(data.alamat);
                    $('#posisi_edit').val(data.posisi);
                    $('#no_telp_edit').val(data.no_telp);
                    $('#edit-modal').modal('show');
                }
            });
        }
    </script>
@endpush
