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
                                                <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('no_pol') is-invalid @enderror"
                                                placeholder="Masukkan Nomor Polisi" type="text" name="no_pol"
                                                id="no_pol">
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
                                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('no_lambung') is-invalid @enderror"
                                                placeholder="Masukkan Nomor Lambung" type="number" name="no_lambung"
                                                id="no_lambung">
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
                                                <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('kuantitas') is-invalid @enderror"
                                                placeholder="Masukkan Kuantitas" type="text" name="kuantitas"
                                                id="kuantitas">
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
                        <h3 class="mb-0">Light table</h3>
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
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->no_pol }}</td>
                                        <td>{{ $item->no_lambung }}</td>
                                        <td>{{ $item->kuantitas }}</td>
                                        {{-- <td><button class="btn btn-sm btn-success" style="border-radius: 0.5rem"><i
                                                    class="fas fa-edit"></i></button></td> --}}
                                        <td><button class="btn btn-sm btn-success" style="border-radius: 0.5rem"
                                                onclick="showModalEdit({{ $item->id }})"><i
                                                    class="fas fa-edit"></i></button></td>
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
    //modal
    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="modalEdit"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" id="customerForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nopol" class="form-label">Nomor Polisi</label>
                                    <span class="text-danger">*</span>
                                    <div class="input-group input-group-alternative mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                        </div>
                                        <input
                                            class="form-control form-control-alternative @error('no_pol') is-invalid @enderror"
                                            placeholder="Masukkan Nomor Polisi" type="text" name="no_pol"
                                            id="no_pol">
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
                                            <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                        </div>
                                        <input
                                            class="form-control form-control-alternative @error('no_lambung') is-invalid @enderror"
                                            placeholder="Masukkan Nomor Lambung" type="number" name="no_lambung"
                                            id="no_lambung">
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
                                            <span class="input-group-text"><i class="fa fa-user-tie"></i></span>
                                        </div>
                                        <input
                                            class="form-control form-control-alternative @error('kuantitas') is-invalid @enderror"
                                            placeholder="Masukkan Kuantitas" type="text" name="kuantitas"
                                            id="kuantitas">
                                    </div>
                                    @error('kuantitas')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        function showModalEdit(id) {
            console.log(id);
            $.ajax({
                url: `{{ route('truck.edit') }}`,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#form-modal-edit').attr('action', `truck/edit/${id}`),
                        $('#no_pol').val(data.no_pol);
                    $('#no_lambung').val(data.no_lambung);
                    $('#kuantitas').val(data.kuantitas);
                    $('#modalEdit').modal('show');
                }
            });
        }
    </script>
@endpush
