

<html>
    <header>
        <meta charset="utf-8">
        <title>Registro Usuario</title>
        <link href="cs_form.css" rel="stylesheet"/>
        <script src="validacionesU.js"></script>
    </header>
    
    <body>

        <form atributes action="nuevoU.php" method="post" enctype="multipart/form-data">                                               
            <div><h3>Registro Usuario</h3></div>
            <div id="preview">
            <img height="60px" src="iconos/default.png"/>
            </div>
            <div>
                <label for="ima">Imagen:</label>
                <input id="file" type="file" name="imagen" required/>            
            </div> 
                    
            <div>
                <label for="cedula">Cedula:</label>
                <input type="text" id="cedula" name="ced" title="Ingrese los 10 números de su C.I" minlength="10" maxlength="10" onkeypress="return soloNumeros(event);" placeholder="Ingrese su C.I"    required/>   
<!--                onblur="return validarCedula(cedula);"  -->
            </div>          
            
            <div id="eCedula" style="color: red; margin-left: 150px; font-size: 11px;"></div>
            
            <div>
                <label for="nombres">Nombres:</label>
                <input type="text" id="nombres" name="nombre" title="Ingrese sus dos nombres" placeholder="Nombre Nombre" onkeypress="return soloLetras(event);" onblur="return validarNombres(nombres);" required/>   
            </div>                                           
            
            <div id="eNombres" style="color: red; margin-left: 150px; font-size: 11px;"></div>
            
            <div>
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellido" title="Ingrese sus dos apellidos" placeholder="Apellido Apellido" onkeypress="return soloLetras(event);" onblur="return validarApellidos(apellidos);" required/>   
            </div>
            <div id="eApellidos" style="color: red; margin-left: 150px; font-size: 11px;"></div>     
        
            
            <div>
                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="tel" placeholder="Celular: 0935485612"  onkeypress="return soloNumeros(event);"  onblur="return validarCelular(telefono);" minlength="10" maxlength="10" required/>   
            </div>                                                                    <!-- Comapo input y label telefono -->
            <div id="eTelefono" style="color: red; margin-left: 150px; font-size: 11px;"></div>

            <div>
                <label for="genero">Genero:</label>
                <select name="genero">
                    <option value="Femnino">Femenino</option>
                    <option value="Masculino">Masculino</option>    
                </select>            
            </div>                                                                   

            <div>
                <label for="correo">Correo:</label>
                <input type="text" id="correo" name="correo" placeholder="Ingrese su correo"; onblur="return validarCorreoL(this);" required/>   
            </div>                                                              
            <div id="eCorreo" style="color: red; margin-left: 150px; font-size: 11px;"></div>
            
            <div>
                <label for="password">Contraseña:</label>
                <input type="text" id="password" name="password" placeholder="Ingrese su contraseña"; onblur="return validarContrasenia(this);" required/>   
            </div>                                           <div id="eContrasenia" style="color: red; margin-left: 150px; font-size: 11px;"></div>
            
            <input type="submit" style="width: 80px; margin-left: 25px;" style="width: 80px" name="crea" value="Crear"/>
            
            <input type="submit" style="width: 80px; margin-left: 25px;" style="width: 80px" name="regresa" value="Regresar" onclick="location.href = 'login.php'"/>
            <script type="text/javascript">
                
                document.getElementById("file").onchange = function(e) {
                let reader = new FileReader();

              reader.onload = function(){
                let preview = document.getElementById('preview'),image = document.createElement('img');
                image.src = reader.result;
                preview.innerHTML = '';
                preview.append(image);
              };

              reader.readAsDataURL(e.target.files[0]);
            }
    
            </script>
            

        </form>             
    </body>
</html>
        
