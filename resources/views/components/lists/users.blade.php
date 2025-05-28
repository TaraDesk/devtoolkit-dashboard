<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
    <!-- Header Section -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center gap-2">
                <i data-lucide="users" class="w-5 h-5 text-blue-600"></i>
                Users
            </h2>
            <div class="text-sm text-gray-500">
                <i data-lucide="info" class="w-4 h-4 mr-1 inline-block"></i>
                Total {{ count($users) }} users
            </div>
        </div>
    </div>

    <!-- Table Container -->
    <div class="overflow-x-auto rounded-b-xl">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50/80 backdrop-blur-sm">
                <tr>
                    <th scope="col" class="px-6 py-3.5 text-left text-sm font-semibold text-gray-700">User</th>
                    <th scope="col" class="px-6 py-3.5 text-left text-sm font-semibold text-gray-700">Email</th>
                    <th scope="col" class="px-6 py-3.5 text-left text-sm font-semibold text-gray-700">Role</th>
                    <th scope="col" class="px-6 py-3.5 text-right text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            
            <tbody class="divide-y divide-gray-200/60">
                @if (count($users))
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-gray-600 text-sm">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $roleColors = [
                                        'admin' => 'bg-red-100 text-red-800',
                                        'staff' => 'bg-green-100 text-green-800'
                                    ];
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-medium {{ $roleColors[strtolower($user->authority)] ?? 'bg-gray-100 text-gray-600' }}">
                                    {{ $user->authority }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="/admin/users/{{ $user->id }}" 
                                       class="p-1.5 hover:bg-gray-100 rounded-md text-gray-400 hover:text-blue-600 transition-colors"
                                       title="View details">
                                        <i data-lucide="eye" class="w-4 h-4"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <div class="inline-flex flex-col items-center justify-center gap-3 text-gray-400">
                                <i data-lucide="users" class="w-10 h-10"></i>
                                <p class="text-sm font-medium text-gray-500">No users found in the system</p>
                                <p class="text-xs text-gray-400">Start by adding new users</p>
                            </div>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>