
<?php

include 'conexion.php';                
//$codigo=$_POST["cod"];
$imagen=addslashes(file_get_contents($_FILES["imagen"]["tmp_name"])); 
$nombre=$_POST["nombre"];
$desc=$_POST["desc"];
$telefono=$_POST["telefono"];


$sql = "INSERT INTO empresa VALUES( null,'$imagen','$nombre','$desc','$telefono')";  


if($conn->query($sql) === TRUE){
    echo"<script language='javascript'>alert('Registrado Correctamente!'); </script>";
    header('Location:listarEmpresas.php');

}else{
    echo "Error: ". $sql . "<br> . $conn->error";
}
$conn->close();
?>
