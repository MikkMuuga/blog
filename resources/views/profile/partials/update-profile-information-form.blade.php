<section class="bg-base-100 rounded-lg p-6 border border-base-300">
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-base-content">{{ __('Profile Information') }}</h2>
        <p class="mt-2 text-sm text-base-content/70">{{ __("Update your account's profile information and email address.") }}</p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('patch')

        <div class="form-control">
            <label class="label pb-3">
                <span class="label-text text-base font-bold">@lang('Name')</span>
            </label>
            <input type="text" name="name" class="input input-bordered input-lg" value="{{ old('name', $user->name) }}"
                placeholder="@lang('Enter your name')" required autofocus autocomplete="name" />
            @error('name')
                <label class="label pt-2"><span class="label-text-alt text-error">{{ $message }}</span></label>
            @enderror
        </div>

        <div class="form-control">
            <label class="label pb-3">
                <span class="label-text text-base font-bold">@lang('Email')</span>
            </label>
            <input type="email" name="email" class="input input-bordered input-lg" value="{{ old('email', $user->email) }}"
                placeholder="@lang('Enter your email')" required autocomplete="username" />
            @error('email')
                <label class="label pt-2"><span class="label-text-alt text-error">{{ $message }}</span></label>
            @enderror
            
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="alert alert-warning mt-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4v2m0 4v2M7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0z" /></svg>
                    <div class="text-xs">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="link link-accent font-semibold text-xs ml-1">{{ __('Resend link') }}</button>
                    </div>
                </div>
                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mt-2 py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span class="text-xs">{{ __('Verification link sent!') }}</span>
                    </div>
                @endif
            @endif
        </div>

        <div class="flex items-center gap-3 pt-4">
            <button type="submit" class="btn btn-primary btn-md">{{ __('Save Changes') }}</button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-xs text-success font-semibold">✓ {{ __('Saved successfully') }}</p>
            @endif
        </div>
    </form>
</section>
