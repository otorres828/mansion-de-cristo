<div class="form-group">
    {!! Form::label('name', 'Nombre Completo') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre completo']) !!}
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

@livewire('admin.temples-user')

<div class="form-group">
    <x-jet-label value="{{ __('Clave') }}" />

    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                 name="password" required autocomplete="new-password" />
    <x-jet-input-error for="password"></x-jet-input-error>
</div>

<div class="mb-0">
    <div class="d-flex justify-content-end align-items-baseline">
        <x-jet-button>
            {{ __('Registrar') }}
        </x-jet-button>
        <button type="button" class=" ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
    </div>
</div>
