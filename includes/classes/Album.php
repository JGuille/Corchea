<?php
	class Album {
		private $con;
		private $id;
		private $titulo;
		private $artista;
		private $genero;
		private $artworkPath;
		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
			$albumQuery = mysqli_query($this->con, "SELECT * FROM albumes WHERE id = '$this->id'");
			$album = mysqli_fetch_array($albumQuery);
			$this->titulo = $album['titulo'];
			$this->artista = $album['artista'];
			$this->genero = $album['genero'];
			$this->artworkPath = $album['artworkPath'];
		}
		public function getTitle(){
			return $this->titulo;
		}
		public function getArtist(){
			
			return new Artist($this->con, $this->artista);
		}
		public function getGenre(){
			
			return $this->genero;
		}
		public function getArtworkPath(){
			
			return $this->artworkPath;
		}
		public function getNumberOfSongs(){
			$query = mysqli_query($this->con, "SELECT * FROM songs WHERE album ='$this->id'");
			return mysqli_num_rows($query);
		}
		public function getSongsIds(){
			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE album='$this->id' ORDER BY albumOrder ASC");
			$array = array();
			while($row = mysqli_fetch_array($query)){
				array_push($array, $row['id']);
			}
			return $array;
		}
	}
?>