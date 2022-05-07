<div class="form-group">
    {!! Form::label('name', 'Nombre de la Enseñanza') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del anuncio']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
     @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug de la Enseñanza') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'SLUG','readonly']) !!}
    @error('slug')
        <span class="text-danger">{{$message}}</span>
     @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categorias, null, ['class'=>'form-control']) !!}
    @error('category_id')
        <span class="text-danger">{{$message}}</span>
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
            @isset ($teaching->image)
                <img id="picture "src="{{Storage::url($teaching->image->url)}}" alt="">   
            @else
                <img src="https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg" alt="">
            @endisset
        </div>
        @if (isset($teaching->image))
        @livewire('blog.eliminarimagen', ['item' => $teaching])
    @endif
    </div>
    <div class="col-9">
        <div class="form-group">
            {!! Form::label('file', 'imagen que se mostrara en la enseñanza') !!}
            {!! Form::file('file', ['class'=>'form-control-file','accept'=>'image/*']) !!}
            @error('file')
                 <span class="text-danger">{{$message}}</span>
             @enderror                        
        </div>
    </div>

</div>


<div class="form-group">
    {!! Form::label('extract', 'Breve Introduccion de la Enseñanza') !!}
    {!! Form::text('extract', null, ['class'=>'form-control'])  !!}
    @error('extract')
        <span class="text-danger">{{$message}}</span>
     @enderror               
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo de la Enseñanza') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control'])  !!}
    @error('body')
        <span class="text-danger">{{$message}}</span>
     @enderror
</div>