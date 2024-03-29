@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Purchase Order</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Purchase Order</li>
                            </ol>
                        </nav>
                    </div>

                    <form action="{{ route('purchase.pdf') }}" target="_blank" method="get">
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
                @can('create po')
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Tambah Data Purchase Order</h3>
                        </div>
                        <div class="container">
                            <form action="{{ route('purchase.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal" class="form-label">Tanggal PO</label>
                                            <span class="text-danger">*</span>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="dd-mm-yyyy" value=""
                                                    min="1997-01-01" max="2030-12-31" type="date" id="tanggal"
                                                    name="tanggal">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_po" class="form-label">No Purchase Order</label>
                                            <span class="text-danger">*</span>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-shopping-bag"></i></span>
                                                </div>
                                                <input
                                                    class="form-control form-control-alternative @error('no_po') is-invalid @enderror"
                                                    value="{{ old('no_po') }}" placeholder="Masukkan Purchase Order"
                                                    type="text" name="no_po" id="no_po">
                                            </div>
                                            @error('no_po')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kuantitas" class="form-label">Kuantitas</label>
                                            <span class="text-danger">*</span>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-fill-drip"></i></span>
                                                </div>
                                                <input
                                                    class="form-control form-control-alternative @error('kuantitas') is-invalid @enderror"
                                                    value="{{ old('kuantitas') }}" placeholder="Masukkan Kuantitas"
                                                    type="number" name="kuantitas" id="kuantitas">
                                            </div>
                                            @error('kuantitas')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pj" class="form-label">Penanggung Jawab</label>
                                            <span class="text-danger">*</span>
                                            <div class="input-group input-group-alternative mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                                </div>
                                                <select name="karyawan_id" id="karyawan_id"
                                                    class="form-control form-control-alternative @error('karyawan_id') is-invalid @enderror">
                                                    <option value="">Pilih Penanggungjawab</option>
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
                                        <div class="d-flex flex-column mt-4">
                                            <button class="btn btn-primary align-self-end">Simpan</button>
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
                        <h3 class="mb-0">Table List Purchase Order</h3>
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
                                    <th>Tanggal PO</th>
                                    <th>No Purchase Order</th>
                                    <th>Perusahaan</th>
                                    <th>Alamat</th>
                                    <th>Kuantitas</th>
                                    <th>Penanggungjawab</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($purchase as $order)
                                    <tr>
                                        <td>{{ $purchase->currentPage() * 10 - 10 + $loop->iteration }}</td>
                                        <td>{{ date('d F Y', strtotime($order->tanggal)) }}</td>
                                        <td>{{ $order->no_po }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>{{ $order->customer->alamat }}</td>
                                        <td>{{ $order->kuantitas }}</td>
                                        <td>{{ $order->karyawan->name }}</td>
                                        <td>
                                            @can('update po')
                                                <button class="btn btn-sm btn-success" style="border-radius: 0.5rem"
                                                    onclick="showEditModal({{ $order->id }}, `{{ route('purchase.edit', ['purchase' => $order->id]) }}`, `{{ route('purchase.update', ['purchase' => $order->id]) }}`)"><i
                                                        class="fas fa-edit"></i></button>
                                            @endcan

                                            @can('delete po')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="hapusData(`{{ route('purchase.destroy', ['purchase' => $order->id]) }}`)"><i
                                                        class="far fa-trash-alt"></i></button>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" align="center">-tidak ada data-</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <x-pagination :pagination="$purchase" />
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    {{-- include modal delete component --}}
    <x-modal-delete />

    @include('purchase_order.edit')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endpush
