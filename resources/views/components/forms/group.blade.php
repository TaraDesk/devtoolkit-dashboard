@props(['title', 'name', 'type', 'placeholder' => '', 'value' => ''])

@if ($type == 'checkbox')
    <div class="mb-6 flex items-center gap-3">
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" class="h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"/>
        <label for="{{ $name }}" class="text-gray-700 font-medium cursor-pointer">{{ $title }}</label>
    </div>
@else
    <div class="mb-6">
        <label class="block mb-2 text-gray-700 font-semibold" for="{{ $name }}">{{ $title }}</label>
        <x-forms.input name="{{ $name }}" id="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}" value="{{ $value }}" required/>
    </div>
@endif