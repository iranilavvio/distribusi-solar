@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Truck</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Truck</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Truck</li>
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
                        <h3 class="mb-0">Tambah Data Truck</h3>
                    </div>
                    <div class="container">
                        <form action="{{ route('truck.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nopol" class="form-label">Nomor Polisi</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-car"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('no_pol') is-invalid @enderror"
                                                value="{{ old('no_pol') }}" placeholder="Masukkan Nomor Polisi"
                                                type="text" name="no_pol" id="no_pol">
                                        </div>
                                        @error('no_pol')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nolambung" class="form-label">No Lambung</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-tag"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('no_lambung') is-invalid @enderror"
                                                value="{{ old('no_lambung') }}" placeholder="Masukkan Nomor Lambung"
                                                type="text" name="no_lambung" id="no_lambung">
                                        </div>
                                        @error('no_lambung')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kuantitas" class="form-label">Kuantitas</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-box"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('kuantitas') is-invalid @enderror"
                                                value="{{ old('kuantitas') }}" placeholder="Masukkan Kuantitas"
                                                type="text" name="kuantitas" id="kuantitas">
                                        </div>
                                        @error('kuantitas')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
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
                        <h3 class="mb-0">Table List Truck</h3>
                    </div>
                    <div class="container">
                        <div class="d-flex justify-content-end mb-3">
                            <div class="flex-item mx-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input placeholder="Pencarian" type="text" name="search"
                                        onchange="this.form.submit();" value="{{ @$_GET['search'] }}" class="form-control">
                                </div>
                            </div>
                            <div class="flex-item">
                                <button class="btn btn-secondary">Search</button>
                            </div>
                        </div>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>No Polisi</th>
                                    <th>No Lambung</th>
                                    <th>Kuantitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($truck as $item)
                                    <tr>
                                        <td>{{ $truck->currentPage() * 10 - 10 + $loop->iteration }}</td>
                                        <td>{{ $item->no_pol }}</td>
                                        <td>{{ $item->no_lambung }}</td>
                                        <td>{{ $item->kuantitas }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success" style="border-radius: 0.5rem"
                                                onclick="showEditModal({{ $item->id }}, `{{ route('truck.edit', ['truck' => $item->id]) }}`, `{{ route('truck.update', ['truck' => $item->id]) }}`)"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="hapusData(`{{ route('truck.destroy', ['truck' => $item->id]) }}`)"><i
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
                        <x-pagination :pagination="$truck" />
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    {{-- include modal delete component --}}
    <x-modal-delete />

    {{-- include edit --}}
    @include('truck.edit')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endpush
