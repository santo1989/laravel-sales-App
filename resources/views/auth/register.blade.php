<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="flex flex-col items-center">
                <div
                    class="h-16 w-16 bg-gradient-to-br from-blue-600 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg mb-2">
                    <span class="text-white font-bold text-2xl">SA</span>
                </div>
                <span class="text-2xl font-bold text-gradient mt-2">Sales App</span>
                <p class="text-gray-500 text-sm mt-1">Create your account to get started</p>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Full Name')" class="form-label" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <x-input id="name" class="form-control pl-12" type="text" name="name" :value="old('name')"
                        placeholder="John Doe" required autofocus />
                </div>
            </div>

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email Address')" class="form-label" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                    <x-input id="email" class="form-control pl-12" type="email" name="email" :value="old('email')"
                        placeholder="you@example.com" required />
                </div>
            </div>

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" class="form-label" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <x-input id="password" class="form-control pl-12" type="password" name="password"
                        placeholder="••••••••" required autocomplete="new-password" />
                </div>
            </div>

            <!-- Confirm Password -->
            <div>
                <x-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <x-input id="password_confirmation" class="form-control pl-12" type="password"
                        name="password_confirmation" placeholder="••••••••" required />
                </div>
            </div>

            <div class="space-y-4">
                <x-button class="w-full btn btn-primary justify-center py-4 text-base">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    {{ __('Create Account') }}
                </x-button>

                <div class="text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}"
                        class="font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                        Sign in
                    </a>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
