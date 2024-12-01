<x-layouts.settings>
    <x-title size="sm">
        Двухфакторная аутентификация
        <x-slot:description>
            Подтверждение операций через Google Authenticator
        </x-slot:description>
    </x-title>
    
    @if(session('google_confirmation'))
     @include('user.settings.google.confirm')
    @else
     @include('user.settings.google.enable')
    @endif

</x-layouts.settings>