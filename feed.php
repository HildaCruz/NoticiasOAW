<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="estilos.css" rel="stylesheet" type="text/css"/>
    <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<div class="container">

    <div class="row" id="addRSS">
        <div class="col">
            <form action="RSS.php" method="post">
                <label for="enlace">Enlace del RSS:</label>
                <input type="text" name="enlace">
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>

    <div class="row" id="filterByDates">
        <div class="col">
            <div class="accordion" id="accordionNews">

                <div class="row">
                    <div class='col'>
                        <?php
                        require_once 'simplepie-1.5/autoloader.php';
                        require_once 'News.php';

                        $file = fopen('rss.csv', 'r');
                        $line = fgetcsv($file);
                        fclose($file);

                        $feed = new SimplePie();
                        $feed->set_feed_url($line);
                        $feed->enable_cache();
                        $feed->init();
                        $dates = array();
                        $years = array();
                        $months = array();
                        $days = array();

                        $itemQty = $feed->get_item_quantity();
                        for ($i = 0; $i < $itemQty; $i++) {
                            $item = $feed->get_item($i);
                            $date = $item->get_date("Y-F-l j");
                            $date_array = explode("-", $date);

                            if (!in_array($date_array[0], $years)) {
                                $years[] = $date_array[0];
                            }
                            if (!in_array($date_array[1], $months)) {
                                $months[] = $date_array[1];
                            }
                            if (!in_array($date_array[2], $days)) {
                                $days[] = $date_array[2];
                            }
                        }
                        $years_size = count($years);
                        for ($i = 0; $i < $years_size; $i++) {
                            ?>

                            <div class="card">
                                <div class="card-header">
                                    <h2 class="mb-0">
                                        <?php echo '
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseYear' . $years[$i] . '">
                                            ' . $years[$i] . '
                                        </button>
                                        ' ?>
                                    </h2>
                                </div>

                                <?php echo '
                                <div id="collapseYear' . $years[$i] . '" class="collapse" data-parent="#accordionNews">';
                                $months_size = count($months);
                                for ($j = 0; $j < $months_size; $j++) {
                                    ?>
                                    <div class="card-body">
                                        <div class="accordion" id="accordionNewsMonths">
                                            <div class="card-header">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                        data-target="#collapseMonth<?= $months[$j] ?>">
                                                    <?= $months[$j] ?>
                                                </button>
                                            </div>

                                            <div id="collapseMonth<?= $months[$j] ?>" class="collapse"
                                                 data-parent="#accordionNewsMonths">
                                                <?php

                                                $days_size = count($days);
                                                for ($l = 0; $l < $days_size; $l++) {
                                                    ?>
                                                    <div class="card-body">
                                                        <div class="accordion" id="accordionNewsDays">
                                                            <div class="card-header">
                                                                <button class="btn btn-link" type="button"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapseDay<?= $days[$l] ?>">
                                                                    <?= $days[$l] ?>
                                                                </button>
                                                            </div>

                                                            <div id="collapseDay<?= $days[$l] ?>" class="collapse"
                                                                 data-parent="#accordionNewsDays">
                                                                <div class="card-body">
                                                                    jeje
                                                                    <?php
                                                                    $date_item = $years[$i] . '-' . $months[$j] . '-' . $days[$l];
                                                                    for ($k = 0; $k < $itemQty; $k++) {
                                                                        $item = $feed->get_item($k);
                                                                        if ($item->get_date("Y-F-l j") == $date_item) {
                                                                            echo $item->get_link();
                                                                        } else {
                                                                            echo 'no';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                echo '</div>'; ?>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="node_modules/jquery/dist/jquery.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>
