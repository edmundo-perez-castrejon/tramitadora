<style type="text/css">
    p.css-vertical-text {
        color:#333;
        border:0px solid red;
        writing-mode:tb-rl;
        -webkit-transform:rotate(270deg);
        -moz-transform:rotate(270deg);
        -o-transform: rotate(270deg);
        white-space:nowrap;
        display:block;
        bottom:0;
        width:20px;
        height:20px;
        font-family: ‘Trebuchet MS’, Helvetica, sans-serif;
        font-size:12px;
        font-weight:normal;
        text-shadow: 0px 0px 1px #333;
    }
</style>

<script type="text/JavaScript">

    function timedRefresh(timeoutPeriod) {
        setTimeout("location.reload(true);",timeoutPeriod);
    }
</script>



<div class="container-fluid">
    <div class="sidebar" style="width:160px; font-size: 11px;">
        <div class="well">
            <h5>Destinos</h5>
            <ul>
                <li><?php echo anchor('contratos/get_destinos','Ver detalle');?></li>
            </ul>
            <h5>Reportes</h5>
            <ul>
                <li><?php echo anchor('reportes/mov_por_bodega','Movs. por Bodega');?></li>
                <li><?php echo anchor('reportes/det_envios','Det. de Envios');?></li>
                <li><?php echo anchor('reportes/det_destinos','Det. de Destinos');?></li>
                <li><?php echo anchor('reportes/det_transportes','Det. de Transporte');?></li>

            </ul>
        </div>

    </div>
    <div class="content" style="margin-left: 170px;">
        <div class="hero-unit" style="padding-top: 15px;">
            <h1>Contrato <?php echo $datos_buque['CONTRATO']; ?></h1>
            <h3>Buque <?php echo $datos_buque['BUQUE']; ?> Proveedor <?php echo $datos_buque['NOMBRE_PROVEEDOR'];?></h3>
            <h3> Producto <?php echo $datos_buque['NOMBRE_PRODUCTO']; ?></h3>

            <div id="graficabarras" style="background-image: url('<?php echo base_url();?>images/cargo/cargo-ship-drawing.png'); height: 215px;">
                <div id="barras" style="padding-left: 85px; padding-top: 155px;">
                    <?php
                        $alto_maximo = 35;
                    ?>
                    <table style="width:85%;" align="center">
                        <tr>
                            <?php
                            foreach($datos_bodegas as $nobodega=>$cantidad)
                            {
                                $peso_total_bodega =$this->salidas_lib->get_peso_total_bodega($cve_cliente,  $datos_buque['CONTRATO'], $nobodega);
                                $diferencia_peso = $cantidad-$peso_total_bodega;

                                $porciento_dif = 0;
                                if($cantidad>0){
                                    $porciento_dif = ($peso_total_bodega*100)/$cantidad;
                                }

                                $restante_porciento = 100-round($porciento_dif,2);

                                #Ajuste del restante por cierto contra el maximo de pixels
                                #si 35 = 100% cuanto es $restanteporciento en pixels?

                                $result_ajuste = ($restante_porciento*$alto_maximo)/100;

                                echo '<td   style="border-top: 0px;">';
                                echo '<p class="css-vertical-text" style="font-size: 16px;">';
                                for($i=0;$i<$result_ajuste;$i++)
                                {
                                    echo '|';
                                }
                                echo '</p>';
                                echo '</td>';
                                echo "<td style='font-size: 12px;'>$restante_porciento%</td>";


                            }
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
            <table style="width:100%; font-size: 11px; padding: 0; border-collapse: collapse;">
                <tr>
                    <td width="40px"><strong>Bodega</strong></td>
                    <td width="50px"><strong>Cantidad</strong></td>
                    <td width="50px"><strong>Salidas</strong></td>
                    <td width="40px"><strong>Restante</strong></td>

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
                    echo '<td style="line-height:5px;">'.number_format($cantidad).'</td>';
                    echo '<td style="line-height:5px;">'.number_format($peso_total_bodega).'</td>';

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


                    echo '</tr>';
                }
                ?>
            </table>
            <!-- <p><a class="btn primary large">Destinos &raquo;</a></p> -->
        </div>

        </div>
</div>

<script type="text/javascript">
        timedRefresh(6000);
</script>