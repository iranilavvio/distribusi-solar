<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pendistribusian</h5>
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
                                <label for="namadriver" class="form-label">No Order Real</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    </div>
                                    <select name="order_real_id" id="order_real_id_edit"
                                        class="form-control form-control-alternative @error('order_real_id') is-invalid @enderror">
                                        <option value="">No Order Real</option>
                                        @foreach ($orderreal as $order)
                                            <option value="{{ $order->id }}"
                                                {{ old('order_real_id') == $order->id ? 'selected' : '' }}>
                                                {{ $order->no_order }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('order_real_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sj" class="form-label">No Surat Jalan</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                    </div>
                                    <select name="surat_jalan_id" id="surat_jalan_id_edit"
                                        class="form-control form-control-alternative @error('surat_jalan_id') is-invalid @enderror">
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
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('keterangan') is-invalid @enderror"
                                        value="{{ old('keterangan') }}" placeholder="Masukkan Keterangan"
                                        type="text" name="keterangan" id="keterangan_edit">
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
                    $('#order_real_id_edit').val(data.order_real_id);
                    $('#surat_jalan_id_edit').val(data.surat_jalan_id);
                    $('#keterangan_edit').val(data.keterangan);
                    $('#edit-modal').modal('show');
                }
            });
        }
    </script>
@endpush
