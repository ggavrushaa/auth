@props(['to' => '#'])

<a href="{{ $to }}" class="text-indigo-600 hover:text-indigo-500">
    {{ $slot }}
</a> 