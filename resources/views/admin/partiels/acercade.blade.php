<div class="row g-2">
    <div class="col-md">
        <div class="form-group">
            {!! Form::label('name', 'Nombre del Contenido') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del contenido']) !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md">
        <div class="form-group">
            {!! Form::label('slug', 'Slug del Contenido') !!}
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'SLUG', 'readonly']) !!}
            @error('slug')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label>
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
    <label>
        {!! Form::radio('status', 2) !!}
        Publicar
    </label>
</div>

<div class="row mb-3">
    <div class="col-3">
        <div class="image-wraper">
            @isset($acercade->image)
                <img id="picture " src="{{ Storage::url($acercade->image->url) }}" alt="">
            @else
                <img src="https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg" alt="">
                @endif
            </div>
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
        {!! Form::label('body', 'Cuerpo del Contenido') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        @error('body')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
