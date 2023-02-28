@props(['visita'])
<div>
    {{-- EDITAR --}}
    <div class="modal fade" id="edit{{ $visita->id }}" tabindex="-1" aria-labelledby="edit{{ $visita->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Actualizar Datos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('visitas_pendientes.update', $visita) }}" method="POST">
                        @csrf
                        @method('put')
                        <label>INGRESE LA FECHA Y HORA DE LA VISITA</label>
                         <input name="fecha" value="{{$visita->fecha}}" type="datetime-local" class="form-control mb-3">
                        <div class="mb-0">
                            <div class="d-flex justify-content-end align-items-baseline">
                                <button type="submit" class="actualizar btn btn-primary">Actualizar</button>
                                <button type="button" class="ml-1 btn btn-danger " data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
