<?php

//GLOBAL VARIABLES
$dates= array();
$days= array();
$months= array();
$years=array();
$this_month="";
$this_day="";

//DB CONNECTION
$mysqli = new mysqli('localhost', 'root', '', 'noticias');
if (!$mysqli) {
    $info = "No se pudo realizar la conexión a la base de datos";
} else {


//RECIBO TODAS LAS FECHAS

$query = "SELECT * FROM articulo";
$resultado1 = $mysqli->query($query);
if ($resultado1->num_rows > 0) {
    while ($fila = $resultado1->fetch_assoc()) {
        $fecha = $fila['fecha'];
        $this_date = date("Y-m-d", strtotime($fecha));
        array_push($dates, $fecha);
    }
}
?>


    <h4>Filtro por fecha</h4>

    <?php//OBTENGO AÑOS
    $dateLength = count($dates);
    echo($dateLength);
    echo("este año ::: ");
    echo($this_year);
    for($i=0; $i<$dateLength;$i++){
        $this_year = date("Y",($dates[$i]));

        echo("este año 2: ");
        echo($this_year);
    }

/*
   $this_month = date("M",strtotime($fecha));
   $this_day = date("d",strtotime($fecha));
   echo($this_date);
   echo("\n");

    if (in_array($fecha, $dates)==0) {

   */
?>

<div id="accordion">
    <div class="card"> <!--card for a year-->
        <div class="card-header" id="year">
            <h5 class="mb-0 d-inline">
                <button class="btn btn-link" data-toggle="collapse"
                        data-target="#collapseYear" aria-expanded="true" aria-controls="collapseYear">
                    2020
                </button>
            </h5>
        </div>
        <div id="collapseYear" class="collapse show" aria-labelledby="year" data-parent="#accordion">
            <div class="card-body" id="months">

                <div class="card"><!--card for a month-->
                    <div class="card-header month" id="month">
                        <h5 class="mb-0 d-inline">
                            <button class="btn btn-link" data-toggle="collapse"
                                    data-target="#collapseMonth" aria-expanded="true" aria-controls="collapseMonth">
                                Ene
                            </button>
                        </h5>
                    </div>
                    <div id="collapseMonth" class="collapse show" aria-labelledby="month" data-parent="#year">
                        <div class="card-body" id="days">

                            <div class="card"><!--card for a day-->
                                <div class="card-header day" id="day">
                                    <h5 class="mb-0 d-inline">
                                        <button class="btn btn-link">
                                            15
                                        </button>
                                    </h5>
                                </div>
                            </div><!--end card for a day-->

                        </div>
                    </div>
                </div><!--end card for a month-->

            </div>
        </div>

    </div><!--end card for a year-->
</div><!--end accordion-->
<?php
//LIBERO DB
    $resultado1->free();
    $mysqli->close();
} //end else