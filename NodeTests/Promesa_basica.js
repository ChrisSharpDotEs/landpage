let i = 4;

let promesa1 = new Promise((resolve, reject) =>{
    if(i > 5) resolve("Hola");
    else reject("Error");
});

console.log("A");

promesa1.then(respuesta =>{
    console.log(respuesta);
})
.catch(error => console.log(error));

console.log("B");