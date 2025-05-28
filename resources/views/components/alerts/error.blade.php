<div id="alerts" class="fixed top-5 right-5 flex flex-col space-y-4 max-w-xs w-full z-[10]">
    <!-- Error Alert -->
    @foreach ($error as $message)
        <div class="flex items-start bg-red-500/95 text-white px-4 py-3 rounded-lg shadow-lg backdrop-blur-sm border border-red-600/20" role="alert">
            <i data-lucide="alert-triangle" class="w-5 h-5 mt-0.5 mr-3 flex-shrink-0"></i>
            <div class="flex-grow">
                <p class="font-medium">Something went wrong</p>
                <p class="text-sm text-red-100 opacity-90 mt-0.5">{{ $message }}</p>
            </div>
            <button aria-label="Close" class="ml-3 hover:bg-red-600/50 rounded-full p-1 transition" onclick="this.parentElement.remove()">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
    @endforeach
</div>