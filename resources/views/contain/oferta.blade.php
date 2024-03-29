@include('includes.header')
<style>
    .offer-price {
        background-color: #f0f0f0;
        color: #333;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .select2-dropdown {
        z-index: 9999;
    }

    .select2-container--default .select2-selection--single {
        height: calc(2.25rem + 2px);
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 2.25rem;
        padding-left: 12px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: calc(2.25rem + 2px);
    }
</style>
<div class="col-md-10">
    <div class="container shadow-lg mt-5">
        @if (Auth::user()->role == 0)
            <div class="d-flex justify-content-end pe-5 pt-5">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        @endif

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
                        <form action="{{ route('oferta_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="stateSelect" class="form-label">State</label>
                                <select class="js-example-basic custom-select2 form-control" name="emri"
                                    id="stateSelect">
                                    @foreach ($poductt as $poduct)
                                        <option value="{{ $poduct->id }}">
                                            {{ $poduct->id }} / {{ $poduct->emri }} / {{ $poduct->cmimi }}$
                                            {{-- <img src="{{ asset('images/' . $poduct->foto) }}" alt="{{ $poduct->emri }}"
                                                style="width: 14px; height: 14px;"> --}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- 
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Emri</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Emri" name="emri">
                            </div> --}}
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Sasia</label>
                                <input type="number" min=0 class="form-control" id="exampleFormControlInput1"
                                    placeholder="Sasia" name="sasia">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Komenti</label>
                                <textarea class="form-control" id="exampleFormControlInput1" placeholder="Komenti" name="komenti"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Ngarko dokumentin</label>
                                <input type="file" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Ngarko dokumentin" name="file">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Informacion Teknik</label>
                                <textarea class="form-control" id="exampleFormControlInput1" placeholder="Info Teknike" name="info"></textarea>
                            </div>
                            <input type="hidden" name="products_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-primary">Kërko Ofertë</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-5">
            <table class="table" id="table_id">
                <thead>
                    <tr>
                        <th scope="col">Emri</th>
                        <th scope="col">Sasia</th>
                        <th scope="col">Komenti</th>
                        <th scope="col">Dokumentacioni</th>
                        <th scope="col">Informacioni Teknik</th>
                        <th scope="col">Statusi</th>
                        @if (Auth::user()->role == 1)
                            <th scope="col">Konfirmo</th>
                        @endif
                        @if (Auth::user()->role == 1 or $product->status != 0)
                            <th scope="col">Komenti</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($oferta as $ofert)
                        {{-- @if ($ofert->id == $product_id) --}}
                        <tr>
                            <td>{{ $ofert->emri ?? 'Null' }}</td>
                            <td>{{ $ofert->sasia ?? 'Null' }}</td>
                            <td>{{ $ofert->komenti ?? 'Null' }}</td>
                            <td class="text-center">
                                @if ($ofert && $ofert->file)
                                    <a href="{{ asset($ofert->file) }}" download
                                        class="d-flex justify-content-center align-items-center">
                                        @if (Str::endsWith($ofert->file, '.docx'))
                                            <i class="fa fa-file-word text-primary" style="font-size: 30px;"></i>
                                        @elseif(Str::endsWith($ofert->file, '.pdf'))
                                            <i class="fa fa-file-pdf text-danger" style="font-size: 30px;"></i>
                                        @elseif(Str::endsWith($ofert->file, '.xlsx'))
                                            <i class="fa fa-file-excel text-success" style="font-size: 30px;"></i>
                                        @else
                                            <i class="fa fa-file" style="font-size: 30px;"></i>
                                        @endif
                                    </a>
                                @else
                                    Null
                                @endif
                            </td>
                            <td>{{ $ofert->info ?? 'Null' }}</td>
                            <td>
                                @if ($ofert->status == 0)
                                    <span style="color: orange;"><i class="fas fa-circle"></i></span>
                                    <p>Ne Shqyrtim</p>
                                @elseif($ofert->status == 1)
                                    <span style="color: green;"><i class="fas fa-circle"></i></span>
                                    <p>Për tu konfirmuar</p>
                                @elseif($ofert->status == 2)
                                    <span style="color: red;"><i class="fas fa-circle"></i></span>
                                    <p>Refuzuar</p>
                                @elseif($ofert->status == 3)
                                    <span style="color: green;"><i class="fas fa-check"></i></span>
                                    <p>Përfunduar</p>
                                @endif
                            </td>
                            @if (Auth::check() && Auth::user()->role == 1)
                                <td>
                                    <div class="d-flex">
                                        <form action="{{ route('check', ['id' => $ofert->id]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" name="check"
                                                class="btn btn-outline-success me-2"><i
                                                    class="fa fa-check"></i></button>
                                            <input type="hidden" name="products_id" value="{{ $product->id }}">
                                        </form>
                                        <form action="{{ route('uncheck', ['id' => $ofert->id]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" name="uncheck" class="btn btn-outline-danger"><i
                                                    class="fa fa-cancel"></i></button>
                                            <input type="hidden" name="products_id" value="{{ $product->id }}">
                                        </form>
                                    </div>
                                </td>
                            @endif

                            @if (Auth::user()->role == 1)
                                <td>
                                    <form class="form-inline"
                                        action="{{ route('staus_comm', ['id' => $ofert->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <textarea class="form-control" name="status_comm" cols="30" rows="1" style="width: 100%"></textarea>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-outline-success mt-2"><i
                                                        class="fa fa-paper-plane"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            @else
                                @if ($product->status != 0)
                                    @if ($ofert->status_comm == null)
                                        <td></td>
                                    @else
                                        <td>{{ $ofert->status_comm }}</td>
                                    @endif
                                @endif
                            @endif

                        </tr>
                        {{-- @endif --}}
                    @endforeach
                </tbody>
            </table>
            @if ($product->cmimi_ofetuar != 0 && Auth::user()->role == 0)
                @if ($product->staus = 2)
                    <div class="d-flex offer-price align-items-center justify-content-center">
                        <p class="mt-3 me-4 text-danger">Kërkesa juaj është refuzuar!</p>
                    </div>
                @else
                    <div class="d-flex offer-price align-items-center justify-content-center">
                        <p class="mt-3 me-4">Çmimi i ofertuar është: {{ $product->cmimi_ofetuar }} $</p>
                        <form action="{{ route('proces', ['id' => $product->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="check" class="btn btn-outline-success me-2"><i
                                    class="fa fa-check"></i></button>
                        </form>
                        <form action="{{ route('refuzuar', ['id' => $product->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="uncheck" class="btn btn-outline-danger"><i
                                    class="fa fa-times"></i></button>
                        </form>
                    </div>
                @endif

            @endif
        </div>
    </div>
</div>
@include('includes.footer')
