
<?php

    include 'conexion.php';                
    $cedula=$_POST["ced"];
    $imagen=addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $telefono=$_POST["tel"];   
    $genero=$_POST["genero"];      
    $correo=$_POST["correo"];
    $password=$_POST["password"];

    $sql = "INSERT INTO usuarios VALUES('$cedula','$imagen','$nombre','$apellido','$telefono','$genero','$correo','$password','cliente')";    
  
    if($conn->query($sql) === TRUE){
        echo '';
        echo"<script language='javascript'>alert('Usuario Creado Correctamente!'); </script>";
        header('Location:login.php');

    }else{
        echo "Error: ". $sql . "<br> . $conn->error";
    }
    $conn->close();
?>
