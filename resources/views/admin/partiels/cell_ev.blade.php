

<div class="form-group">
    {!! Form::label('Anfitrion', 'INGRESE EL NOMBRE DEL ANFITRION') !!}
    {!! Form::text('anfitrion', $celula->anfitrion ?? null,
    ['class'=>'form-control','placeholder'=>'Ingrese el anfitrion','required']) !!}

</div>

<div class="form-group">
    {!! Form::label('ubicacion', 'INGRESE LA UBICACION') !!}
    {!! Form::textarea('ubicacion', $celula->ubicacion ?? null,
    ['class'=>'form-control','placeholder'=>'Ingrese la direccion donde se llevara acabo la celula','required']) !!}
    @error('direccion')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('telefono', 'INTRODUZCA LA EL NUMERO DE TELEFONO (opcional)') !!}
    {!! Form::text('telefono', $celula->telefono ?? null,
    ['class'=>'form-control','placeholder'=>'Ingrese el numero de telefono']) !!}
    @error('direccion')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

