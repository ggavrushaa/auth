<x-form action="{{ route('user.settings.google.confirm') }}" method="post">
    <x-list>
        <x-list.item>
            <x-slot:name>
                Отсканируйте QR-код
            </x-slot:name>
            <x-slot:value>
                <div class="inline-flex items-center gap-3">
                  QR-код
                </div>
            </x-slot:value>
        </x-list.item>
        <x-list.item>
            <x-slot:name>
                Код подтверждения
            </x-slot:name>
            <x-slot:value>
                <div class="grid grid-cols-2">
                    <div class="col-span-2 md:col-span-1">
                            <x-form.text name="code" placeholder="123456"/>
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
                Включить
            </x-button>
        </x-slot:buttons>
    </x-form.footer>
</x-form>
