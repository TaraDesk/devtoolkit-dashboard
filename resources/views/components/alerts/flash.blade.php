@props(['flash'])

<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/20" id="flash-alert">
    <div class="bg-white max-w-md w-full px-6 py-10 rounded-lg shadow-lg text-center">
        <div class="mx-auto mb-4 w-16 h-16 flex items-center justify-center {{ $flash['type'] == 'success' ? 'bg-green-100' : 'bg-red-100' }} rounded-full">
            <i data-lucide="{{ $flash['icon'] }}" class="w-8 h-8 {{ $flash['type'] == 'success' ? 'text-green-600' : 'text-red-600' }}"></i>
        </div>
  
        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $flash['title'] }}</h2>
        <p class="text-gray-600">{{ $flash['message'] }}</p>
    </div>
</div>