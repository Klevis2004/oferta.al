@include('includes.header')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    img {
        width: 180px;
    }

    .select2-container {
        z-index: 1;
        /* Adjust the value as needed */
    }
</style>
<div class="col-md-10">
    <div class="container shadow-lg mt-5">
        <div class="p-5">
            <div class="row">
                <div class="col-lg-12 mb-4 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary addRow"><i class="fa fa-plus"></i></button>
                </div>
                <form action="{{ route('cmimi') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div id="dynamic-row-container">

                    </div>
                    <div class="col-lg-12 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-success" id="ruajButton"><i
                                class="fa fa-paper-plane px-5"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize Select2
        $('.js-example-basic-single').select2();

        // Event handler for adding a new row
        $(document).on('click', '.addRow', function() {
            let rowIndex = $('#dynamic-row-container .row').length;

            let newRow = `<div class="row mb-3">
                            <div class="col-lg-4">
                                <h6 class="form-check-label">Projekti</h6>
                                <select class="form-control js-example-basic-single" name="state[${rowIndex}]" required>
                                    @foreach ($product as $a)
                                        <option value="{{ $a->id }}">{{ $a->emri }} / {{ $a->user_id }} / {{ $a->data_dorezimit }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <h6 class="form-check-label">Çmimi Total</h6>
                                <input class="form-control" min="0" type="number" name="cmimi_total[${rowIndex}]">
                            </div>
                            <div class="col-lg-3">
                                <h6 class="form-check-label">Çmimi Ofetuar</h6>
                                <input class="form-control" min="0" type="number" name="cmimi_ofetuar[${rowIndex}]">
                            </div>
                            <div class="col-lg-1 d-flex align-items-end">
                                <button type="button" class="btn btn-danger removeRow"><i class="fa fa-minus"></i></button>
                            </div>
                          </div>`;
            $('#dynamic-row-container').append(newRow);
            $('.js-example-basic-single').last().select2();
        });

        // Event handler for removing a row
        $(document).on('click', '.removeRow', function() {
            $(this).closest('.row').remove();
        });

        // Handle form submission
        $('form').on('submit', function(e) {
            e.preventDefault();

            // Use serializeArray to get form data
            var formData = $(this).serializeArray();

            $.ajax({
                url: '{{ route('cmimi') }}', // Ensure this URL is correct
                method: 'PUT',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    console.log(response);
                    Swal.fire({
                        text: "Çmimet u përditësuan me sukses!",
                        icon: "success"
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + status + " " + error);
                    // Handle error
                }
            });
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
