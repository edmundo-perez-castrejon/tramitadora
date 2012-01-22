
<H1><?PHP echo $nombre_cliente;?> </H1>
    <h2>Contratos:</h2>
<ul>
    <?php
    foreach($lst_contratos as $usr =>$contrato)
    {

        ?><li>
        <?php echo anchor('contratos/get_datos/'.current($contrato).'/'.key($contrato), current($contrato).'/'.key($contrato));?>
        </li>
        <?php
    }
    ?>
</ul>
<?php

    ?>