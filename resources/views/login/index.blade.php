@extends('layouts.main')

<!-- Page Header-->
@include('partials.headernew')
@section('container')

  <div class="row justify-content-center">
    <div class="col-md-4">
      @if(session()->has('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('failed') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <main class="form-signin">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <form action="/login" method="POST">
          @csrf
          <div class="form-floating">
            <input type="username" name="email" class="form-control" @error('email') is-invalid @enderror id="email" placeholder="name@example.com" required>
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
          </div>

          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
      </main>
    </div> 
  </div>

@endsection