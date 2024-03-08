@props([
    'name' => '',
    'value' => '',
    'options' => [],
])

<div>
    <select name="{{ $name }}" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
        <option value="">Выбрать</option>
        @foreach ($options as $key => $text)
            <option value="{{ $key }}" @selected($key === old($name, $value))>
                {{ $text }}
            </option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}" />
</div>