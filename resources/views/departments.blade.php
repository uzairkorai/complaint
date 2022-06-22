<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div>
                <img src="https://ec.com.pk/assets/img/logo.svg" class="block h-10 w-auto fill-current" alt="">
            </div>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/departments">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            {{-- Role type --}}
            <div class="mt-4">
                <x-label for="role_id" value="{{ __('Register as:') }}" />
                <select name="role_id"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    {{-- <option value="writer">Writer</option> --}}
                    <option value="csr">CSR</option>
                    <option value="incubator">incubator</option>
                    <option value="bootcamp">Bootcamp</option>
                    {{-- <option value="admin">Admin</option> --}}
                    {{-- <option value="elite">Elite</option>
                    <option value="vbc">VBC</option>
                    <option value="meetups">Meetups</option>
                    <option value="teachers">teachers</option>
                    <option value="services">Services</option>
                    <option value="digitalmarketing">Digital Marketing</option> --}}

                </select>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
