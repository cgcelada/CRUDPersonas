<?php 
if (isset($_GET['id'])){
	include('db.php');
	$person = new Database();
	$intId=intval($_GET['id']);
	$res = $person->delete($intId);
	if($res){
		header('location: index.php');
		echo "Ok";		
	}else{
		echo "Error al eliminar el registro";
	}
}
?>
