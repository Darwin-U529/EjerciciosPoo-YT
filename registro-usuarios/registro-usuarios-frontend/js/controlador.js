var usuarios = [];

//Creamos esta variable para almacenar el indice del usuario seleccionado, se utiliza en el metodo actualizar
var usuarioSeleccionado;

//Peticion Asincrona
function obtenerUsuarios(){
    //Me retorna una promesa
    axios({
        method:'GET',
        url:'../registro-usuarios-backend/api/usuarios.php',
        responseType:'json' //tipo de respuesta
    
        //es como un if, si todo sale bien, .then(res=> aplica lo que esta adentro de esto, de lo contrario, pasa a catch tirando error
    }) .then(res=>{

            //aplicandole data, le decimos que solamente queremos la data (que es especificamente la info de usuarios.php)
            console.log(res.data);

            //de esta manera. asignamos toda la informacion de usuarios.php en el arreglo usuarios[], estando en la page
            this.usuarios = res.data;
            llenarTabla();
    }) .catch(error=>{
            console.error(error);
    });
}

obtenerUsuarios();

//Llena la tabla html, y es utilizada en el metodo obtenerUsuarios()
function llenarTabla() {

    //Siempre la limpiamos al inicializar, por cualquier cambio de borrar o actualizar un usuario
    document.querySelector('#tabla-usuarios tbody').innerHTML = '';

    for (let i = 0; i < usuarios.length; i++) {
        
        //de esta manera le indicamos que busque los tbody en la etiqueta que contenga el id="tabla-usuarios"
        document.querySelector('#tabla-usuarios tbody').innerHTML +=
            `<tr>
                <td>${usuarios[i].nombre}</td>
                <td>${usuarios[i].apellido}</td>
                <td>${usuarios[i].fechaNacimiento}</td>
                <td>${usuarios[i].pais}</td>
                <td>
                    <button type="button" onclick="eliminar(${i})">X</button>
                    <button type="button" onclick="seleccionar(${i})">Editar</button>
                </td>
            </tr>`;   
    }
}

function eliminar(indice) {
    console.log('Eliminar el elemento con el indice ' + indice);

        //Me retorna una promesa
    axios({
        method:'DELETE',
                //Se le concatena el id que llevara, ya que en la peticion DELETE, la solicita para eliminar el JSON
        url:'../registro-usuarios-backend/api/usuarios.php' + `?id=${indice}`,
        responseType:'json' //tipo de respuesta

        //es como un if, si todo sale bien, .then(res=> aplica lo que esta adentro de esto, de lo contrario, pasa a catch tirando error
    }) .then(res=>{

            //aplicandole data, le decimos que solamente queremos la data (que es especificamente la info de usuarios.php)
            console.log(res.data);

            //llamamos la funcion para que se visualise en la consola nuevamente cantidad de usuarios en usuarios.json
            obtenerUsuarios();
    }) .catch(error=>{
            console.error(error);
    });
    
}


function guardar() {
    //Inicializara con el boton guardar desabilitado, hasta que inicie el servidor, por el Sleep de los 5 seg. en usuarios.php
    document.getElementById('btn-guardar').disabled = true;

    //asi cuando se le da click a guardar, aparecera esto por los 5 seg, de espera
    document.getElementById('btn-guardar').innerHTML = 'Guardando...';

    //creamos una variable tipo JSON, dandole valores a los atributos con los getElementById.value
    let usuario = {
        nombre: document.getElementById('nombre').value,
        apellido: document.getElementById('apellido').value,
        fechaNacimiento: document.getElementById('fechaNacimiento').value,
        pais: document.getElementById('pais').value,
    };

    //Solo mostramos en consola los datos del usuario a guardar
    console.log('Usuario a guardar', usuario);

    //El metodo con AXIOS *** IMPORTANTE TENER EN CUANTA QUE UTILIZAMOS DATA PARA "POST", EN LUGAR DE params ***
    axios({
        method:'POST',
                //Se le concatena el id que llevara, ya que en la peticion DELETE, la solicita para eliminar el JSON
        url:'../registro-usuarios-backend/api/usuarios.php',
        responseType:'json', //tipo de respuesta
        data:usuario      //Para enviar en POST, utilizamos "data"
        //es como un if, si todo sale bien, .then(res=> aplica lo que esta adentro de esto, de lo contrario, pasa a catch tirando error
    
    }) .then(res=>{

            //aplicandole data, le decimos que solamente queremos la data (que es especificamente la info de usuarios.php)
            console.log(res);
            //Imprimimos la respiesta en la consola

            //Solamente limpia lo que hay en los inputs al momento de darle guardar, para darle paso a mas guardados
            limpiar();

            //llamamos la funcion para que se visualise en la consola nuevamente
            obtenerUsuarios();

            //Luego reactivamos el boton el servidor carga
            document.getElementById('btn-guardar').disabled = false;

            //luego retoma a su estado normal, cuando el servidor ya retorno la peticion
            document.getElementById('btn-guardar').innerHTML = 'Guardar';
    
    }) .catch(error=>{

            console.error(error);
    });
}

