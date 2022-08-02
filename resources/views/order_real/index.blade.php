@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Order Real</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Order Real</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Order Real</li>
                            </ol>
                        </nav>
                    </div>
                    <form action="{{ route('orderreal.pdf') }}" target="_blank" method="get">
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
                        <h3 class="mb-0">Tambah Data Order Real</h3>
                    </div>
                    <div class="container">
                        <form action="{{ route('orderreal.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_order" class="form-label">No Order</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-shopping-bag"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('no_order') is-invalid @enderror"
                                                value="{{ old('no_order') }}" placeholder="Masukkan No Order" type="text"
                                                name="no_order" id="no_order">
                                        </div>
                                        @error('no_order')
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
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="receive" class="form-label">Receive PO</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-hand-holding"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('receive_po') is-invalid @enderror"
                                                value="{{ old('receive_po') }}" placeholder="Masukkan Receive PO"
                                                type="number" name="receive_po" id="receive_po" onkeyup="calc()">
                                        </div>
                                        @error('receive_po')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="realisasi" class="form-label">Realisasi</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-truck-moving"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('realisasi') is-invalid @enderror"
                                                value="{{ old('realisasi') }}" placeholder="Masukkan realisasi"
                                                type="number" name="realisasi" id="realisasi" onkeyup="calc()">
                                        </div>
                                        @error('realisasi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="unreal" class="form-label">Unreal</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fas fa-cart-arrow-down"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('unreal') is-invalid @enderror"
                                                value="{{ old('unreal') }}" placeholder="Masukkan Unreal" type="number"
                                                name="unreal" id="unreal">
                                        </div>
                                        @error('unreal')
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
                        <h3 class="mb-0">Table List Order Real</h3>
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
                                    <th>No Order Real</th>
                                    <th>Perusahaan</th>
                                    <th>Alamat</th>
                                    <th>Receive PO</th>
                                    <th>Realisasi</th>
                                    <th>Unreal</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($orderreal as $order)
                                    <tr>
                                        <td>{{ $orderreal->currentPage() * 10 - 10 + $loop->iteration }}</td>
                                        <td>{{ $order->no_order }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>{{ $order->alamat }}</td>
                                        <td>{{ $order->receive_po }}</td>
                                        <td>{{ $order->realisasi }}</td>
                                        <td>{{ $order->unreal }}</td>
                                        <td>{{ $order->keterangan }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success" style="border-radius: 0.5rem"
                                                onclick="showEditModal({{ $order->id }}, `{{ route('orderreal.edit', ['orderreal' => $order->id]) }}`, `{{ route('orderreal.update', ['orderreal' => $order->id]) }}`)"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="hapusData(`{{ route('orderreal.destroy', ['orderreal' => $order->id]) }}`)"><i
                                                    class="far fa-trash-alt"></i></button>
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
                        <x-pagination :pagination="$orderreal" />
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    {{-- include modal delete component --}}
    <x-modal-delete />

    @include('order_real.edit')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        function calc() {
            var receive = document.getElementById('receive_po').value;
            var real = document.getElementById('realisasi').value;
            var result = (parseFloat(receive) - parseFloat(real));
            if (!isNaN(result)) {
                document.getElementById('unreal').value = result;
            }
        }
    </script>
@endpush
