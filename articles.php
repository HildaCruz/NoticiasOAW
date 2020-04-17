<?php
/**
 * Created by PhpStorm.
 * User: Hilda Cruz
 * Date: 17/04/2020
 * Time: 05:21 PM
 */


$mysqli = new mysqli('localhost', 'root', '', 'noticias');
if (!$mysqli) {
    $info = "No se pudo realizar la conexión a la base de datos";
} else {





                    $query = "SELECT * FROM articulo";
                    $resultado2 = $mysqli->query($query);
                    if ($resultado2->num_rows > 0) {
                        while ($aValues = $resultado2->fetch_assoc()) {

                            $link = $aValues['id'];
                            $titulo = $aValues['titulo'];
                            $autor = $aValues['autor'];
                            $fecha = $aValues['fecha'];
                            $descripcion = $aValues['descripcion'];

                            $cadena = ' <article>';
                            $cadena .= '<div class="card article" style="margin: 20px;"> <h6 class="card-header"> <a href="' . $link . '">' . $titulo . '</a></h6>';
                            $cadena .= '<div class="card-body"><p><em>Autor:</em> ' . $autor . '</p>';
                            $cadena .= '<p class="card-text"><em>Fecha:</em> ' . $fecha . '</p>';
                            $cadena .= '<p class="card-text"><em>Descripción:</em><br><div style="padding:15px; text-align: center;"> ' . $descripcion . '</div></p>';
                            $cadena .= '</div></div>';
                            $cadena .= '</article>';
                            echo $cadena;
                        }
                    }
//LIBERO DB

$resultado2->free();
$mysqli->close();

} //end else