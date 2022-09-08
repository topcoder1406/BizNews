<x-admin.guest-layout>
    <x-admin.auth-card>
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
        @endif

        <div class="flex items-center justify-between mt-4">
            <form method="POST" action="{{ route('admin.verification.send') }}">
                @csrf

                <div>
                    <x-admin.button>
                        {{ __('Resend Verification Email') }}
                    </x-admin.button>
                </div>
            </form>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf

                <button type="submit" class="text-sm text-blue-500 underline hover:text-blue-700">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-admin.auth-card>
</x-admin.guest-layout>
