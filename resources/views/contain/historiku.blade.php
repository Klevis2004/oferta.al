@include('includes.header')
<style>
    .dt-buttons {
        display: none;
    }
</style>

<div class="col-md-10">
    <div class="container shadow-lg mt-5">
        <div class="p-5">
            <table class="table" id="table_id">
                <thead>
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Historiku i porosive</h1>
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
                                    <span style="color: orange;"><i class="fas fa-circle"></i></span>
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
