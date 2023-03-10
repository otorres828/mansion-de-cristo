<div>
    <div class="card-header ui-sortable-handle" style="cursor: move;">
        <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            Escribe una Nota
        </h3>
        <div class="card-tools">
            {{ $lists->links() }}
        </div>
    </div>


    <div class="card-body">
        {{-- {!! Form::label('name', 'Escriba una nota') !!} --}}
        <div class="row d-flex flex-row justify-content-center ">
            <div>
                <input type="text" class="form-control" wire:model="name">

            </div>
            <div wire:click="store" class="ml-1 btn btn-success">Agregar</div>
        </div>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror

    </div>

    @include('livewire.panel.ul')

</div>
