@props(['celula'])
<div class="modal fade" id="edit{{ $celula->id }}" tabindex="-1" aria-labelledby="edit{{ $celula->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ingresar Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('celulas_evangelisticas.update',$celula)}}" method="POST">
                    @csrf
                    @method('put')
                    @include('admin.partiels.cell_ev')
                    <div class="mb-0">
                        <div class="d-flex justify-content-end align-items-baseline">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
    
                            <button type="button" class="ml-1 btn btn-danger " data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>