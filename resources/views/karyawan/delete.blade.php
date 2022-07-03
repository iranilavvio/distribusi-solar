 <!-- Modal -->
 <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="row text-center">
                     <div class="col">
                         <p>Apakah yakin ingin menghapus data?</p>
                         <div class="my-4">
                             <button type="button" class="btn btn-secondary me-1"
                                 data-bs-dismiss="modal">Batal</button>
                             <form action="" id="hapus" method="POST" class="d-inline">
                                 @method('DELETE')
                                 @csrf
                                 <button type="submit" class="btn btn-danger btn-hapus-data">Hapus</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 @push('js')
     <script>
         function hapusData(url) {
             $('#modal-delete').modal('show');

             let hapusForm = document.getElementById('hapus');
             hapusForm.setAttribute('action', url);
         }
     </script>
 @endpush
