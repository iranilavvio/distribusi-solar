@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Driver</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Driver</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Driver</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('driver.pdf') }}" target="_blank" class="btn btn-sm btn-neutral"><i
                                class="fas fa-print"></i> PDF</a>
                        {{-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
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
                        <h3 class="m    b-0">Tambah Data Driver</h3>
                    </div>
                    <div class="container">
                        <form action="{{ route('driver.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="namadriver" class="form-label">Nama Driver</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                            </div>
                                            <select name="karyawan_id" id="karyawan_id"
                                                class="form-control form-control-alternative @error('karyawan_id') is-invalid @enderror">
                                                <option value="">Pilih Driver</option>
                                                @foreach ($karyawan as $kary)
                                                    <option value="{{ $kary->id }}"
                                                        {{ old('karyawan_id') == $kary->id ? 'selected' : '' }}>
                                                        {{ $kary->name }}</option>
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
                                                <span class="input-group-text"><i class="fa fa-car"></i></span>
                                            </div>
                                            <select name="truck_id" id="truck_id"
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
                        <h3 class="mb-0">Table List Driver</h3>
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
                                    <th>Nama Driver</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>Nomor Polisi</th>
                                    <th>No Lambung</th>
                                    <th>Kuantitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($driver as $item)
                                    <tr>
                                        <td>{{ $driver->currentPage() * 10 - 10 + $loop->iteration }}</td>
                                        <td>{{ $item->karyawan->name }}</td>
                                        <td>{{ $item->karyawan->nik }}</td>
                                        <td>{{ $item->karyawan->alamat }}</td>
                                        <td>{{ $item->truck->no_pol }}</td>
                                        <td>{{ $item->truck->no_lambung }}</td>
                                        <td>{{ $item->truck->kuantitas }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success" style="border-radius: 0.5rem"
                                                onclick="showEditModal({{ $item->id }}, `{{ route('driver.edit', ['driver' => $item->id]) }}`, `{{ route('driver.update', ['driver' => $item->id]) }}`)"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="hapusData(`{{ route('driver.destroy', ['driver' => $item->id]) }}`)"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" align="center">-tidak ada data-</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <x-pagination :pagination="$driver" />
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    {{-- include modal delete component --}}
    <x-modal-delete />

    {{-- include edit --}}
    @include('driver.edit')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endpush
