<div>
    {!! Form::label(null, 'Seleccione la Red') !!}
    <select wire:model="selectedManager" class="form-control" name="id_red">
        @foreach ($groups as $group)
            <option value="{{$group->id}}">{{$group->name}}</option>
        @endforeach
    </select>
    @if (!is_null($users))
        <div class="form-group mt-3">
            {!! Form::label(null, 'Seleccione El Encargado') !!}
            <select class="form-control" name="manager">
                <option>Seleccione un Encargado</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>    
    @endif

</div>
