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
           
            // responsive: true,
            // dom: 'Bfrtip',
            // buttons: [
            //     'copy','excel', 'pdf', 'print','colvis',
            // ],
            

        });
    });
</script>

{{-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script> --}}
