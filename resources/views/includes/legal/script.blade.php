<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/owl-carousel.js') }}"></script>
<script src="{{ asset('js/animation.js') }}"></script>
<script src="{{ asset('js/imagesloaded.js') }}"></script>
<script src="{{ asset('js/templatemo-custom.js') }}"></script>
<script src="{{ asset('vendor/js/pdfmake.min.js.js') }}"></script>
<script src="{{ asset('vendor/js/vfs_fonts.js.js') }}"></script>
<script src="{{ asset('vendor/js/jquery-3.5.1.js.js') }}"></script>
<script src="{{ asset('vendor/js/dataTables.bootstrap5.min.js.js') }}"></script>
<script src="{{ asset('vendor/js/dataTables.fixedHeader.min.js.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#dataTables').DataTable({
            fixedHeader: true
        });
    });

    $(document).ready(function() {
        var table = $('#dataTables2').DataTable({
            fixedHeader: true
        });
    });

    $(document).ready(function() {
        var table = $('#dataTables3').DataTable({
            fixedHeader: true
        });
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    }
                ]
            }
        })
        .catch(error => {
            console.log(error);
        });
</script>
<script>
    $(document).ready(function() {
        $("#staticBackdrop").modal('show')
    });
</script>
<script type="text/javascript" src={{ asset('js/sweatalert2.js') }}></script>
<script type="text/javascript" src={{ asset('vendor/bootstrap/js/select2.min.js') }}></script>
<script type="text/javascript" src={{ asset('js/myScript.js') }}></script>
