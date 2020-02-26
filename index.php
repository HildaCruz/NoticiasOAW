<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>RSS</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="peticion.js"></script>
    </head>
    <body style="margin: 60px;">
        
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="busqueda" name="busqueda">Burcar</button> -->

        <nav class="navbar navbar-light bg-light" style="margin-bottom: 20px; margin-top: -50px;">
            <a class="navbar-brand">Really Simple Syndication(RSS)</a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
            </form>
        </nav>

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
            }
            
            $resultado->free();
            $mysqli->close();
        }
        ?>
    </body>
</html>
