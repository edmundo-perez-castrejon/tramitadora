<h1>Salidas</h1>

    <hr><h3>Bodegas</h3>
<table BORDER="2">
    <tr><td>bodega</td><td>Total</td></tr>
    <?php
    foreach($lst_detalle_bodegas as $bodega)
    {
        echo '<tr>';
        echo '<td>'.$bodega['CLAVE_BODEGA_DESTINO'].'</td>';
        echo '<td>'.$bodega['TOTAL'].'</td>';
        echo '</tr>';
    }

    ?>
    <tr><td>Gran total</td><td><strong><?php echo $peso_bruto_total; ?></strong></td></tr>
</table>
<?php

?>
    <hr><h3>Detalle</h3>
    <table border="1">
        <tr>
            <td><strong>Progresivo</strong></td>
            <td><strong>No Salida</strong></td>
            <td><strong>Bodega</strong></td>
            <td><strong>Placas</strong></td>
            <td><strong>Chofer</strong></td>
            <td><strong>Marca camion</strong></td>
            <td><strong>Serie camion</strong></td>
            <td><strong>Sellos</strong></td>
            <td><strong>Tipo</strong></td>
            <td><strong>No Carro</strong></td>
            <td><strong>S/G</strong></td>
            <td><strong>Cantidas_sacos</strong></td>
            <td><strong>Fecha</strong></td>
            <td><strong>Ticket</strong></td>
            <td><strong>Peso bruto</strong></td>
            <td><strong>tara</strong></td>
            <td><strong>Descargar2</strong></td>
            <td><strong>Placas jaula</strong></td>
            <td><strong>Carta porte</strong></td>
        </tr>
        <?php

            foreach($lst_salidas as $salida){
                echo '<tr>';
                echo '<td>'.$salida['PROGRESIVO'].'</td>';
                echo '<td>'.$salida['NO_SALIDA'].'</td>';
                echo '<td>'.$salida['CLAVE_BODEGA_DESTINO'].'</td>';
                echo '<td>'.$salida['PLACAS'].'</td>';
                echo '<td>'.$salida['CHOFER'].'</td>';
                echo '<td>'.$salida['MARCA_CAMION'].'</td>';
                echo '<td>'.$salida['SERIE_CAMION'].'</td>';
                echo '<td>'.$salida['SELLOS'].'</td>';
                echo '<td>'.$salida['TIPO'].'</td>';
                echo '<td>'.$salida['NO_CARRO'].'</td>';
                echo '<td>'.$salida['S/G'].'</td>';
                echo '<td>'.$salida['CANTIDAD_SACOS'].'</td>';
                echo '<td>'.$salida['FECHA'].'</td>';
                echo '<td>'.$salida['TICKET'].'</td>';
                echo '<td>'.$salida['PESO_BRUTO'].'</td>';
                echo '<td>'.$salida['TARA'].'</td>';
                echo '<td>'.$salida['DESCARGAR2'].'</td>';
                echo '<td>'.$salida['PLACAS_JAULA'].'</td>';
                echo '<td>'.$salida['CARTA_PORTE'].'</td>';

                echo '</tr>';
            }
        ?>
    </table>
