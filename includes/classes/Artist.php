<?php
	class Artist {
		private $con;
		private $id;
		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
		}
		public function getName(){
			$artistaQuery = mysqli_query($this->con, "SELECT nombre FROM artists WHERE id = '$this->id'");
			$artista = mysqli_fetch_array($artistaQuery);
			return $artista['nombre'];
		}
		public function getId(){
			return $this->id;
		}
		public function getSongsIds(){
			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE artista='$this->id' ORDER BY plays ASC");
			$array = array();
			while($row = mysqli_fetch_array($query)){
				array_push($array, $row['id']);
			}
			return $array;
		}
	}
?>