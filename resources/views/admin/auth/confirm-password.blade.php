<x-admin.guest-layout>
    <x-admin.auth-card>
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-admin.validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.password.confirm') }}">
            @csrf

            <div class="grid gap-6">
                <!-- Password -->
                <div class="space-y-2">
                    <x-admin.label for="password" :value="__('Password')" />

                    <x-admin.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-admin.input withicon id="password" class="block w-full mt-1" type="password" name="password"
                            required autocomplete="current-password" placeholder="{{ __('Password') }}" />
                    </x-admin.input-with-icon-wrapper>
                </div>

                <div>
                    <x-admin.button class="justify-center w-full">
                        {{ __('Confirm') }}
                    </x-admin.button>
                </div>
            </div>
        </form>
    </x-admin.auth-card>
</x-admin.guest-layout>
