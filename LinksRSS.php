<?php
if(isset($_POST['url'])){
    $url = $_POST['url'].PHP_EOL;

    $file = fopen('archivo.txt', 'a');
    fwrite($file,$url);
    fwrite($file, '');
    fclose($file);

    require_once 'simplepie-1.5/autoloader.php';

    $urlsimple = $_POST['url'];
    $feed = new SimplePie();
    $feed->set_feed_url($urlsimple);
    $feed->enable_cache();
    $feed->init();

    $nombre = $feed->get_title();
    $subtitulo = $feed->get_description();

    $mysqli = new mysqli('localhost', 'root', '', 'noticias');
    if (!$mysqli) {

        $info = "No se pudo realizar la conexión a la base de datos";
    } else {
        $query = "INSERT INTO `pagina` (`id`, `nombre`, `subtitulo`, `url`) VALUES (NULL, '".$nombre."', '".$subtitulo."', '".$urlsimple."');";
        $resultadoSQL = $mysqli->query($query);
    }
}
header('Location: index.php');
?>