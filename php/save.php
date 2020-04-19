<?php
include "../simplepie-1.5/autoloader.php";
require_once 'simplepie-1.5/autoloader.php';

$url = "https://es.gizmodo.com";
$feed = new SimplePie();
$feed->set_feed_url($url);
$feed->enable_cache();
$feed->init();

$mysqli = new mysqli('localhost', 'root', '', 'noticias');

$nombre = $feed->get_title();
$subtitulo = $feed->get_description();

if (!$mysqli) {

    $info = "No se pudo realizar la conexión a la base de datos";
} else {

    $query = "SELECT id FROM pagina WHERE url = '" . $url . "'";

    $resultado = $mysqli->query($query);

    if ($resultado->num_rows === 0) {
        // INSERT PAGINA
        $sql = "INSERT INTO pagina(nombre, subtitulo, url) values('" . $nombre . "', '" . $subtitulo . "', '" . $url . "')";
        $resultadoSQL = $mysqli->query($sql);
    }
    // SELECT PAGINA
    $resultado = $mysqli->query($query);
    $aValues = $resultado->fetch_assoc();
    $idPagina = $aValues['id'];


    for ($i = 0; $i < $feed->get_item_quantity(); ++$i) {

        $item = $feed->get_item($i);

        $link = $item->get_link();
        $titulo = $item->get_title();
        $autor = ($item->get_author()->get_name() == null) ? "Desconocido" : $item->get_author()->get_name();
        $fecha = $item->get_date('Y-m-d');
        $hora = $item->get_date('H:i:s');
        $descripcion = $item->get_description();

        $queryArticulo = "SELECT * FROM articulo WHERE link = '" . $link . "'";

        $resultadoArticulo = $mysqli->query($queryArticulo);


        if ($resultadoArticulo->num_rows === 0) {
            // INSERT ARTICULO
            $sqlItem = "INSERT INTO articulo(link, titulo, autor, fecha, hora, descripcion, id_pagina) values"
                    . "('" . $link . "', '" . $titulo . "', '" . $autor . "', '" . $fecha . "', '" . $hora . "', '" . $descripcion . "', '" . $idPagina . "')";

            $resSQL = $mysqli->query($sqlItem);

            echo "Se inserto articulo";
        }
    }
    $resSQL->free();
    $resultadoArticulo->free();
    $resultado->free();

    $mysqli->close();
}


