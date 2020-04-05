<?php
if(isset($_POST['enlace'])) {
    $url = $_POST['enlace'];
    $file = fopen('rss.csv', 'w');
    fwrite($file, $url);
    fclose($file);
    header("Location: feed.php");
}
else {
    echo "URL not provided";
}