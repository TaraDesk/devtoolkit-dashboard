<x-layout>
    <x-slot:title>
        Tags | TaraDesk
    </x-slot:title>

    <x-main>
        <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <x-header title="Tag Management" 
                    description="View and control tag information from this dashboard" 
                    :need_button="false"/>

                <x-lists.tags :tags="$tags" :alphabet="$alphabet"/>
            </div>
        </main>
    </x-main>
</x-layout>