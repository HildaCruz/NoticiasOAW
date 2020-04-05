<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="estilos.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<div class="addRSS">
    <form action="RSS.php" method="post">
        <label for="enlace">Enlace del RSS:</label>
        <input type="text" name="enlace">
        <input type="submit" value="Guardar">
    </form>
</div>

<div class='container'>
    <div class='centrar'>
        <?php
        require_once 'simplepie-1.5/autoloader.php';

        $file = fopen('rss.csv', 'r');
        $line = fgetcsv($file);
        fclose($file);

        $feed = new SimplePie();
        $feed->set_feed_url($line);
        $feed->enable_cache();
        $feed->init();

        $itemQty = $feed->get_item_quantity();
        for ($i = 0; $i < $itemQty; $i++) {
            $item = $feed->get_item($i);
            echo '<article class="articulo">';
            echo '<header class="encabezado">';
            echo '<h3><a href="' . $item->get_link() . '">' . $item->get_title() . '</a></h3>';
            if ($item->get_author()->get_email() != null) {
                echo '<p>' . $item->get_author()->get_name() . ', ' . $item->get_date('Y-m-d H:i:s') . '</p>';
            } else {
                echo '<p>' . $item->get_date('Y-m-d H:i:s') . '</p>';
            }
            echo '<p>' . $item->get_description() . '</p>';
            echo '</header>';
            echo $item->get_content(true);
            echo '</article>';
        }
        ?>
    </div>
</div>

</body>
</html>
