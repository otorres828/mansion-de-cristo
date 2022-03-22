<div>
    <div class="card">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
          <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            Agenda
          </h3>
          <div class="card-tools">
            {{$lists->links()}}
          </div>
        </div>

        <div class="card-body" >
          @include('livewire.panel.ul')
        </div>

        <div class="card-footer">
          <div class="card">
            <div class="card-body">
                <div class="form-group">
                   {!! Form::label('name', 'Escriba una nota',) !!}
                  <input type="text" class="form-control" wire:model="name">
                  @error('name')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
  
                <div class="d-flex justify-content-end align-items-baseline">
                  <button wire:click="store"  class="ml-1 btn btn-success" >Agregar</button>
                  <button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>           
      </div>
        
        <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                  <input type="hidden" value="{{auth()->user()->id}}" class="form-control" wire:model="user_id">
                                   {!! Form::label('name', 'Escriba una nota',) !!}
                                  <input type="text" class="form-control" wire:model="name">
                                  @error('name')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                  
                                <div class="d-flex justify-content-end align-items-baseline">
                                  <button wire:click="store"  class="ml-1 btn btn-success" >Agregar</button>
                                  <button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
