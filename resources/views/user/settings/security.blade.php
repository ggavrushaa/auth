<div class="security">
    <x-title size="sm">
        Безопасность
        <x-slot:description>
            Настройки безопасности вашего аккаунта.
        </x-slot:description>
    </x-title>
    
    <x-list>
        <x-list.item>
            <x-slot:name>
                Пароль
            </x-slot:name>
            <x-slot:value>
                @if ($user->password_at)
                    Изменено: {{ $user->password_at->translatedFormat('j F Y')}}
                @else
                    Пароль не менялся
                @endif
            </x-slot:value>
            <x-slot:action>
                <x-link href="{{route('user.settings.password.edit')}}">
                    Изменить
                </x-link>
            </x-slot:action>
        </x-list.item>
        <x-list.item>
            <x-slot:name>
                Двухфакторная аутентификация
            </x-slot:name>
            <x-slot:value>
                Выключена
            </x-slot:value>
            <x-slot:action>
                <x-link href="{{route('user.settings.google')}}">
                    Включить
                </x-link>
            </x-slot:action>
        </x-list.item>
    
    </x-list>
</div>