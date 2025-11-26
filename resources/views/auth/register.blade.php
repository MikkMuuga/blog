@extends('partials.layout')
@section('title', 'Register')
@section('content')
    <div class="card w-96 bg-base-100 shadow-xl mx-auto">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend text-lg font-bold">@lang('Name')</legend>
                    <input type="text" name="name" class="input input-bordered input-lg bg-base-200 hover:input-accent hover:shadow-md transition-all border-2" value="{{ old('name') }}"
                        placeholder="@lang('Name')" required autofocus autocomplete="name" />
                    @error('name')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>
                <!-- Email Address -->

                <fieldset class="fieldset">
                    <legend class="fieldset-legend text-lg font-bold">@lang('Email')</legend>
                    <input type="email" name="email" class="input input-bordered input-lg bg-base-200 hover:input-accent hover:shadow-md transition-all border-2" value="{{ old('email') }}"
                        placeholder="@lang('Email')" required autocomplete="username" />
                    @error('email')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>
                <!-- Password -->

                <fieldset class="fieldset">
                    <legend class="fieldset-legend text-lg font-bold">@lang('Password')</legend>
                    <input type="password" name="password" class="input input-bordered input-lg bg-base-200 hover:input-accent hover:shadow-md transition-all border-2" value="{{ old('password') }}"
                        placeholder="@lang('Password')" required autocomplete="new-password" />
                    @error('password')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>
                <!-- Confirm Password -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend text-lg font-bold">@lang('Confirm Password')</legend>
                    <input type="password" name="password_confirmation" class="input input-bordered input-lg bg-base-200 hover:input-accent hover:shadow-md transition-all border-2" value="{{ old('password') }}"
                        placeholder="@lang('Confirm Password')" required autocomplete="new-password" />
                    @error('password_confirmation')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="flex flex-col items-center gap-4 mt-4">
                    <button class="btn btn-primary w-full text-lg font-bold">
                        {{ __('Register') }}
                    </button>
                    <a class="link link-primary text-center text-md" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection