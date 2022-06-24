@push('modal-section')
    <!-- Ini merupakan modal global, selain untuk edit data, modal ini juga bisa digunakan untuk detail data -->
    <div class="modal fade modalOpen " style="width: ; display: none" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div {{ $attributes->merge(['class' => 'modal-dialog']) }}>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-html">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="loader">
                                <div class="ball-pulse">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('.modalOpen').on('show.bs.modal', function(event) {
                                var button = $(event.relatedTarget)
                                var title = button.data('title') // get value pada atribut data-title pada tag button
                                var url = button.data('url') // get value pada atribut data-url pada tag button
                                var modal = $(this) // define modal yang sedang aktif
                                modal.find('.modal-title').text(title) // set title pada modal
                                // embed class modal-html dengan isi/halaman dari url
                                $.ajax({
                                    url: url,
                                    success: function(data) {
                                        modal.find('.modal-html').html(data)
                                    },
                                    error: function(xhr, status, error) {
                                        console.log(xhr.responseText)
                                    }
                                })
                            })
                        })
                    </script>
                @endpush
