<x-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Регистрация аккаунта</h2>
        </div>
    
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

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
      </div>
    </div>
</x-layout>