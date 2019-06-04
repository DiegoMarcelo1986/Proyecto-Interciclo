
<!DOCTYPE html>
<html class="cabe">
    <head class="cabe">
        <meta charset="utf-8">
        <title>HOME</title>
        <link href="estilo_index.css" rel="stylesheet"/>
        <h3> <marquee>PEDIDOS EN LINEA</marquee></h3>
    </head>
    
    <body>
        <header>
        <section class="cabeza" >
            
        <div class="div1">
             <a href="index.php"><img src="css/logo.jpg"  class="logo" /></a>
        </div>
            
        <div class="div2">
             <a href="login.php"><img src="css/login.png"  class="ini" /></a>
           
        </div>
        
        <div class="div3">
            <a href="contacto.html"><img src="css/con1.png" class="con"></a>
          
        </div>
        
        <div class="div4">
            <a href="registro.php"><img src="css/registrar.png" class="reg"></a>
            
        </div>
        
        <div class="div5">
            <a href="login.php"><img src="css/carro.jpg" class="car"></a>
      
        </div>
        
    </section>
            
    </header>
        <center>
        <section class="derecha" >
            <h2 >PRODUCTOS</h2>
            
            
            <?php
                include("conexion.php");
                $sql = "SELECT * FROM productos WHERE pro_disponible='si'";
                $resultado=$conn->query($sql);
            
            if($resultado->num_rows >0){
             while($row=$resultado->fetch_assoc()){
//                 if($row['disponible']!='si'){
                     echo "<section class='col-xs-10 col-sm-6 col-md-4'>";
                     echo "<section class='card'>";
                     echo '<img height="110px" class="centrar" src="data:image/jpeg;base64,'.base64_encode($row["pro_img"]).'"/>';
                     echo "<br> <label>".$row['pro_nombre']."</label>";?>
                     <br>
                     <input type="text" placeholder="cantidad" id="cantidad" value="1">
            
           <?php
                     echo "<br><button class='addc'><a href='login.php'><img src='css/dd.png' class='addc' width='150px'></a></button>";
                     
                     echo "</section>";
                     echo "</section>";
                 }
                 }

                $conn->close();
            ?>
            

        </section>
        </center>  

    </body>
</html>