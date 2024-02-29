@include('includes.header')
<style>
    img {
        width: 180px;
    }
</style>
<div class="container shadow-lg mt-5">
    <div class="d-flex justify-content-end pe-5 pt-5">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Emri"
                                name="emri">
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form action="">
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                    </form>
                </tr>
                @foreach ($product as $products)
                    <tr>
                        <td>{{ $products->user_id }}</td>
                        <td>{{ $products->emri }}</td>
                        <td>{{ $products->data_dorezimit }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('includes.footer')
