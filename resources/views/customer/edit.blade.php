<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
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
                                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                </div>
                                <input
                                    class="form-control form-control-alternative @error('kode') is-invalid @enderror"
                                    placeholder="Masukkan Kode" type="text" name="kode" id="kode_edit">
                            </div>
                            @error('kode')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namacustomer" class="form-label">Nama Customer</label>
                            <span class="text-danger">*</span>
                            <div class="input-group input-group-alternative mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                </div>
                                <input
                                    class="form-control form-control-alternative @error('name') is-invalid @enderror"
                                    placeholder="Masukkan Nama Customer" type="text" name="name"
                                    id="name_edit">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
                                    <span class="input-group-text"><i class="fa fa-city"></i></i></span>
                                </div>
                                <input
                                    class="form-control form-control-alternative @error('alamat') is-invalid @enderror"
                                    placeholder="Masukkan Alamat" type="text" name="alamat"
                                    id="alamat_edit">
                            </div>
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_contact" class="form-label">Nama Contact</label>
                            <span class="text-danger">*</span>
                            <div class="input-group input-group-alternative mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-city"></i></i></span>
                                </div>
                                <input
                                    class="form-control form-control-alternative @error('nama_contact') is-invalid @enderror"
                                    placeholder="Masukkan Nama Contact" type="text" name="nama_contact"
                                    id="nama_contact_edit">
                            </div>
                            @error('nama_contact')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nomor_contact" class="form-label">Nomor Contact</label>
                            <span class="text-danger">*</span>
                            <div class="input-group input-group-alternative mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-map"></i></span>
                                </div>
                                <input
                                    class="form-control form-control-alternative @error('nomor_contact') is-invalid @enderror"
                                    placeholder="Masukkan Nomor Contact" type="text" name="nomor_contact"
                                    id="nomor_contact_edit">
                            </div>
                            @error('nomor_contact')
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
                $('#name_edit').val(data.name);
                $('#alamat_edit').val(data.alamat);
                $('#nama_contact_edit').val(data.nama_contact);
                $('#nomor_contact_edit').val(data.nomor_contact);
                $('#edit-modal').modal('show');
            }
        });
    }
</script>
@endpush