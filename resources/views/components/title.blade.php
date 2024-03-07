<div>
    <h3 class="text-base font-semibold leading-7 text-gray-900">
        {{ $slot }}
    </h3>
    @isset($description)
    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">
        {{ $description }}
    </p>
    @endisset
</div>