<div>
    <div class="form-group">
        {!! Form::label('lider_cedula', 'SELECCIONE EL LIDER DE CELULA') !!}
        {!! Form::select('user_id', $descendientes, null, ['class' => 'form-control w-full select2']) !!}
    </div>
    
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
        ['class'=>'form-control','placeholder'=>'Ingrese el numero de telefono','required']) !!}
        @error('direccion')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    
    <div class="form-group">
        {!! Form::label('dia', 'SELECCIONE EL DIA') !!}
        <select name="dia" class="form-control" wire:model="dia">
            <div class="overflow-y-scroll">
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miercoles">Miercoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sabado">Sabado</option>
                <option value="Domingo">Domingo</option>
            </div>
        </select>
    </div>
    </div>
