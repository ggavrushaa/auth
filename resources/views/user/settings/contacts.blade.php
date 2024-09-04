<div class="profile">
    <x-title size="sm">
        Ваш контакты
        <x-slot:description>
            Посмотреть и изменить контактные данные.
        </x-slot:description>
    </x-title>
    
    <x-list>    
        <x-list.item>
            <x-slot:name>
                Ваш email
            </x-slot:name>
            <x-slot:value>
                {{str($user->email)->mask('*', 10, -4)}}
            </x-slot:value>
            <x-slot:action>
                <x-link href="{{route('user.settings.email.edit')}}" wire:navigate>
                    Изменить
                </x-link>
            </x-slot:action>
        </x-list.item>
    </x-list>
</div>