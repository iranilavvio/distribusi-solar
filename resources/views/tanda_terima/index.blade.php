@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Tanda Terima</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Tanda Terima</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tanda Terima</li>
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
                        <h3 class="mb-0">Tambah Data Tanda Terima</h3>
                    </div>
                    <div class="container">
                        <form action="{{ route('tandaterima.store') }}" method="POST">
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
                                            <select name="surat_jalan_id" id="surat_jalan_id"
                                                class="form-control form-control-alternative @error('surat_jalan_id') is-invalid @enderror pilihSj">
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
                                        <label for="driver" class="form-label">Driver</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input class="form-control form-control-alternative" type="text"
                                                name="driver" id="driver" readonly>
                                        </div>
                                        @error('driver')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
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
                        <h3 class="mb-0">Table List Tanda Terima</h3>
                    </div>
                    <div class="container">
                        <form action="{{ route('tandaterima.pdf') }}" target="_blank" method="get">
                            <div class="row">
                                <div class="col-md-auto">
                                    <div class="form-group">
                                        <!-- Date input -->
                                        <label class="control-label" for="date">From Date</label>
                                        <input class="form-control form-control-sm" name="from_date" type="date" />
                                    </div>
                                </div>
                                <div class="col-md-auto">
                                    <div class="form-group">
                                        <!-- Date input -->
                                        <label class="control-label" for="date">To Date</label>
                                        <input class="form-control form-control-sm"name="to_date" type="date" />
                                    </div>
                                </div>
                                <div class="col-md-auto mt-4">
                                    <div class="form-group">
                                        <!-- Date input -->
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-print"></i>
                                            Print</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>No Surat Jalan</th>
                                    <th>No Polisi</th>
                                    <th>Driver</th>
                                    <th>Customer</th>
                                    <th>Volume</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($tandaterima as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d F Y', strtotime($item->tanggal)) }}</td>
                                        <td>{{ $item->suratjalan->no_sj }}</td>
                                        <td>{{ $item->suratjalan->driver->truck->no_pol }}</td>
                                        <td>{{ $item->suratjalan->driver->karyawan->name }}</td>
                                        <td>{{ $item->suratjalan->customer->name }}</td>
                                        <td>{{ $item->suratjalan->volume }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success" style="border-radius: 0.5rem"
                                                onclick="showEditModal({{ $item->id }}, `{{ route('tandaterima.edit', ['tandaterima' => $item->id]) }}`, `{{ route('tandaterima.update', ['tandaterima' => $item->id]) }}`)"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="hapusData(`{{ route('tandaterima.destroy', ['tandaterima' => $item->id]) }}`)"><i
                                                    class="far fa-trash-alt"></i></button>
                                            <a href="{{ route('tandaterima.cetak', $item->id) }}" target="_blank"
                                                class="btn btn-sm btn-primary"><i class="fas fa-print"></i></a>
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
    @include('tanda_terima.edit')
@endsection

@push('js')
    <script>
        $(".pilihSj").on('change', function() {
            //get this value
            var surat_jalan_id = $(this).val();
            if (surat_jalan_id == '') {
                $("#driver").val('');
                $("#customer").val('');
            } else {
                let alert = $("#alert");
                //ajax
                $.ajax({
                    url: '{{ route('tandaterima.suratjalan') }}',
                    data: {
                        'surat_jalan_id': surat_jalan_id
                    },
                    type: 'GET',
                    success: function(result) {
                        console.log(result);
                        let data = result.data;
                        if (result.status == 'success') {
                            //driver
                            $("#driver").val(data.driver.karyawan.name);
                            $("#customer").val(data.customer.name);
                            alert.html('<i class="fas fa-check-circle me-1"></i> Data Ditemukan');
                        } else {
                            $("#driver").val('');
                            $("#customer").val('');
                            alert.html('<i class="fas fa-times-circle me-1"></i> Data Tidak Ditemukan');
                        }
                    }
                })
            }
        })
    </script>
@endpush
