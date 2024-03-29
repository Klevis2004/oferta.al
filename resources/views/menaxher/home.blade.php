<div class="col-md-10">
    <div class="container shadow-lg mt-5">
        <div class="d-flex justify-content-end pe-5 pt-5 ps-5">
            @if (Auth::user()->role == 0)
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-plus"></i>
                </button>
            @else
                <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal2">
                    <i class="fa fa-plus"></i>
                </button>
            @endif

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Oferta</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('product_store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Emri</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Emri" name="emri">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Data Dorëzimit</label>
                                <input type="date" min=0 class="form-control" id="exampleFormControlInput1"
                                    placeholder="Data dorëzimit" name="data_dorezimit">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Komenti</label>
                                <textarea class="form-control" id="exampleFormControlInput1" placeholder="Koment" name="komenti"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Krijo Projekt</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-5">
            <table class="table" id="table_id">
                <thead>
                    <tr>
                        <th scope="col">Emri Klientit</th>
                        <th scope="col">Emri Projektit</th>
                        <th scope="col">Data Dorëzimit</th>
                        <th scope="col">Komenti</th>
                        <th scope="col">Statusi</th>
                        @if (Auth::check() && Auth::user()->role == 1)
                            <th scope="col">Konfirmo</th>
                        @endif
                        <th scope="col">Lexo më shumë</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productt as $products)
                        <tr>
                            <td>{{ optional(\App\getName($products->user_id))->name ?? 'Null' }}
                            </td>
                            {{-- <td>{{ $products->user_id }}</td> --}}
                            <td>{{ $products->emri }}</td>
                            <td>{{ $products->data_dorezimit }}</td>
                            <td>{{ $products->komenti }}</td>
                            <td>
                                @if ($products->status == 0)
                                    <span style="color: orange;"><i class="fas fa-circle"></i></span>
                                    <p>Ne Shqyrtim</p>
                                @elseif($products->status == 1)
                                    <span style="color: green;"><i class="fas fa-circle"></i></span>
                                    <p>Konfirmo</p>
                                @elseif($products->status == 2)
                                    <span style="color: red;"><i class="fas fa-circle"></i></span>
                                    <p>Refuzuar</p>
                                @elseif($products->status == 3)
                                    <span style="color: green;"><i class="fas fa-circle"></i></span>
                                    <p>Për Prodhim</p>
                                @elseif($products->status == 4)
                                    <span style="color: red;"><i class="fas fa-circle"></i></span>
                                    <p>Oferta Refuzuar</p>
                                @elseif($products->status == 5)
                                    <span style="color: orange;"><i class="fas fa-circle"></i></span>
                                    <p>Në Proces</p>
                                @elseif($products->status == 6)
                                    <span style="color: green;"><i class="fas fa-check"></i></span>
                                    <p>Përfunduar</p>
                                @endif
                            </td>
                            @if (Auth::check() && Auth::user()->role == 1)
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-outline-success me-2"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $products->id }}">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <div class="modal fade" id="staticBackdrop{{ $products->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('cmimi_total', ['id' => $products->id]) }}"
                                                            method="post" class="p-3">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="form-group mb-3">
                                                                <label for="cmimi_total{{ $products->id }}"
                                                                    class="form-check-label">Çmimi Total</label>
                                                                <input type="number" class="form-control"
                                                                    id="cmimi_total{{ $products->id }}" min="0"
                                                                    name="cmimi_total"
                                                                    value="{{ $products->cmimi_total }}">
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="cmimi_ofetuar{{ $products->id }}"
                                                                    class="form-check-label">Çmimi Ofetuar</label>
                                                                <input type="number" class="form-control"
                                                                    id="cmimi_ofetuar{{ $products->id }}"
                                                                    min="0" name="cmimi_ofetuar">
                                                            </div>

                                                            <div class="d-flex justify-content-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Finalizo</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('product_uncheck', ['id' => $products->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" name="uncheck" class="btn btn-outline-danger"><i
                                                    class="fa fa-cancel"></i></button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                            <td><a href="{{ route('oferta', ['id' => $products->id]) }}"><i
                                        class="fas fa-arrow-right"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
                    rel="stylesheet" />
                <style>
                    img {
                        width: 280px;
                    }

                    .select2-container {
                        z-index: 9999;
                        /* Adjust the value as needed */
                    }
                </style>
                <div class="col-md-12">
                    <div class="container">
                        <div class="p-5">
                            <div class="row">
                                <div class="col-lg-12 mb-4 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary addRow"><i
                                            class="fa fa-plus"></i></button>
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
                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Function to initialize Select2 and set focus
                        function initializeSelect2() {
                            $('.js-example-basic-single').select2({
                                dropdownParent: $('#exampleModal2')
                            });

                            setTimeout(function() {
                                $('.select2-container--open .select2-search--dropdown .select2-search__field').first()
                                    .focus();
                            }, 500); // Adjust the timeout as needed
                        }

                        // Initialize Select2 when the modal is opened
                        $('#exampleModal2').on('shown.bs.modal', function() {
                            console.log("Modal shown, initializing Select2");
                            initializeSelect2();
                        });

                        // Event handler for adding a new row
                        $(document).on('click', '.addRow', function() {
                            let rowIndex = $('#dynamic-row-container .row').length;
                            let newRow = `
            <div class="row mb-3">
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
                            initializeSelect2();
                        });

                        // Event handler for removing a row
                        $(document).on('click', '.removeRow', function() {
                            $(this).closest('.row').remove();
                        });

                    });
                </script>
            </div>
        </div>
    </div>
</div>
