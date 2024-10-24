<?php
    function generarTablaProductos($productos){

        echo '<table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Disponibilidad</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Categoria</th>
                    </tr>
                </thead><tbody>';
                
        foreach($productos as $producto){

            
            if($producto["disponibilidad"]){
                $dispo = '<td class="table-success">En stock</td>';
            }else{
                $dispo = '<td class="table-danger">Agotado</td>';
            }

            echo '<tr>
                    <td>'.$producto["nombre"].'</td>
                    <td>'.$producto["precio"].'</td>
                    '.$dispo.'
                    <td>'.$producto["descripcion"].'</td>
                    <td>'.$producto["categoria"].'</td>
                </tr>';
        }

        echo '</tbody></table>';
    }

    function muestraInfoContacto($nombre, $telefono, $foto){
        echo '
            <div class="grid text-center">
                <div class="g-col-6 g-col-md-4 border">'.$nombre.'</div>
                <div class="g-col-6 g-col-md-4 border">'.$telefono.'</div>
                <div class="g-col-6 g-col-md-4 border"><img src="'.$foto.'" alt="Avatar" class="rounded-circle" style="width: 50px; height: 50px;"></div>
            </div>
            ';
    }
?>
