<div>
    <div class="form-group">
        {!! Form::label(null, 'Seleccione la Red') !!}
        <select name="red_id" wire:model="selectedRed" class="form-control"required>
            @foreach ($redes as $red)
                <option value="{{ $red->id }}">{{ $red->name }}</option>
            @endforeach
        </select>
        @error('red_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label(null, 'Seleccione el Administrador') !!}
        <select name="user_id"  class="form-control" required>
            @foreach ($usuarios as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>        @error('amount')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-0">
        <div class="d-flex justify-content-end align-items-baseline">
            <button type="submit" class=" ml-1 btn btn-success">Agregar</button>
            <button type="button" class=" ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
    </div></div>
