<form action="{{ $url }}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-body">
        {{ $slot }}
    </div>
    <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>
