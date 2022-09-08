<x-admin.app-layout>
    <x-admin.tab title="Settings">
        <x-admin.success-message></x-admin.success-message>

        <form class="grid gap-6 max-w-md" action="{{ route('admin.change-password') }}" method="POST">
            @csrf
            @method('PATCH')

            <div>
                <h3 class="font-semibold">Change password</h3>
            </div>

            <x-admin.validation-errors></x-admin.validation-errors>

            <div class="space-y-2">
                <x-admin.label for="password" :value="__('Enter your current password')"/>

                <x-admin.input-with-icon-wrapper>
                    <x-slot name="icon">
                        <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5"/>
                    </x-slot>
                    <x-admin.input withicon id="password" class="block w-full" type="password" name="password" required
                                   autocomplete="current-password" placeholder="{{ __('Password') }}"/>
                </x-admin.input-with-icon-wrapper>
            </div>

            <div class="space-y-2">
                <x-admin.label for="password" :value="__('Enter new password')"/>

                <x-admin.input-with-icon-wrapper>
                    <x-slot name="icon">
                        <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5"/>
                    </x-slot>
                    <x-admin.input withicon id="password" class="block w-full" type="password" name="new_password"
                                   required
                                   autocomplete="current-password" placeholder="{{ __('New password') }}"/>
                </x-admin.input-with-icon-wrapper>
            </div>

            <div class="space-y-2">
                <x-admin.label for="password" :value="__('Confirm password')"/>

                <x-admin.input-with-icon-wrapper>
                    <x-slot name="icon">
                        <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5"/>
                    </x-slot>
                    <x-admin.input withicon id="password" class="block w-full" type="password"
                                   name="new_password_confirmation" required
                                   autocomplete="current-password" placeholder="{{ __('New password again') }}"/>
                </x-admin.input-with-icon-wrapper>
            </div>

            <div>
                <x-admin.button class="justify-center w-full gap-2">
                    <span>{{ __('Change password') }}</span>
                </x-admin.button>
            </div>
        </form>
    </x-admin.tab>
</x-admin.app-layout>
