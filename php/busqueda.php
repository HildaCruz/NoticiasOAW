<?php
$buscar = $_POST['palabra'];
if (empty($buscar)) {
    die("No hay nada que buscar");
} else {
    $mysqli = new mysqli('localhost', 'root', '', 'noticias');
    if (!$mysqli) {
        $info = "No se pudo realizar la conexión a la base de datos";
    } else {
        $query = "SELECT link, titulo, autor, fecha, hora, descripcion FROM articulo
                WHERE MATCH (titulo, autor, descripcion) AGAINST ('$buscar*' IN BOOLEAN MODE)";
        $resultado = $mysqli->query($query);
        if ($resultado->num_rows > 0) {
            while ($aValues = $resultado->fetch_assoc()) {

                $link = $aValues['id'];
                $titulo = $aValues['titulo'];
                $autor = $aValues['autor'];
                $fecha = $aValues['fecha'];
                $hora = $aValues['hora'];
                $descripcion = $aValues['descripcion'];

                $cadena = "<article><div class='card article' style='margin: 20px;'> <h6 class='card-header'> <a href='" . $link . "'>" . $titulo . "</a></h6>";
                $cadena .= "<div class='card-body row'><div class='col-lg-3'><p class='card-text'><em>Autor:</em>" . $autor . "</p>";
                $cadena .= "<p class='card-text'><em>Fecha:</em>" . $fecha . "</p>";
                if ($hora != "") {
                    $cadena .= "<p class='card-text'><em>Hora:</em> " . $hora . "</p>";
                }
                $cadena .= "</div><div class='col-lg-9 card-text'><p><em>Descripción:</em><br><div style='padding:15px; text-align: center;'> " . $descripcion;
                $cadena .= "</div></p></div></div></div></article>";
                echo($cadena);
            }
        }
        $resultado->free();
        $mysqli->close();
    }
}