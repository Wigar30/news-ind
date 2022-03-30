@extends('dashboard.layouts.main')

@section('container')
  <h1 class="h2">All News</h1>

  <div class="table-responsive">
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
              <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
              <a href="" class="badge bg-danger"><span data-feather="x-circle"></span></a>
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