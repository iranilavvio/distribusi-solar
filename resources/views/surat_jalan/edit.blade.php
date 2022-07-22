<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Surat Jalan</h5>
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
                                <label for="no_sj" class="form-label">No Surat Jalan</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-gas-pump"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('no_sj') is-invalid @enderror"
                                        value="{{ old('no_sj') }}" placeholder="Masukkan No Surat Jalan" type="text"
                                        name="no_sj" id="no_sj_edit">
                                </div>
                                @error('no_sj')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggalkirim" class="form-label">Tanggal Kirim</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="dd-mm-yyyy" value="" min="1997-01-01"
                                        max="2030-12-31" type="date" id="tanggal_kirim_edit" name="tanggal_kirim">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_kirim" class="form-label">No Kirim</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('no_kirim') is-invalid @enderror"
                                        placeholder="Masukkan No Kirim" type="text" name="no_kirim"
                                        id="no_kirim_edit">
                                </div>
                                @error('no_kirim')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="driver" class="form-label">Nama Driver</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    </div>
                                    <select name="driver_id" id="driver_id_edit"
                                        class="form-control form-control-alternative @error('driver_id') is-invalid @enderror">
                                        <option value="">Pilih Driver</option>
                                        @foreach ($driver as $driv)
                                            <option value="{{ $driv->id }}">{{ $driv->karyawan->name }}
                                            </option>
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
                                <label for="volume" class="form-label">Volume</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('volume') is-invalid @enderror"
                                        placeholder="Masukkan Volume" type="number" name="volume" id="volume_edit">
                                </div>
                                @error('volume')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perusahaan" class="form-label">Customer</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    </div>
                                    <select name="customer_id" id="customer_id_edit"
                                        class="form-control form-control-alternative @error('customer_id') is-invalid @enderror">
                                        <option value="">Pilih Customer</option>
                                        @foreach ($customer as $cust)
                                            <option value="{{ $cust->id }}">{{ $cust->name }}</option>
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
                                <label for="kota" class="form-label">Kota Tujuan</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('kota_tujuan') is-invalid @enderror"
                                        placeholder="Masukkan Kota Tujuan" type="text" name="kota_tujuan"
                                        id="kota_tujuan_edit">
                                </div>
                                @error('kota_tujuan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="a" class="form-label">Seal A</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('seal_a') is-invalid @enderror"
                                        placeholder="Masukkan Seal A" type="text" name="seal_a"
                                        id="seal_a_edit">
                                </div>
                                @error('seal_a')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="b" class="form-label">Seal B</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('seal_b') is-invalid @enderror"
                                        placeholder="Masukkan Seal B" type="text" name="seal_b"
                                        id="seal_b_edit">
                                </div>
                                @error('seal_b')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="petugascatat" class="form-label">Petugas Catat</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    </div>
                                    <select name="karyawan_id" id="karyawan_id_edit"
                                        class="form-control form-control-alternative @error('karyawan_id') is-invalid @enderror">
                                        <option value="">Petugas Catat</option>
                                        @foreach ($karyawan as $petugas)
                                            <option value="{{ $petugas->id }}">{{ $petugas->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('karyawan_id')
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
                    $('#no_sj_edit').val(data.no_sj);
                    $('#tanggal_kirim_edit').val(data.tanggal_kirim);
                    $('#no_kirim_edit').val(data.no_kirim);
                    $('#driver_id_edit').val(data.driver_id);
                    $('#truck_id_edit').val(data.truck_id);
                    $('#volume_edit').val(data.volume);
                    $('#kode_prs_edit').val(data.kode_prs);
                    $('#customer_id_edit').val(data.customer_id);
                    $('#kota_tujuan_edit').val(data.kota_tujuan);
                    $('#seal_a_edit').val(data.seal_a);
                    $('#seal_b_edit').val(data.seal_b);
                    $('#karyawan_id_edit').val(data.karyawan_id);
                    $('#edit-modal').modal('show');
                }
            });
        }
    </script>
@endpush
