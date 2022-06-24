<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="namakaryawan" class="form-label">Nama Karyawan</label>
            <span class="text-danger">*</span>
            <div class="input-group input-group-alternative mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                </div>
                <input class="form-control form-control-alternative @error('name') is-invalid @enderror"
                    placeholder="Masukkan Nama Karyawan" type="text" name="name" id="name">
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
                <input class="form-control form-control-alternative @error('nik') is-invalid @enderror"
                    placeholder="Masukkan NIK" type="number" name="nik" id="nik">
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
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <span class="text-danger">*</span>
            <div class="position-relative form-group">
                <div>
                    <div class=" custom-control custom-control-inline">
                        <label class="form-check-label">
                            <input name="jenis_kelamin" type="radio" class="form-check-input" value="Laki-laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class=" custom-control custom-control-inline">
                        <label class="form-check-label">
                            <input name="jenis_kelamin" type="radio" class="form-check-input" value="Perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="tempatlahir" class="form-label">Tempat Lahir</label>
            <span class="text-danger">*</span>
            <div class="input-group input-group-alternative mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-city"></i></i></span>
                </div>
                <input class="form-control form-control-alternative @error('tempat_lahir') is-invalid @enderror"
                    placeholder="Masukkan Tempat Lahir" type="text" name="tempat_lahir" id="tempat_lahir">
            </div>
            @error('tempat_lahir')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
            <span class="text-danger">*</span>
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="form-control datepicker" placeholder="Select date" type="text" id="tanggal_lahir"
                    name="tanggal_lahir">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="alamat" class="form-label">Alamat</label>
            <span class="text-danger">*</span>
            <div class="input-group input-group-alternative mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-map"></i></span>
                </div>
                <input class="form-control form-control-alternative @error('alamat') is-invalid @enderror"
                    placeholder="Masukkan Alamat" type="text" name="alamat" id="alamat">
            </div>
            @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="jabatan" class="form-label">Jabatan</label>
            <span class="text-danger">*</span>
            <div class="input-group input-group-alternative mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                </div>
                <input class="form-control form-control-alternative @error('jabatan') is-invalid @enderror"
                    placeholder="Masukkan Jabatan" type="text" name="jabatan" id="jabatan">
            </div>
            @error('jabatan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="telp" class="form-label">Nomor Telpon</label>
            <span class="text-danger">*</span>
            <div class="input-group input-group-alternative mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input class="form-control form-control-alternative @error('no_telp') is-invalid @enderror"
                    placeholder="Masukkan Nomor Telpon" type="text" name="no_telp" id="no_telp">
            </div>
            @error('no_telp')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
    </div>
</div>
