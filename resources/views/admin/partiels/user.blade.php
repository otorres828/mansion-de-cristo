<div class="form-group">
    {!! Form::label('name', 'Nombre Completo') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre completo','required']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
     @enderror
</div>

<div class="form-group">
    {!! Form::label('email', 'Correo Electronico') !!}
    {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Ingrese el correo electronico']) !!}
    @error('email')
        <span class="text-danger">{{$message}}</span>
     @enderror
</div>


<div class="form-group">
    {!! Form::label(null, 'Ingrese el codigo de la cobertura') !!}
    <input type="text" class="form-control uppercase" name="codigo">

</div>

<div class="mb-0">
    <div class="d-flex justify-content-end align-items-baseline">
        <button type="submit" class="btn btn-primary" >Registrar</button>

        <button type="button" class=" ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
    </div>
</div>
