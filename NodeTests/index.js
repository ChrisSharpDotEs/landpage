function tirar() {
    return new Promise((resolve, reject) =>{
        const hits = Math.round(Math.random() * 10);
        const time = Math.round(Math.random() * 2000);
        if(hits > 0){
            setTimeout(resolve(hits), time);
        } else {
            setTimeout(reject(hits), time);
        }
    });
}


var tirada = [];
let turn = tirar();
    
turn
.then(
    hits => hits
);

console.log(turn['[[PromiseResult]]'])