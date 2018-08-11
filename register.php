<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account = new Account($con);
	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");
	function getInputValue($name){
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}
?>
<html>
<head>
	<title>¡Bienvenido A Corchea!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- <script src="assets/js/register-start.js"></script> -->
	<script src="assets/js/register.js"></script>
</head>
<body>
	<div id="background">
		<div id="loginContainer">
			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Iniciar Sesión</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed);?>
						<label for="loginUsername">Nombre De Usuario</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="ej: TonyStark" value="<?php getInputValue('loginUsername') ?>" required>
					</p>
					<p>
						<label for="loginPassword">Contraseña</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="Tu contraseña" required>
					</p>
					<button type="submit" name="loginButton">Inicia Sesión</button>
					<div class="hasAccountText">
						<span id="hideLogin">¿No tienes una cuenta aun? Registrate aqui.</span>
					</div>
				</form>
				<form id="registerForm" action="register.php" method="POST">
					<h2>Registra tu cuenta</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameLenght);?>
						<?php echo $account->getError(Constants::$usernameTaken);?>
						<label for="username">Nombre De Usuario</label>
						<input id="username" name="username" type="text" placeholder="ej: TonyStark" value="<?php getInputValue('username') ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$fnLenght);?>
						<label for="firstName">Nombres</label>
						<input id="firstName" name="firstName" type="text" placeholder="ej: Tony" value="<?php getInputValue('firstName') ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$lnLenght);?>
						<label for="lastName">Apellidos</label>
						<input id="lastName" name="lastName" type="text" placeholder="ej: Stark" value="<?php getInputValue('lastName') ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$emailDoNoMatch);?>
						<?php echo $account->getError(Constants::$emailInvalid);?>
						<?php echo $account->getError(Constants::$emailTaken);?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="ej: tonystark@gmail.com" value="<?php getInputValue('email') ?>" required>
					</p>
					<p>
						<label for="email2">Confirma email</label>
						<input id="email2" name="email2" type="email" placeholder="ej: tonystark@gmail.com" value="<?php getInputValue('email2') ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$passwordsDoNoMatch);?>
						<?php echo $account->getError(Constants::$passwordsInvalid);?>
						<?php echo $account->getError(Constants::$passwordsLenght);?>
						<label for="password">Contraseña</label>
						<input id="password" name="password" type="password" placeholder="Tu contraseña" value="<?php getInputValue('password') ?>" required>
					</p>
					<p>
						<label for="password2">Confirma contraseña</label>
						<input id="password2" name="password2" type="password" placeholder="Tu contraseña" value="<?php getInputValue('password2') ?>" required>
					</p>
					<button type="submit" name="registerButton">Registrate</button>
					<div class="hasAccountText">
						<span id="hideRegister">¿Ya tienes una cuenta? Inicia sesion aqui.</span>
					</div>
				</form>
			</div>
			<div id="loginText">
				<h1>¿Tienes ganas de escuchar algo?</h1>
				<h2>Escucha los mejores nuevos lanzamientos.</h2>
				<ul>
					<li>Escucha tu musica donde quieras</li>
					<li>Crea tus propias playlists</li>
					<li>Sigue a nuevos artistas</li>
					<!-- <li>Sin anuncios molestos</li> -->
				</ul>
			</div>
		</div>
	</div>
</body>
</html>