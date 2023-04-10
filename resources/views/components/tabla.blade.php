@props(['nombre'])
    <div class="body p-3">
        {{-- tabla --}}
        <div wire:ignore class="table-responsive tab-pane div_table">
            <table class="table table-hover {{$nombre}} d-none dataTable table-custom spacing5">
                <thead>
                    <tr>
                        {{$slot}}
                    </tr>
                </thead>
                <tbody id="content_tabla">
                    {{-- contenido carcado con JS --}}
                </tbody>
            </table>
        </div>
        {{-- loading --}}
        <div class="margin_20">
            <span class="loading_p spinner-border spinner-border-sm d-none" role="status"
                style="font-size:8px; display:block; margin:auto;">
                <span class="sr-only"></span>
            </span>
        </div>
    </div>
