@props(['href' => '#'])

<a href="{{ $href }}" {{ $attributes->class(['text-indigo-600 hover:text-indigo-500'],) }}>
    {{ $slot }}
</a> 