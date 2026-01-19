@extends('partials.layout')
@section('title', 'Edit Tag')
@section('content')
    <div class="card bg-base-300 w-1/2 mx-auto">
        <div class="card-body">
            <form action="{{route('tags.update', $tag)}}" method="POST">
                @csrf
                @method('PUT')
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Tag</legend>
                    <input type="text" name="name" class="input w-full" value="{{ old('name', $tag->name) }}" placeholder="Edit tag name"
                        required autofocus/>
                    @error('name')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('tags.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
