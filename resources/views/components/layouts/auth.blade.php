<x-layouts.base>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                {{$title}}
            </h2>
        </div>
    
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">

     {{$slot}}

        @isset($crosslink)
        <div class="mt-4 text-center text-sm text-gray-500">
           {{$crosslink}}
        </div> 
        @endisset

      </div>
    </div>
</x-layouts.base>