
<?php
    session_start();    

    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
<html class="cabe">
<head>
    <meta charset="UTF-8">
    <title>BUSCAR SUCURSAL</title>
    <link href="cs_form.css" rel="stylesheet">
    <link href="estiloHome.css" rel="stylesheet">
<script>
    
function buscarCedula() {
    
    var codigo = document.getElementById("cod").value;
    console.log('Codigo ingresado', codigo);
    if (codigo == "") {
        document.getElementById("informacion").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert("llegue");
                document.getElementById("informacion").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","BusEmpresa.php?emp_cod="+codigo,true);
        xmlhttp.send();
    }
}
</script>

</head>
    <body>

        <form>
            <input type="text" id="cod" name="cod" value="">
            <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarCedula();" >
            <div style="float:left; margin:0 5px;"><input type="button" value="Home" onclick="location.href = 'homeAdm.php';" ></div>
        </form>

        <br>
    
        <div id="informacion"></div>


    </body>
</html>