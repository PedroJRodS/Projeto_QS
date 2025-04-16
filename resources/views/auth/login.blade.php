<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="dark:text-amber-400 my-2 dark:font-bold text-2xl mb-6 text-center">- Login -</div>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input value="12345678" id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="current-password" />

            @if (Route::has('password.request'))
            <a class="transition-all duration-200 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-amber-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white dark:focus:ring-offset-gray-800"
                href="{{ route('password.request') }}">
                {{ __('Esqueceu sua senha?') }}
            </a>
            @endif
            <x-input-error :messages="$errors->get('password')" />
        </div>
        <div class="flex items-end justify-between mt-6">
            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-amber-400 shadow-sm focus:ring-white dark:focus:ring-white dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-white">{{ __('Manter conectado') }}</span>
                </label>
            </div>
            <x-primary-button class="ms-3">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
        <hr class="hr mt-4 border-gray-400 border-1">
        <div class="mt-3 text-white font-medium">Ou continue com:</div>
        <div class="flex justify-center items-center gap-6 mt-5 mb-4">
            <a href="./"><img class="rounded-full w-12 h-12" src="{{ asset('images/googleSL.avif') }}"
                    alt="google social link"></a>
            <a href="./"><img class="rounded-full w-12 h-12" src="{{ asset('images/facebookSL.png') }}"
                    alt="facebook social link"></a>
            <a href="./"><img class="rounded-full w-12 h-12" src="{{ asset('images/appleSL.jpg') }}"
                    alt="apple social link"></a>
        </div>
    </form>
</x-guest-layout>