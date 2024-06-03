async function obtenerDatosEnParalelo() {
    try {
        const [datos1, datos2] = await Promise.all([
            fetch('https://api.sampleapis.com/beers/ale').then(response => response.json()),
            fetch('https://api.sampleapis.com/switch/games').then(response => response.json())
        ]);
        console.log('Datos 1:', datos1[0]);
        console.log('Datos 2:', datos2[0]);
    } catch (error) {
        console.error('Error al obtener datos en paralelo:', error);
    }
}

let i = 7;
//Esta promesa se resolverá si se resuelve una.
let promesa1 = Promise.any([
    new Promise((resolve, reject) =>{
        i > 5 ? resolve("Resuelta primera etapa") : reject("Rechazada primera etapa");
    }), 
    new Promise((resolve, reject) =>{
        i > 8 ? resolve("Resuelta segunda etapa") : reject("Rechazada segunda etapa");
    })
]);

console.log("A");

obtenerDatosEnParalelo();

promesa1.then(respuesta =>{
    console.log(respuesta);
})
.catch(error => console.log(error));

console.log("B");

