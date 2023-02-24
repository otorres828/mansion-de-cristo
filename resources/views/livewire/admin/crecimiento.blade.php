<div class="pb-4 px-3">
    @php
        $posicion = 0;
    @endphp
    <div class="table-responsive">
        <table class="table table-flush" id="example">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($crecimientos as $crecimiento)
                    <tr>
                        <td class="text-center">{{ $posicion = $posicion + 1 }}</td>
                        <td>{{ $crecimiento->name }}</td>
                        <td class="text-center">
                            @if ($crecimiento->completado)
                                <button class="btn btn-success" title="Completado">
                                    <i class="fas fa-check-circle"></i></button>
                            @else
                                <button class="btn btn-danger" title="No Completado">
                                    <i class="fa fa-times-circle"></i></button>
                            @endif
                        </td>
                        <td class="d-flex">

                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="estatus{{ $crecimiento->id }}"
                                    value="{{ $crecimiento->completado }}"
                                    wire:click="cambiar_estatus({{ $crecimiento->id }})">
                                <label class="custom-control-label" for="estatus{{ $crecimiento->id }}"
                                    id="crecimiento{{ $crecimiento->id }}"></label>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
