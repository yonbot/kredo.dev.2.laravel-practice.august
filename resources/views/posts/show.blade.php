@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
  <h1>{{ $post->title }}</h1>
  <p class="text-muted">Post ID: {{ $post->id }}</p>
  <p class="text-muted">Owner: {{ $post->user->name }}</p>
  <p class="lead">{{ $post->content }}</p>
@endsection
