@extends('layouts.app')

@section('title', 'Show Post')

@section('header')
  <h1>{{ ucfirst($username) }}'s Posts</h1>
@endsection

@section('content')
  <ul>
    @foreach($post_titles as $title)
      <li>{{ $title }}</li>
    @endforeach
  </ul>
@endsection

@section('footer')
  <div class="text-lite text-muted">
    <i class="fa-brands fa-facebook-f fa-2x"></i>
    &nbsp;
    <i class="fa-brands fa-instagram fa-2x"></i>
    &nbsp;
    <i class="fa-brands fa-twitter fa-2x"></i>
  </div>
@endsection
