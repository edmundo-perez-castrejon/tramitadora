<h3>Corte a la fecha <?php echo $fecha; ?></h3>
<table style="width:50%; font-size: 16px;" >
    <tr>
        <td width="40px"><strong>Bodega</strong></td>
        <td width="50px"><strong>Cantidad</strong></td>
        <td width="50px"><strong>Salidas</strong></td>
        <td width="50px"><strong>Por enviar</strong></td>
        <td width="40px"><strong>Restante</strong></td>

    </tr>
    <?php

    $cantidad_total = 0;
    $peso_total_bodega_total = 0;
    $diferencia_total = 0;

    foreach($datos_bodegas as $nobodega=>$cantidad)
    {
        $peso_total_bodega =$this->salidas_lib->get_peso_total_bodega($cve_cliente,  $datos_buque['CONTRATO'], $nobodega, $fecha);
        $diferencia_peso = $cantidad-$peso_total_bodega;

        $porciento_dif = 0;
        if($cantidad>0){
            $porciento_dif = ($peso_total_bodega*100)/$cantidad;
        }

        echo '<tr>';
        echo '<td >'.$nobodega.'</td>';
        echo '<td >'.number_format($cantidad).'</td>';
        echo '<td >'.number_format($peso_total_bodega).'</td>';
        echo '<td >'.number_format($cantidad-$peso_total_bodega).'</td>';


        $bgcolor = "white";

        if(round($porciento_dif,2) > 30){
            $bgcolor = "#F2F2F2";
        }

        if(round($porciento_dif,2) > 50){
            $bgcolor = "#A9D0F5";
        }

        if(round($porciento_dif,2) > 70){
            $bgcolor = "#81F7BE";
        }

        if(round($porciento_dif,2) > 99){
            $bgcolor = "#ACFA58";
        }

        echo '<td bgcolor='.$bgcolor.' style="line-height:5px;">';
        echo 100-round($porciento_dif,2).'%</td>';

        $cantidad_total += $cantidad;
        $peso_total_bodega_total += $peso_total_bodega;
        $diferencia_total += $cantidad-$peso_total_bodega;
        echo '</tr>';
    }

    $porciento_dif_total = ($peso_total_bodega_total*100)/$cantidad_total;
    ?>
    <tr>
        <td><b>&nbsp;</b></td>
        <td><b><?php echo number_format($cantidad_total); ?></b></td>
        <td><b><?php echo number_format($peso_total_bodega_total); ?></b></td>
        <td><b><?php echo number_format($diferencia_total); ?></b></td>
        <td><b><?php echo 100-round($porciento_dif_total,2);?>%</b></td>
    </tr>
</table>