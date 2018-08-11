<?php  
include("../../config.php");
if(isset($_POST['playlistId'])){
	$playlistId = $_POST['playlistId'];
	$playlistQuery = mysqli_query($con, "DELETE FROM playlists WHERE id='$playlistId'");
	$songsQuery = mysqli_query($con, "DELETE FROM playlistssongs WHERE playlistId='$playlistId'");
}
else
{
	echo "no se paso playlistId  a deletePlaylist.php";
}
?>