@props(['title', 'description', 'need_button' => true, 'target_modal' => ''])

<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">{{ $title }}</h1>
        <p class="mt-1 text-sm text-gray-500">{{ $description }}</p>
    </div>
    
    @if ($need_button)
        <div class="mt-4 md:mt-0">
            <button class="flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="toggler" data-modal="{{ $target_modal }}">
                <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                Add New
            </button>
        </div>
    @endif
</div>