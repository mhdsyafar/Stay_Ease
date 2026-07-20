<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-900">
        <div class="w-full max-w-md bg-gray-800 p-6 rounded-lg shadow-md">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-700 text-gray-100 border-gray-600 focus:border-teal-500 focus:ring-teal-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" value="Kata Sandi" />
                    <x-text-input id="password" class="block mt-1 w-full bg-gray-700 text-gray-100 border-gray-600 focus:border-teal-500 focus:ring-teal-500" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-600 text-teal-600 shadow-sm focus:ring-teal-500" name="remember">
                        <span class="ml-2 text-sm text-gray-300">Ingat Saya</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-400 hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500" href="{{ route('password.request') }}">
                            Lupa kata sandi?
                        </a>
                    @endif

                    <x-primary-button class="ml-3 bg-teal-600 hover:bg-teal-700 focus:ring-teal-500">
                        Masuk
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
