<x-layout>
    <x-slot:title>
        Home | TaraDesk
    </x-slot:title>

    <x-main>
        <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <!-- Page header -->
                <x-header title="Dashboard" description="Welcome back, Admin! Here's what's happening today." :need_button="false"/>
                
                <!-- Stats cards -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-6">
                    @foreach ($stats as $stat)
                        <x-cards.stat :stat="$stat"/>
                    @endforeach
                </div>
            </div>
        </main>



        {{-- Alert --}}
        @if (session('flash'))
            <x-alerts.flash :flash="session('flash')"/>
        @endif
    </x-main>
</x-layout>