<div>
    <div class="form-group">
        {!! Form::label(null, 'Seleccione su Iglesia') !!}
        {{-- {!! Form::select('temple_id', $temples, null, ['class'=>'form-control', 'wire:model'=>'selectedTemple']) !!} --}}
        <select wire:model="selectedtemple" class="form-control" name="temple_id">
            <option value="">Iglesia</option>
            @foreach ($temples as $temple)
                <option value="{{$temple->id}}">{{$temple->name}}</option>
            @endforeach
        </select>
    </div>
    
    @if (!is_null($hierarchies))
        <div class="form-group">
            {!! Form::label(null, 'Seleccione su Jerarquia') !!}
            <select wire:model="selectedHierarchy" class="form-control" name="hierarchy_id">
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
            <select wire:model="selectedGroup" class="form-control" name="group_id">
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
            <select wire:model="selectedUser" class="form-control" name="parent_id">
                <option value="">Apostol/Pastor/Lider</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>    
    @endif
</div>
