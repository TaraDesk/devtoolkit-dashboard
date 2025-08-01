<div id="categoryModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-8 relative transition-transform duration-300 scale-95">
        <div class="flex items-start justify-between gap-4 mb-6">
            <!-- Heading Group -->
            <div class="flex flex-col gap-1.5">
                <div class="flex items-center gap-2">
                    <h2 class="text-2xl font-bold text-gray-900">Create Category</h2>
                </div>
                <p class="text-sm text-gray-500">
                    Add new category to organize more tools
                </p>
            </div>
          
            <!-- Close Button -->
            <button id="closeModal" class="bg-white rounded-full p-2 hover:bg-gray-50 transition-colors duration-200 -mt-1" aria-label="Close">
                <i data-lucide="x" class="w-5 h-5 text-gray-600"></i>
            </button>
        </div>
    
        <form action="/admin/categories" method="POST" class="space-y-6">
            @csrf

            <x-forms.group title="Category" name="name" type="text" placeholder="Enter new Category"/>
    
            <div class="flex justify-end gap-3 pt-4">
                <x-forms.button type="submit">Create</x-forms.button>
            </div>
        </form>
    </div>
</div>