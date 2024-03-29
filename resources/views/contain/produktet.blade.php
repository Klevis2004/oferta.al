@include('includes.header')
<style>
    img {
        width: 40px;
    }

    .dt-buttons {
        display: none;
    }
</style>
<div class="col-md-10">
    <div class="container shadow-lg mt-5  p-5">
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Shto artikull</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('create_produktet') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Emërtimi</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Emri" name="emri">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Foto</label>
                                <input type="file" min=0 class="form-control" id="exampleFormControlInput1"
                                    placeholder="Foto e artikullit" name="foto">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Cmimi-Fillestar</label>
                                <input type="number" min=0 class="form-control" id="exampleFormControlInput1"
                                    placeholder="Kostoja e artikullit" name="cmimiFillestar">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Cmimi-Përfundimtar</label>
                                <input type="number" min=0 class="form-control" id="exampleFormControlInput1"
                                    placeholder="Cmimi Përfundimtar" name="cmimi">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Përshkrimi</label>
                                <textarea class="form-control" id="exampleFormControlInput1" placeholder="Përshkrimi i artikullit" name="pershkrimi"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ruaj</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 p-3 shadow-md">
            <h2>Lista e produkteve</h2>
            <div class="table-responsive">
                <table class="table" id="table_id">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Emërtimi</th>
                            <th scope="col">Cmimi</th>
                            <th scope="col">Përshkrimi</th>
                            <th scope="col">Shto preferencë</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikuj as $artikull)
                            <tr>
                                <td>
                                    <img src="{{ asset('images/' . $artikull->foto) }}" alt="{{ $artikull->emri }}"
                                        class="thumbnail" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $artikull->id }}">
                                    <div class="modal fade" id="exampleModal{{ $artikull->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img style="width: 100%;"
                                                        src="{{ asset('images/' . $artikull->foto) }}" class="img-fluid"
                                                        alt="{{ $artikull->emri }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $artikull->emri }}</td>
                                <td>${{ $artikull->cmimi }}</td>
                                <td>{{ $artikull->pershkrimi }}</td>
                                <td>
                                    <div class="p-3">
                                        @if (\App\liked($artikull->id) && \App\liked($artikull->id)->wish == 1)
                                            <form action="{{ route('unlike', ['id' => $artikull->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="id" value="">
                                                <button type="submit" class="btn btn-link-danger"><i
                                                        class="fa-solid fa-heart"
                                                        style="color: #ff0000;"></i></button>
                                            </form>
                                        @elseif (\App\liked($artikull->id) && \App\liked($artikull->id)->wish == 2)
                                            <form action="{{ route('like', ['id' => $artikull->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $artikull->id }}">
                                                <button type="submit" class="btn btn-link-danger"><i
                                                        class="fa-regular fa-heart"
                                                        style="color: #ff0000;"></i></button>
                                            </form>
                                        @else
                                            <form action="{{ route('storeWish') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="artikull_id"
                                                    value="{{ $artikull->id }}">
                                                <button type="submit" class="btn btn-link-danger"><i
                                                        class="fa-regular fa-heart"
                                                        style="color: #ff0000;"></i></button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@include('includes.footer')
