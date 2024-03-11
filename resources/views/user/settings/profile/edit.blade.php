<x-layouts.settings>
    <x-title size="sm">
        Изменить профиль
        <x-slot:description>
            Введите новые персональные данные.
        </x-slot:description>
    </x-title>
    
    <x-form action="{{ route('user.settings.profile.update') }}" method="post">
    <x-list>
        <x-list.item>
            <x-slot:name>
                Имя
            </x-slot:name>
            <x-slot:value>
                <div class="grid grid-cols-2">
                    <div class="col-span-2 md:col-span-1">
                        <x-form.text type="text" name="first_name" :value="$user->first_name" autofocus/>
                    </div>
                </div>
            </x-slot:value>
        </x-list.item>

        <x-list.item>
            <x-slot:name>
                Отчество
            </x-slot:name>
            <x-slot:value>
                <div class="grid grid-cols-2">
                    <div class="col-span-2 md:col-span-1">
                        <x-form.text type="text" name="middle_name" :value="$user->middle_name" />
                    </div>
                </div>
            </x-slot:value>
        </x-list.item>

        <x-list.item>
            <x-slot:name>
                Фамилия
            </x-slot:name>
            <x-slot:value>
                <div class="grid grid-cols-2">
                    <div class="col-span-2 md:col-span-1">
                        <x-form.text type="text" name="last_name" :value="$user->last_name" />
                    </div>
                </div>
            </x-slot:value>
        </x-list.item>
    </x-list>
    
    <x-list>
        <x-list.item>
            <x-slot:name>
                Ваш пол
            </x-slot:name>
            <x-slot:value>
                <div class="grid grid-cols-2">
                    <div class="col-span-2 md:col-span-1">
                <x-form.select name="gender" :value="$user->gender?->value" :options="App\Enums\GenderEnum::select()" />
                    </div>
                </div>
            </x-slot:value>
        </x-list.item>
    </x-list>
    
    <x-list>
        <x-list.item>
            <x-slot:name>
                Почта
            </x-slot:name>
            <x-slot:value>
                <div class="grid grid-cols-2">
                    <div class="col-span-2 md:col-span-1">
                        <x-form.text type="email" name="email" :value="$user->email" />
                    </div>
                </div>
            </x-slot:value>
        </x-list.item>
    </x-list>


    <x-form.footer>
        <x-slot:buttons>
            <x-button href="{{ route('user.settings') }}" color="white">
                Отменить
            </x-button>
            <x-button type="submit">
                Сохранить
            </x-button>
        </x-slot:buttons>
    </x-form.footer>
    </x-form> 


</x-layouts.settings>