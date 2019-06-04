
<?php
    session_start();    
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: login.php");
    }

    //incluir conexión a la base de datos
    include 'conexion.php';
    $codigoP=$_SESSION["codigoP"];
    $cedula=$_SESSION['cedula'];
    $nombre=$_SESSION['nombres'];
    $apellido=$_SESSION['apellido'];
    

    
    $sqlP = "SELECT * FROM productos WHERE pro_cod='$codigoP';";
                        $resultado=$conn->query($sqlP);
                        while($row=$resultado->fetch_assoc()){
                            $nombreP=$row["pro_nombre"];
                            $precioP=$row["pro_precio"];
                        }
    echo "D: ".$codigoP." ".$nombreP." ".$cedula." ".$nombre." ".$apellido." ".$precioP." ".$nombreP;

    $sql = "INSERT INTO carrito VALUES(NULL,'$cedula','$nombre','$apellido','$codigoP','$nombreP','$precioP')";

    if($conn->query($sql) === TRUE){
         header("Location: homeSucursal.php");

    }else{
        echo "Error: ". $sql . "<br> . $conn->error";
    }
    $conn->close();
?>
