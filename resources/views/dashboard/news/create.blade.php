@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buat Berita Baru</h1>
  </div>

  <div class="col-lg-8 mb-5">

    <form method="post" action="/dashboard/news">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" name="category">
          @foreach($categories as $category)
          @if(old('category') == $category->category)
            <option value="{{ $category->category }}" selected>{{ $category->category }}</option>
          @else
          <option value="{{ $category->category }}">{{ $category->category }}</option>
          @endif
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <input id="content" type="hidden" name="content" value="{{ old('content') }}">
        <trix-editor input="content"></trix-editor>
      </div>
      <div class="mb-3">
        <label for="user_input" class="form-label">User Input</label>
        <input type="text" class="form-control @error('user_input') is-invalid @enderror" name="user_input" value="{{ old('user_input') }}">
        @error('user_input')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="user_update" class="form-label">User Update</label>
        <input type="text" class="form-control @error('user_update') is-invalid @enderror" name="user_update" value="{{ old('user_update') }}">
        @error('user_update')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-check form-switch mb-3">
        <input class="form-check-input ms-auto" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="status" {{ old("status") == null ? '' : 'checked' }}>
        <label class="form-check-label ms-3" for="flexSwitchCheckDefault" value="true">Show</label>
      </div>
      
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>

  <script>
    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault()
    })
  </script>
@endsection