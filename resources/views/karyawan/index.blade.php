@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Karyawan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Karyawan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Karyawan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
        <div class="row mb-5">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Tambah Data Karyawan</h3>
                    </div>
                    <div class="container">
                        <form action="{{ route('karyawan.store') }}" method="POST">
                            @csrf
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
                                                value="{{ old('name') }}" placeholder="Masukkan Nama Karyawan"
                                                type="text" name="name" id="name">
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
                                                value="{{ old('nik') }}" placeholder="Masukkan NIK" type="number"
                                                name="nik" id="nik">
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
                                                        <input name="jenis_kelamin" type="radio" class="form-check-input"
                                                            value="Laki-laki">
                                                        Laki-laki
                                                    </label>
                                                </div>
                                                <div class=" custom-control custom-control-inline">
                                                    <label class="form-check-label">
                                                        <input name="jenis_kelamin" type="radio" class="form-check-input"
                                                            value="Perempuan">
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
                                            <input
                                                class="form-control form-control-alternative @error('tempat_lahir') is-invalid @enderror"
                                                value="{{ old('tempat_lahir') }}" placeholder="Masukkan Tempat Lahir"
                                                type="text" name="tempat_lahir" id="tempat_lahir">
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
                                                <span class="input-group-text"><i
                                                        class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="dd-mm-yyyy" value=""
                                                type="date" id="tanggal_lahir" name="tanggal_lahir">
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
                                            <input
                                                class="form-control form-control-alternative @error('alamat') is-invalid @enderror"
                                                value="{{ old('alamat') }}" placeholder="Masukkan Alamat" type="text"
                                                name="alamat" id="alamat">
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
                                        <label for="posisi" class="form-label">Posisi</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                                            </div>
                                            <select
                                                class="form-control form-control-alternative @error('posisi') is-invalid @enderror"
                                                name="posisi" id="posisi">
                                                <option value="">Pilih Posisi</option>
                                                <option value="Karyawan"
                                                    {{ old('posisi') == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                                                <option value="Driver" {{ old('posisi') == 'Driver' ? 'selected' : '' }}>
                                                    Driver</option>
                                            </select>
                                        </div>
                                        @error('posisi')
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
                                            <input
                                                class="form-control form-control-alternative @error('no_telp') is-invalid @enderror"
                                                value="{{ old('no_telp') }}" placeholder="Masukkan Nomor Telpon"
                                                type="text" name="no_telp" id="no_telp">
                                        </div>
                                        @error('no_telp')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="d-flex flex-column">
                                            <button class="btn btn-primary align-self-end">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Table List Karyawan</h3>
                    </div>
                    <form>
                        <div class="container">
                            <div class="d-flex justify-content-end mb-3">
                                <div class="flex-item mx-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent"><i
                                                    class="fas fa-search"></i></span>
                                        </div>
                                        <input placeholder="Pencarian" type="text" name="search"
                                            value="{{ @$_GET['search'] }}" class="form-control">
                                    </div>
                                </div>
                                <div class="flex-item">
                                    <button class="btn btn-secondary">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Posisi</th>
                                    <th>No Telp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($karyawan as $kary)
                                    <tr>
                                        <td>{{ $karyawan->currentPage() * 10 - 10 + $loop->iteration }}</td>
                                        <td>{{ $kary->name }}</td>
                                        <td>{{ $kary->jenis_kelamin }}</td>
                                        <td>{{ $kary->posisi }}</td>
                                        <td>{{ $kary->no_telp }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success"
                                                onclick="showEditModal({{ $kary->id }}, `{{ route('karyawan.edit', ['karyawan' => $kary->id]) }}`, `{{ route('karyawan.update', ['karyawan' => $kary->id]) }}`)"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="hapusData(`{{ route('karyawan.destroy', ['karyawan' => $kary->id]) }}`)"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" align="center">-tidak ada data-</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <x-pagination :pagination="$karyawan" />
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    {{-- include modal delete component --}}
    <x-modal-delete />

    {{-- include edit --}}
    @include('karyawan.edit')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endpush
