<?php 
include("includes/includedFiles.php");
?>
<div class="userDetails">
	<div class="container borderBottom">
		<h2>Email</h2>
		<input type="text" class="email" name="email" placeholder="Email..." value="<?php echo $userLoggedIn->getEmail(); ?>">
		<span class="message"></span>
		<button class="button morado" onclick="updateEmail('email')">Guardar</button>
	</div>
	<div class="container">
		<h2>Contraseña</h2>
		<input type="password" class="oldPassword" name="oldPassword" placeholder="Contraseña actual">
		<input type="password" class="newPassword1" name="newPassword1" placeholder="Nueva contraseña">
		<input type="password" class="newPassword2" name="newPassword2" placeholder="Confirma contraseña">
		<span class="message"></span>
		<button class="button morado" onclick="updatePassword('oldPassword', 'newPassword1', 'newPassword2')">Guardar</button>
	</div>
</div>