<x-layout>
    <x-slot:title>
        Tool Details | TaraDesk
    </x-slot:title>

    <x-main>
        <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <x-header title="Tool Details" 
                    description="View and manage tool information below" 
                    :need_button="false"/>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 p-6">
                    <!-- Tool Header -->
                    <div class="flex items-center space-x-5 pb-6 border-b border-gray-200">
                        <img src="{{ substr($tool->icon_url, 0, 4) === 'http' ? $tool->icon_url : '/storage/' . $tool->icon_url }}" alt="{{ $tool->name }} icon" class="w-16 h-16 rounded-lg object-cover shadow-sm">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900">{{ $tool->name }}</h2>
                            <p class="text-sm text-gray-500">Listed since {{ $tool->created_at->format('F Y') }}</p>
                        </div>
                    </div>

                    <!-- Tool Details -->
                    <div class="pt-6 space-y-4 text-gray-700">
                        <div>
                            <h3 class="text-md font-medium text-gray-800">Summary</h3>
                            <p>{{ $tool->summary }}</p>
                        </div>

                        <div>
                            <h3 class="text-md font-medium text-gray-800">Description</h3>
                            <p>{{ $tool->description }}</p>
                        </div>

                        <div>
                            <h3 class="text-md font-medium text-gray-800">Category</h3>
                            <p>{{ $tool->category->name }}</p>
                        </div>

                        <div>
                            <h3 class="text-md font-medium text-gray-800">Link</h3>
                            <a href="{{ $tool->link }}" class="text-blue-600 hover:underline" target="_blank" rel="noopener noreferrer">
                                Go to {{ $tool->name }}
                            </a>
                        </div>

                        <div>
                            <h3 class="text-md font-medium text-gray-800 mb-1">Tags</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($tool->tags as $tag)
                                    <span class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    @can('access-admin')
                        <div class="mt-8 flex space-x-4">
                            <button class="inline-block px-5 py-2 text-sm font-medium text-blue-600 bg-blue-100 rounded hover:bg-blue-200 transition" id="toggler" data-modal="toolModal">
                                Edit Tool
                            </button>
                    
                            <form action="/admin/tools/{{ $tool->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-block px-5 py-2 text-sm font-medium text-red-600 bg-red-100 rounded hover:bg-red-200 transition">
                                    Delete Tool
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
            </div>
        </main>

        <x-modals.edit-tools :tool="$tool" :categories="$categories"/>



        {{-- Alerts --}}
        @if (session('flash'))
            <x-alerts.flash :flash="session('flash')"/>
        @endif

        @if ($errors->any())
            <x-alerts.error :error="$errors->all()" />
        @endif
    </x-main>
</x-layout>