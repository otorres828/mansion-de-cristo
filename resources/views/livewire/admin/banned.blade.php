<div>

    <div class="form-group">
        {!! Form::label('name', 'Nombre Completo') !!}
        {!! Form::text('name', $user->name, [
            'class' => 'form-control',
            'placeholder' => 'Ingrese el nombre completo',
            'readonly',
        ]) !!}
    
    </div>
    
    <div class="form-group">
        {!! Form::label('email', 'Correo Electronico') !!}
        {!! Form::email('email', $user->email, [
            'class' => 'form-control',
            'placeholder' => 'Ingrese el correo electronico',
            'readonly',
        ]) !!}
    
    </div>
    
    <div class="form-group">
        <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                <input type="checkbox" class="custom-control-input" id="estatus{{ $user->id }}" wire:model="status"
                    wire:click="status">
                <label class="custom-control-label" for="estatus{{ $user->id }}"
                    id="estatus{{ $user->id }}">Bloquear Acceso de usuario a la plataforma</label>
            </div>
        </div>
    </div>
    @if (session('danger'))
        <div class="mb-4 font-medium text-sm text-danger">
            {{ session('danger') }}
        </div>
    @endif
    @if (session('success'))
        <div class="mb-4 font-medium text-sm text-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-0">
        <div class="d-flex justify-content-end align-items-baseline">
            <button type="button" class=" ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
