<script>
    $('.destroy').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estas Seguro?',
            text: "que quieres eliminar este contenido? se perderan los registros de usuarios asociados",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'

        }).then((result) => {
            if (result.isConfirmed) {
                // Swal.fire(
                // 'Eliminado!',
                // 'La red se ha eliminado con exito',
                // 'success'
                // )
                this.submit();
            }
        })
    });
</script>