<?php
include("includes/includedFiles.php");
?>
<div class="playlistsContainer">
	<div class="gridViewContainer">
		<h2>Playlists</h2>
		<div class="buttonItems">
			<button class="button morado" onclick="createPlaylist()">Nueva Playlist</button>
		</div>
		<div>
			<?php
			$username = $userLoggedIn->getUsername();
			$playlistsQuery = mysqli_query($con, "SELECT * FROM playlists WHERE usuario='$username'");
			if(mysqli_num_rows($playlistsQuery) == 0) {
				echo "<span class='noResults'>YAun no tienes playlists.</span>";
			}
			while($row = mysqli_fetch_array($playlistsQuery)) {
				$playlists = new Playlist($con, $row);
				echo "<div class='gridViewItem' role='link' tabindex='0' 
				onclick='openPage(\"playlist.php?id=" . $playlists->getId() . "\")'>
						<div class='playlistImage'>
							<img src='assets/images/icons/playlist.png'>
						</div>
						<div class='gridViewInfo'>"
							. $playlists->getName() .
						"</div>
					</div>";
			}
		?>
		</div>
	</div>
</div>