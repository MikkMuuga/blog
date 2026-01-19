@extends('partials.layout')
@section('title', $tag->name)
@section('content')
<div class="mb-4">
    <h1 class="text-3xl font-bold mb-4">{{ $tag->name }}</h1>
</div>

<h2 class="text-2xl font-bold mb-4">Posts ({{ $tag->posts_count }})</h2>

@if($posts->count() > 0)
    {{ $posts->links() }}
    <div class="grid grid-cols-4 gap-2">
        @foreach ($posts as $post)
            @include('partials.post-card')
        @endforeach
    </div>
    {{ $posts->links() }}
@else
    <p class="text-base-content/50">None found</p>
@endif

@endsection
