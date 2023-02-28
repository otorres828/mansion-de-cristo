@props(['celula'])
<div>
    {{-- EDITAR --}}
    <div class="modal fade" id="edit{{ $celula->id }}" tabindex="-1" aria-labelledby="edit{{ $celula->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Actualizar Datos</h5>
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
    {{-- CONVERTIR --}}
    <div class="modal fade" id="convertir{{ $celula->id }}" tabindex="-1" aria-labelledby="convertir{{ $celula->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Convertir a Celula Oficial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anfitrion: {{$celula->anfitrion}}</p>
                    <p>Ubicacion: {{$celula->ubicacion}}</p>
                    <form action="{{route('ce.convertir',$celula)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            {!! Form::label('dia', 'SELECCIONE EL DIA') !!}
                            <select name="dia" class="form-control" value="1">
                                <div class="overflow-y-scroll">
                                    <option value="1">Lunes</option>
                                    <option value="2">Martes</option>
                                    <option value="3">Miercoles</option>
                                    <option value="4">Jueves</option>
                                    <option value="5">Viernes</option>
                                    <option value="6">Sabado</option>
                                    <option value="7">Domingo</option>
                                </div>
                            </select>
                        </div>
                        <div class="mb-0">
                            <div class="d-flex justify-content-end align-items-baseline">
                                <button type="submit" class="btn btn-primary">Convertir</button>
        
                                <button type="button" class="ml-1 btn btn-danger " data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>