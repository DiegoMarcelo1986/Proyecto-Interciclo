
<?php
    session_start();    
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: login.php");
    }

    //incluir conexión a la base de datos
    include 'conexion.php';
    $numF=rand(100, 10000);
    $cedula=$_SESSION['cedula'];
    $nombre=$_SESSION['nombres'];
    $apellido=$_SESSION['apellidos'];
    $tarjeta=$_SESSION["tarjeta"];
    $fecha=strftime( "%d/%m/%Y", time());
    $sub=$_REQUEST['sub'];
    $iva=(0.14*$sub);
    
    $total=$sub+$iva;    
    $iva=number_format($iva, 2, ",", ".");
    $total=number_format($total, 2, ",", ".");  

    echo "ced:  ".$cedula." ".$nombre." ".$apellido." ".$fecha." ".$sub;
    echo "iva: ".$iva ." T:".$total;
    echo "num ".$numF;

     $sqlF = "INSERT INTO factura VALUES(NULL,'$numF','$fecha','$cedula','$nombre','$apellido','$sub','$iva','$total')";  
  
    if($conn->query($sqlF) === TRUE){
        echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";

    }else{
        echo "Error: ". $sql . "<br> . $conn->error";
    }

       $sqlC = "SELECT * FROM carrito where cedulaPro='$cedula'";
        $resultC = $conn->query($sqlC);        
        if ($resultC->num_rows > 0) {            
            while($row = $resultC->fetch_assoc()) {
                $codPro=$row["codPro"];
                $nomPro=$row["nomPro"];
                $precioU=$row["precioPro"];
                
                $sqlD = "INSERT INTO detalle VALUES(NULL,'$numF','$codPro','$nomPro','#','$precioU')";
                $resultD = $conn->query($sqlD);     
            }
             $sqlD = "DELETE FROM carrito WHERE cedulaPro='$cedula'";
                $resultD = $conn->query($sqlD); 
        } else {            
            echo "Ha ocurrido un error inesperado !";
        }
  $conn->close();
?>
