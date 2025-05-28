<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center gap-2">
                <i data-lucide="layers" class="w-5 h-5 text-blue-600"></i>
                Categories
            </h2>
            <div class="text-sm text-gray-500">
                <i data-lucide="info" class="w-4 h-4 mr-1 inline-block"></i>
                Total {{ count($categories) }} categories
            </div>
        </div>
    </div>

    <div class="overflow-hidden">
        @if (count($categories))
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 p-6 gap-6">
                @foreach ($categories as $category)
                    <x-cards.category :category="$category" />
                @endforeach
            </div>
        @else
            <div class="px-6 py-12">
                <div class="flex flex-col items-center justify-center gap-3 text-gray-400">
                    <i data-lucide="layers" class="w-10 h-10"></i>
                    <p class="text-sm font-medium text-gray-500">No categories found in the system</p>
                    <p class="text-xs text-gray-400">Start by adding new categories</p>
                </div>
            </div>
        @endif
    </div>
</div>