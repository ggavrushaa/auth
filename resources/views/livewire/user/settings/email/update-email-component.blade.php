<div>
    @if($step === 'start')
        <x-form wire:key="start-email" wire:submit="startEmail">
            <x-list>
                <x-list.item>
                    <x-slot:name>
                        Новый email
                    </x-slot:name>
                    <x-slot:value>
                        <div class="grid grid-cols-2">
                            <div class="col-span-2 md:col-span-1">
                                <x-form.text name="email" wire:model="email" autofocus />
                            </div>
                        </div>
                    </x-slot:value>
                </x-list.item>
            </x-list>
        
            <x-form.footer>
                <x-slot:buttons>
                    <x-button href="{{ route('user.settings') }}" color="white" wire:navigate>
                        Отменить
                    </x-button>
                    <x-button type="submit">
                        Продолжить
                    </x-button>
                </x-slot:buttons>
            </x-form.footer>
        </x-form> 
    @elseif($step === 'confirm')
        <x-form wire:key="confirm-email" wire:submit="confirmEmail">
            <x-list>
                <x-list.item>
                    <x-slot:name>
                        Код подтверждения
                    </x-slot:name>
                    <x-slot:value>
                        <div class="grid grid-cols-2">
                            <div class="col-span-2 md:col-span-1">
                                <x-form.text name="code" wire:model="code" autofocus />
                            </div>
                        </div>
                    </x-slot:value>
                </x-list.item>
            </x-list>
        
            <x-form.footer>
                <x-slot:buttons>
                    <x-button wire:click="setStep('start')" color="white">
                        Назад
                    </x-button>
                    <x-button type="submit">
                        Подтвердить
                    </x-button>
                </x-slot:buttons>
            </x-form.footer>
        </x-form> 
    @endif
</div>
