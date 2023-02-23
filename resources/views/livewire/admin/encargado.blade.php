<div>
    {!! Form::label(null, 'Seleccione la Red') !!}
    <select wire:model="selectedManager" class="form-control" name="id_red">
        @foreach ($redes as $red)
            <option value="{{ $red->id }}">{{ $red->name }}</option>
        @endforeach
    </select>

    <div class="form-group mt-3">
        <label class="w-full">Ingrese el codigo #id encargado</label> <br>
        <input type="number" name="encargado" class="form-control uppercase" required>
    </div>
</div>
