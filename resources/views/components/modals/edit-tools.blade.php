<div id="toolModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-3xl max-h-[90vh] py-4 px-8 relative transition-transform duration-300 scale-95 overflow-y-auto">
        <!-- Modal Header -->
        <div class="bg-white pb-4">
            <div class="flex items-start justify-between gap-4 mb-4">
                <div class="flex flex-col gap-1.5">
                    <h2 class="text-2xl font-bold text-gray-900">Edit Tool</h2>
                    <p class="text-sm text-gray-500">Changes tool details</p>
                </div>
                <button id="closeModal" class="bg-white rounded-full p-2 hover:bg-gray-50 transition-colors duration-200 -mt-1" aria-label="Close">
                    <i data-lucide="x" class="w-5 h-5 text-gray-600"></i>
                </button>
            </div>
        </div>

        <!-- Scrollable Modal Form -->
        <form action="/admin/tools/{{ $tool->id }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
            @csrf
            @method('PATCH')
          
            <!-- Name -->
            <div>
                <label for="name" class="block mb-1 text-gray-700 font-medium">Name</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-1.5 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-400 text-sm" 
                    placeholder="Tool name" value="{{ $tool->name }}" required/>
            </div>
          
            <!-- Category -->
            <div>
                <label for="category_id" class="block mb-1 text-gray-700 font-medium">Category</label>
                <select name="category_id" id="category_id" class="w-full px-3 py-1.5 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-400 text-sm" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $tool->category->id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
          
            <!-- Summary -->
            <div class="sm:col-span-2">
                <label for="summary" class="block mb-1 text-gray-700 font-medium">Summary</label>
                <input type="text" name="summary" id="summary" class="w-full px-3 py-1.5 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-400 text-sm" 
                    placeholder="Brief summary" value="{{ $tool->summary }}" required/>
            </div>
          
            <!-- Description -->
            <div class="sm:col-span-2">
                <label for="description" class="block mb-1 text-gray-700 font-medium">Description</label>
                <textarea name="description" id="description" rows="3" class="w-full px-3 py-1.5 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-400 text-sm" placeholder="Longer description…" required>{{ $tool->description }}</textarea>
            </div>
          
            <!-- Link -->
            <div class="sm:col-span-2">
                <label for="link" class="block mb-1 text-gray-700 font-medium">Link</label>
                <input type="url" name="link" id="link" class="w-full px-3 py-1.5 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-400 text-sm" 
                    placeholder="https://example.com" value="{{ $tool->link }}" required/>
            </div>
            
            <div class="sm:col-span-2">
                <label for="tags" class="block mb-1 text-gray-700 font-medium">Tags</label>
                <input type="text" name="tags" id="tags" class="w-full px-3 py-1.5 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-400 text-sm" 
                    placeholder="web, mobile, api, etc" value="{{ implode(', ', $tool->tags->pluck('name')->toArray()) }}" required/>
            </div>

            <div class="sm:col-span-2" id="icon_url">
                <label for="url" class="block mb-1 text-gray-700 font-medium">Icon URL</label>
                <input type="text" name="url" id="url"  class="w-full px-3 py-1.5 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-indigo-400 text-sm" 
                    placeholder="web, mobile, api, etc" value="{{ $tool->icon_url }}" required/>
            </div>
          
            <!-- Submit Button -->
            <div class="sm:col-span-2 flex justify-center pt-4">
                <button type="submit" class="w-1/2 px-4 py-1.5 bg-indigo-600 text-white rounded hover:bg-indigo-700 focus:outline-none focus:ring-1 focus:ring-indigo-400 text-sm">
                    Changes
                </button>
            </div>
        </form>            
    </div>
</div>