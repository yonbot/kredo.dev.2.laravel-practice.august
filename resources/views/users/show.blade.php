@extends('layouts.app')

@section('title', 'Show User')

@section('content')
  <h1>{{ $user->name }}</h1>
  <p class="text-muted">User ID: {{ $user->id }}</p>
  <p>Email: {{ $user->email }}</p>
  <p>Phone: {{ $user->phone->phone_number }}</p>

  @forelse($user->posts as $post)
    <hr>
    <h2>{{ $post->title }}</h2>
    <p class="lead">{{ $post->content }}</p>
  @empty
    <h3 class="text-muted">This user have not posted anything yet.</h3>
  @endforelse
@endsection
