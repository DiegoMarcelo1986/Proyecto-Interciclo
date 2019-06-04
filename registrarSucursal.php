
<?php

include 'conexion.php';                
//$codigo=$_POST["cod"];
$imagen=addslashes(file_get_contents($_FILES["imagen"]["tmp_name"])); 
$nombre=$_POST["nombre"];
$desc=$_POST["desc"];
$telefono=$_POST["telefono"];
$cod_emp=$_POST['empresa'];
//echo "<h1>".$cod_emp."</h1>";

$sql = "INSERT INTO sucursal VALUES( null,'$imagen','$nombre','$desc','$telefono','$cod_emp')";  


if($conn->query($sql) === TRUE){
    echo"<script language='javascript'>alert('Registrado Correctamente!'); </script>";
    header('Location:listarEmpresas.php');

}else{
    echo "Error: ". $sql . "<br> . $conn->error";
}
$conn->close();
?>
