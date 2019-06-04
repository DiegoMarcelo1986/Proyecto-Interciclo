

function cambiaA(){
    var inputNombre = document.getElementById("act");
    inputNombre.value="si";
}

function cambiaE(){
    var inputNombre = document.getElementById("eli");
    inputNombre.value="si";
}

function soloLetras(e) {
    key = e.keyCode || e.which;                     //Eventos de la tecla
    tecla = String.fromCharCode(key).toString();    //Convierte a string la tecla
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";   //Letras que se permiten escribir
    especiales = [8, 37, 39, 46, 6];                //Teclas especiales que se permitiran pulsar, retroceso, izquierda, derecha, suprimir.
    tecla_especial = false                          //Booleano para teclas especiales
    for(var i in especiales) {                      //Recorre el arreclo de teclas especiales
        if(key == especiales[i]) {                  //Si la tecla pulsada esta dentro de las permitidas
            tecla_especial = true;                  //Booleano de teclas especiales es igual a true
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){ //Si la tecla pulsada no se encuentra dentro de las permitidas no se digitaliza
        return false;
      }
}

function soloNumeros(e){
    var key = e.charCode;           //Declaara como variable key y le asigna el valor Unicode de la tecla presionada del teclado
    return key >= 46 && key <= 57;  //Retorna la tecla para digitalizarla si se encuentra dentro del rango
}

function validarCedula() {
        var ced= window.document.getElementById("cedula");
        ced.style.borderColor = "#E9E2E0";
    
        //Verifica que sea de 10 dígitos

        if(ced.value.length<10){
            window.document.getElementById("eCedula").innerHTML="<p>* Ingrese 10 dígitos</p>";
            ced.style.borderColor = "red";
            
        //Valida la cedula de identida ecuatoria sea correcta con rrespecto al ultimo dígito validador
        }else{
            var cad = document.getElementById("cedula").value.trim();
            var total = 0;
            var longitud = cad.length;
            var longcheck = longitud - 1;

            if (cad !== "" && longitud === 10){
              for(i = 0; i < longcheck; i++){
                if (i%2 === 0) {
                  var aux = cad.charAt(i) * 2;
                  if (aux > 9) aux -= 9;
                  total += aux;
                } else {
                  total += parseInt(cad.charAt(i)); 
                } 
              }

              total = total % 10 ? 10 - total % 10 : 0;
        //Si no es correcta envia mensaje debajo del campo y pinta de color rojo el campo
              if (cad.charAt(longitud-1) != total) {
                  window.document.getElementById("eCedula").innerHTML="<p>* Cedula no valida</p>";
                  ced.style.borderColor = "red";
                  return false;
        //Si es correcta quita el mensaje de error y pinta el borde de color verde
              }else{
                  window.document.getElementById("eCedula").innerHTML="<p></p>";
                  ced.style.borderColor = "#8AFF33";
                  return true;

              }
            }
        }
}

function validarCorreoL(){
    var corr= window.document.getElementById("correo");             //Se obtiene el elemnto con Id correo
    var aux = true;                                                 //Auxiliar de tipo booleano
    aux=/[A-Za-z0-9]{3,}(@)[A-Za-z]{2,}(.[A-Za-z0-9]{2,})+/.test(corr.value); //Se aplica al contenido del input correo, la expresión regular y este debuelve un true o false
    if(!aux){                                                       //Si es falso
        window.document.getElementById("eCorreo").innerHTML="<p>* Ingrese un correo valido</p>";    //Se añade un mensaje de error debajo del campo
        corr.style.borderColor="red";                               //Se pinta el borde de color rojo
    }else{                                                          //caso contrario 
        window.document.getElementById("eCorreo").innerHTML="";     //Se quita el mensaje de error
        corr.style.borderColor = "#8AFF33";                         //Se pinta el borde de color verde
        return aux;                                                 //Se retorna un true o false
    }
}

function validarNombres(){
    var nom= window.document.getElementById("nombres");                //Se obtiene el elemnto con Id nombres
    var aux = true;                                                    //Auxiliar de tipo booleano
    aux=/[A-Z][a-z]+\s[A-Z][a-z]+$/.test(nom.value);                   //Se aplica al contenido del input correo, la expresión regular para aceptar dos palabras separadas por un espacio                                                                      //y este debuelve un true o false
    if(!aux){                                                          //Si es falso
        window.document.getElementById("eNombres").innerHTML="<p>* Ingrese dos nombres validos</p>";    //Se añade un mensaje de error debajo del campo nombres
        nom.style.borderColor="red";                                    //Se pinta el borde de color rojo
    }else{                                                              //caso contrario
        window.document.getElementById("eNombres").innerHTML="";        //Se quita el mensaje de error
        nom.style.borderColor = "#8AFF33";                              //Se pinta el borde de color verde
        return aux;                                                     //Se retorna un true o false
    }

}

function validarApellidos(){
    var ape= window.document.getElementById("apellidos");               //Se obtiene el elemnto con Id apellidos
    var aux = true;                                                     //Auxiliar de tipo booleano
    aux=/[A-Z][a-z]+\s[A-Z][a-z]+$/.test(ape.value);                    //Se aplica al contenido del input correo, la expresión regular para aceptar dos palabras separadas por un espacio                                                                       //y este debuelve un true o false
    if(!aux){                                                           //Si es falso
        window.document.getElementById("eApellidos").innerHTML="<p>* Ingrese dos apellidos validos</p>";    //Se añade un mensaje de error debajo del campo apellidos
        ape.style.borderColor="red";                                    //Se pinta el borde de color rojo
    }else{                                                              //caso contrario
        window.document.getElementById("eApellidos").innerHTML="";      //Se quita el mensaje de error
        ape.style.borderColor = "#8AFF33";                              //Se pinta el borde de color verde
        return aux;                                                     //Se retorna un true o false
    }
}

function validarCelular(){
    var cel= window.document.getElementById("telefono");
    
    if(cel.value.length<10){
        window.document.getElementById("eTelefono").innerHTML="<p>Ingrese un número de 10 dígitos y que inicie por 0</p>";
        cel.style.borderColor = "red";
        return false;       
    }else{
        window.document.getElementById("eTelefono").innerHTML="";
    }
    if(cel.value[0]!='0'){
        window.document.getElementById("eTelefono").innerHTML="<p>Ingrese un celular iniciado por 0</p>";
        cel.style.borderColor = "red";
        return false;
    }else{
        cel.style.borderColor = "#8AFF33";
        console.log("2:" +cel.value[1])
        return true;
    }
}

function validarContrasenia(){
    var pas= window.document.getElementById("password");                //Se obtiene el elemnto con Id nombres
    var aux = true;                                                    //Auxiliar de tipo booleano

    if(pas.value.length==0){                                                          //Si es falso
        window.document.getElementById("eContrasenia").innerHTML="<p>* Ingrese la contraseña</p>";    //Se añade un mensaje de error debajo del campo nombres
        pas.style.borderColor="red";                                    //Se pinta el borde de color rojo
    }else{                                                              //caso contrario
        window.document.getElementById("eContrasenia").innerHTML="";        //Se quita el mensaje de error
        pas.style.borderColor = "#8AFF33";                              //Se pinta el borde de color verde
        return aux=false;                                                     //Se retorna un true o false
    }

}

function todo(){
     var bandera =true;
    if(!validarCedula()){
        console.log("cedula incorrecta");
        return false;
    }else{
        console.log("cedula valida");
        bandera=true;
    }
        
    if(!validarNombres()){
        console.log("Nombres mal");
        return false;
    }else{
        console.log("Dos nombres");
        bandera=true;
    }
    
    if(!validarApellidos()){
        console.log("Ape mal");
        return false;
    }else{
        console.log("Ape Bien");
        bandera=true;
    }
    
    if(!validarCelular()){
        console.log("Cel mal");
        return false;
    }else{
        console.log("Cel Bien");
        bandera=true;
    }
    
   if(!validarCorreo()){
        console.log("correo invaldo");
        return false;
    }else{
        console.log("correo valido");
        bandera=true;
    }
    
    if(!validarContrasenia()){
        console.log("Pass vacio");
        return false;
    }else{
        console.log("Pass valido");
        bandera=true;
    }
    
//    if(!validarImagen()){
//        console.log("Avatar vacio");
//        return false;
//    }else{
//        console.log("avatar valido");
//        bandera=true;
//    }
    
    
    if(bandera)return true;  
}

    

