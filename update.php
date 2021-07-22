<?php
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Editar Persona</title>

<style type="text/css">
  .boton{
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  } 

  .boton2{
    text-decoration: none;
    padding: 5px;
    font-weight: 300;
    font-size: 10px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 3px;
    border: 2px solid #0016b0;
  }    


table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 45px;   margin: auto;  width: auto; text-align: center;    border-collapse: collapse;}

th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #000;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }

</style>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div align="center"><h1>Editar Persona</h1></div>
                </div>
            </div>  
            <?php
				
				include ("db.php");
				$person= new Database();
				
				if(isset($_POST) && !empty($_POST)){
					$intId = $person->clearfield($_POST['parid']);
					$strNombre = $person->clearfield($_POST['parnombre']);
					$strApellidos = $person->clearfield($_POST['parapellidos']);
					$intEdad = $person->clearfield($_POST['paredad']);
					$strSexo = $person->clearfield($_POST['parsexo']);
					$strCp = $person->clearfield($_POST['parcp']);
					$strDireccion = $person->clearfield($_POST['pardireccion']);

					$res = $person->update($intId, $strNombre, $strApellidos, $intEdad, $strSexo, $strCp, $strDireccion);
					if($res){
						$message= "Actualización Exitosa";
						$class="alert alert-success";
						
					}else{
						$message="Error al actualizar el registro";
						$class="alert alert-danger";
					}
					
						?>
					<div align="center">
					  <h2><?php echo $message;?></h2>
					</div>	
					
					<?php
					}
					$datos_persona=$person->single_record($id);
					?>

			<form method="post">		
             <table class="table" align="center">              
                    <tr>
                        <th>Id:&nbsp;<?php echo $datos_persona->intId;?></th>
                        <th><input type="hidden" name="parid" id="parid" value="<?php echo $datos_persona->intId;?>" class='form-control' maxlength="3" required></th>
                    </tr>    
                    <tr>    
                        <th>Nombre:</th>
                        <th><input type="text" name="parnombre" id="parnombre" value="<?php echo $datos_persona->strNombre;?>" class='form-control' maxlength="20" required></th>                                
                    </tr>
                    <tr>    
                        <th>Apellidos:</th>
                        <th><input type="text" name="parapellidos" id="parapellidos" value="<?php echo $datos_persona->strApellidos;?>" class='form-control' maxlength="40" required>                              
                    </tr>   
                    <tr>    
                        <th>Edad:</th>
                        <th><input type="text" name="paredad" id="paredad" value="<?php echo $datos_persona->intEdad;?>" class='form-control' maxlength="3" required></th>                                
                    </tr>
                    <tr>    
                        <th>Sexo:</th>
                        <th><input type="text" name="parsexo" id="parsexo" value="<?php echo $datos_persona->strSexo;?>" class='form-control' maxlength="1" required></th>                             
                    </tr>    
                    <tr>    
                        <th>Codigo Postal:</th>
                        <th><input type="text" name="parcp" id="parcp" value="<?php echo $datos_persona->strCp;?>" class='form-control' maxlength="7" required></th>                                
                    </tr>
                    <tr>    
                        <th>Direcci&oacute;n:</th>
                        <th><input type="text" name="pardireccion" id="pardireccion" value="<?php echo $datos_persona->strDireccion;?>" class='form-control' maxlength="50" required></th>                            
                    </tr>                                                       
            </table>

            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4" align="center">&nbsp;</div>                
                    <div class="col-sm-4" align="center"><button class="boton" type="submit" class="btn btn-success">Actualizar datos</button></div>
                    <div class="col-sm-4" align="center">&nbsp;</div>                       
                    <div class="col-sm-4" align="center"><a class="boton" href="index.php">Regresar</a></div>     
                </div>
            </div> 
		</form>
      
    </div>     
</body>
</html>