<div class="container-fluid">
    <div class="sidebar" style="width:150px;">
        <div class="well">
            <h5>Destinos</h5>
            <ul>
                <li><?php echo anchor('contratos/get_destinos','Ver detalle');?></li>
            </ul>
            <h5>Reportes</h5>
            <ul>
                <li><a href="#">Reporte 1</a></li>
                <li><a href="#">Reporte 2</a></li>
                <li><a href="#">Reporte 3</a></li>
                <li><a href="#">Reporte 4</a></li>
                <li><a href="#">Reporte 5</a></li>
            </ul>
        </div>
    </div>
    <div class="content" style="margin-left: 160px;">
        <div class="hero-unit">
            <h1>Contrato <?php echo $datos_buque['CONTRATO']; ?></h1>
            <h3>Buque <?php echo $datos_buque['BUQUE']; ?> Proveedor <?php echo $datos_buque['NOMBRE_PROVEEDOR'];?></h3>
            <h3> Producto <?php echo $datos_buque['NOMBRE_PRODUCTO']; ?></h3>


            <table style="width:100%; font-size: 11px; padding: 0; border-collapse: collapse;">
                <tr>
                    <td width="40px"><strong>Bodega</strong></td>
                    <td width="50px"><strong>Cantidad</strong></td>
                    <td width="50px"><strong>Salidas</strong></td>
                    <td width="40px"><strong>Restante</strong></td>
                    <td style="line-height:5px; font-size: 15px; color: #dcdcdc;">
                       <?php
                        for($i=0;$i<100;$i++)
                        {
                            echo '|';
                        }
                        ?>

                    </td>
                </tr>
                <?php
                foreach($datos_bodegas as $nobodega=>$cantidad)
                {
                    $peso_total_bodega =$this->salidas_lib->get_peso_total_bodega($cve_cliente,  $datos_buque['CONTRATO'], $nobodega);
                    $diferencia_peso = $cantidad-$peso_total_bodega;

                    $porciento_dif = 0;
                    if($cantidad>0){
                        $porciento_dif = ($peso_total_bodega*100)/$cantidad;
                    }

                    echo '<tr>';
                    echo '<td style="line-height:5px;">'.$nobodega.'</td>';
                    echo '<td style="line-height:5px;">'.$cantidad.'</td>';
                    echo '<td style="line-height:5px;">'.$peso_total_bodega.'</td>';

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

                    echo '<td  style="line-height:5px; font-size: 15px;">';
                    #echo '<table style="width:'.$ancho_celda.'px;" ><tr><td bgcolor="gray">&nbsp;</td></tr></table>';
                    for($i=0;$i<100-round($porciento_dif,2);$i++)
                    {
                        echo '|';
                    }
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>

            <!-- <p><a class="btn primary large">Destinos &raquo;</a></p> -->
        </div>

        </div>
</div>