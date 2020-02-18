<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'simplepie-1.5/autoloader.php';

        $fp = fopen("archivo.txt", "r");
        while (!feof($fp)) {
            $linea = fgets($fp);
        }
        fclose($fp);

        //$url = 'http://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml';
        //http://feeds.weblogssl.com/xataka2.xml
        $url = $linea;
        $feed = new SimplePie();
        $feed->set_feed_url($url);
        $feed->init();
        
        for ($i = 0; $i < $feed->get_items(); ++$i) {
            $item = $feed->get_item($i);

            $cadena = '<h1>' . $feed->get_title() . '</h1>';
            $cadena .= '<p>' . $feed->get_description() . '</p>';
            $cadena .= '<article>';
            $cadena .= '<header>';
            $cadena .= '<p>Title: <a href="' . $item->get_link() . '">' . $item->get_title() . '</a></p>';
            $cadena .= '<p>Author: ' . $item->get_author()->get_name() . '</p>';
            $cadena .= '<p>Date: ' . $item->get_date('Y-m-d H:i:s') . '</p>';
            $cadena .= '<p>Description: ' . $item->get_description() . '</p>';
            $cadena .= '</header>';
            $cadena .= $item->get_content(true);
            $cadena .= '</article><br><br><br>';
            echo $cadena;
        }
        ?>
    </body>
</html>
