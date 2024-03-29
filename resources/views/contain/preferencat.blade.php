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
        <div class="container mt-5 p-3 shadow-md">
            <h2>Të përzgjedhurat</h2>
            <div class="table-responsive">
                <table class="table" id="table_id">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Emërtimi</th>
                            <th scope="col">Cmimi</th>
                            <th scope="col">Përshkrimi</th>
                            <th scope="col">Hiq preferencën</th>
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
                                    <form action="{{ route('unlike', $artikull->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-link-danger">
                                            <i class="fa-solid fa-heart" style="color: #ff0000;"></i>
                                        </button>
                                    </form>
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
