@extends('dashboard.layouts.main')

@section('container')
  <h1 class="h2">All News</h1>

  <div class="table-responsive col-lg-11">
    <a href="/dashboard/news/create" class="btn btn-primary mb-3">Buat Berita Baru</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Title</th>
          {{-- <th scope="col">Content</th> --}}
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
            {{-- <td>{{ $news->content }}</td> --}}
            <td>{{ $news->status }}</td>
            <td>{{ $news->user_input }}</td>
            <td>{{ $news->user_update }}</td>
            <td>{{ $news->tanggal_update }}</td>
            <td>
              <a href="/dashboard/news/{{ $news->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
              <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
              <a href="" class="badge bg-danger"><span data-feather="x-circle"></span></a>
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