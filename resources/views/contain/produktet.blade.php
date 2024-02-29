@include('includes.header')
<style>
    img {
        width: 180px;
    }
</style>
<div class="container text-center mt-5">
    <div class="row">
        <div class="col shadow-lg me-4">
            <img src="{{ asset('images/a.jpg') }}" alt="">
        </div>
        <div class="col shadow-lg me-4">
            <img src="{{ asset('images/b.jpg') }}" alt="">
        </div>
        <div class="col shadow-lg me-4">
            <img src="{{ asset('images/c.jpg') }}" alt="">
        </div>
        <div class="col shadow-lg me-4">
            <img src="{{ asset('images/d.avif') }}" alt="">
        </div>
        <div class="col shadow-lg">
            <img src="{{ asset('images/r.avif') }}" alt="">
        </div>
    </div>
</div>
@include('includes.footer')
