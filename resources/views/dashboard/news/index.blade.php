@extends('dashboard.layouts.main')

@section('container')
  <h1 class="h2 mb-3">All News</h1>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-11" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <div class="table-responsive col-lg-11">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <form action="/dashboard/news">
        <div class="input-group mb-3 ">
          <a href="/dashboard/news/create" class="btn btn-primary mb-3 me-3">Buat Berita Baru</a>
          <div class="col-md-6">
            <input type="text" class="form-control mb-3" placeholder="Pencarian" name="search" value="{{ request('search') }}">
          </div>
            <button class="btn btn-primary mb-3" type="submit">Search</button>
        </div>
      </form>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <a href="/dashboard/news/export" class="btn btn-success mb-3">EXPORT EXCEL</a>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Status</th>
            <th scope="col">User Input</th>
            <th scope="col">User Update</th>
            <th scope="col">Tanggal Update</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($berita as $news)
      
            <tr>
              <td>{{ $news->id }}</td>
              <td>{{ $news->title }}</td>
              <td>{{ $news->category }}</td>
              <td>{{ $news->status }}</td>
              <td>{{ $news->user_input }}</td>
              <td>{{ $news->user_update }}</td>
              <td>{{ $news->tanggal_update }}</td>
              <td>
                <a href="/dashboard/news/{{ $news->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/news/{{ $news->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/news/{{ $news->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf

                  <button class="badge bg-danger border-0" onclick="return confirm('Hapus Berita Ini?')"><span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr>

          @endforeach
        </tbody>
      </table>
    <div class="d-flex justify-content-center">
      {{ $berita->links() }}
    </div>
  </div>
@endsection