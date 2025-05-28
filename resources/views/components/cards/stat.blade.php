<div class="bg-white rounded-lg shadow p-6">
    <div class="flex items-center">
        <div class="p-3 rounded-full bg-indigo-50">
            <i data-lucide="{{ $stat->icon }}" class="w-6 h-6 text-indigo-600"></i>
        </div>
        <div class="ml-4">
            <p class="text-sm font-medium text-gray-500">{{ $stat->title }}</p>
            <p class="text-2xl font-semibold text-gray-900">{{ $stat->total }}</p>
        </div>
    </div>
    <div class="mt-4">
        <span class="text-sm font-medium text-green-600">+{{ $stat->increase }}%</span>
        <span class="ml-2 text-sm text-gray-500">from last month</span>
    </div>
</div>