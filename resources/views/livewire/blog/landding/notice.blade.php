<div wire:target="loadNotices">
    <x-aminblog.slide carga="loadNotices">
        @foreach ($notices as $notice)
            <x-aminblog.card :item="$notice" >
                {{ route('blog.show_announces', $notice) }}
            </x-aminblog.card>
        @endforeach
    </x-aminblog.slide>
</div>
