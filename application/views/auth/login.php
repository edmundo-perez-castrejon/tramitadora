<div class='mainInfo'>

	<div class="pageTitle">Acceso</div>
    <div class="pageTitleBorder"></div>
	<p>Por favor, ingrese su correo y clave para acceder al sistema</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
    <?php echo form_open("auth/login");?>
    	
      <p>
      	<label for="identity">Correo electronico</label>
      	<?php echo form_input($identity);?>
      </p>
      
      <p>
      	<label for="password">Clave:</label>
      	<?php echo form_input($password);?>
      </p>

      
      <p><?php echo form_submit('submit', 'Login');?></p>

      
    <?php echo form_close();?>

</div>
