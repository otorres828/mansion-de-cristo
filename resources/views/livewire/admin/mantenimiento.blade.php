<div class="card">
    <div class="card-body">

        <div class="form-group">
            <div class="form-group">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    {{-- BLOG --}}
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="estatus1" wire:model="status1"
                                wire:click="status(1)">
                            <label class="custom-control-label" id="estatus1" for="estatus1">Casa</label>
                        </div>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="estatus2" wire:model="status2"
                                wire:click="status(2)">
                            <label class="custom-control-label" id="estatus2" for="estatus2">Noticias</label>
                        </div>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="estatus3" wire:model="status3"
                                wire:click="status(3)">
                            <label class="custom-control-label" id="estatus3" for="estatus3">Enseñanzas</label>
                        </div>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="estatus4" wire:model="status4"
                                wire:click="status(4)">
                            <label class="custom-control-label" id="estatus4" for="estatus4">Ministerios</label>
                        </div>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="estatus5" wire:model="status5"
                                wire:click="status(5)">
                            <label class="custom-control-label" id="estatus5" for="estatus5">Testimonios</label>
                        </div>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="estatus6" wire:model="status6"
                                wire:click="status(6)">
                            <label class="custom-control-label" id="estatus6" for="estatus6">Acercade</label>
                        </div>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="estatus7" wire:model="status7"
                                wire:click="status(7)">
                            <label class="custom-control-label" id="estatus7" for="estatus7">Contactanos</label>
                        </div>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="estatus8" wire:model="status8"
                                wire:click="status(8)">
                            <label class="custom-control-label" id="estatus8" for="estatus8">Pagina General</label>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>

        @if (session('danger'))
            <div class="mb-4 font-medium text-sm text-danger">
                {{ session('danger') }}
            </div>
        @endif
        @if (session('success'))
            <div class="mb-4 font-medium text-sm text-success">
                {{ session('success') }}
            </div>
        @endif

    </div>
</div>
