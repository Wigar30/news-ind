@extends('dashboard.layouts.main')

@section('container')
  <h1 class="h2">Welcome</h1>
  <div class="table-responsive col-lg-11">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Count</th>
      </thead>
      <tbody>
        {{-- @foreach($count as $key) --}}
        <tr>
          <td>{{ $category }}</td>
          <td>{{ $category_count }}</td>
        </tr>
        <tr>
          <td>{{ $berita }}</td>
          <td>{{ $berita_count }}</td>
        </tr>
        {{-- @endforeach --}}
      </tbody>
    </table>
  </div>
@endsection