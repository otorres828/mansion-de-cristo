<div class="card">
    <div class="card-body">

        <div class="form-group">
            <div class="form-group">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    {{-- BLOG --}}
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="estatus1" wire:model="status1"
                                wire:click="status1">
                            <label class="custom-control-label" id="estatus1" for="estatus1">Pagina web mansiondecristo.com</label>
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
