<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center gap-2">
                <i data-lucide="wrench" class="w-5 h-5 text-indigo-600"></i>
                Tools
            </h2>
            
            <div class="relative">
                <button id="alphabet-filter-button" class="flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg border border-gray-200 transition-all">
                    <span>Filter</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 transition-transform" id="filter-chevron"></i>
                </button>
              
                <div id="alphabet-dropdown" class="hidden absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 z-10 p-2">
                    <div class="overflow-y-auto max-h-60">
                        <!-- Alphabet Navigation -->
                        <div class="grid grid-cols-5 gap-1.5 text-sm font-medium text-gray-500">
                            @foreach ($alphabet as $letter => $groupedTools)
                                <button data-collection="{{ $letter }}" class="p-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-all duration-200 flex items-center justify-center">
                                    {{ $letter }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-hidden">
        @if (count($tools))
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 p-6 gap-6" id="list-container">
                @foreach ($tools as $tool)
                    <x-cards.tool :tool="$tool"/>
                @endforeach
            </div>
        @else
            <div class="px-6 py-12">
                <div class="flex flex-col items-center justify-center gap-3 text-gray-400">
                    <i data-lucide="wrench" class="w-10 h-10"></i>
                    <p class="text-sm font-medium text-gray-500">No tools found in the system</p>
                    <p class="text-xs text-gray-400">Start by adding new tools</p>
                </div>
            </div>
        @endif
    </div>
</div>