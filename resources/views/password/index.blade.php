<x-layouts.auth>

<x-slot:title>
    Восстановление пароля
</x-slot:title>

<x-card>
    <x-card.body>
        <x-form action="{{route('password.store')}}" method="POST">

            <x-form.item>
                <x-form.label>Ваш Email</x-form.label>
                <x-form.text name="email" placeholder="mail@axample.com" autofocus/>
            </x-form.item>

        <x-button type="submit">
            Продолжить
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
