<h1>Contrato <?php echo $datos_buque['CONTRATO']; ?></h1>
<h2>Buque <?php echo $datos_buque['BUQUE']; ?> Proveedor <?php echo $datos_buque['NOMBRE_PROVEEDOR'];?></h2>
<h2> Producto <?php echo $datos_buque['NOMBRE_PRODUCTO']; ?></h2>
    <hr>
        <h2>Bodegas</h2>
            <table>
                <tr>
                    <td><strong>Bodega</strong></td>
                    <td><strong>Cantidad</strong></td>
                </tr>
                <?php
                foreach($datos_bodegas as $nobodega=>$bodega)
                {
                    echo '<tr>';
                    echo '<td>'.$nobodega.'</td>';
                    echo '<td>'.$bodega.'</td>';
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
}

?>
    </ul>