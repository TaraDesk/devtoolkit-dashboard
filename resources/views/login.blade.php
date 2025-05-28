<x-layout>
    <x-slot:title>
        Admin Login | TaraDesk
    </x-slot:title>

    <div class="flex w-screen h-screen items-center justify-center bg-gray-200">
        <div class="w-full max-w-sm bg-white shadow-lg rounded-lg p-8">
            <header class="text-center mb-6">
                <img class="w-20 mx-auto mb-4" src="{{ asset('logo.png') }}" alt="Tiger Icon" />
                <h1 class="text-2xl font-bold text-indigo-700">Welcome Back!</h1>
                <p class="text-sm text-gray-500 mt-1">Please login to your account</p>
            </header>
            <form method="POST" action="/">
                @csrf

                <x-forms.group title="Email" name="email" type="email" placeholder="Enter your email"/>
                <x-forms.group title="Password" name="password" type="password" placeholder="Enter your password"/>
                
                <x-forms.button type="submit">Login</x-forms.button>
            </form>
        </div>
    </div>

    @if ($errors->any())
        <x-alerts.error :error="$errors->all()" />
    @endif
</x-layout>