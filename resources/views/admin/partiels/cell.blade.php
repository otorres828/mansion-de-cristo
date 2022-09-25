<div class="form-group">
    {!! Form::label('lider_cedula', 'Seleccione el lider de la celula') !!}
    {!! Form::select('user_id', $descendientes, null, ['class' => 'form-control select2']) !!}
    @error('user_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el nombre de la celula',
        'required',
    ]) !!}
    @error('nombre')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Direccion') !!}
    {!! Form::textarea('direccion', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese la direccion donde se llevara acabo la celula',
        'required',
    ]) !!}
    @error('direccion')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('fecha_hora', 'Fecha del encuentro') !!}
    {!! Form::input('datetime-local', 'fecha_hora', null, ['class' => 'form-control']) !!}
    @error('fecha_hora')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

