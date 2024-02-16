<x-layouts.auth>

<x-slot:title>
    Вход в аккаунт
</x-slot:title>

<x-card>
    <x-card.body>
        <x-form action="{{route('login.store')}}" method="POST">

            <x-form.item>
                <x-form.label>Ваш Email</x-form.label>
                <x-form.text name="email" placeholder="mail@axample.com" />
            </x-form.item>
            
            <x-form.item>
                <x-form.label>Ваш пароль</x-form.label>
                <x-form.text type="password" name="password" placeholder="********" />
            </x-form.item>

            <x-form.item>
                <x-form.check name="remember">
                    Запомнить меня
                </x-form.check>
            </x-form.item>

        <x-button type="submit">
            Войти
        </x-button>
      </x-form>
    </x-card.body>
</x-card>

<x-slot:crosslink>
    Нет аккаунта?

    <x-link to="{{route('registration')}}">
        Регистрация
    </x-link>

</x-slot:crosslink>

</x-layouts.auth>
