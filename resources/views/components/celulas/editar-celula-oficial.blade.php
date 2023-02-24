@props(['celula','descendientes'])
<div>
    
    <div class="modal fade" id="edit-{{ $celula->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar Celula </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('celulas.update', $celula) }}" method="post"
                        autocomplete="off">
                        @csrf
                        @method('put')
                        @include('admin.partiels.cell')

                        <div class="d-flex justify-content-end align-items-baseline">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
                            <button type="button" class="ml-1 btn btn-danger "
                                data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
</div>
