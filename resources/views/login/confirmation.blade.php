<x-layouts.auth>

<x-slot:title>
    Подтверждение входа
</x-slot:title>

<x-card>
    <x-card.body>
        <p class="mb-4">
            Введите код из приложения Google Authenticator
        </p>
        <x-form action="{{route('login.confirm')}}" method="POST">

            <x-form.item>
                <x-form.label>Код подтверждения</x-form.label>
                <x-form.text name="code" placeholder="123456" autofocus/>
            </x-form.item>

        <x-button type="submit">
            Подтвердить
        </x-button>

      </x-form>
    </x-card.body>
</x-card>

<x-slot:crosslink>
    <x-link href="{{route('login')}}">
        Назад
    </x-link>
</x-slot:crosslink>

</x-layouts.auth>
