<h1>Contrato <?php echo $datos_buque['CONTRATO']; ?></h1>
<h2>Buque <?php echo $datos_buque['BUQUE']; ?> Proveedor <?php echo $datos_buque['NOMBRE_PROVEEDOR'];?></h2>
<h2> Producto <?php echo $datos_buque['NOMBRE_PRODUCTO']; ?></h2>
    <hr>
        <h2>Bodegas</h2>
            <table border="1">
                <tr>
                    <td><strong>Bodega</strong></td>
                    <td><strong>Cantidad</strong></td>
                    <td><strong>Salidas</strong></td>
                    <td><strong>---</strong></td>
                    <td>
                    <table width="500">
                        <tr>
                            <td WIDTH="25%" align="right">25%|</td>
                            <td WIDTH="25%" align="right">50%|</td>
                            <td WIDTH="25%" align="right">75%|</td>
                            <td WIDTH="25%" align="right">100%|</td>
                        </tr>
                    </table>
                    </td>
                </tr>
                <?php
                foreach($datos_bodegas as $nobodega=>$cantidad)
                {
                    $peso_total_bodega =$this->salidas_lib->get_peso_total_bodega($this->session->userdata('cliente'),  $datos_buque['CONTRATO'], $nobodega);
                    $diferencia_peso = $cantidad-$peso_total_bodega;

                    $porciento_dif = 0;
                    if($cantidad>0){
                        $porciento_dif = ($peso_total_bodega*100)/$cantidad;
                    }

                    echo '<tr>';
                    echo '<td>'.$nobodega.'</td>';
                    echo '<td>'.$cantidad.'</td>';
                    echo '<td>'.$peso_total_bodega.'</td>';

                    if(round($porciento_dif,2)>100){
                        echo '<td bgcolor="green"> ';
                    }else{
                        echo '<td>';
                    }
                    echo round($porciento_dif,2).'%</td>';

                    $ancho_celda = $porciento_dif * 5;
                    echo '<td>';
                    echo '<table width="'.$ancho_celda.'"><tr><td bgcolor="gray">&nbsp;</td></tr></table>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
<hr>

<h2>Destinos</h2>

    <ul>
<?php

foreach($datos_destinos as $destino){
    ?><li><?php
    echo $destino['NOMBRE_DESTINO'];
    echo ', Maxima captura: ';
    echo $destino['MAXIMA_CAPTURA'];
    echo ', Ordenado: ';
    echo $destino['ORDENADO'];
    echo ', TOTAL SALIDAS:'.$this->salidas_lib->get_peso_total($destino['CLAVE_DESTINO']);
    echo anchor('salidas/info_salidas/'.$destino['CLAVE_DESTINO'],' Ver salidas');

}

?>
    </ul>