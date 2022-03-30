@extends('dashboard.layouts.main')

@section('container')
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-8">
        <h2 class="mb-3">{{ $category->category }}</h2>

        <a href="/dashboard/categories" class="btn btn-success mb-3"><span data-feather="arrow-left"></span> Kembali</a>
        <a href="/dashboard/categories/{{ $category->id }}/edit" class="btn btn-warning mb-3"><span data-feather="edit"></span> Ubah</a>
        <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
          @method('delete')
          @csrf

          <button class="btn btn-danger mb-3" onclick="return confirm('Hapus Kategori Ini?')"><span data-feather="x-circle"></span>Hapus</button>
        </form>

      </div>
    </div>
  </div>
@endsection