<div>
    @props(['publicacion'])
    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
        <figure class="aspect-w-16 aspect-h-9">
            @if ($publicacion->media_type == 'IMAGE')
                <img class="rounded-lg shadow" src="{{ $publicacion->media_url }}" alt="Card image cap">
            @elseif($publicacion->media_type == 'CAROUSEL_ALBUM')
                <img class="rounded-lg shadow" src="{{ $publicacion->media_url }}" alt="Card image cap">
            @else
                <video controls="" autostart="0" o autostart="1" name="media" loop muted>
                    <source src="{{ $publicacion->media_url }}" type="video/mp4">
                </video>
            @endif
        </figure>

        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
            @if (isset($publicacion->caption))
                {{ $publicacion->caption }}
            @else
                No hay comentarios en esta publicacion
            @endif
        </div>
    </article>
</div>
