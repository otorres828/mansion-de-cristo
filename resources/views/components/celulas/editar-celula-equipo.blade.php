@props(['celula', 'descendientes'])
<div>
    <div class="modal fade" id="edit-{{ $celula->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::model($celula, [
                        'route' => ['celulas.equipo.update', $celula],
                        'autocomplete' => 'off',
                        'method' => 'put',
                    ]) !!}
                    @livewire('admin.edit-celula', ['celula' => $celula, 'descendientes' => $descendientes])
                    <div class="d-flex justify-content-end align-items-baseline">
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary actualizar']) !!}
                        <button type="button" class="ml-1 btn btn-danger " data-dismiss="modal">Cerrar</button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
