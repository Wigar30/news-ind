@extends('layouts.main')

@section('container')
  <h2>{{ $berita["title"] }}</h2>
  <p>{{ $berita["body"] }}</p>
@endsection