<x-layout>
    <x-slot:title>
        User Details | TaraDesk
    </x-slot:title>

    <x-main>
        <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <x-header title="User Details" 
                    description="View and manage user information below" 
                    :need_button="false"/>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 p-6">
                    <div class="flex items-center space-x-4 pb-6 border-b border-gray-200">
                        <img src="http://i.pravatar.cc/300" alt="Avatar of User" class="w-16 h-16 rounded-full object-cover">
                        <div>
                            <p class="font-medium text-lg text-gray-800">{{ $user->name }}</p>
                            <p class="text-sm text-gray-500">Account since {{ $user->created_at->format('F Y') }}</p>
                        </div>
                    </div>
            
                    <!-- Personal Information -->
                    <div class="space-y-4 pt-6 text-gray-700">
                        <div class="flex">
                            <span class="w-32 font-medium">Name:</span>
                            <span>{{ $user->name }}</span>
                        </div>
                        <div class="flex">
                            <span class="w-32 font-medium">Email:</span>
                            <span>{{ $user->email }}</span>
                        </div>
                        <div class="flex">
                            <span class="w-32 font-medium">Authority:</span>
                            <span>{{ Str::title($user->authority) }}</span>
                        </div>
                    </div>
                
                    <div class="mt-8 flex space-x-4">
                        <button class="inline-block px-5 py-2 text-sm font-medium text-blue-600 bg-blue-100 rounded hover:bg-blue-200 transition" id="toggler" data-modal="userModal">
                            Edit User
                        </button>
                    
                        <form action="/admin/users/{{ $user->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-block px-5 py-2 text-sm font-medium text-red-600 bg-red-100 rounded hover:bg-red-200 transition">
                                Delete User
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <x-modals.edit-users :user="$user"/>



        {{-- Alert --}}
        @if (session('flash'))
            <x-alerts.flash :flash="session('flash')"/>
        @endif

        @if ($errors->any())
            <x-alerts.error :error="$errors->all()" />
        @endif
    </x-main>
</x-layout>