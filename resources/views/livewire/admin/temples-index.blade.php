<div>
    <div class="form-group">
        {!! Form::label(null, 'Seleccione su Iglesia') !!}
        <select wire:model="selectedTemple" class="seleccionador" name="temple_id">
            <option value="">Iglesia</option>
            @foreach ($temples as $temple)
                <option value="{{$temple->id}}">{{$temple->name}}</option>
            @endforeach
        </select>
    </div>
    
    @if (!is_null($hierarchies))
        <div class="form-group">
            {!! Form::label(null, 'Seleccione su Jerarquia') !!}
            <select wire:model="selectedHierarchy" class="seleccionador" name="hierarchy_id">
                <option value="">Jerarquia</option>
                @foreach ($hierarchies as $hierarchy)
                    <option value="{{$hierarchy->id}}">{{$hierarchy->name}}</option>
                @endforeach
            </select>
        </div>    
    @endif

    @if (!is_null($groups))
        <div class="form-group">
            {!! Form::label(null, 'Seleccione su Red') !!}
            <select wire:model="selectedGroup" class="seleccionador" name="group_id">
                <option value="">Red</option>
                @foreach ($groups as $group)
                    <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
            </select>
        </div>    
    @endif

    @if (!is_null($users))
        <div class="form-group">
            {!! Form::label(null, 'Seleccione su Apostol/Pastor/Lider') !!}
            <select wire:model="selectedUser" class="seleccionador" name="parent_id">
                <option value="">Apostol/Pastor/Lider</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>    
    @endif
</div>

