
<H1><?PHP echo $nombre_cliente;?> </H1>
    <h2>Contratos:</h2>
<ul>
    <?php
    foreach($lst_contratos as $contrato)
    {
        ?><li>
        <?php echo anchor('contratos/get_datos/'.$contrato, $contrato);?>
        </li>
        <?php
    }
    ?>
</ul>
<?php

    ?>