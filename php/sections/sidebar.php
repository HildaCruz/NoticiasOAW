<?php

//GLOBAL VARIABLES
$dates= array(); //todas las fechas existentes en la bd no repetidas por Y-m-d

//DB CONNECTION
$mysqli = new mysqli('localhost', 'root', '', 'noticias');
if (!$mysqli) {
    $info = "No se pudo realizar la conexión a la base de datos";
} else {
    //RECIBO TODAS LAS FECHAS
    $query = "SELECT * FROM articulo";
    $resultado = $mysqli->query($query);
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $fecha = $fila['fecha'];
            if(in_array($fecha,$dates) == false){
                array_push($dates, $fecha);
            }
        }
    }
    //LIBERO DB
        $resultado->free();
        $mysqli->close();
} //end else
?><h4>Filtro por fecha</h4><?php
sort($dates);
$dates = array_reverse($dates);
$dateLength = count($dates);

$years=array();
for($i=0; $i<$dateLength;$i++) {//POR CADA FECHA
    $this_year = date("Y", strtotime($dates[$i]));//OBTENGO EL AÑO
    if (in_array($this_year, $years) == false) {//mientras no se haya hecho ese año:
        $yearMonths = array();
        for ($j = 0; $j < $dateLength; $j++) {//busco todos los que tengan ese año
            $temp_year = date("Y", strtotime($dates[$j]));
            if ($this_year == $temp_year) {
                array_push($yearMonths, $dates[$j]); //añado los meses al array temporal de ese año
            }
        }

        //CREO ACORDEON y CARD AÑO:?>
        <div class="accordion">
        <div class="card-header year"><!--year-->
            <a data-toggle="collapse" href="#collapseMonths-<?php echo $this_year;?>" role="button" aria-expanded="false" aria-controls="collapseMonths-<?php echo $this_year;?>">
                <?php echo $this_year;?>
            </a>
        </div>
        <div class="collapse" id="collapseMonths-<?php echo $this_year;?>"><!--MONTHS-->
        <?php

        $yearMonths = array_reverse($yearMonths);
        $yMonthLength = count($yearMonths);
        $months = array();
        for ($j = 0; $j < $yMonthLength; $j++) { //OBTENGO EL MES DEL AÑO
            $this_month = date("m", strtotime($yearMonths[$j])); //numero
            if (in_array($this_month,$months)==false) {//mientras no se haya hecho ese mes:
                $monthDays = array();
                for ($k = 0; $k < $yMonthLength; $k++) {//busco todos los que tengan ese mes
                    $temp_month = date("m", strtotime($yearMonths[$j]));
                    if ($this_month == $temp_month) {
                        array_push($monthDays, $yearMonths[$k]); //añado los días al array temporal de ese mes
                    }
                }

                //CREO Y CIERRO CARD MES
                $this_Month = date("M", strtotime($yearMonths[$j])); //letra?>
                <div class="card-header month"><!--month-->
                    <a data-toggle="collapse" href="#collapseDays-<?php echo $this_Month.$this_year;?>" role="button" aria-expanded="false" aria-controls="collapseDays-<?php echo $this_Month.$this_year;?>">
                        <?php echo $this_Month;?>
                    </a>
                </div>
                <div class="collapse" id="collapseDays-<?php echo $this_Month.$this_year;?>"><!--DAYS-->
                <?php

                $monthDays = array_reverse($monthDays);
                $mDayLength = count($monthDays);
                $days=array();
                for ($m = 0; $m < $yMonthLength; $m++) { //OBTENGO EL DÍA DEL MES
                    $this_day = date("d",strtotime($dates[$i]));
                    $this_date = date("Y-m-d",strtotime($dates[$i]));
                    if(in_array($this_day,$days)==false) {//mientras no se haya hecho ese día:

                        //CREO CARD DÍA?>
                            <div class="card-header day"><!--day-->
                                <button class="btn btn-link" onclick="buscarFecha('<?php echo $this_date?>')"><?php echo $this_day;?></button>
                            </div>
                        <?php
                        array_push($days,$this_day);//consumo el día como hecho
                    }

                }
                //CIERRO EL MES?></div><?php
                array_push($months,$this_month);//consumo el mes como hecho
            }
        }
        //CIERRO EL ACORDEON Y CARD DEL AÑO?> </div></div><?php
        array_push($years, $this_year);//consumo el año como hecho
    }
}
