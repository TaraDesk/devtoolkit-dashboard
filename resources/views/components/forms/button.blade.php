<button {{ $attributes->merge(['class' => 'w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition duration-200']) }}>
    {{ $slot }}
</button>