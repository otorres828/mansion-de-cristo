@props(['descendientes'])
<div>
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register"> Agregar
            Celula</a>
    </div>
    
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Registrar Una Nueva Celula Oficial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => request()->routeIs('celulas_equipo') ? 'celulas.equipo.store' : 'celulas.store', 'autocomplete' => 'off', 'method' => 'post']) !!}
                        @include('admin.partiels.cell')
                        <div class="mb-0">
                            <div class="d-flex justify-content-end align-items-baseline">
                                <button type="submit" class="btn btn-primary actualizar">Registrar</button>
        
                                <button type="button" class="ml-1 btn btn-danger " data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>