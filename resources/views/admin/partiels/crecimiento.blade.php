<div class="form-group">
    {!! Form::label('name', 'Nombre del crecimiento') !!}
    {!! Form::text('name', $crecimiento->name ?? null,
    ['class' => 'form-control ','placeholder'=>'Ingrese el nombre del crecimiento','required']) !!}
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('Estatus', 'Estatus') !!}
    {!! Form::select('Estatus', [false =>"No",true =>"Si"], null, ['class' => 'form-control ','selected'=> true]) !!}
    @error('Estatus')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

{{-- <div class="form-group">
    {!! Form::label('lider_cedula', 'Seleccione el lider de la celula') !!}
    {!! Form::select('user_id', $descendientes ?? null, null, ['class' => 'form-control select2']) !!}
    @error('user_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div> --}}

{{--


<div class="form-group">
    {!! Form::label('fecha_hora', 'Fecha del encuentro') !!}
    {!! Form::input('datetime-local', 'fecha_hora',$celula->fecha_hora ?? null,['class'=>'form-control']) !!}
    @error('fecha_hora')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div> --}}
