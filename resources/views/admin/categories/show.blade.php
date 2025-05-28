<x-layout>
    <x-slot:title>
        Category Details | TaraDesk
    </x-slot:title>

    <x-main>
        <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <x-header title="Category Details" 
                    description="View all tool related to {{ Str::title($category->name) }} below" 
                    :need_button="false"/>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 p-6">
                    <div class="pb-6 border-b border-gray-200 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">{{ Str::title($category->name) }}</h2>
                            <p class="text-sm text-gray-500 mt-1">Total tools related to this category: {{ count($category->tools) }}</p>
                        </div>

                        @can('access-admin')
                            <div class="flex space-x-4">
                                <button class="inline-block px-5 py-2 text-sm font-medium text-blue-600 bg-blue-100 rounded hover:bg-blue-200 transition" id="toggler" data-modal="categoryModal">
                                    Edit Category
                                </a>
                            </div>
                        @endcan
                    </div>

                    <!-- Tool List -->
                    <div class="pt-6 space-y-5">
                        @foreach ($category->tools as $tool)
                            <div class="flex items-start space-x-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                <!-- Tool Icon -->
                                <img src="{{ substr($tool->icon_url, 0, 4) === 'http' ? $tool->icon_url : '/storage/' . $tool->icon_url }}" alt="{{ $tool->name }} logo" class="w-12 h-12 rounded-md object-cover flex-shrink-0">

                                <!-- Tool Info -->
                                <div class="flex-1">
                                    <h3 class="text-md font-medium text-gray-800">{{ $tool->name }}</h3>
                                    <p class="text-sm text-gray-600 mt-1">{{ $tool->summary }}</p>
                                    <a href="{{ $tool->link }}" target="_blank" rel="noopener noreferrer" class="inline-block mt-2 text-sm text-blue-600 hover:underline">
                                        Visit tool →
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>

        <x-modals.edit-categories :category="$category" />



        {{-- Alert --}}
        @if (session('flash'))
            <x-alerts.flash :flash="session('flash')"/>
        @endif

        @if ($errors->any())
            <x-alerts.error :error="$errors->all()" />
        @endif
    </x-main>
</x-layout>