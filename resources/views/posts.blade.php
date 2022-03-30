@extends('layouts.main')

@section('container')
  @foreach($berita as $post)
    <article class="mb-5">
      <h2>
        <a href="/post/{{ $post["slug"] }}">{{ $post['title'] }}</a>
      </h2>
      <p>{{ $post["body"] }}</p>
      <hr class="my-4" />
    </article>
    
  @endforeach
@endsection