<x-form action="{{ route('user.settings.google.enable') }}" method="post">
    <x-list>
        <x-list.item>
            <x-slot:name>
                Скачайте приложение
            </x-slot:name>
            <x-slot:value>
                <div class="inline-flex items-center gap-3">
                    <x-button href="https://apps.apple.com/ru/app/google-authenticator/id388497605" color="white"
                        target="_blank">
                        iPhone
                    </x-button>

                    <x-button
                        href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=ru&pli=1"
                        color="white" target="_blank">
                        Android
                    </x-button>
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