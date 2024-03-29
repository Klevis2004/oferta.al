<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
</script>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            dom: 'Bfrtip',
            responsive: false,
            pageLength: 4,
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

<script>
    $(document).ready(function() {
        // Function to initialize Select2 and set focus
        function initializeSelect2() {
            $('.js-example-basic').select2({
                dropdownParent: $('#exampleModal')
            });

            setTimeout(function() {
                $('.select2-container--open .select2-search--dropdown .select2-search__field').first()
                    .focus();
            }, 500); // Adjust the timeout as needed
        }

        // Initialize Select2 when the modal is opened
        $('#exampleModal').on('shown.bs.modal', function() {
            console.log("Modal shown, initializing Select2");
            initializeSelect2();
        });
    });
</script>
</body>

</html>
