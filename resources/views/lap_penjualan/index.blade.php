@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Laporan Penjualan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Laporan Penjualan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Laporan Penjualan</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral">New</a>
                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>
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
                        <h3 class="mb-0">Tambah Data Laporan Penjualan</h3>
                    </div>
                    <div class="container">
                        <form action="{{ route('laporan.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nopol" class="form-label">No Polisi</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
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
                                            <select name="driver_id" id="driver_id"
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
                                            <select name="surat_jalan_id" id="surat_jalan_id"
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
                                        <label for="tujuan" class="form-label">Tujuan</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-map"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('tujuan') is-invalid @enderror"
                                                value="{{ old('tujuan') }}" placeholder="Masukkan Tujuan"
                                                type="text" name="tujuan" id="tujuan">
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
                                                value="{{ old('volume') }}" placeholder="Masukkan Volume"
                                                type="number" name="volume" id="volume">
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
                                                type="text" name="keterangan" id="keterangan">
                                        </div>
                                        @error('keterangan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-column mt-4">
                                        <button class="btn btn-primary align-self-end">Simpan</button>
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
                        <h3 class="mb-0">Light table</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>No Pol</th>
                                    <th>Driver</th>
                                    <th>No Surat Jalan</th>
                                    <th>Customer</th>
                                    <th>Tujuan</th>
                                    <th>Volume</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($laporan as $lap)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $lap->truck->no_pol }}</td>
                                        <td>{{ $lap->driver->karyawan->name }}</td>
                                        <td>{{ $lap->suratjalan->no_kirim }}</td>
                                        <td>{{ $lap->customer->name }}</td>
                                        <td>{{ $lap->tujuan }}</td>
                                        <td>{{ $lap->volume }}</td>
                                        <td><button class="btn btn-sm btn-success" style="border-radius: 0.5rem"
                                                onclick="showEditModal({{ $lap->id }}, `{{ route('laporan.edit', ['laporan' => $lap->id]) }}`, `{{ route('laporan.update', ['laporan' => $lap->id]) }}`)"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="hapusData(`{{ route('laporan.destroy', ['laporan' => $lap->id]) }}`)"
                                                data-message="{{ $lap->name }}"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" align="center">-tidak ada data-</td>
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
    @include('lap_penjualan.edit')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endpush
