<div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
    <dt class="text-sm font-medium leading-6 text-gray-900">
        {{ $name }}
    </dt>

    <dd class="mt-1 flex text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
        
            <div class="flex-grow">
                {{ $value }}
            </div>

            @isset($action)
                <span class="ml-4 flex-shrink-0">
                    {{ $action }}
                </span>
            @endisset
    </dd>
</div>