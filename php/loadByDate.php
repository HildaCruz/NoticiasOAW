<?php
$date_query = $_POST["fecha"];
$mysqli = new mysqli('localhost', 'root', '', 'noticias');
if (!$mysqli) {
    $info = "No se pudo realizar la conexión a la base de datos";
} else {
    $query = "SELECT * FROM articulo WHERE fecha = '".$date_query."'";
    echo $query;
    $resultado = $mysqli->query($query);
    if ($resultado->num_rows > 0) {
        while ($aValues = $resultado->fetch_assoc()) {

            $link = $aValues['id'];
            $titulo = $aValues['titulo'];
            $autor = $aValues['autor'];
            $fecha = $aValues['fecha'];
            $hora = $aValues['hora'];
            $descripcion = $aValues['descripcion'];

            $cadena = ' <article><div class="card article" style="margin: 20px;"> <h6 class="card-header"> <a href="' . $link . '">' . $titulo . '</a></h6>';
            $cadena .= '<div class="card-body"><p><em>Autor:</em> ' . $autor . '</p>';
            $cadena .= '<p class="card-text"><em>Fecha:</em> ' . $fecha . '</p><p class="card-text"><em>Hora:</em> ' . $hora . '</p>';
            $cadena .= '<p class="card-text"><em>Descripción:</em><br><div style="padding:15px; text-align: center;"> ' . $descripcion . '</div></p>';
            $cadena .= '</div></div></article>';

            echo json_encode($cadena );
            //echo $cadena;
        }
    }
//LIBERO DB
    $resultado->free();
    $mysqli->close();

} //end else