<?php
echo form_open('contratos/index');
echo form_input('cve_cliente',set_value('cve_cliente','A-01'));

echo form_submit('Enviar','Consultar cliente');
echo form_close();
?>