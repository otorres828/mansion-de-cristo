<div>
    <div class="card-header ui-sortable-handle" style="cursor: move;">
        <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            Agenda
        </h3>
        <div class="card-tools">
            {{ $lists->links() }}
        </div>
    </div>

    @include('livewire.panel.ul')

    <div class="card-body">
        <div class="form-group">
            {!! Form::label('name', 'Escriba una nota') !!}
            <input type="text" class="form-control" wire:model="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex justify-content-end align-items-baseline">
            <button wire:click="store" class="ml-1 btn btn-success">Agregar</button>
        </div>
    </div>

</div>
