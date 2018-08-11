<?php 
include("includes/includedFiles.php");
 ?>
	<h1 class="pageHeadingBig">Tambien Te Puede Gustar</h1>
	<div id="gridViewContainer" class="wrapper">
		<?php 
		$albumQuery = mysqli_query($con, "SELECT * FROM albumes ORDER BY RAND() LIMIT 12");
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
<?php 
?>