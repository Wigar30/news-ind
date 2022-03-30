@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buat Berita Baru</h1>
  </div>

  <div class="col-lg-8">

    <form method="post" action="/dashboard/news">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">Category</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">Content</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">Status</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">User Input</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">User Update</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
@endsection