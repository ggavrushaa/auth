@props(['href' => '#'])

<a href="{{ $href }}" class="text-indigo-600 hover:text-indigo-500">
    {{ $slot }}
</a> 