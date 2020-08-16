/*var aplicaciones = [            //Variable tipo arreglo, este caso arreglo de JSON's
    {                                           //JSON de 1er app
        nombreAplicacion: 'App 1',
        urlImagen: 'img/app-icons/1.webp',
        desarrollador: 'Facebook',
        calificacion: 3
    },
    {                                           //JSON de 1er app
        nombreAplicacion: 'App 2',
        urlImagen: 'img/app-icons/2.webp',
        desarrollador: 'Facebook',
        calificacion: 4
    },
    {                                           //JSON de 1er app
        nombreAplicacion: 'App 3',
        urlImagen: 'img/app-icons/3.webp',
        desarrollador: 'Facebook',
        calificacion: 5
    },
    {                                           //JSON de 1er app
        nombreAplicacion: 'App 4',
        urlImagen: 'img/app-icons/4.webp',
        desarrollador: 'Wikipedia',
        calificacion: 5
    },
    {                                           //JSON de 1er app
        nombreAplicacion: 'App 5',
        urlImagen: 'img/app-icons/5.webp',
        desarrollador: 'Youtube',
        calificacion: 3
    },
    {                                           //JSON de 1er app
        nombreAplicacion: 'App 6',
        urlImagen: 'img/app-icons/6.webp',
        desarrollador: 'Attlasian',
        calificacion: 5
    },
    {                                           //JSON de 1er app
        nombreAplicacion: 'App 7',
        urlImagen: 'img/app-icons/7.webp',
        desarrollador: 'Instagram',
        calificacion: 4
    },
];*/

var aplicaciones = [];      //Creo mi arreglo de aplicaciones vacio
var localstorage = window.localStorage; //accedemos al localStorage

console.log('APLICACIONES', localStorage.getItem('aplicaciones'));
//Lo que le estoy diciendo es que si mi arreglo de aplicaciones esta vacio
if (localStorage.getItem('aplicaciones') == null) {       //Entonces vamos a meter las aplicaciones en el LocalStorage
    localStorage.setItem('aplicaciones', JSON.stringify(aplicaciones)); //Lo pasamos a Stingify por que si no, lo toma como un objeto
} else {            //Dado el caso que el arreglo "aplicaciones" no este vacio en el LocalStorage             
    aplicaciones = JSON.parse(localStorage.getItem('aplicaciones'));   //Entonces solo le asignaremos lo que ya hay en el locarStorage al arreglo "aplicaciones"
}
//Funciona para agregar valor al localstorage //El localStorage siempre queda guardado, aunque se cierre el navegador
//localStorage.setItem('aplicaciones', JSON.stringify(aplicaciones));   //le damos el arreglo y luego con JSON.stringify convertimos el JSON a cadena        

//estamos obteniendo el valor del localStorage
//JSON.parse(localStorage.getItem('aplicaciones'));          //JSON.parse pasamos de string a tipo JSON, es como el inverso a stringify                   

for (let i = 1; i < 50; i++) {                                          //Funcion para el select list (generamos las opciones de imagenes)
    document.getElementById('lista-imagenes').innerHTML +=
    `<option value="img/app-icons/${i}.webp">Imagen ${i}</option>`;     //Le vamos pasando el numero con el for
}


function generarAplicaciones() {
    document.getElementById('aplicaciones').innerHTML = '';         //Lo que hace es que primero borra todo, para luego volver a llenarlo, asi si se agrega una nueva app, rellena nuevamente
    aplicaciones.forEach(function(app) {                    //  function(app) funcion anonima solo para esta ocacion
        let estrellas = '';     //va a ser un arreglo vacio

        for(let i = 0; i < app.calificacion; i++) {
            estrellas += '<i class="fas fa-star"></i>';     //+= ira acumulando las etiquetas <i>
        }

        for(let i = 0; i < (5-app.calificacion); i++) {         //solo le quitamos el resto con el -5
            estrellas += '<i class="far fa-star"></i>';     //igual sucede con las estrellas sin fondo,
        }

        document.getElementById('aplicaciones').innerHTML += 
        `<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card"> <!--Quitamos es style-->                          <!-- Copiado desde Bootstrap, debido a su similitud con lo que ocupamos-->
                <img src="${app.urlImagen}" class="card-img-top" alt="...">     <!-- Agregamos la img-->
                <div class="card-body">
                    <h5 class="card-title">${app.nombreAplicacion}</h5>
                    <p class="card-text">Desarrollador: ${app.desarrollador}</p>
                    <div>
                        ${estrellas}            <!-- agregamos la variable, que fue acumulando las etiquetas <i> -->
                    </div>
                </div>
            </div>
        </div>`;
    });   
}

generarAplicaciones();

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

function guardar() {
    const app = {                                           //JSON 
        nombreAplicacion: document.getElementById('nombre-app').value,
        urlImagen: document.getElementById('lista-imagenes').value,
        desarrollador: document.getElementById('desarrollador').value,
        calificacion: document.getElementById('calificacion').value,
    };

    console.log(app);

    aplicaciones.push(app);                                                     //Agregamos la app creada al Json de aplicaciones 

    localStorage.setItem('aplicaciones', JSON.stringify(aplicaciones));             //Al guardar, agrega el item al localStorage en modo cade+

    console.log(aplicaciones);

    generarAplicaciones();

    $('#modalNuevaApp').modal('hide')
}