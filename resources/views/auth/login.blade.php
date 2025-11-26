@extends('partials.layout')
@section('title', 'Login')
@section('content')
    @if (session('status'))
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif
    <div class="card w-96 bg-base-100 shadow-xl mx-auto">
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Email')</legend>
                    <input type="email" name="email" class="input input-bordered hover:input-accent hover:shadow-md transition-all" value="{{ old('email') }}"
                        placeholder="@lang('Email')" required autofocus autocomplete="username" />
                    @error('email')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>
                <!-- Password -->
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input type="password" name="password" class="input input-bordered hover:input-accent hover:shadow-md transition-all" value="{{ old('password') }}"
                        placeholder="@lang('Password')" required autocomplete="current-password" />
                    @error('password')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>

                <!-- Remember Me -->

                <fieldset class="fieldset w-64 p-4">
                    <label class="label text-base">
                        <input name="remember" type="checkbox" class="checkbox checkbox-lg" />
                        <span class="text-base">@lang('Remember me')</span>
                    </label>
                </fieldset>

                <div class="flex flex-col items-center gap-4 mt-4">
                    <button class="btn btn-primary w-full">
                        {{ __('Log in') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="link link-primary text-center text-sm" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
