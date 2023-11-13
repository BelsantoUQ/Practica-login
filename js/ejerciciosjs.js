'use strict'

var aux=1;
var numero1=0;
var numero2=1;
var num_usua= prompt('Ingrese un rango para la busqueda',0);
var num_bus= prompt('Ingrese el número a buscar',0);
var busqueda= [];
var mostrar= buscarNum(num_bus);
console.log(buscarNum(num_bus));

for (var i=0; i<num_usua; i++){
    console.log(aux);
    busqueda[i]=aux;
    aux=numero1+numero2;
    numero1=numero2;
    numero2=aux;
} 

function buscarNum(num_buscar){
    if(busqueda.indexOf(num_buscar)>0)
    {
        return 'el numero es de la serie fibo en la posición';
    }
    else
    {   
        return "El numero no esta en la lista";
    }
}







