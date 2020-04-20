<?php
if(isset($_POST['url'])){

    $url = $_POST['url'].PHP_EOL;

    $abierto = verificar_url($url);

    if($abierto){
        //$file = fopen('../archivo.txt', 'a');
        //fwrite($file,$url);
        //fwrite($file, '');
        //fclose($file);

        require_once '../simplepie-1.5/autoloader.php';

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

    }else{
        echo "La URL no existe o es inaccesible...";
    }

}

header('Location: ../index.html');

function verificar_url($url){
    //abrimos el archivo en lectura
    $id = @fopen($url,"r");
    //hacemos las comprobaciones
    if ($id) $abierto = true;
    else $abierto = false;
    //devolvemos el valor
    return $abierto;
    //cerramos el archivo
    fclose($id);
 }

?>