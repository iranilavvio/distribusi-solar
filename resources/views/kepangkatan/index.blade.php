@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-tittle">
                    <div class="d-flex justify-content-between">
                        <div class="flex-item">
                            <h6>Kepangkatan</h6>
                        </div>
                        <div class="flex-item">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="container-fluid">

                        <a href="{{ route('kepangkatan.pdf') }}" target="_blank" class="btn btn-success">CETAK</a>
                        <div class="form">
                            <form action="{{ route('kepangkatan.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama Kepangkatan</label>
                                            <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai"
                                                placeholder="Nama Pegawai">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NIP</label>
                                            <input type="text" class="form-control" name="nip" id="nip"
                                                placeholder="NIP">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" id="alamat"
                                                placeholder="Alamat">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No Telp</label>
                                            <input type="text" class="form-control" name="no_telp" id="no_telp"
                                                placeholder="No. Telp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="Email">
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kepangkatan as $item)
                            <tr>
                                <td>{{ $item->nama_pegawai }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <button class="btn btn-sm btn-success"
                                        onclick="showEditModal({{ $item->id }}, `{{ route('kepangkatan.edit', ['kepangkatan' => $item->id]) }}`, `{{ route('kepangkatan.update', ['kepangkatan' => $item->id]) }}`)"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger"
                                        onclick="hapusData(`{{ route('kepangkatan.destroy', ['kepangkatan' => $item->id]) }}`)"><i
                                            class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-modal-delete />

    @include('kepangkatan.edit')
@endsection
