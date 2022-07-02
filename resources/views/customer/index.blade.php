@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Customer</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Customer</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Customer</li>
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
                        <h3 class="mb-0">Tambah Data Customer</h3>
                    </div>
                    <div class="container">
                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kode" class="form-label">Kode</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('kode') is-invalid @enderror"
                                                placeholder="Masukkan Kode" type="text" name="kode" id="kode">
                                        </div>
                                        @error('kode')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="namacustomer" class="form-label">Nama Customer</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('name') is-invalid @enderror"
                                                placeholder="Masukkan Nama Customer" type="text" name="name"
                                                id="name">
                                        </div>
                                        @error('name')
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
                                                <span class="input-group-text"><i class="fa fa-city"></i></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('alamat') is-invalid @enderror"
                                                placeholder="Masukkan Alamat" type="text" name="alamat" id="alamat">
                                        </div>
                                        @error('alamat')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_contact" class="form-label">Nama Contact</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-city"></i></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('nama_contact') is-invalid @enderror"
                                                placeholder="Masukkan Nama Contact" type="text" name="nama_contact"
                                                id="nama_contact">
                                        </div>
                                        @error('nama_contact')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nomor_contact" class="form-label">Nomor Contact</label>
                                        <span class="text-danger">*</span>
                                        <div class="input-group input-group-alternative mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-map"></i></span>
                                            </div>
                                            <input
                                                class="form-control form-control-alternative @error('nomor_contact') is-invalid @enderror"
                                                placeholder="Masukkan Nomor Contact" type="text" name="nomor_contact"
                                                id="nomor_contact">
                                        </div>
                                        @error('nomor_contact')
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
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Nama Contact</th>
                                    <th>Nomor Contact</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($customer as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->nama_contact }}</td>
                                        <td>{{ $item->nomor_contact }}</td>
                                        <td><button class="btn btn-sm btn-success" style="border-radius: 0.5rem" onclick="showEditModal({{ $item->id }}, `{{ route('customer.edit', ['customer' => $item->id]) }}`, `{{ route('customer.update', ['customer' => $item->id]) }}`)"><i
                                                    class="fas fa-edit"></i></button></td>
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

    <!-- Modal -->
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" id="action-modal-edit" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode" class="form-label">Kode</label>
                                    <span class="text-danger">*</span>
                                    <div class="input-group input-group-alternative mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                        </div>
                                        <input
                                            class="form-control form-control-alternative @error('kode') is-invalid @enderror"
                                            placeholder="Masukkan Kode" type="text" name="kode" id="kode_edit">
                                    </div>
                                    @error('kode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="namacustomer" class="form-label">Nama Customer</label>
                                    <span class="text-danger">*</span>
                                    <div class="input-group input-group-alternative mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                        </div>
                                        <input
                                            class="form-control form-control-alternative @error('name') is-invalid @enderror"
                                            placeholder="Masukkan Nama Customer" type="text" name="name"
                                            id="name_edit">
                                    </div>
                                    @error('name')
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
                                            <span class="input-group-text"><i class="fa fa-city"></i></i></span>
                                        </div>
                                        <input
                                            class="form-control form-control-alternative @error('alamat') is-invalid @enderror"
                                            placeholder="Masukkan Alamat" type="text" name="alamat" id="alamat_edit">
                                    </div>
                                    @error('alamat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_contact" class="form-label">Nama Contact</label>
                                    <span class="text-danger">*</span>
                                    <div class="input-group input-group-alternative mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-city"></i></i></span>
                                        </div>
                                        <input
                                            class="form-control form-control-alternative @error('nama_contact') is-invalid @enderror"
                                            placeholder="Masukkan Nama Contact" type="text" name="nama_contact"
                                            id="nama_contact_edit">
                                    </div>
                                    @error('nama_contact')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomor_contact" class="form-label">Nomor Contact</label>
                                    <span class="text-danger">*</span>
                                    <div class="input-group input-group-alternative mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-map"></i></span>
                                        </div>
                                        <input
                                            class="form-control form-control-alternative @error('nomor_contact') is-invalid @enderror"
                                            placeholder="Masukkan Nomor Contact" type="text" name="nomor_contact"
                                            id="nomor_contact_edit">
                                    </div>
                                    @error('nomor_contact')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
        function showEditModal(id, url_edit, url_update){
            // ajax show edit modal
            $.ajax({
                url: url_edit,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data){
                    console.log(data)
                    $('#action-modal-edit').attr('action', url_update);
                    $('#kode_edit').val(data.kode);
                    $('#name_edit').val(data.name);
                    $('#alamat_edit').val(data.alamat);
                    $('#nama_contact_edit').val(data.nama_contact);
                    $('#nomor_contact_edit').val(data.nomor_contact);
                    $('#edit-modal').modal('show');
                }
            });
        }
    </script>
@endpush
