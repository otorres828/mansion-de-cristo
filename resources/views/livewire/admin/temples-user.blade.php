
<div>
    <div class="form-group">
        {!! Form::label(null, 'Iglesia') !!}
        <select name="temple_id"  class="form-control">
            <option value={{$temple->id}}>{{$temple->name}}</option>
        </select>
    </div>

    <div class="form-group">
         {!! Form::label(null, 'Seleccione su Jerarquia') !!}
        <select wire:model="selectedHierarchy" class="form-control" name="jerarquia_id">
            <option value="">Jerarquia</option>
             @foreach ($jerarquias as $jerarquia)
                <option value="{{$jerarquia->id}}">{{$jerarquia->name}}</option>
             @endforeach
         </select>
    </div>    
    @if (!is_null($redes))
        <div class="form-group">
            {!! Form::label(null, 'Seleccione su Red') !!}
            <select wire:model="selectedGroup" class="form-control" name="red_id">
                <option value="">Red</option>
                @foreach ($redes as $group)
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

                    @if ($user->jerarquia->nivel<$level && $user->red_id == $selectedGroup)
                        <option value="{{$user->id}}">{{$user->name }}</option>
                    @endif

                @endforeach
                @if (!is_null($master))
                    <option value="{{$master->id}}">{{$master->name}}</option>
                @endif
            </select>
        </div>    
    @endif
</div>





