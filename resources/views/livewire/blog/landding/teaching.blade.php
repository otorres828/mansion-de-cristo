<div wire:target="loadTeachings">

    <x-aminblog.slide carga="loadTeachings">
        @foreach ($teachings as $enseñanza)
            <x-aminblog.card :item="$enseñanza" >
                {{ route('blog.show_teaching', $enseñanza) }}
            </x-aminblog.card>
        @endforeach
    </x-aminblog.slide>
</div>
