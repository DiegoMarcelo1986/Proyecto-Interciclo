<?php
session_start();

$correo = $_POST["correo"];
$contrasenia = $_POST["contrasenia"];
$admin="todo poderoso";
$cli="cliente";
$_SESSION["correo"]=$correo;
$_SESSION["contrasenia"]=$contrasenia;

$conexion = mysqli_connect('localhost','root','','proyecto');

$sql=mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo='$correo' AND contrasenia='$contrasenia'");

    if($row=mysqli_fetch_assoc($sql)){
        $_SESSION['logueado'] = "true";
        $ns=$row['rol']; 
        if($ns=='todo poderoso'){
            echo "admin";
            header('Location: homeAdm.php');
        }else if($ns=='cliente'){
            header('Location: homeCli.php');
        }else{
            echo"<script language='javascript'>alert('Error En el Usuario o Contraseña Intente de Nuevo'); </script>";
            header("login.php");
        }
    }   
        echo"<script language='javascript'>alert('Ingrese un Correo y Contraseña'); 
        window.location.replace('login.php');
        </script>";
        header("login.php");
?>