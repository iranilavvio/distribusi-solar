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
                        <a href="javascript:void(0)" class="btn btn-sm btn-neutral" id="create">New</a>
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
                        <table class="table align-items-center table-flush" id="customerTable">
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
                                    <tr id="customer_{{ $item->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->nama_contact }}</td>
                                        <td>{{ $item->nomor_contact }}</td>
                                        {{-- <td><button class="btn btn-sm btn-success" style="border-radius: 0.5rem"
                                                onclick="showModalEdit({{ $item->id }})"><i
                                                    class="fas fa-edit"></i></button></td> --}}
                                        <td>
                                            <a href="javascript:void(0)" data-id="{{ $item->id }}" title="Edit"
                                                class="btn btn-sm btn-success btn-edit">Edit</a>
                                            <a href="javascript:void(0)" data-id="{{ $item->id }}" title="Delete"
                                                class="btn btn-sm btn-danger btn-delete">Hapus</a>
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
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form method="POST" id="customerForm">
                    @csrf
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            // create
            $('#create').click(function() {
                $('.error').remove();
                $('#custId').remove();
                $('#customerModal #modalTitle').text('Create Post');
                $('#customerForm')[0].reset();
                $('#customerModal').modal('toggle');
            });

            // form validate and submit
            $('#customerForm').validate({
                rules: {
                    kode: 'required',
                    name: 'required',
                    alamat: 'required',
                    nama_contact: 'required',
                    nomor_contact: 'required'
                },
                messages: {
                    kode: 'Kode Customer harus diisi',
                    name: 'Nama Customer harus diisi',
                    alamat: 'Alamat harus diisi',
                    nama_contact: 'Nama Contact harus diisi',
                    nomor_contact: 'Nomor Contact harus diisi'
                },

                submitHandler: function(form) {
                    const id = $('input[name=custId]').val();
                    const formData = $(form).serializeArray();

                    $.ajax({
                        url: 'customer',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response && response.status === 'success') {

                                // clear form
                                $('#customerForm')[0].reset();

                                // toggle modal
                                $('#customerModal').modal('toggle');

                                $('#customerTable p').empty();

                                const data = response.data;

                                if (id) {
                                    $("#customer_" + id + " td:nth-child(2)").html(data
                                        .title);
                                    $("#customer_" + id + " td:nth-child(3)").html(data
                                        .description);
                                } else {
                                    $('#customerTable').prepend(
                                        `<tr id=${'customer_'+data.id}><td>${data.id}</td><td>${data.title}</td><td>${data.description}</td><td>
                        <a href="javascript:void(0)" data-id=${data.id} title="Edit" class="btn btn-sm btn-success btn-edit"> Edit </a>
                        <a href="javascript:void(0)" data-id=${data.id} title="Delete" class="btn btn-sm btn-danger btn-delete"> Delete </a></td></tr>`
                                    );
                                }
                            }
                        }
                    });
                }
            })
        });

        // view button click
        // $('.btn-view').click(function() {
        //     const id = $(this).data('id');
        //     $('label.error').remove();
        //     $('input[name=title]').removeClass('error');
        //     $('textarea[name=description]').removeClass('error');
        //     $('input[name=title]').attr('disabled', 'disabled');
        //     $('textarea[name=description]').attr('disabled', 'disabled');
        //     $('#postModal button[type=submit]').addClass('d-none');

        //     $.ajax({
        //         url: `posts/${id}`,
        //         type: 'GET',
        //         success: function(response) {
        //             if (response && response.status === 'success') {
        //                 const data = response.data;
        //                 $('#postModal #modalTitle').text('Post Detail');
        //                 $('#postModal input[name=title]').val(data.title);
        //                 $('#postModal textarea[name=description]').val(data.description);
        //                 $('#postModal').modal('toggle');
        //             }
        //         }
        //     })
        // });

        // edit button click
        $('.btn-edit').click(function() {
            const id = $(this).data('id');
            $('label.error').remove();
            $('input[name=kode]').removeClass('error');
            $('input[name=kode]').after('<input type="hidden" name="custId" value="' + id + '" />')
            $('input[name=name]').removeClass('error');
            $('input[name=alamat]').removeClass('error');
            $('input[name=nama_contact]').removeClass('error');
            $('input[name=nomor_contact]').removeClass('error');
            $('input[name=kode]').removeAttr('disabled');
            $('input[name=name]').removeAttr('disabled');
            $('input[name=alamat]').removeAttr('disabled');
            $('input[name=nama_contact]').removeAttr('disabled');
            $('input[name=nomor_contact]').removeAttr('disabled');
            $('#customerModal button[type=submit]').removeClass('d-none');

            $.ajax({
                url: `customer.edit/${id}`,
                type: 'GET',
                success: function(response) {
                    if (response && response.status === 'success') {
                        const data = response.data;
                        $('#customerModal #modalTitle').text('Edit Customer');
                        $('#customerModal input[name=kode]').val(data.kode);
                        $('#customerModal input[name=name]').val(data.name);
                        $('#customerModal input[name=alamat]').val(data.alamat);
                        $('#customerModal input[name=nama_contact]').val(data.nama_contact);
                        $('#customerModal input[name=nomor_contact]').val(data.nomor_contact);
                        $('#customerModal').modal('toggle');
                    }
                }
            })
        });

        // delete button click
        $('.btn-delete').click(function() {
            const id = $(this).data('id');

            if (id) {
                const result = window.confirm('Do you want to delete?');
                if (result) {
                    $.ajax({
                        url: `customer/${id}`,
                        type: 'DELETE',
                        success: function(response) {
                            if (response && response.status === 'success') {
                                const data = response.data;
                                $(`#customer_${data.id}`).remove();
                            }
                        }
                    });
                } else {
                    console.log('error', 'Post not found');
                }
            }
        });
    </script>
@endpush
