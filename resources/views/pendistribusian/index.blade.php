@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Pendistribusian</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Pendistribusian</li>
                            </ol>
                        </nav>
                    </div>
                    <form action="{{ route('distribusi.pdf') }}" target="_blank" method="get">
                        <div class="row">
                            <div class="col-md-auto">
                                <div class="form-group">
                                    <!-- Date input -->
                                    <label class="control-label text-white" for="date">From Date</label>
                                    <input class="form-control form-control-sm" name="from_date" type="date" />
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="form-group">
                                    <!-- Date input -->
                                    <label class="control-label text-white" for="date">To Date</label>
                                    <input class="form-control form-control-sm"name="to_date" type="date" />
                                </div>
                            </div>
                            <div class="col-md-auto mt-4">
                                <div class="form-group">
                                    <!-- Date input -->
                                    <button class="btn btn-info" type="submit"><i class="fas fa-print"></i>
                                        Print</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                        <h3 class="mb-0">Tambah Data Pendistribusian</h3>
                    </div>
                    <div class="container">
                        <form action="{{ route('distribusi.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="namadriver" class="form-label">No Order Real</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-shopping-bag"></i></span>
                                            </div>
                                            <select name="order_real_id" id="order_real_id"
                                                class="form-control form-control-alternative @error('order_real_id') is-invalid @enderror">
                                                <option value="">No Order Real</option>
                                                @foreach ($orderreal as $order)
                                                    <option value="{{ $order->id }}"
                                                        {{ old('order_real_id') == $order->id ? 'selected' : '' }}>
                                                        {{ $order->no_order }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('order_real_id')
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
                        <h3 class="mb-0">Table List Pendistribusian</h3>
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
                                    <th>Nopol</th>
                                    <th>Nama Driver</th>
                                    <th>No Surat Jalan</th>
                                    <th>Customer</th>
                                    <th>Tujuan</th>
                                    <th>Volume</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($distribusi as $item)
                                    <tr>
                                        <td>{{ $distribusi->currentPage() * 10 - 10 + $loop->iteration }}</td>
                                        <td>{{ $item->suratjalan->driver->truck->no_pol }}</td>
                                        <td>{{ $item->suratjalan->driver->karyawan->name }}</td>
                                        <td>{{ $item->suratjalan->no_sj }}</td>
                                        <td>{{ $item->suratjalan->customer->name }}</td>
                                        <td>{{ $item->suratjalan->kota_tujuan }}</td>
                                        <td>{{ $item->suratjalan->volume }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success" style="border-radius: 0.5rem"
                                                onclick="showEditModal({{ $item->id }}, `{{ route('distribusi.edit', ['distribusi' => $item->id]) }}`, `{{ route('distribusi.update', ['distribusi' => $item->id]) }}`)"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="hapusData(`{{ route('distribusi.destroy', ['distribusi' => $item->id]) }}`)"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" align="center">-tidak ada data-</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <x-pagination :pagination="$distribusi" />
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    {{-- include modal delete component --}}
    <x-modal-delete />

    {{-- include edit --}}
    @include('pendistribusian.edit')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endpush
