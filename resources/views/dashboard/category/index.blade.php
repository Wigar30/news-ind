@extends('dashboard.layouts.main')

@section('container')
  <h1 class="h2">All Category</h1>
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-11" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <div class="table-responsive col-lg-11">
    <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Buat Kategori Baru</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Category</th>
          <th scope="col">Status</th>
          <th scope="col">User Input</th>
          <th scope="col">User Update</th>
          <th scope="col">Tanggal Input</th>
          <th scope="col">Tanggal Update</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
    
          <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->category }}</td>
            <td>{{ $category->status }}</td>
            <td>{{ $category->user_input }}</td>
            <td>{{ $category->user_update }}</td>
            <td>{{ $category->tanggal_input}}</td>
            <td>{{ $category->tanggal_update }}</td>
            <td>
              <a href="/dashboard/categories/{{ $category->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
              <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf

                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Kategori Ini?')"><span data-feather="x-circle"></span></button>
              </form>
            </td>
          </tr>

        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      {{ $categories->links() }}
  </div>
  </div>
@endsection