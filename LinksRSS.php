<?php
if(isset($_POST['url'])){
    $url = $_POST['url'].PHP_EOL;

    $file = fopen('archivo.txt', 'a');
    fwrite($file,$url);
    fwrite($file, '');
    fclose($file);
}
header('Location: index.php');
?>