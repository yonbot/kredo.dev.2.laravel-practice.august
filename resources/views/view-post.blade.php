@extends('layouts.app')

@section('title', 'View Post')

@section('header')
    <h1>User Post</h1>
@endsection

@section('content')
    @if ($post_number > 10)
        <h3 class="text-secondary">Post ID: {{ $post_number }}</h3>
    @elseif($post_number < 10)
        <h3 class="text-primary">Post ID: {{ $post_number }}</h3>
    @else
        <h3 class="text-success">Post ID: {{ $post_number }}</h3>
    @endif

    <p>This is the post of {{ $UName }}</p>

    <ul class="list-group w-25">
        @while ($post_number > 0)
            <li class="list-group-item">
                while loop: {{ $post_number-- }}
            </li>
        @endwhile
    </ul>
    <ul class="list-group w-25">
        @for ($i = 0; $i < 5; $i++)
            <li class="list-group-item">
                for loop: {{ $i }}
            </li>
        @endfor
    </ul>





@endsection

@section('footer')
    <p class="small text-secondary">
        footer
    </p>
@endsection
