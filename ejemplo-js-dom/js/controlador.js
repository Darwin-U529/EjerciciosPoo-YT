document.querySelector('input');        //Retorna la 1ra etiqueta tipo input, tambien es posible hacerlo mediante id o class
document.querySelectorAll('input');     //Retorna todas las etiques tipo input, retorna basicamente lo que sea que le demos de valor
// document.write('<h1>Hola mundo</h1>');
//console.log('Nombre: ', document.getElementById('usuario').value);          //Accedemos a etiqueta por ID
// Con .value, accedemos a obtener el valor del input

document.getElementById('password').value = 'asd.456';

function guardar() {
    valirdarCampoVacio('usuario');
    valirdarCampoVacio('password');
    //validadCorreo('correo');

    console.log('Nombre: ', document.getElementById('usuario').value);          //Accedemos a etiqueta por ID
    console.log('password: ', document.getElementById('password').value);          //Accedemos a etiqueta por ID
}

function valirdarCampoVacio (id) {
    let campo = document.getElementById(id);
    if (campo.value == '') {                            //Le estoy diciendo que si el input esta vacio. haga ...                       
        campo.classList.remove('input-success');
        campo.classList.add('input-error');             //Utilizamos .classList para acceder al css y .add para agregar un estilo del css
    } else {
        campo.classList.remove('input-error');
        campo.classList.add('input-success');           //si no, aplicara otro estilo siempre traido de css
    }
} 

function validarCorreo(campo) {
    console.log(campo.value);
    const regeex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (regeex.test(campo.value)) {             //test recibe una cadena de texto que es lo que va a validar junto con campo.value nos va a retornar Verdadero o falso
        campo.classList.remove('input-error');                //Lo que sucede es que valida si esta correcto el formato de correo, siendo asi, aplica la class 'success' y removiendo 'error' dado el caso que estuviera bien, dado el caso contrario, es lo opuesto                                              
        campo.classList.add('input-success');
    } else {
        campo.classList.remove('input-success');
        campo.classList.add('input-error');
    }
}

function cambiarEstilos() {
    let parrafo =  document.getElementById('parrafo');
    parrafo.style.backgroundColor = '#000000';       //Le aplicamos un estilo accedienco con la etiqueta style
    parrafo.style.color = '#FF0000';
}

function agregarItem() {
    const valor = document.getElementById('item').value;
    document.getElementById('lista').innerHTML += `<li>${valor}</li>`;         //innerHTML se refiere al HTML interno de una etiqueta
    //en todo caso lo que hace es que reemplasa lo que dentro de esa etiqueta, en este va acumulando += <li>Valor</li>

    //Lo que hace es que primero obtiene el valor del input con le id, ingresandolo en la variable valor, luego con innerHTML, lo agrega utilizando ` ` y adjuntandole la variable valor
}