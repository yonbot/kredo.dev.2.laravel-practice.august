@extends('layouts.app')

@section('title', 'User Info')

@section('content')
  <h1>{{ $phone->user->name }}</h1>
  <p class="text-muted">User ID: {{ $phone->user->id }}</p>
  <p>Email: {{ $phone->user->email }}</p>
  <p>Phone: {{ $phone->phone_number }}</p>
@endsection
