
<!DOCTYPE html>
<html lang="en">
<head>
<title>Persona</title>

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
                    <div class="col-sm-8" align="center"><h1>Personas </h1></div>
                </div>
            </div>            
            <table class="table" align="center">             
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Codigo Postal</th>
                        <th>Direccion</th>      
                        <th></th>  
                        <th></th>                                                                           
                    </tr></th>
                 
                <?php 
                include ('db.php');
                $clientes = new Database();
                $listado=$clientes->read();

                while ($row=mysqli_fetch_object($listado)){
                    $intId=$row->intId;
                    $strNombre=$row->strNombre;
                    $strApellidos=$row->strApellidos;
                    $intEdad=$row->intEdad;
                    $strSexo=$row->strSexo;
                    $strCp=$row->strCp;              
                    $strDireccion=$row->strDireccion;                

                    ?>
                    <tr>
                    <td><?php echo $intId;?></td>
                    <td><?php echo $strNombre;?></td>
                    <td><?php echo $strApellidos;?></td>
                    <td align="center"><?php echo $intEdad;?></td>       
                    <td align="center"><?php echo $strSexo;?></td>
                    <td align="center"><?php echo $strCp;?></td>
                    <td><?php echo $strDireccion;?></td> 
                    <td>
                    <a href="update.php?id=<?php echo $intId;?>" class="boton2">Modificar</a>
                    </td>
                    <td>
                    <a href="delete.php?id=<?php echo $intId;?>" class="boton2">Borrar</a>
                    </td>                    
                    </tr>   
                <?php
                }
                ?>
            </table>
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4" align="center">&nbsp;</div>
                    <div class="col-sm-4" align="center">&nbsp;</div>                    
                    <div class="col-sm-4" align="center"><a class="boton" href="create.php">Agregar</a></div>                    
                </div>
            </div>    
   </div>     
</body>
</html>


