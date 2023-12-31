@extends('layouts.plantilla')

@section('header')
@endsection

@section('page_title')
Facilisimo | Home
@endsection

@section('title')
<h1 style="color: black;">
    ACTIVOS
</h1>
@endsection
@section('content') 
<div>
    <div class="row" style="margin-top: 16px">
        <div class="col-md-12" >
            <table class="table table-striped jambo_table table-hover" id="activos_table">
                <thead>
                    <tr class="headings">  
                        <th class="column-title">Id Tecnologico</th>
                        <th class="column-title">Activo Fijo</th> 
                        <th class="column-title">Ubicacion</th>  
                        <th class="column-title">Punto</th>  
                        <th class="column-title">Acciones</th>  
                    </tr>
                </thead>
                <tbody id="_results">
                    @foreach($activos as $activo)
                    <tr class="even pointer">  
                        <td class=" ">{{$activo->id_activo_tegnologicos}}</td>
                        <td class=" ">{{$activo->activo_fijo}}</td>
                        <td class=" ">{{$activo->ubicacion}}</td>
                        <td class=" ">{{$activo->punto}}</td>
                        <td style="font-size: 28px; text-align: center;"><a href="movimientos/create/{{$activo->id_activo_tegnologicos}}" style="font-size: 28px;;" 
                            
                            title="" >
                                <i class="fa fa-plus-circle dark"></i></a></td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>    
            {{-- <div id="pagination_" style="text-align: center">
                {{$activos->links('vendor.pagination.bootstrap-4')}}  
            </div>           --}}
            <input type="hidden" name="link" id="link" value="home" />
            <input type="hidden" name="show_action" id="show_action" value="N" />
            <input type="hidden" name="fields" id="fields" value="user_id,id,name,date_record,type_record" />
            
        </div>
    </div>
</div> 
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css"/>

    @endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"
    integrity="sha512-mBSqtiBr4vcvTb6BCuIAgVx4uF3EVlVvJ2j+Z9USL0VwgL9liZ638rTANn5m1br7iupcjjg/LIl5cCYcNae7Yg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/cec3a6c7b1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            var activos_table=$('#activos_table').DataTable({
                responsive:true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No hay registros  ",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
                lengthChange: false,
                buttons: [
                    {
                        extend: 'csv',
                    },
                ]
            });
            activos_table.buttons().container()
        .appendTo( '#activos_table_wrapper .col-md-6:eq(0)' );
        });
    </script>
@endsection