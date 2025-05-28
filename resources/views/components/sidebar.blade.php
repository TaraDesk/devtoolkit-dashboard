<!-- Desktop -->
<aside class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 border-r border-gray-200 bg-white">
        <!-- Logo -->
        <div class="flex items-center h-16 px-4 border-b border-gray-200">
            <img class="w-8 h-8" src="{{ asset('logo.png') }}" alt="Tiger Icon" />
            <span class="ml-2 text-xl font-semibold text-gray-800">Dashboard</span>
        </div>
        
        <!-- Navigation -->
        <nav class="flex-1 px-4 py-4 overflow-y-auto">
            <div class="space-y-4">
                <!-- General Section -->
                <div>
                    <h4 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">General</h4>
                    <ul class="space-y-2 mt-2">
                        <li>
                            <a href="/admin" class="flex items-center px-4 py-2 text-sm font-medium {{ request()->is('admin') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600' }} hover:text-indigo-600 hover:bg-indigo-50 rounded-lg">
                                <i data-lucide="home" class="w-5 h-5"></i>
                                <span class="ml-3">Home</span>
                            </a>
                        </li>
                    </ul>
                </div>
            
                <!-- Tools Section -->
                <div>
                    <h4 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tools</h4>
                    <ul class="space-y-2 mt-2">
                        <li>
                            <a href="/admin/tools" class="flex items-center px-4 py-2 text-sm font-medium {{ request()->is('admin/tools') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600' }} hover:text-indigo-600 hover:bg-indigo-50 rounded-lg">
                                <i data-lucide="wrench" class="w-5 h-5"></i>
                                <span class="ml-3">Apps</span>
                            </a>
                        </li>
                    </ul>
                </div>
            
                <!-- Content Management -->
                <div>
                    <h4 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Management</h4>
                    <ul class="space-y-2 mt-2">
                        <li>
                            <a href="/admin/categories" class="flex items-center px-4 py-2 text-sm font-medium {{ request()->is('admin/categories') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600' }} hover:text-indigo-600 hover:bg-indigo-50 rounded-lg">
                                <i data-lucide="layers" class="w-5 h-5"></i>
                                <span class="ml-3">Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/tags" class="flex items-center px-4 py-2 text-sm font-medium {{ request()->is('admin/tags') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600' }} hover:text-indigo-600 hover:bg-indigo-50 rounded-lg">
                                <i data-lucide="tags" class="w-5 h-5"></i>
                                <span class="ml-3">Tags</span>
                            </a>
                        </li>
                    </ul>
                </div>
            
                <!-- Access Section -->
                @can('access-admin')
                <div>
                    <h4 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Access</h4>
                    <ul class="space-y-2 mt-2">
                        <li>
                            <a href="/admin/users" class="flex items-center px-4 py-2 text-sm font-medium {{ request()->is('admin/users') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600' }} hover:text-indigo-600 hover:bg-indigo-50rounded-lg">
                                <i data-lucide="user" class="w-5 h-5"></i>
                                <span class="ml-3">Users</span>
                            </a>
                        </li>
                    </ul>
                </div>
                @endcan
                
            </div>            
        </nav>

        <div class="mt-auto px-4 py-4 border-t border-gray-200">
            <div class="flex items-center space-x-2 text-sm text-gray-500">
                <span>Made by <span class="font-medium text-gray-700">TaraDesk</span></span>
            </div>
        </div>
    </div>
</aside>

<!-- Mobile -->
<aside id="mobile-drawer" class="drawer closed fixed inset-y-0 left-0 z-30 w-64 bg-white border-r border-gray-200 md:hidden">
    <div class="flex flex-col h-full">
        <!-- Logo -->
        <div class="flex items-center h-16 px-4 border-b border-gray-200">
            <img class="w-8 h-8" src="{{ asset('logo.png') }}" alt="Tiger Icon" />
            <span class="ml-2 text-xl font-semibold text-gray-800">Dashboard</span>
        </div>
        
        <!-- Navigation -->
        <nav class="flex-1 px-4 py-4 overflow-y-auto">
            <div class="space-y-4">
                <!-- General -->
                <div>
                    <h4 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">General</h4>
                    <ul class="space-y-2 mt-2">
                        <li>
                            <a href="/admin" class="flex items-center p-3 text-sm font-medium {{ request()->is('admin') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600' }} hover:text-indigo-600 hover:bg-indigo-50 rounded-lg">
                                <i data-lucide="home" class="w-5 h-5"></i>
                                <span class="ml-3">Home</span>
                            </a>
                        </li>
                    </ul>
                </div>
            
                <!-- Tools -->
                <div>
                    <h4 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tools</h4>
                    <ul class="space-y-2 mt-2">
                        <li>
                            <a href="/admin/tools" class="flex items-center p-3 text-sm font-medium {{ request()->is('admin/tools') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600' }} hover:text-indigo-600 hover:bg-indigo-50 rounded-lg">
                                <i data-lucide="wrench" class="w-5 h-5"></i>
                                <span class="ml-3">Apps</span>
                            </a>
                        </li>
                    </ul>
                </div>
            
                <!-- Content Management -->
                <div>
                    <h4 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Content Management</h4>
                    <ul class="space-y-2 mt-2">
                        <li>
                            <a href="/admin/categories" class="flex items-center p-3 text-sm font-medium {{ request()->is('admin/categories') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600' }} hover:text-indigo-600 hover:bg-indigo-50 rounded-lg">
                                <i data-lucide="layers" class="w-5 h-5"></i>
                                <span class="ml-3">Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/tags" class="flex items-center p-3 text-sm font-medium {{ request()->is('admin/tags') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600' }} hover:text-indigo-600 hover:bg-indigo-50 rounded-lg">
                                <i data-lucide="tags" class="w-5 h-5"></i>
                                <span class="ml-3">Tags</span>
                            </a>
                        </li>
                    </ul>
                </div>
            
                <!-- Access -->
                @can('access-admin')
                <div>
                    <h4 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Access</h4>
                    <ul class="space-y-2 mt-2">
                        <li>
                            <a href="/admin/users" class="flex items-center p-3 text-sm font-medium {{ request()->is('admin/users') ? 'text-indigo-600 bg-indigo-50' : 'text-gray-600' }} hover:text-indigo-600 hover:bg-indigo-50 rounded-lg">
                                <i data-lucide="user" class="w-5 h-5"></i>
                                <span class="ml-3">Users</span>
                            </a>
                        </li>
                    </ul>
                </div>
                @endcan
                
            </div>           
        </nav>

        <div class="mt-auto px-4 py-4 border-t border-gray-200">
            <div class="flex items-center space-x-2 text-sm text-gray-500">
                <span>Made by <span class="font-medium text-gray-700">TaraDesk</span></span>
            </div>
        </div>
    </div>
</aside>