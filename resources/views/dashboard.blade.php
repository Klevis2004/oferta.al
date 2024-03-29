@include('includes.header')

<div class="col-md-10">
    <div class="container shadow-lg mt-5">
        <div class="d-flex justify-content-end pe-5 pt-5">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-plus"></i>
            </button>
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
                        <th scope="col">Emri</th>
                        <th scope="col">Data Dorëzimit</th>
                        <th scope="col">Komenti</th>
                        <th scope="col">Statusi</th>
                        <th scope="col">Lexo më shumë</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $products)
                        <tr>
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
                                    <span style="color: orange;"><i class="fas fa-check"></i></span>
                                    <p>Në Proces</p>
                                @elseif($products->status == 6)
                                    <span style="color: green;"><i class="fas fa-check"></i></span>
                                    <p>Përfunduar</p>
                                @endif
                            </td>

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
</div>
</div>
@include('includes.footer')
