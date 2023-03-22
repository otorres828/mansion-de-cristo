@if (request()->routeIs('celulas_equipo'))
    <div class="form-group">
        {!! Form::label('lider_cedula', 'SELECCIONE EL LIDER DE CELULA') !!}
        {!! Form::select('user_id', $descendientes, null, ['class' => 'form-control w-full select2']) !!}
    </div>
@endif

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


<div class="form-group">
    {!! Form::label('dia', 'SELECCIONE EL DIA') !!}
    <select name="dia" class="form-control">
        <div class="overflow-y-scroll">
            <option value="1">Lunes</option>
            <option value="2">Martes</option>
            <option value="3">Miercoles</option>
            <option value="4">Jueves</option>
            <option value="5">Viernes</option>
            <option value="6">Sabado</option>
            <option value="7">Domingo</option>
        </div>
    </select>
</div>
