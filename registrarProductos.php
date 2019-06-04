
<?php

    include 'conexion.php';                
    //$codigo=$_POST["cod"];
    $imagen=addslashes(file_get_contents($_FILES["imagen"]["tmp_name"])); 
    $nombre=$_POST["nombre"];
    $desc=$_POST["desc"];
    $precio=$_POST["pre"];
   

    $sql = "INSERT INTO productos VALUES( null,'$imagen','$nombre','$desc','$precio','si')";  

  
    if($conn->query($sql) === TRUE){
        echo"<script language='javascript'>alert('Registrado Correctamente!'); </script>";
        header('Location:listarProductos.php');

    }else{
        echo "Error: ". $sql . "<br> . $conn->error";
    }
    $conn->close();
?>
