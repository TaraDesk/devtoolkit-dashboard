<div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm transition-all duration-300 flex flex-col h-full hover:-translate-y-1 hover:shadow-md hover:border-indigo-100 hover:ring-1 hover:ring-indigo-50 items" data-item="{{ substr($tool->name, 0, 1) }}">
    <div class="flex p-5 gap-4">
        <div class="flex-shrink-0 w-12 h-12 rounded-lg overflow-hidden">
            <img src="{{ $tool->icon_url }}" 
                alt="{{ $tool->name }}" 
                class="w-full h-full object-cover">
        </div>

        <div class="flex-grow">
            <span class="inline-block mb-1 text-xs font-medium px-2 py-0.5 rounded-full bg-indigo-100 text-indigo-800 transition-colors duration-300 group-hover:bg-indigo-200">
                {{ $tool->category->name }}
            </span>
            
            <h3 class="text-lg font-semibold text-gray-900 transition-colors duration-300 group-hover:text-indigo-700">
                {{ $tool->name }}
            </h3>
            
            <p class="text-sm text-gray-500 mt-1 transition-colors duration-300 group-hover:text-gray-600">
                {{ $tool->summary }}
            </p>
        </div>
    </div>
    
    <div class="px-5 pb-3">
        <div class="flex flex-wrap gap-2">
            @foreach ($tool->tags as $tag)
                <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-gray-100 text-gray-700 transition-colors duration-300 group-hover:bg-gray-200">{{ $tag->name }}</span>
            @endforeach
        </div>
    </div>
    
    <div class="px-5 pb-5 mt-auto">
        <div class="flex justify-between items-center">
            <a href="/admin/tools/{{ $tool->id }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 flex items-center gap-1 transition-colors duration-300">
                <i data-lucide="eye" class="w-4 h-4"></i>
                View details
            </a>
            
            <a href="{{ $tool->link }}" target="_blank" class="px-3 py-1.5 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 transition-colors duration-300 flex items-center gap-1 shadow-sm hover:shadow-md hover:-translate-y-0.5">
                Open tool
                <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
            </a>
        </div>
    </div>
</div> 