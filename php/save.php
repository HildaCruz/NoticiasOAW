<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>RSS</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body style="margin: 60px;">

        <nav class="navbar navbar-light bg-light" style="margin-bottom: 20px; margin-top: -50px;">
            <a class="navbar-brand">Really Simple Syndication(RSS)</a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
        <?php
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
                $fecha = $item->get_date('Y-m-d H:i:s');
                $descripcion = $item->get_description();

                $queryArticulo = "SELECT * FROM articulo WHERE link = '" . $link . "'";

                $resultadoArticulo = $mysqli->query($queryArticulo);


                if ($resultadoArticulo->num_rows === 0) {
                    // INSERT ARTICULO
                    $sqlItem = "INSERT INTO articulo(link, titulo, autor, fecha, descripcion, id_pagina) values"
                            . "('" . $link . "', '" . $titulo . "', '" . $autor . "', '" . $fecha . "', '" . $descripcion . "', '" . $idPagina . "')";

                    $resSQL = $mysqli->query($sqlItem);
                    
                    echo "<p>Se inserto articulo</p>";
                }
            }
            $resSQL->free();
            $resultadoArticulo->free();
            $resultado->free();
            
            $mysqli->close();
        }
        ?>
    </body>
</html>


