<?php
include("includes/includedFiles.php");
if(isset($_GET['id'])) {
	$artistId = $_GET['id'];
}
else {
	header("Location: index.php");
}
$artist = new Artist($con, $artistId);
?>
<div class="entityInfo borderBottom">
	<div class="centerSection">
		<div class="artistInfo">
			<h1 class="artistName"><?php echo $artist->getName(); ?></h1>
			<div class="headerButtons">
				<button class="button morado" onclick="playFirstSong()">Reproducir</button>
			</div>
		</div>
	</div>
</div>
<div class="tracklistContainer borderBottom">
	<h2>Canciones</h2>
	<ul class="tracklist">
		<?php 
		$songIdArray = $artist->getSongsIds();
		$i = 1;
		foreach($songIdArray as $songId){
			if($i>5){
				break;
			}
			$albumSong = new Song($con, $songId);
			$albumArtist = $albumSong->getArtist();
			echo "<li class='tracklistRow'>
				  	<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'>
						<span class='trackNumber'>$i</span>
				  	</div>
				  	<div class='trackInfo'>
						<span class='trackName'>" . $albumSong->getTitle() . "</span>
						<span class='artistName'>" . $albumArtist->getName() . "</span>
				  	</div>
				  	<div class='trackOptions'>
				  		<input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
						<img class='optionsButton' src='assets/images/icons/more.png'onclick='showOptionsMenu(this)'>
				  	</div>
				  	<div class='trackDuration'>
						<span class='duration'>" . $albumSong->getDuration() . "</span>
				  	</div>
				  </li>";
				  $i = $i + 1;
		}
		?>
		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>
	</ul>
</div>
<nav class="optionMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>
<div id="gridViewContainer" class="wrapper">
	<h2>Albumes</h2>
	<?php 
	$albumQuery = mysqli_query($con, "SELECT * FROM albumes WHERE artista= '$artistId'  LIMIT 10");
	while($row = mysqli_fetch_array($albumQuery)) {
		echo "<div class='gridViewItem'>
				<span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
					<img src='" . $row['artworkPath'] . "'>
					<div class='gridViewInfo'>"
						. $row['titulo'] .
					"</div>
				</span>
			</div>";
	}
	?>
</div>