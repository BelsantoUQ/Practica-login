// Datos personales
$(document).ready(function(){
    var nombres= $("#Nombre");
    nombres.blur(function(){
        console.log("nombre"+nombres.val());
       $("#errores").text(nombres.val()).show();
    });

    // Ingreso y Validación del correo

    $("#Email").blur(function(){
        var correo= $("#Email").val();
        var correoRecor= correo.split('');
        var contador;
        var resul=recorrerCorreo(correoRecor);
        console.log(contador);
        var resulta=validarCorreo(correo, resul);
        $("#errores").text(resulta).show();
    });

     //Ingreso y validación de la contraseña

    $("#Clave").blur(function(){
        var apellidos=$("#Apellido").val(); 
        var contrasena= $("#Clave").val();
        var caracteres= ["+","-",".","´","{","}","!","*","/",";",":"];
        var arrayContra= contrasena.split('');
        var resultado= recorrerArray(arrayContra, caracteres);
        var vali= validarClave(contrasena, resultado, nombres.val(), apellidos);
        $("#errores").text(vali).show();
    });

    // Ingreso y Verificación de claves

    $("#Confirmar").blur(function(){
        var confir_contra=$("#Confirmar").val();
        var contrasena= $("#Clave").val();
        
        var comClaves = compararClaves(contrasena, confir_contra);
        $("#errores").text(comClaves).show();   
    });

    // Botón de Validar

    document.getElementById('form_contact').addEventListener('submit', function(e){
        var nombres= $("#Nombre");
        var apellidos=$("#Apellido").val();
        var confir_contra=$("#Confirmar").val();
        var contrasena= $("#Clave").val(); 
        var correo= $("#Email").val();
        if(nombres == '' || apellidos=='' || correo=='' || contrasena=='' || confir_contra==''){
            alert("Debe ingresar los datos");
        }
        else{
        e.preventDefault();

        let formulario = new FormData(document.getElementById('form_contact'));

        fetch('registrar.php', {
            method:'POST',
            body: formulario
        })
        .then(res => res.json())
        .then(data => {
            if (data == 'true'){
                alert("Usuario creado correctamente");
                $("input[type='text']").val('');
                $("input[type='email']").val('');
                $("input[type='password']").val('');
            }else{
                alert("El correo ya existe");
            }
        } );
       

        /*var nombres= $("#nombre");
        var apellidos=$("#apellido").val();
        var confir_contra=$("#confirmar").val();
        var contrasena= $("#clave").val(); 
        var correo= $("#correo").val();
        if(nombres == '' || apellidos=='' || correo=='' || contrasena=='' || confir_contra==''){
            alert("Debe ingresar los datos");
        }
        else{
           */
        }
        
    });   
    //              FUNCIÓN PARA RECORRER EL ARRAY DE CONTRASEÑA Y VERIFICAR SI CONTIENE CARACTERES ESPECIALES

    function recorrerArray(arrayContra, caracteres){
        for(var i=0; i<arrayContra.length; i++){
            for(var j=0; j<caracteres.length; j++){
                if(arrayContra[i] == caracteres[j]){
                    return true;
                }
            }
        }
        return false;
    }

    //                  FUNCIÓN PARA VALIDAR LA CLAVE SI CUMPLE CON LOS REQUISITOS

    function validarClave(contrasena, resultado, nombres, apellidos){
        if (contrasena.length>12){
            if(contrasena.search(/[A-Z]/)>=0){
                if(contrasena.search(/[0-9]/)>=0){
                            if(resultado==true){
                                if (contrasena.toLowerCase().match(nombres.toLowerCase()) != null || contrasena.toLowerCase().match(apellidos.toLowerCase()) != null){
                                    console.log(contrasena.toLowerCase().match(nombres.toLowerCase()));
                                    console.log(contrasena.toLowerCase().match(apellidos.toLowerCase()));
                                    $("#Clave").css("color", "red");
                                    return "La contraseña Contiene el nombre o apellido y debe ser diferente a estos";
                                }
                                else{
                                    $("#Clave").css("color", "black");
                                    return"La contraseña cumple los requisitos";
                                }
                            }
                            else{
                                $("#Clave").css("color", "red");
                                return "No contiene un caracter especial";
                            }
                }
                else{
                    $("#Clave").css("color", "red");
                    return "La contraseña debe contener numeros";
                }
            }
            else{
                $("#Clave").css("color", "red");
                return "Contraseña no valida, no contiene uan letra mayúscula";
            }
        }
        else{
            $("#Clave").css("color", "red");
            return "La contraseña tiene menos de 12 caracteres";
        }
    }

    // Función para comparar las contraseñas

    function compararClaves(contrasena, confirmacion){
        if (contrasena == confirmacion){
            $("#Confirmar").css("color", "black");
            return "las contraseñas coinciden";
        }
        else{
            $("#Confirmar").css("color", "red");
            return "las contraseñas son diferentes";
        }
    }

    //Función para validar si el correo contiene las validaciones
    function validarCorreo(correo, resul){
        var validar;
        if (correo.search('@')){
            console.log(contador);
            console.log(correo.indexOf('@'));
            if(contador > correo.indexOf('@')){
                if(resul==true){
                    $("#Correo").css("color", "black");
                    return "correo valido";
                }
                else{
                    $("#Correo").css("color", "red");
                    return "correo no valido";
                }
            }else{
                $("#Correo").css("color", "red");
                return "el punto debe ser después del @";
            }
        }
        else{
            $("#Correo").css("color", "red");
            return "El correo no es valido";
        }
    }

    // Recorrer el correo después del punto para verificar el com, co, es

    function recorrerCorreo(correoRecor){
        for( var i =0; i<correoRecor.length; i++){
            if (correoRecor[i]=='.'){
                if(correoRecor[i+1]=='c' && correoRecor[i+2]=='o' && correoRecor[i+3]=='m'){
                    contador = i;
                    return true;
                }else if(correoRecor[i+1]=='c' && correoRecor[i+2]=='o'){
                    contador = i;
                    return true;
                }else if(correoRecor[i+1]=='e' && correoRecor[i+2]=='s'){
                    contador = i;
                    return true;
                }
            }
        } 
        return false;
    }
    //console.log(busqueda);


    /*for(var i=0; i<5; i++){
        nombres[i] = parseInt(prompt('Ingrese un número', 0));
        //agregarDatos(i, datos);
    }

    console.log(nombres);

    function agregarDatos(posicion, dato){
        nombres[posicion]=dato;
        return nombres;
    }*/

});