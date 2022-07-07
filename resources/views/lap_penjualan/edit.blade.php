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
                                            <option value="{{ $mobil->id }}"
                                                {{ old('truck_id') == $mobil->id ? 'selected' : '' }}>
                                                {{ $mobil->no_pol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('truck_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namadriver" class="form-label">Nama Driver</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    </div>
                                    <select name="driver_id" id="driver_id_edit"
                                        class="form-control form-control-alternative @error('driver_id') is-invalid @enderror">
                                        <option value="">Pilih Driver</option>
                                        @foreach ($driver as $driv)
                                            <option value="{{ $driv->id }}"
                                                {{ old('driver_id') == $driv->id ? 'selected' : '' }}>
                                                {{ $driv->karyawan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('driver_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="suratjalan" class="form-label">No Surat Jalan</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    </div>
                                    <select name="surat_jalan_id" id="surat_jalan_id_edit"
                                        class="form-control form-control-alternative @error('surat_jalan_id') is-invalid @enderror">
                                        <option value="">Pilih No Surat Jalan</option>
                                        @foreach ($suratjalan as $sj)
                                            <option value="{{ $sj->id }}"
                                                {{ old('surat_jalan_id') == $sj->id ? 'selected' : '' }}>
                                                {{ $sj->no_kirim }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('surat_jalan_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer" class="form-label">Customer</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    </div>
                                    <select name="customer_id" id="customer_id_edit"
                                        class="form-control form-control-alternative @error('customer_id') is-invalid @enderror">
                                        <option value="">Pilih Customer</option>
                                        @foreach ($customer as $cust)
                                            <option value="{{ $cust->id }}"
                                                {{ old('customer_id') == $cust->id ? 'selected' : '' }}>
                                                {{ $cust->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('customer_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tujuan" class="form-label">Tujuan</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('tujuan') is-invalid @enderror"
                                        value="{{ old('tujuan') }}" placeholder="Masukkan Tujuan" type="text"
                                        name="tujuan" id="tujuan_edit">
                                </div>
                                @error('tujuan')
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
                                        <span class="input-group-text"><i class="fa fa-map"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('volume') is-invalid @enderror"
                                        value="{{ old('volume') }}" placeholder="Masukkan Volume" type="number"
                                        name="volume" id="volume_edit">
                                </div>
                                @error('volume')
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
                                        <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
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
                    $('#truck_id_edit').val(data.truck_id);
                    $('#driver_id_edit').val(data.driver_id);
                    $('#surat_jalan_id_edit').val(data.surat_jalan_id);
                    $('#customer_id_edit').val(data.customer_id);
                    $('#tujuan_edit').val(data.tujuan);
                    $('#volume_edit').val(data.volume);
                    $('#keterangan_edit').val(data.keterangan);
                    $('#edit-modal').modal('show');
                }
            });
        }
    </script>
@endpush
