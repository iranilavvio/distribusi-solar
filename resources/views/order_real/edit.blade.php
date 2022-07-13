<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Order & Real</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                                <label for="no_order" class="form-label">No Order</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('no_order') is-invalid @enderror"
                                        value="{{ old('no_order') }}" placeholder="Masukkan No Order" type="text"
                                        name="no_order" id="no_order_edit">
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
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    </div>
                                    <select name="customer_id" id="customer_id_edit"
                                        class="form-control form-control-alternative @error('customer_id') is-invalid @enderror">
                                        <option value="">Pilih Customer</option>
                                        @foreach ($customer as $cust)
                                            <option value="{{ $cust->id }}">{{ $cust->name }}</option>
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
                                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
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
                                <label for="receive" class="form-label">Receive PO</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-city"></i></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('receive_po') is-invalid @enderror"
                                        placeholder="Masukkan Receive PO" type="number" name="receive_po"
                                        id="receive_po_edit">
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
                                        <span class="input-group-text"><i class="fa fa-city"></i></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('realisasi') is-invalid @enderror"
                                        placeholder="Masukkan realisasi" type="number" name="realisasi"
                                        id="realisasi_edit">
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
                                        <span class="input-group-text"><i class="fa fa-city"></i></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('unreal') is-invalid @enderror"
                                        placeholder="Masukkan Unreal" type="number" name="unreal"
                                        id="unreal_edit">
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
                                        <span class="input-group-text"><i class="fa fa-map"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('keterangan') is-invalid @enderror"
                                        placeholder="Masukkan Keterangan" type="text" name="keterangan"
                                        id="keterangan_edit">
                                </div>
                                @error('keterangan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
    <script>
        function showEditModal(id, url_edit, url_update) {
            // ajax show edit modal
            $.ajax({
                url: url_edit,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    console.log(data)
                    $('#action-modal-edit').attr('action', url_update);
                    $('#no_order_edit').val(data.no_order);
                    $('#customer_id_edit').val(data.customer_id);
                    $('#alamat_edit').val(data.alamat);
                    $('#receive_po_edit').val(data.receive_po);
                    $('#realisasi_edit').val(data.realisasi);
                    $('#unreal_edit').val(data.unreal);
                    $('#keterangan_edit').val(data.keterangan);
                    $('#edit-modal').modal('show');
                }
            });
        }
    </script>
@endpush
