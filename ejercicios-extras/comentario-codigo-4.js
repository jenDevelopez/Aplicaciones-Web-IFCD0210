//se declara el host del servidor, en este caso es el servidor local
const host = "http://localhost";
//se declara el endpoint
const endpoint = "/mi_servidor/consulta.php";

//como es una peticion al servidor, la funcion se declara como asíncrona
async function obtenerDatosUsuario() {
    //se usa la sentencia try catch
  try {
   //la url es el resultdato de concatenar el host y el endpoint
    const url = host + endpoint;

    //la respuesta es el resultado de esperar una respuesta del servidor 
    const response = await fetch(url);

    // si el estado de la respuesta no es ok, o estatus 200 se devuelve un nuevo error, en este error se vera el estado de la respuesta
    if (!response.ok) {
      throw new Error(`Error en la solicitud: ${response.status}`);
    }

    //si la condicion anterior no se cumple, por lo tanto si hay ok, la respuesta se pasa a formato json y se guarda en una constante
    const data = await response.json();

    //se imprime en consola la respuesta
    console.log(data);
  } catch (error) {
    //si ocurre un error, el error se muestra en consola
    console.error("Error al obtener datos:", error);
  }
}
// se ejecuta la funcion
obtenerDatosUsuario();
