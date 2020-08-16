var mostrarMensaje = mensaje => console.log(mensaje);         //Creamos una funcion 
//Al solo tener 1 parametro, es permitido no poner parentesis, no hay necesidad

var mostrarAlert = function(mensaje) {          //Es posible asignarle una funcion a una variable
    alert(mensaje);
}

//var sumar = function(a, b) {
//    return a + b;
//}

//Funciones tipo flecha
var sumar = (a, b) => a+b;      //Se deja como variable, se establecen los parametro y si es solo una instruccion programada, se deja asi

var restar = (a, b) => a-b;

var mutul = (a, b) => {         //si tuviera mas de 1 instruccion seria asi
    //instruccion 1
    //instruccion 2
}

sumar(restar(3,4), restar(5,6));  //La funcion retorna, la suma de la resta de las 2 funciones que estan dentro

let edades = [12, 20, 40 , 50];

edades.forEach(element => {         //Es un for, mostrando los resultados de una funcion
    console.log(element);
});