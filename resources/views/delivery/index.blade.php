@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Delivery</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Delivery</li>
                            </ol>
                        </nav>
                    </div>
                    <form action="{{ route('delivery.pdf') }}" target="_blank" method="get">
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
                        <h3 class="mb-0">Tambah Data Delivery</h3>
                    </div>
                    <div class="container">
                        <form action="{{ route('delivery.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal" class="form-label">Tanggal</label>
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
                                        <label for="sj" class="form-label">No Surat Jalan</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fas fa-envelope-open-text"></i></span>
                                            </div>
                                            <select name="surat_jalan_id" id="surat_jalan_id" autocomplete="off"
                                                class="form-control form-control-alternative @error('surat_jalan_id') is-invalid @enderror pilihSj">
                                                <option value="">Pilih No Surat Jalan</option>
                                                @foreach ($suratjalan as $sj)
                                                    <option value="{{ $sj->id }}"
                                                        {{ old('surat_jalan_id') == $sj->id ? 'selected' : '' }}>
                                                        {{ $sj->no_sj }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="text-sm text-success" id="alert"></span>
                                        @error('surat_jalan_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cust" class="form-label">Customer</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-tag"></i></span>
                                            </div>
                                            <input class="form-control form-control-alternative" type="text"
                                                name="customer" id="customer" readonly>
                                        </div>
                                        @error('customer_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tujuan" class="form-label">Tujuan</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-tag"></i></span>
                                            </div>
                                            <input class="form-control form-control-alternative" type="text"
                                                name="tujuan" id="tujuan" readonly>
                                        </div>
                                        @error('tujuan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kirim" class="form-label">Pengiriman</label>
                                        <span class="text-danger">*</span>
                                        <div class="position-relative form-group">
                                            <div>
                                                <div class=" custom-control custom-control-inline">
                                                    <label class="form-check-label">
                                                        <input name="pengiriman" type="radio" class="form-check-input"
                                                            value="Dalam Kota">
                                                        Dalam Kota
                                                    </label>
                                                </div>
                                                <div class=" custom-control custom-control-inline">
                                                    <label class="form-check-label">
                                                        <input name="pengiriman" type="radio" class="form-check-input"
                                                            value="Luar Kota">
                                                        Luar Kota
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
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
                        <h3 class="mb-0">Table List Delivery</h3>
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
                                    <th>Tanggal</th>
                                    <th>No Surat Jalan</th>
                                    <th>Driver</th>
                                    <th>Customer</th>
                                    <th>Tujuan</th>
                                    <th>Volume</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($delivery as $item)
                                    <tr>
                                        <td>{{ $delivery->currentPage() * 10 - 10 + $loop->iteration }}</td>
                                        <td>{{ date('d F Y', strtotime($item->tanggal)) }}</td>
                                        <td>{{ $item->suratjalan->no_sj }}</td>
                                        <td>{{ $item->suratjalan->driver->karyawan->name }}</td>
                                        <td>{{ $item->suratjalan->customer->name }}</td>
                                        <td>{{ $item->suratjalan->kota_tujuan }}</td>
                                        <td>{{ $item->suratjalan->volume }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success" style="border-radius: 0.5rem"
                                                onclick="showEditModal({{ $item->id }}, `{{ route('delivery.edit', ['delivery' => $item->id]) }}`, `{{ route('delivery.update', ['delivery' => $item->id]) }}`)"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="hapusData(`{{ route('delivery.destroy', ['delivery' => $item->id]) }}`)"><i
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
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <x-pagination :pagination="$delivery" />
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    {{-- include modal delete component --}}
    <x-modal-delete />
    {{-- include modal edit component --}}
    @include('delivery.edit')
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(".pilihSj").on('change', function() {
            //get this value
            var surat_jalan_id = $(this).val();

            if (surat_jalan_id == '') {
                $("#customer").val('');
                $("#tujuan").val('');
            } else {
                let alert = $("#alert");
                //ajax
                $.ajax({
                    url: '{{ route('delivery.suratjalan') }}',
                    data: {
                        'surat_jalan_id': surat_jalan_id
                    },
                    type: 'GET',
                    success: function(result) {
                        console.log(result);
                        let data = result.data;
                        if (result.status == 'success') {
                            $("#customer").val(data.customer.name);
                            $("#tujuan").val(data.kota_tujuan);
                            alert.html('<i class="fas fa-check-circle me-1"></i> Data Ditemukan');
                        } else {
                            $("#customer").val('');
                            $("#tujuan").val('');
                            alert.html('<i class="fas fa-times-circle me-1"></i> Data Tidak Ditemukan');
                        }
                    }
                })
            }

        })
    </script>
@endpush
