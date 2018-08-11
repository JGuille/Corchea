<?php
include("includes/includedFiles.php");
if(isset($_GET['term'])) {
	$term = urldecode($_GET['term']);
}
else {
	$term = "";
}
?>
<div class="searchContainer">
	<h4>Busca por artista, album o cancion</h4>
	<input type="text" class="searchInput"
 value="<?php echo $term; ?>" 
 placeholder="Comienza a escribir..." 
onfocus="var temp_value=this.value; 
this.value=''; this.value=temp_value">
</div>
<script>
$(".searchInput").focus();
$(function() {
	$(function(){
        $(".searchInput").keyup(function() {
            clearTimeout(timer);
            timer = setTimeout(function() {
                var val = $(".searchInput").val();
                openPage("search.php?term=" + val);
            }, 1500);
        });
         $(".searchInput").focus(); 
    });
})
</script>
<?php if($term == "") exit(); ?>
<div class="tracklistContainer borderBottom">
	<h2>Canciones</h2>
	<ul class="tracklist">
		<?php 
		$songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE titulo LIKE '%$term%' LIMIT 15");
		if(mysqli_num_rows($songsQuery) == 0) {
			echo "<span class='noResults'>Ninguna cancion coincide con " . $term . "</span>";
		}
		$songIdArray = array();
		$i = 1;
		while($row = mysqli_fetch_array($songsQuery)) {
			if($i > 15) {
				break;
			}
			array_push($songIdArray, $row['id']);
			$albumSong = new Song($con, $row['id']);
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
<div class="artistContainer borderBottom">
	<h2>Artistas</h2>
	<?php 
		$artistQuery = mysqli_query($con, "SELECT id FROM artists WHERE nombre LIKE '%$term%' LIMIT 10");
		if(mysqli_num_rows($artistQuery) == 0) {
			echo "<span class='noResults'>Ningun artista coincide con " . $term . "</span>";
		}
		while($row = mysqli_fetch_array($artistQuery)){
			$artistFound = new Artist($con, $row['id']);
			echo "<div class='searchResultRow'>
				 	<div class = 'artistName'>
						<span role = 'link' tabindex = '0' onclick='openPage(\"artist.php?id=" . $artistFound->getId() . "\")'>
						"
						. $artistFound->getName() .
						"
						</span>
				 	</div> 
				 </div>";
		}
	?>
</div>
<div id="gridViewContainer" class="wrapper">
	<h2>Albumes</h2>
	<?php 
		$albumQuery = mysqli_query($con, "SELECT * FROM albumes WHERE titulo LIKE '%term%'  LIMIT 10");
		if(mysqli_num_rows($albumQuery) == 0) {
				echo "<span class='noResults'>Ningun album coincide con " . $term . "</span>";
			}
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