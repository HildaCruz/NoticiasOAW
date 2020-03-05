<?php 
include "simplepie-1.5/autoloader.php";
require_once 'simplepie-1.5/autoloader.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Hello there</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="peticion.js"></script>

        <link href="main.css" rel="stylesheet">
        <script>
            function getrss(){
                var url = document.getElementById('_url').value;
                alert(url);
            }
        </script>
    </head>
    <body>
        <div class="navbar">
            <div>
                <h1>Noticias RSS </h1>
                <h5>(Really Simple Syndication)</h5>
            </div>
            
            <form onsubmit="getrss();" action="LinksRSS.php" method="post">
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
                        <div class="card-header" id="year">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseYear" aria-expanded="true" aria-controls="year">
                                2020
                                </button>
                            </h5>
                        </div>
                        <div id="collapseYear" class="collapse show" aria-labelledby="year" data-parent="#accordion">
                            <div class="card-header" id="month">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseMonth" aria-expanded="true" aria-controls="month">
                                    Enero
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseMonth" class="collapse" aria-labelledby="month" data-parent="#year">
                                <div class="card-header" id="day">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDay" aria-expanded="true" aria-controls="day">
                                        12
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseDay" class="collapse" aria-labelledby="day" data-parent="#month">
                                <div class="card-body">
                                    Noticia1
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="results" class="col-lg-10">
                <form class="form-inline search-input">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button type="submit" class="btn btn-dark">Buscar</button>
                </form>

                <?php
                $mysqli = new mysqli('localhost', 'root', 'root', 'noticias');

                if (!$mysqli) {
                    $info = "No se pudo realizar la conexión a la base de datos";
                } else {
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
                    }
                ?>


            </div>
    </body>
</html>
