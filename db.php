<?php
	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="dbtest";
		function __construct(){
			$this->connect_db();
		}

		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Error al conectar la base de datos" . mysqli_connect_error() . mysqli_connect_errno());
			}
		}


		public function read(){
		$sql = "SELECT * FROM personas";
		$res = mysqli_query($this->con, $sql);
		return $res;
		}


		public function create($strNombre, $strApellidos, $intEdad, $strSexo, $strCp, $strDireccion){
			$sql = "INSERT INTO `personas` (strNombre, strApellidos, intEdad, strSexo, strCp, strDireccion) VALUES ('$strNombre', '$strApellidos', '$intEdad', '$strSexo', '$strCp', '$strDireccion')";
			$res = mysqli_query($this->con, $sql);
			if($res){
			  return true;
			}else{
			return false;
		 }
		}

		public function clearfield($var){
		  $return = mysqli_real_escape_string($this->con, $var);
		  return $return;
		}

		public function delete($intId){
			$sql = "DELETE FROM personas WHERE intId=$intId";
			$res = mysqli_query($this->con, $sql);
			if($res){
			return true;
			}else{
			return false;
			}
		}

		public function single_record($intId){
			$sql = "SELECT * FROM personas where intId='$intId'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function update($intId, $strNombre, $strApellidos, $intEdad, $strSexo, $strCp, $strDireccion){
			$sql = "UPDATE personas SET intId='$intId', strNombre='$strNombre', strApellidos='$strApellidos', intEdad='$intEdad', strSexo='$strSexo', strCp='$strCp', strDireccion='$strDireccion' WHERE intId=$intId";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

}
?>