<?php
include("../../config.php");
if(isset($_POST['playlistId']) && isset($_POST['songId'])) {
	$playlistId = $_POST['playlistId'];
	$songId = $_POST['songId'];
	$orderIdQuery = mysqli_query($con, "SELECT MAX(playlistOrden) + 1 as playlistOrder FROM playlistssongs WHERE playlistId='$playlistId'");
	$row = mysqli_fetch_array($orderIdQuery);
	$order = $row['playlistOrder'];
	$query = mysqli_query($con, "INSERT INTO playlistssongs VALUES('', '$songId', '$playlistId', '$order')");
}
else {
	echo "PlaylistId or songId was not passed into addToPlaylist.php";
}
?>