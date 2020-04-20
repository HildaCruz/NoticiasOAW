<?php

require_once('../simplepie-1.5/autoloader.php');

$feed = new SimplePie();
$success = false;
$mysqli = new mysqli('localhost', 'root', '', 'noticias');

if (!$mysqli) {

    echo("No se pudo realizar la conexión a la base de datos");

} else {

    //Obtener los links y id's de las paginas
    $querySelectPagina = "SELECT id, url FROM pagina";

    if ($result = $mysqli->query($querySelectPagina)) {

        while ($row = $result->fetch_assoc()) {

            $id_pagina = $row['id'];
            $url = $row['url'];

            $feed->set_feed_url($url);
            $feed->enable_cache();
            $feed->init();
            $item_qty = $feed->get_item_quantity();

            for ($i = 0; $i < $item_qty; $i++) {

                $item = $feed->get_item($i);
                $link = $item->get_link();

                //Revisar si la noticia ya está registrada
                $queryCheckIfExists = "SELECT id FROM articulo WHERE link = '" . $link . "'";

                if ($resultCheckIfExists = $mysqli->query($queryCheckIfExists)) {
                    if ($resultCheckIfExists->num_rows > 0) {
                        //Si el link de la noticia ya está registrado, pasamos a la siguiente noticia
                        continue;
                    } else {
                        //Si no está registrada, la registramos

                        $title = $item->get_title();
                        if ($item->get_author() == null) {
                            $author = "Unknown";
                        } else {
                            if ($item->get_author()->get_name() == null) {
                                $author = "Unknown";
                            } else {
                                $author = $item->get_author()->get_name();
                            }
                        }
                        $date = $item->get_date('Y-m-d');
                        $description = $item->get_description();
                        $date_time = $item->get_date('H:i:s');

                        $queryInsertArticulo = "INSERT INTO `articulo` (`id`, `link`, `titulo`, `autor`, `fecha`, `descripcion`, `id_pagina`) VALUES (NULL, '" . $link . "', '" . $title . "', '" . $author . "', '" . $date . "', '" . $description . "', '" . $id_pagina . "')";

                        if ($resultInsertArticulo = $mysqli->query($queryInsertArticulo)) {
                            $success = true;
                        } else {
                            $success = false;
                        }
                    }
                }
            }
        }
    }
    $mysqli->close();
}