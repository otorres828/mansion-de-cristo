<script>
    $(document).ready(function() {
        $('#example').DataTable({

            "language": {
                "lengthMenu": "Mostrar " +
                    `<select>
                        <option value ='5'>5</option>
                        <option value ='10'>10</option>
                        <option value ='25'>25</option>
                        <option value ='50'>50</option>
                        <option value ='100'>100</option>
                        <option value ='-1'>ALL</option>
                        </select>` +
                    " registro por pagina",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    'next': 'siguiente',
                    'previous': 'anterior'
                }
            },

            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print',
            ],


        });
    });
</script>

<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>

{{-- FUNCION ELIMINAR --}}
<script type="text/javascript">
    function eliminar_usuario(id) {
        Swal.fire({
            title: '¿Estas Seguro?',
            text: "que quieres eliminar este usuario!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'

        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                        url: "{{ route('todos.usuarios') }}",
                        dataType: "GET",    
                })
                sucess: function(resp) {
                    datos = JSON.parse(resp);
                    console.log(datos)
                }
                Swal.fire({
                    title: 'Debe de Seleccionar un reemplazo y añadir su clave para confirmar',
                    html: ' <div class="text-left"> <form action="{{ route('eliminar.usuario') }}" method="post">@csrf<div class="form-group mb-3">  <label class="mb-2">Seleccione el reemplazo</label> <select name="user_id"class="form-control select2 mb-3"></select>  </div><div class="form-group"><label class="mb-2">Introduzca su clave</label><input name="password"class="form-control" type="password" placeholder="************" required></div><center class="form-group"><button class="w-full btn btn-primary">Confirmar</button></center></form></div>',
                    showCloseButton: true,
                    showCancelButton: false,
                    showConfirmButton: false,
                    returnFocus: false,

                })
            }
        })

    }
</script>
