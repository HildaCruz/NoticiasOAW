<?php 
include "simplepie-1.5/autoloader.php";
require_once 'simplepie-1.5/autoloader.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta  http-equiv=”Content-Type” content=”text/html; charset="UTF-8">

        <title>Hello there</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="peticion.js"></script>

        <link href="main.css" rel="stylesheet">
        <script>
            function loadNewsByDate(date){
                document.getElementById('news').innerHTML = //VER CÓMO CARGAR NOTICIAS POR PHP
            }
        </script>
    </head>
    <body>
        <div class="navbar">
            <div>
                <h1>Noticias RSS </h1>
                <h5>(Really Simple Syndication)</h5>
            </div>
            
            <form action="LinksRSS.php" method="post">
                <input type="text" id="_url" name="url" style="width: 450px" placeholder="Para añadir un RSS inserte el url aquí">
                <button type="submit" class="btn btn-dark">Añadir</button>
            </form>
            <button type="button" class="btn btn-dark">Actualizar noticias</button>
        </div>
        <div class="row content">
            <div class="sidebar col-lg-2">
                <h4>Filtro por fecha</h4>

                <div class="accordion" id="accordion">
                    <div class="card">
                    <?php
                    $mysqli = new mysqli('localhost', 'root', '', 'noticias');

                    if (!$mysqli) {
                        $info = "No se pudo realizar la conexión a la base de datos";
                    } else {
                        $query = "SELECT * FROM articulo";
                        $resultado = $mysqli->query($query); 
                        if ($resultado->num_rows > 0) {
                            $current_year = "";
                            $current_month = "";
                            $current_day = "";

                            while ($aValues = $resultado->fetch_assoc()) {
                                $fecha = $aValues['fecha'];
                                $link = $aValues['id'];
                                $this_year = date("Y",strtotime($fecha));
                                $this_month = date("M",strtotime($fecha));
                                $this_day = date("d",strtotime($fecha));
                                if($this_year != $current_year){?>
                                    <div class="card-header" id="year-<?php echo $this_year?>">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseYear<?php echo $this_year?>" aria-expanded="true" aria-controls="year-<?php echo $this_year?>">
                                            <?php echo $this_year;?>
                                            </button>
                                        </h5>
                                    </div>
                               <?php }
                                if($this_month != $current_month){?>
                                    <div id="collapseYear<?php echo $this_year?>" class="collapse show" aria-labelledby="year-<?php echo $this_year?>" data-parent="#accordion">
                                        <div class="card-header month" id="month-<?php echo $this_month?>">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseMonth<?php echo $this_month?>" aria-expanded="true" aria-controls="month-<?php echo $this_month?>">
                                                <?php echo $this_month;?>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseMonth<?php echo $this_month?>" class="collapse" aria-labelledby="month-<?php echo $this_month?>" data-parent="#year-<?php echo $this_year?>">
                                        
                                <?php }
                                if($this_day != $current_day){
                                    $date_to_find = $this_day."-".$this_month."-".$this_year; ?>
                                            <div class="card-header day" id="day-<?php echo $this_day?>" onclick="loadNewsByDate(<?php echo $date_to_find?>)">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDay<?php echo $this_day?>" 
                                                    aria-expanded="true" aria-controls="day-<?php echo $this_day?>">
                                                        <?php echo $this_day;?>
                                                    </button>
                                                </h5>
                                            </div>
                                <?php }
                                //end card
                                $current_year = $this_year;
                                $current_month = $this_month;
                                $current_day = $this_day;
                            }?> 
                                        </div> <!--collapse month-->
                                    </div><!--collapse year-->
                    <?php } //end if ?>
                        
                    </div> <!--card-->         
                </div> <!--accordion-->
            </div> <!--sidebar-->

            <div id="results" class="col-lg-10">
                <div class="col-lg-12 search-input">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button type="submit" class="btn btn-dark">Buscar</button>
                    </form>
                </div>
                <div id="news" class="col-lg-12">
                <?php
                    $query = "SELECT * FROM articulo";
                    $resultado = $mysqli->query($query); 
                    if ($resultado->num_rows > 0) {
                        while ($aValues = $resultado->fetch_assoc()) {
                            
                            $link = $aValues['id'];
                            $titulo = $aValues['titulo'];
                            $autor = $aValues['autor'];
                            $fecha = $aValues['fecha'];
                            $descripcion = $aValues['descripcion'];

                            $cadena = ' <article>';
                            $cadena .= '<div class="card" style="margin: 20px;"> <h6 class="card-header"> <a href="' . $link . '">' . $titulo . '</a></h6>';
                            $cadena .= '<div class="card-body"><p><em>Autor:</em> ' . $autor . '</p>';
                            $cadena .= '<p class="card-text"><em>Fecha:</em> ' . $fecha . '</p>';
                            $cadena .= '<p class="card-text"><em>Descripción:</em><br><div style="padding:15px; text-align: center;"> ' . $descripcion . '</div></p>';
                            $cadena .= '</div></div>';
                            $cadena .= '</article>';
                            echo $cadena;
                        }
                        
                    $resultado->free();
                    $mysqli->close();
                    }
                
                } //end else
                ?>
                </div>

            </div>
    </body>
</html>
