@extends('layouts.app')

@section('title', 'All Posts')

@section('header')
    <h1>All Posts</h1>
@endsection

@section('content')
    <ul>
        {{-- 
            @foreach ($post_titles as $title)
            <li>
                {{ $title }}
            </li>
            @endforeach
        --}}

        @forelse($post_titles as $title)
            <li>
                {{ $title }}
            </li>
        @empty
            <li>Empty post titles</li>
        @endforelse

    </ul>
@endsection

@section('footer')
    <p class="small w-100">this is the footer</p>
@endsection
