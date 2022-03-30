@extends('dashboard.layouts.main')

@section('container')
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-8">
        <h2 class="mb-3">{{ $berita->title }}</h2>

        <a href="/dashboard/news" class="btn btn-success mb-3"><span data-feather="arrow-left"></span> Kembali</a>
        <a href="/dashboard/news/{{ $berita->id }}/edit" class="btn btn-warning mb-3"><span data-feather="edit"></span> Ubah</a>
        <form action="/dashboard/news/{{ $berita->id }}" method="post" class="d-inline">
          @method('delete')
          @csrf

          <button class="btn btn-danger mb-3" onclick="return confirm('Hapus Berita Ini?')"><span data-feather="x-circle"></span>Hapus</button>
        </form>

        <img src="https://source.unsplash.com/600x200?{{ $berita->title }}" class="card-img-top" alt="{{ $berita->category }}">
        <article class="my-3 fs-5">
          {!! $berita->content !!}
        </article>

      </div>
    </div>
  </div>
@endsection