@props(['name' => ''])

<label class="form-check flex items-start">
    <input type="checkbox" @checked(old($name)) name="{{$name}}" value="1" {{ $attributes }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 relative top-1">

    <div class="ml-3 block text-sm leading-5 text-gray-900">
        {{ $slot }}

        <x-form.error name="{{$name}}" />
    </div>

</label>