<x-layouts.auth>

    <x-slot:title>
        Регистрация аккаунта
    </x-slot:title>
    
    <x-card>
        <x-card.body>
            <x-form action="{{route('registration.store')}}" method="POST">
                <x-form.item>
                    <x-form.label>Ваше Имя</x-form.label>
                    <x-form.text name="first_name" placeholder="Иван" autofocus/>
                </x-form.item>

                <x-form.item>
                    <x-form.label>Ваш Email</x-form.label>
                    <x-form.text name="email" placeholder="mail@axample.com" />
                </x-form.item>
                
                <x-form.item>
                    <x-form.label>Придумайте пароль</x-form.label>
                    <x-form.text type="password" name="password" placeholder="********" />
                </x-form.item>

                <x-form.item>
                    <x-form.label>Повторите пароль</x-form.label>
                    <x-form.text type="password" name="password_confirmation" placeholder="********" />
                </x-form.item>

                <x-form.item>
                    <x-form.check name="agreement">
                        Соглашаюсь с политикой конфиденциальности
                    </x-form.check>
                </x-form.item>

            <x-button type="submit">
                Зарегистрироваться
            </x-button>
          </x-form>
        </x-card.body>
    </x-card>
    
    <x-slot:crosslink>
        Уже зарегестрированы?
        
        <x-link to="{{route('login')}}">
            Войти
        </x-link>
    
    </x-slot:crosslink>
    
    </x-layouts.auth>