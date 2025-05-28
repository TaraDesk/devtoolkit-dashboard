<a href="/admin/categories/{{ $category->id }}" class="block bg-white rounded-xl shadow-md hover:-translate-y-1 hover:shadow-md hover:border-indigo-100 hover:ring-1 hover:ring-indigo-50 transition-all duration-300 p-6 flex flex-col gap-3">
    <div class="flex justify-center">
        <span class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 text-indigo-700 text-2xl font-bold">
            {{ count($category->tools) }}
        </span>
    </div>
    
    <div class="text-center mt-2">
        <p class="text-sm font-medium text-gray-500 tracking-wide uppercase">{{ $category->name }}</p>
    </div>
</a>