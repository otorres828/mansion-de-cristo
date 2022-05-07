<div class="form-group">
    {!! Form::label('name', 'Nombre del Contenido') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del contenido']) !!}
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug del Contenido') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'SLUG', 'readonly']) !!}
    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label>
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
    @can('topost')
        <label>
            {!! Form::radio('status', 2) !!}
            Publicar
        </label>
    @endcan
</div>

<div class="row mb-3">
    <div class="col-3">
        <div class="image-wraper">
            @isset($anuncio->image)
                <img id="picture " src="{{ Storage::url($anuncio->image->url) }}" alt="">
            @else
                @isset($ministry->image)
                    <img id="picture " src="{{ Storage::url($ministry->image->url) }}" alt="">
                @else
                    @isset($teaching->image)
                        <img id="picture " src="{{ Storage::url($teaching->image->url) }}" alt="">
                    @else
                        <img src="https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg" alt="">
                    @endisset
                @endisset
            @endisset
        </div>
        @if (isset($anuncio->image))
            @livewire('blog.eliminarimagen', ['item' => $anuncio])
        @endif
    </div>
    <div class="col-9">
        <div class="form-group">
            {!! Form::label('file', 'imagen que se mostrara en el Contenido') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto del Contenido') !!}
    {!! Form::text('extract', null, ['class' => 'form-control']) !!}
    @error('extract')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del Contenido') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    @error('body')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
