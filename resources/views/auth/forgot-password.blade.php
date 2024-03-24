<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('
 Заборавена ви е   лозинката? Нема проблем. Само напишете ја вашата е-пошта, и ќе ви испратиме линк за ресетирање на лозинката. Овој линк ќе ви овозможи да изберете нова лозинка.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>