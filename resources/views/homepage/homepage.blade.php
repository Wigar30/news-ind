@extends('layouts.main')

<!-- Page Header-->
@include('partials.headernew')
@section('container')

    <!-- Search Section-->
    <div class="row mb-3">
        <div class="col-md-6">
            <form action="/news">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Pencarian" name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if($berita->isEmpty())
        <h2 class="text-center">Not Found.</h2>
    @endif

    <!-- Main Content Section-->
    <div class="container">
        <div class="row">
            @foreach($berita as $news)

                <div class="col-md-6">
                    <div class="card" >
                        <img src="https://source.unsplash.com/500x500?{{ $news['title'] }}" class="card-img-top" alt="{{ $news['category'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $news['title'] }}</h5>
                            <p>
                                <small class="text-muted">
                                    {{ $news['tanggal_berita'] }} / <a href="/news/category/{{ $news->category }}">{{ $news['category'] }}</a>
                                </small>
                            </p>
                            <p class="card-text">{!! $news['content'] !!}</p>
                            <a href="/news/{{ $news['id'] }}" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>  

    <!-- Pagination-->
    <div class="d-flex justify-content-center">
        {{ $berita->links() }}
    </div>
@endsection