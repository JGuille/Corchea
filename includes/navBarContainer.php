<div id="navBarContainer">
	<nav class="navBar">
		<span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
			<img src="assets/images/icons/logo.png">
			<h2 class="logoText">Corchea</h2>
		</span>
		<div class="group">
			<div class="navItem">
				<span role='link' tabindex='0' onclick='openPage("search.php")' class="navItemLink">
					Buscar
					<img src="assets/images/icons/search.png" class="icon" alt="Search">
				</span>
				<!-- <a href="search.php" class="navItemLink">Buscar
					<img src="assets/images/icons/search.png"class="icon" alt="search">
				</a> -->
			</div>
		</div>
		<div class="group">
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink">Explora</span>
			</div>
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">Tu Musica</span>
			</div>
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('settings.php')" class="navItemLink"><?php echo $userLoggedIn->getUsername(); ?></span>
			</div>
		</div>
	</nav>
</div>