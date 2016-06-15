<?php
session_start();
include 'config.php';
//Variables
$dni2 = $_REQUEST['DNI'];
$Nombre2 = $_REQUEST['Nombre'];
$Direccion2 = $_REQUEST['Direccion'];
$Ciudad2 = $_REQUEST['Ciudad'];
$Codpostal2 = $_REQUEST['Codpostal'];
$Provincia2 = $_REQUEST['Provincia'];
$Telefono2 = $_REQUEST['Telefono'];
$Ocupacion2 = $_REQUEST['Ocupacion'];
$Comentario2 = $_REQUEST['Comentario'];
$Fecha2 = $_REQUEST['Fecha'];

//Conexión
$conex = new mysqli($host, $username, $password, $db_name);
if($conex->connect_errno){
    die("Error al conectarnos a la base de datos: ".$conex->connect_errno);
}

//sentencia
$sql = "SELECT * FROM Usuarios WHERE DNI = '$dni2' ";
$result = $conex->query($sql);


if($result->num_rows==0){
    echo "No existen datos para el DNI que ha introducido";
} else {
    $extraido = $result->fetch_assoc();
    $dni = $extraido['DNI'];
    $Nombre = $extraido['Nombre'];
    $Direccion = $extraido['Direccion'];
    $Codpostal = $extraido['Codpostal'];
    $Ciudad = $extraido['Ciudad'];
    $Provincia =$extraido['Provincia'];
    $Telefono =$extraido['Telefono'];
    $Ocupacion =$extraido['Ocupacion'];
    $Comentario =$extraido['Comentario'];
    $Fecha =$extraido['Fecha'];

   
    
//Comprobaciones
if(($dni2=='') || ($Nombre2=='') || ($Direccion2=='') || ($Ciudad2=='') ||($Codpostal2=='') || ($Provincia2=='') ||
    ($Telefono2=='')  || ($Ocupacion2=='') || ($Comentario2=='')|| ($Fecha2=='')){
        echo "Uno de los campos está vacio";
    } elseif (($dni2==$dni) && ($Nombre2==$Nombre) && ($Direccion2==$Direccion) && ($Ciudad2==$Ciudad) && ($Codpostal2==$Codpostal) 
        && ($Provincia2==$Provincia) && ($Telefono2==$Telefono) && ($Ocupacion2==$Ocupacion)
        && ($Comentario2==$Comentario) && ($Fecha2==$Fecha)) {
        echo "No ha modificado ningun campo";
    } else{
        
//Modificación 
    $sql2 = "UPDATE `Usuarios` SET `Nombre`= '$Nombre2',`Direccion`= '$Direccion2',`Codpostal`= '$Codpostal2',"
            . "`Ciudad`='$Ciudad2',`Provincia`='$Provincia2',`Telefono`='$Telefono2',`Ocupacion`='$Ocupacion2'"
            . ",`Comentario`='$Comentario2',`Fecha`='$Fecha2' WHERE DNI = '$dni'";
    
    $result2 = $conex->query($sql2);          
    echo 'Modificacion Realizada con exito';
    }
}
?>

