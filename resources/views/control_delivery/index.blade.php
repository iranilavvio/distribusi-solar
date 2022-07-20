@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Control Delivery</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Control Delivery</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Control Delivery</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('control.pdf') }}" target="_blank" class="btn btn-sm btn-neutral"><i
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
                        <h3 class="mb-0">Tambah Data Control Delivery</h3>
                    </div>
                    <div class="container">
                        <form action="{{ route('control.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kode" class="form-label">Kode</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-code"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('kode') is-invalid @enderror"
                                                value="{{ old('kode') }}" placeholder="Masukkan Kode" type="text"
                                                name="kode" id="kode">
                                        </div>
                                        @error('kode')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="isi" class="form-label">Jam Pengiriman</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('jam_pengiriman') is-invalid @enderror"
                                                value="{{ old('jam_pengiriman') }}" type="time" name="jam_pengiriman"
                                                id="jam_pengiriman">
                                        </div>
                                        @error('jam_pengiriman')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="finish" class="form-label">Jam Kembali</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-stopwatch"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('jam_kembali') is-invalid @enderror"
                                                value="{{ old('jam_kembali') }}" type="time" name="jam_kembali"
                                                id="jam_kembali">
                                        </div>
                                        @error('jam_kembali')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sj" class="form-label">No Surat Jalan</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fas fa-envelope-open-text"></i></span>
                                            </div>
                                            <select name="surat_jalan_id" id="surat_jalan_id"
                                                class="form-control form-control-alternative @error('surat_jalan_id') is-invalid @enderror">
                                                <option value="">Pilih No Surat Jalan</option>
                                                @foreach ($suratjalan as $sj)
                                                    <option value="{{ $sj->id }}"
                                                        {{ old('surat_jalan_id') == $sj->id ? 'selected' : '' }}>
                                                        {{ $sj->no_sj }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('surat_jalan_id')
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
                                                <span class="input-group-text"><i class="far fa-sticky-note"></i></span>
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
                        <h3 class="mb-0">Table List Control Delivery</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Jam Pengiriman</th>
                                    <th>Jam Kembali</th>
                                    <th>No Surat Jalan</th>
                                    <th>Customer</th>
                                    <th>Volume</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($control as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->jam_pengiriman }}</td>
                                        <td>{{ $item->jam_kembali }}</td>
                                        <td>{{ $item->suratjalan->no_sj }}</td>
                                        <td>{{ $item->suratjalan->customer->name }}</td>
                                        <td>{{ $item->suratjalan->volume }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success" style="border-radius: 0.5rem"
                                                onclick="showEditModal({{ $item->id }}, `{{ route('control.edit', ['control' => $item->id]) }}`, `{{ route('control.update', ['control' => $item->id]) }}`)"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="hapusData(`{{ route('control.destroy', ['control' => $item->id]) }}`)"><i
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
    @include('control_delivery.edit')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endpush
