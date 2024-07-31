<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="tabla" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Solicitud</th>
                                <th>Nombre</th>
                                <th>DUI</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($listado as $dato)
                                <tr data-info="{{ $dato->id }}">

                                    <td>{{ $dato->fechaFormat }}</td>
                                    <td>{{ $dato->tiposolicitud }}</td>
                                    <td>{{ $dato->nombre }}</td>
                                    <td>{{ $dato->dui }}</td>
                                    <td>{{ $dato->estadofinal }}</td>

                                    <td>

                                        <button type="button" style="margin: 5px" class="btn btn-primary btn-xs" onclick="modalInformacion({{ $dato->id }})">
                                            <i class="fas fa-info" title="Estado"></i>&nbsp; Estado
                                        </button>

                                        <button type="button" style="margin: 5px" class="btn btn-info btn-xs" onclick="vistaMapa({{ $dato->id }})">
                                            <i class="fas fa-map" title="Mapa"></i>&nbsp; Mapa
                                        </button>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $(function () {

        // Añadir el tipo de datos personalizado para fechas en formato d-m-y
        $.fn.dataTable.ext.type.order['date-dmy-pre'] = function (d) {
            // Divide la fecha por el guion
            var parts = d.split('-');
            // Retorna en formato YYYYMMDD
            return parts[2] + parts[1] + parts[0];
        };


        $("#tabla").DataTable({
            columnDefs: [
                { type: 'date-dmy', targets: 0 } // La columna de fecha es la primera (índice 0)
            ],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "pagingType": "full_numbers",
            "lengthMenu": [[10, 25, 50, 100, 150, -1], [10, 25, 50, 100, 150, "Todo"]],
            "language": {

                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }

            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
        });
    });


</script>
