<div>
    @if (session('error'))
        <div class="mb-4 font-bold text-red">
            {{ session('error') }}
        </div>
    @endif
    <form wire:submit.prevent="save">
        <div class="form-group">
            {!! Form::label('name', 'Nombre Completo') !!}
            <x-jet-input wire:model="nombre" class="form-control" type="text" name="name" 
                autofocus autocomplete="name" placeholder="Ingrese el nombre completo" />
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('correo', 'Correo electronico') !!}
            <x-jet-input wire:model="correo" class="form-control" type="email" name="correo" :value="old('correo')"
                required autofocus placeholder="Ingrese el correo electronico" />
            @error('correo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            {!! Form::label(null, 'Selecciona el genero') !!}
            <select wire:model="genero" class="form-control" required>
                <option value="">Seleccione el genero</option>
                <option value="H">Hombre</option>
                <option value="M">Mujer</option>
            </select>
        </div>

        <div class="form-group">
            {!! Form::label(null, 'Iglesia') !!}
            <select name="temple_id" class="form-control" required>
                <option value={{ $temple->id }}>{{ $temple->name }}</option>
            </select>
        </div>

        <div class="form-group">
            {!! Form::label(null, 'Seleccione su Red') !!}
            <select wire:model="red" class="form-control" name="jerarquia_id">
                @foreach ($redes as $red)
                    <option value="{{ $red->id }}">{{ $red->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label(null, 'Seleccione su Jerarquia') !!}
            <select wire:model="jerarquia" class="form-control" name="jerarquia_id">
                <option value="">Seleccione la jerarquia</option>
                @foreach ($jerarquias as $jerarquia)
                    <option value="{{ $jerarquia->id }}">{{ $jerarquia->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label(null, 'Ingrese el codigo de la cobertura') !!}
            <input type="text" placeholder="Ingrese el codigo de la cobertura" class="form-control text-uppercase" wire:model="codigo" required>

        </div>

        <div class="mb-0">
            <div class="d-flex justify-content-end align-items-baseline">
                <button type="submit" class="btn btn-primary">Registrar</button>

                <button type="button" class=" ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </form>
</div>