function limpiar() {

    //A todos los valor en los inputs (que tienen su respectivo id), les asignamos null, como para vaciarlos y dejarlos como nuevos
    document.getElementById('nombre').value=null;
    document.getElementById('apellido').value=null;
    document.getElementById('fechaNacimiento').value=null;
    document.getElementById('pais').value=null;

    //Se mostrara nuevamente el boton de guardar, ya que solo aparecera este medio, cuando utilicemos la funcion de editar, y aparezca el boton de actualizaar
    document.getElementById('btn-guardar').style.display = 'inline';
    document.getElementById('btn-actualizar').style.display = 'none';
}

function actualizar() {
    //creamos una variable tipo JSON, dandole valores a los atributos con los getElementById.value
    let usuario = {
        nombre: document.getElementById('nombre').value,
        apellido: document.getElementById('apellido').value,
        fechaNacimiento: document.getElementById('fechaNacimiento').value,
        pais: document.getElementById('pais').value,
    };

    //Solo mostramos en consola los datos del usuario a guardar
    console.log('Usuario a actualizar', usuario);

    //El metodo con AXIOS *** IMPORTANTE TENER EN CUANTA QUE UTILIZAMOS DATA PARA "POST", EN LUGAR DE params ***
    axios({
        method:'PUT',
                //Se le concatena el id que llevara, ya que en la peticion DELETE, la solicita para eliminar el JSON
        url:'../registro-usuarios-backend/api/usuarios.php' + `?id=${usuarioSeleccionado}`,
        responseType:'json', //tipo de respuesta
        data:usuario      //Para enviar en POST, utilizamos "data"
        //es como un if, si todo sale bien, .then(res=> aplica lo que esta adentro de esto, de lo contrario, pasa a catch tirando error
    
    }) .then(res=>{

            //aplicandole data, le decimos que solamente queremos la data (que es especificamente la info de usuarios.php)
            console.log(res);
            //Imprimimos la respiesta en la consola

            //Solamente limpia lo que hay en los inputs al momento de darle guardar, para darle paso a mas guardados
            limpiar();

            //llamamos la funcion para que se visualise en la consola nuevamente
            obtenerUsuarios();
    }) .catch(error=>{

            console.error(error);
    });
}

function seleccionar(indice) {
    //Ingresamos el indice seleccoinado, para utilizarlo en el metodo actualizar
    usuarioSeleccionado = indice;

    console.log('Se selecciono el elemento ' + indice);

    //Me retorna una promesa
    axios({
        method:'GET',
            //Se le concatena el id que llevara, ya que en la peticion DELETE, la solicita para eliminar el JSON
        url:'../registro-usuarios-backend/api/usuarios.php' + `?id=${indice}`,
        responseType:'json' //tipo de respuesta
    
        //es como un if, si todo sale bien, .then(res=> aplica lo que esta adentro de esto, de lo contrario, pasa a catch tirando error
    }) .then(res=>{

            //aplicandole data, le decimos que solamente queremos la data (que es especificamente la info de usuarios.php)
            console.log(res);

            //Lo que realizamos es que cuando damos click en editar se ejecuta la funcion seleccionar, estableciondo en los inputs con estas id, predeterminadamente los valores que les asignamos del data
            document.getElementById('nombre').value=res.data.nombre;
            document.getElementById('apellido').value=res.data.apellido;
            document.getElementById('fechaNacimiento').value=res.data.fechaNacimiento;
            document.getElementById('pais').value=res.data.pais;

            //Creamos que al hace click en editar, ocultamos el btn guardar, y el btn-actualizar, se mostrara, ya que directamente desde el html esta en con display none, asi que ahora aparecera con displey: inline
            document.getElementById('btn-guardar').style.display = 'none';
            document.getElementById('btn-actualizar').style.display = 'inline';
            
    }) .catch(error=>{
            console.error(error);
    });
}