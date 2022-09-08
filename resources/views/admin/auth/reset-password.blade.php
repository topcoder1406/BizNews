<x-admin.guest-layout>
    <x-admin.auth-card>
        <!-- Validation Errors -->
        <x-admin.validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('admin.token') }}">

            <!-- Email Address -->
            <div>
                <x-admin.label for="email" :value="__('Email')" />

                <x-admin.input id="email" class="block w-full mt-1" type="email" name="email"
                    :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-admin.label for="password" :value="__('Password')" />

                <x-admin.input id="password" class="block w-full mt-1" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-admin.label for="password_confirmation" :value="__('Confirm Password')" />

                <x-admin.input id="password_confirmation" class="block w-full mt-1" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-admin.button>
                    {{ __('Reset Password') }}
                </x-admin.button>
            </div>
        </form>
    </x-admin.auth-card>
</x-admin.guest-layout>
