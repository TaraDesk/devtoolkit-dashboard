<x-layout>
    <x-slot:title>
        Users | TaraDesk
    </x-slot:title>

    <x-main>
        <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <x-header title="User Management" 
                    description="View and control user information from this dashboard" 
                    target_modal="userModal"/>

                <x-lists.users :users="$users" />
            </div>
        </main>

        <x-modals.users />



        {{-- Alert --}}
        @if (session('flash'))
            <x-alerts.flash :flash="session('flash')"/>
        @endif

        @if ($errors->any())
            <x-alerts.error :error="$errors->all()" />
        @endif
    </x-main>
</x-layout>