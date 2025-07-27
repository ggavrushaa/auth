<x-layouts.settings>
    <x-title size="sm">
        Двухфакторная аутентификация
        <x-slot:description>
            Подтверждение операций через Google Authenticator
        </x-slot:description>
    </x-title>
    
    @if(Auth::user()->googleConfirmationEnabled())
     @include('user.settings.google.disable')
    @elseif(session('google_confirmation'))
     @include('user.settings.google.confirm')
    @else
     @include('user.settings.google.enable')
    @endif

</x-layouts.settings>