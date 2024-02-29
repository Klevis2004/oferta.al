@include('includes.header')
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
                    <form action="{{ route('oferta_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Emri</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Emri"
                                name="emri">
                        </div>
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
                    </tr>
                    {{-- @endif --}}
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('includes.footer')
