<x-layouts.auth>

<x-slot:title>
    Изменение пароля
</x-slot:title>

<x-card>
    <x-card.body>
        <x-form action="{{route('password.update', 123)}}" method="POST">

            <x-form.item>
                <x-form.label>Новый пароль</x-form.label>
                <x-form.text type="password" name="password" autofocus/>
            </x-form.item>

        <x-button type="submit">
            Изменить пароль
        </x-button>
      </x-form>
    </x-card.body>
</x-card>

<x-slot:crosslink>
    <x-link href="{{route('login')}}">
        Войти в аккаунт
    </x-link>
</x-slot:crosslink>

</x-layouts.auth>
