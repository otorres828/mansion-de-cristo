<div>
    <div class="mb-3">
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register" data-bs-whatever="@mdo">Registrar
            Usuario</a>
    </div>

    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Registrar un nuevo usuario</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('admin.register')
                </div>
            </div>
        </div>
    </div>

</div>