<x-layout>
    <x-slot:title>
        Tag Details | TaraDesk
    </x-slot:title>

    <x-main>
        <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <x-header title="Tag Details" 
                    description="View all tool related to {{ Str::title($tag->name) }} below" 
                    :need_button="false"/>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 p-6">
                    <!-- Tag Header -->
                    <div class="pb-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800">{{ Str::title($tag->name) }}</h2>
                        <p class="text-sm text-gray-500 mt-1">Total tools related to this tag: {{ count($tag->tools) }}</p>
                    </div>

                    <!-- Tool List -->
                    <div class="pt-6 space-y-5">
                        @foreach ($tag->tools as $tool)
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
    </x-main>
</x-layout>