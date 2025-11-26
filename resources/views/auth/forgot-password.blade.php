<x-guest-layout>
    <div class="max-w-md mx-auto">
        <div>
            <h2 class="card-title text-2xl font-bold text-base-content mb-2">
                {{ __('Forgot Password?') }}
            </h2>
            
            <p class="text-sm text-base-content/70 mb-6">
                {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>

            @if (session('status'))
                <div class="alert alert-success shadow-lg mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text font-medium">{{ __('Email') }}</span>
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="input input-bordered w-full @error('email') input-error @enderror" 
                           value="{{ old('email') }}"
                           placeholder="{{ __('Enter your email address') }}"
                           required 
                           autofocus />
                    @error('email')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="link link-primary text-sm">
                        {{ __('Back to Login') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>