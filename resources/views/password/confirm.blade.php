<x-layouts.auth>

<x-slot:title>
    Подтверждение
</x-slot:title>

<x-card>
    <x-card.body>
        Перейдите по ссылке из письма, отправленного на Ваш email для восстановления пароля.
    </x-card.body>
</x-card>

    <x-slot:crosslink>
        <x-link href="{{route('login')}}">
            Войти в аккаунт
        </x-link>
    </x-slot:crosslink>
</x-layouts.auth>
