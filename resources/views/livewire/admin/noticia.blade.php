<div>
    <x-tabla nombre="tabla">
        <th><b>id</b></th>
        <th><b>Titulo</b></th>
        <th><b>Estado</b></th>
        <th><b>Acciones</b></th>
    </x-tabla>

    <script>
        document.addEventListener('livewire:load', function() {
            @this.cargar()
        })

        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('cargar_tabla', function(data) {
                    cargarTabla(data);
            });
            
            Livewire.on('eliminar_ok', i => {
                toastRight('success', 'Noticia eliminada con exito con exito!');
            });

        });
        async function cargarTabla(data) {
            $('.tabla').DataTable().destroy(); // destruimos la tabla
            $('.tabla').addClass('d-none'); // ocultamos la tabla
            $('.loading_p').removeClass('d-none'); // mostramos el loading
            $('#content_tabla').html(''); // limpiamos la tabla
            await llenarTabla(data);
            $('.tabla').DataTable({ // le asignamos nuevamente las propiedades de datatables
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
            });
            $('.tabla').removeClass('d-none');
            $('.loading_p').addClass('d-none');
        }

        function llenarTabla(data) {
            data = JSON.parse(data);
            return new Promise((resolve) => {
                body = $('#content_tabla');
                let contador = 0;
                for (let index = 0; index < data.length; index++) {
                    const element = data[index];
                    const {
                        id,
                        name,
                        slug,
                        status,
                    } = element;
                    var estado = status == 1 ? "<button class='btn btn-danger'>X</button>" :
                        "<button class='btn btn-success'><i class='far fa-check-circle'></i></button>";
                        var ver = "{{ route('blog.show_announces', '') }}/" + slug;
                    body.append(`<tr>
                    <td>${id}</td>       
                    <td>${name}</td>       
                    <td>${estado}</td>
                                <td>
                                    <a href="${ver}" class="badge badge-dark pointer"> <i class="fa fa-eye"></i> </a>
                                    <a href="blog-entradas/${id}/edit" class="badge badge-dark pointer"> <i class="fa fa-edit"></i> </a>
                                    <a href="javascript:" onclick="eliminar(${id})" class="badge badge-dark pointer"> <i class="fa fa-trash"></i> </a>
                                </td>       
                            </tr>`);
                    contador++;
                }
                resolve(body);
            });
        }

        function eliminar(id) {
            alertClickCallback('¿Eliminar Entrada?',
                `Acción irreversible, la Entrada será borrada por completo`, 'warning',
                'Si, eliminar', 'Cancelar',
                function() {
                    @this.eliminar(id);
                });
        }
    </script>
</div>
