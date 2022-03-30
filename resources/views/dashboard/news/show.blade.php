@extends('dashboard.layouts.main')

@section('container')
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-8">
        <h2 class="mb-3">{{ $berita->title }}</h2>
          <p>
            {{ $berita->tanggal_berita }} / {{ $berita->category }}
          </p>
        <article class="my-3 fs-5">
          {{ $berita->content }}
        </article>

      </div>
    </div>
  </div>
@endsection