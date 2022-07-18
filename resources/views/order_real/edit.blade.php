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
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control datepicker" placeholder="Select date"
                                        data-date-format='yy-mm-dd' type="text" id="tanggal_edit" name="tanggal">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_po" class="form-label">No Purchase Order</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-shopping-bag"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('no_po') is-invalid @enderror"
                                        value="{{ old('no_po') }}" placeholder="Masukkan No Surat Jalan"
                                        type="text" name="no_po" id="no_po_edit">
                                </div>
                                @error('no_po')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="perusahaan" class="form-label">Customer</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    </div>
                                    <select name="customer_id" id="customer_id_edit"
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kuantitas" class="form-label">Kuantitas</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-fill-drip"></i></span>
                                    </div>
                                    <input
                                        class="form-control form-control-alternative @error('kuantitas') is-invalid @enderror"
                                        value="{{ old('kuantitas') }}" placeholder="Masukkan Kuantitas" type="number"
                                        name="kuantitas" id="kuantitas_edit">
                                </div>
                                @error('kuantitas')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pj" class="form-label">Penanggung Jawab</label>
                                <span class="text-danger">*</span>
                                <div class="input-group input-group-alternative mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    </div>
                                    <select name="karyawan_id" id="karyawan_id_edit"
                                        class="form-control form-control-alternative @error('karyawan_id') is-invalid @enderror">
                                        <option value="">Pilih Penanggungjawab</option>
                                        @foreach ($karyawan as $kary)
                                            <option value="{{ $kary->id }}"
                                                {{ old('karyawan_id') == $kary->id ? 'selected' : '' }}>
                                                {{ $kary->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('karyawan_id')
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
                    $('#tanggal_edit').val(data.tanggal);
                    $('#no_po_edit').val(data.no_po);
                    $('#customer_id_edit').val(data.customer_id);
                    $('#kuantitas_edit').val(data.kuantitas);
                    $('#karyawan_id_edit').val(data.karyawan_id);
                    $('#edit-modal').modal('show');
                }
            });
        }
    </script>
@endpush
