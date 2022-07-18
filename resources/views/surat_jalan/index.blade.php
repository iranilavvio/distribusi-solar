@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Surat Jalan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Surat Jalan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Surat Jalan</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('suratjalan.pdf') }}" target="_blank" class="btn btn-sm btn-neutral"><i
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
                @can('create sj')
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Tambah Data Surat Jalan</h3>
                        </div>
                        <div class="container">
                            <form action="{{ route('suratjalan.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_sj" class="form-label">No Surat Jalan</label>
                                            <span class="text-danger">*</span>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-envelope-open-text"></i></span>
                                                </div>
                                                <input
                                                    class="form-control form-control-alternative @error('no_sj') is-invalid @enderror"
                                                    value="{{ old('no_sj') }}" placeholder="Masukkan No Surat Jalan"
                                                    type="text" name="no_sj" id="no_sj">
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
                                                <input class="form-control datepicker" placeholder="Select date"
                                                    data-date-format='yy-mm-dd' type="text" id="tanggal_kirim"
                                                    name="tanggal_kirim">
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
                                                    <span class="input-group-text"><i class="fas fa-fax"></i></span>
                                                </div>
                                                <input
                                                    class="form-control form-control-alternative @error('no_kirim') is-invalid @enderror"
                                                    value="{{ old('no_kirim') }}" placeholder="Masukkan No Kirim"
                                                    type="text" name="no_kirim" id="no_kirim">
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
                                                <select name="driver_id" id="driver_id"
                                                    class="form-control form-control-alternative @error('driver_id') is-invalid @enderror"
                                                    value="{{ old('driver_id') }}">
                                                    <option value="">Pilih Driver</option>
                                                    @foreach ($driver as $driv)
                                                        <option value="{{ $driv->id }}"
                                                            {{ old('driver_id') == $driv->id ? 'selected' : '' }}>
                                                            {{ $driv->karyawan->name }}
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
                                                    <span class="input-group-text"><i class="fas fa-fill-drip"></i></span>
                                                </div>
                                                <input
                                                    class="form-control form-control-alternative @error('volume') is-invalid @enderror"
                                                    value="{{ old('volume') }}" placeholder="Masukkan Volume"
                                                    type="number" name="volume" id="volume">
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
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <select name="customer_id" id="customer_id"
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
                                            <label for="kota" class="form-label">Kota Tujuan</label>
                                            <span class="text-danger">*</span>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                </div>
                                                <input
                                                    class="form-control form-control-alternative @error('kota_tujuan') is-invalid @enderror"
                                                    value="{{ old('kota_tujuan') }}" placeholder="Masukkan Kota Tujuan"
                                                    type="text" name="kota_tujuan" id="kota_tujuan">
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
                                                    <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                                </div>
                                                <input
                                                    class="form-control form-control-alternative @error('seal_a') is-invalid @enderror"
                                                    value="{{ old('seal_a') }}" placeholder="Masukkan Seal A"
                                                    type="text" name="seal_a" id="seal_a">
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
                                                    <span class="input-group-text"><i class="far fa-check-circle"></i></span>
                                                </div>
                                                <input
                                                    class="form-control form-control-alternative @error('seal_b') is-invalid @enderror"
                                                    value="{{ old('seal_b') }}" placeholder="Masukkan Seal B"
                                                    type="text" name="seal_b" id="seal_b">
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
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                <select name="karyawan_id" id="karyawan_id"
                                                    class="form-control form-control-alternative @error('karyawan_id') is-invalid @enderror">
                                                    <option value="">Petugas Catat</option>
                                                    @foreach ($karyawan as $petugas)
                                                        <option value="{{ $petugas->id }}"
                                                            {{ old('karyawan_id') == $petugas->id ? 'selected' : '' }}>
                                                            {{ $petugas->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('karyawan_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="d-flex flex-column mt-4">
                                                <button class="btn btn-primary align-self-end">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endcan
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Table List Surat Jalan</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>No Surat Jalan</th>
                                    <th>Tanggal Kirim</th>
                                    <th>No Kirim</th>
                                    <th>Nopol</th>
                                    <th>Volume</th>
                                    <th>Customer</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($suratjalan as $sj)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sj->no_sj }}</td>
                                        <td>{{ $sj->tanggal_kirim }}</td>
                                        <td>{{ $sj->no_kirim }}</td>
                                        <td>{{ $sj->driver->truck->no_pol }}</td>
                                        <td>{{ $sj->volume }}</td>
                                        <td>{{ $sj->customer->name }}</td>
                                        <td>
                                            @can('update sj')
                                                <button class="btn btn-sm btn-success" style="border-radius: 0.5rem"
                                                    onclick="showEditModal({{ $sj->id }}, `{{ route('suratjalan.edit', ['suratjalan' => $sj->id]) }}`, `{{ route('suratjalan.update', ['suratjalan' => $sj->id]) }}`)"><i
                                                        class="fas fa-edit"></i></button>
                                            @endcan

                                            @can('delete sj')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="hapusData(`{{ route('suratjalan.destroy', ['suratjalan' => $sj->id]) }}`)"
                                                    data-message="{{ $sj->name }}"><i
                                                        class="far fa-trash-alt"></i></button>
                                            @endcan
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
                    {{-- <x-pagination :pagination="$karyawan" /> --}}
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    {{-- include modal delete component --}}
    <x-modal-delete />
    {{-- include modal edit component --}}
    @include('surat_jalan.edit')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endpush
