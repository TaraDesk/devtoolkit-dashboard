<x-layout>
    <x-slot:title>
        Tools | TaraDesk
    </x-slot:title>

    <x-main>
        <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <x-header title="Tool Management" 
                    description="View and control tool information from this dashboard" 
                    target_modal="toolModal"/>

                <x-lists.tools :tools="$tools" :alphabet="$alphabet"/>
            </div>
        </main>

        <x-modals.tools :categories="$categories"/>


        
        {{-- Alert --}}
        @if (session('flash'))
            <x-alerts.flash :flash="session('flash')"/>
        @endif

        @if ($errors->any())
            <x-alerts.error :error="$errors->all()" />
        @endif
    </x-main>
</x-layout>