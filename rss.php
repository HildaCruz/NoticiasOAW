//$url = 'http://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml';
<?php
    include "simplepie-1.5/autoloader.php";
    require_once 'simplepie-1.5/autoloader.php';


    $url = 'https://www.reforma.com/rss/cultura.xml';
    $current_url = $_GET["_url"];
    echo $_GET["url"];
    
    $feed = new SimplePie();
    $feed->set_feed_url($url);
    $feed->enable_cache();
    $feed->init();

    echo '<h1>' . $feed->get_title() . '</h1>';
    echo '<p>' . $feed->get_description() . '</p>';
    
    //foreach ($feed->get_items(4, 4) as $item) {
    $itemQty = $feed->get_item_quantity();
    for ($i = 0; $i < $itemQty; $i++) {
        $item = $feed->get_item(0);
        echo '<article>';
        echo '<header>';
        echo '<p>Title: <a href="' . $item->get_link() . '">' . $item->get_title() . '</a></p>';
        echo '<p>Author: ' . $item->get_author()->get_name() . '</p>';
        echo '<p>Date: ' . $item->get_date('Y-m-d H:i:s') . '</p>';
        echo '<p>Description: ' . $item->get_description() . '</p>';
        echo '</header>';
        echo $item->get_content(true);
        echo '</article>';
    }
    
    ?>