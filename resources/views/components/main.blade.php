<div class="w-screen overflow-x-hidden bg-gray-50 font-sans">
    <!-- Mobile overlay (hidden by default) -->
    <div id="overlay" class="overlay closed fixed inset-0 bg-black z-20"></div>

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden relative">
            
            {{-- Top Navigation --}}
            <header class="flex items-center justify-between h-16 px-4 border-b border-gray-200 bg-white">
                <div class="flex items-center">
                    <button id="mobile-menu-button" class="p-2 text-gray-500 rounded-lg md:hidden hover:text-gray-600 hover:bg-gray-100">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- User dropdown -->
                    <div class="relative">
                        <button id="user-menu-button" class="flex items-center space-x-2 focus:outline-none">
                            <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center">
                                <i data-lucide="user" class="w-4 h-4 text-indigo-600"></i>
                            </div>
                            <span class="hidden md:inline-block text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                            <i data-lucide="chevron-down" class="hidden md:inline-block w-4 h-4 text-gray-500"></i>
                        </button>
                        
                        <!-- Dropdown menu -->
                        <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10 border border-gray-200">
                            <a href="/admin/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i data-lucide="user" class="inline-block w-4 h-4 mr-2"></i>
                                Profile
                            </a>
            
                            <form action="/admin" method="post" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                @csrf
            
                                <button type="submit" class="cursor-pointer block w-full text-start">
                                    <i data-lucide="log-out" class="inline-block w-4 h-4 mr-2"></i>
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Content --}}
            {{ $slot }}

        </div>
    </div>
</div>

<script>
    // Modal Toggle
    const openButton = document.getElementById('toggler');

    if (openButton) {
        const modalId = openButton.dataset.modal;
        const modal = document.getElementById(modalId);
        const closeButton = document.getElementById('closeModal');

        openButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });

        closeButton.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        });
    }


    // Flash Message Modal
    const flashModal = document.getElementById('flash-alert');

    if (flashModal) {
        flashModal.addEventListener('click', (e) => {
            if (e.target === flashModal) {
                flashModal.classList.add('hidden');
                flashModal.classList.remove('flex');
            }
        });
    }

    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileDrawer = document.getElementById('mobile-drawer');
    const overlay = document.getElementById('overlay');
    
    mobileMenuButton.addEventListener('click', () => {
        mobileDrawer.classList.toggle('closed');
        mobileDrawer.classList.toggle('open');
        overlay.classList.toggle('closed');
        overlay.classList.toggle('open');
    });
    
    overlay.addEventListener('click', () => {
        mobileDrawer.classList.add('closed');
        mobileDrawer.classList.remove('open');
        overlay.classList.add('closed');
        overlay.classList.remove('open');
    });
    
    // User dropdown toggle
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');
    
    userMenuButton.addEventListener('click', () => {
        userMenu.classList.toggle('hidden');
    });
    
    document.addEventListener('click', (event) => {
        if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
            userMenu.classList.add('hidden');
        }
    });


    // Filter Button
    const filterButton = document.getElementById('alphabet-filter-button');

    if (filterButton) {
        const dropdown = document.getElementById('alphabet-dropdown');
        const chevron = document.getElementById('filter-chevron');
        
        filterButton.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
            chevron.classList.toggle('rotate-180');
        });

        const alphabetBtns = dropdown.querySelectorAll('button[data-collection]');
        const itemsContainer = document.getElementById('list-container');
        const listItems = document.querySelectorAll('.items');

        alphabetBtns.forEach((btn) => {
            btn.addEventListener('click', () => {
                const collection = btn.dataset.collection;
                itemsContainer.innerHTML = "";
                
                const filteredItems = Array.from(listItems).filter((item) => {
                    return item.dataset.item === collection;
                });

                filteredItems.forEach(item => {
                    itemsContainer.appendChild(item.cloneNode(true));
                });

                alphabetBtns.forEach((menu) => {
                    menu.classList.remove('bg-indigo-100', 'text-indigo-700', 'font-semibold');
                });

                btn.classList.add('bg-indigo-100', 'text-indigo-700', 'font-semibold');
            })    
        });
    }    
</script>