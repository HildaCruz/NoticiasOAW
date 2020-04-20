<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes,  maximum-scale=3">
<title>SCRAPING WEB</title>
</head>

<body>
<?php
    if(isset($_GET['btn'])){
        function file_get_contents_curl($url) {
            $ch = curl_init(); // Inicia sesión cURL
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Configura cURL para devolver el resultado como cadena
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Configura cURL para que no verifique el peer del certificado dado que nuestra URL utiliza el protocolo HTTPS
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $data = curl_exec($ch); // Establece una sesión cURL y asigna la información a la variable $data
            curl_close($ch); // Cierra sesión cURL
            return $data; // Devuelve la información de la función
        }

        function limpiarString($string) {
            $string = str_replace(array("|", "|", "[", "^", "´", "`", "¨", "~", "]", "'", "#", "{", "}", ".", ""), "", $string);
            return $string;
        }

        $url = $_GET['url'];
        $html = file_get_contents_curl($url);
        $doc = new DOMDocument();
        @$doc->loadHTML($html);
        $nodes = $doc->getElementsByTagName('title');
        $title = limpiarString($nodes->item(0)->nodeValue);
        $metas = $doc->getElementsByTagName('meta');

        for($i=0; $i<$metas->length; $i++){
            $meta = $metas->item($i);

            if($meta->getAttribute('name') == 'description' || $meta->getAttribute('name') == 'twitter:description' || $meta->getAttribute('property') == 'og:description'){
                $description = limpiarString($meta->getAttribute('content'));
            } else { 
                $description = "";
            }

            if($meta->getAttribute('name') == 'keywords'){
                $keywords = limpiarString($meta->getAttribute('content'));
            } else {
                $keywords = "";
            }
        }

        $info =  "<strong>TÍTULO:</strong> " . $title . "<br>";
        $info .= "<strong>DESCRIPCIÓN:</strong> " . $description . "<br>";
        $info .= "<strong>CLAVES:</strong> " . $keywords;

        echo $info;
    } else {
?>

    <form>
        <input type="url" name="url" placeholder="Buscar..." required>
        <button name="btn" type="submit">SCRAPEAR</button>
    </form>

<?php
    }
?>
</body>
</html>
