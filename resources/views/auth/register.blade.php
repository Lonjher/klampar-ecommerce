<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- <div>
            <x-input-label for="role" :value="__('Role')" />
            <x-text-input id="role" class="block w-full mt-1" type="text" name="role" required autofocus
                autocomplete="admin" />
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div> --}}

        <!-- WA Number -->
        <div>
            <x-input-label for="wa_number" :value="__('Wa Number')" />
            <x-text-input id="wa_number" class="block w-full mt-1" type="text" name="wa_number" required />
            <x-input-error :messages="$errors->get('wa_number')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="isAdmin" :value="__('is Admin')" />
            <x-text-input id="isAdmin" class="block w-full mt-1" type="number" name="isAdmin" required />
            <x-input-error :messages="$errors->get('isAdmin')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
