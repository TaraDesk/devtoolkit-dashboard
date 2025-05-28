<x-layout>
    <x-slot:title>
        Categories | TaraDesk
    </x-slot:title>

    <x-main>
        <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <x-header title="Category Management" 
                    description="View and control category information from this dashboard" 
                    target_modal="categoryModal"/>

                <x-lists.categories :categories="$categories"/>
            </div>
        </main>

        <x-modals.categories />



        {{-- Alert --}}
        @if (session('flash'))
            <x-alerts.flash :flash="session('flash')"/>
        @endif

        @if ($errors->any())
            <x-alerts.error :error="$errors->all()" />
        @endif
    </x-main>
</x-layout>