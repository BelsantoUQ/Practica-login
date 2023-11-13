'use strict';

$(document).ready(function () {
    $('#form_login').submit(function (event) {
        event.preventDefault(); 
        var searchTerm = $('#usuario').val(); 
        var clave = $('#clave').val();
        
        $.ajax({
            type: 'POST', // Puedes usar POST o GET según tus necesidades
            url: 'buscar.php', // La URL de tu script de servidor para realizar la búsqueda
            data: { searchTerm: searchTerm, clave: clave}, // Los datos que se enviarán al servidor
            success: function (response) {
                if(response == true) {
                    alert("Usuario encontrado");
                    $("input[type='text']").val('');
                    $("input[type='password']").val('');
                    window.location="http://localhost/prueba/index.html";
                }else{
                    alert("Usuario no encontrado");
                }
                // Manejar la respuesta del servidor (por ejemplo, mostrar resultados)
                //$('#results').html(response);
            }
        });
    }); 
});