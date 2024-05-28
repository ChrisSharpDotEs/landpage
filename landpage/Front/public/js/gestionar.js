import { ComercialManager } from './ComercialManager.js';

function showResult(data){
    let formu = document.getElementById('formulario');
    let content = '<div class="info-box">Se ha enviado su mensaje correctamente.</div>';
    let contentNo = '<div class="bg-warning p-2 rounded">No se ha enviado el mensaje</div>';
    
    if(data == true){
        formu.innerHTML = content;
    }
    else {
        formu.innerHTML = contentNo;
    }
}

function init(){
    ComercialManager.getComerciales();
    
    //ComercialManager.getCitas();
    let formulario = document.querySelector('form');
    formulario.addEventListener('submit', function(ev){
        ev.preventDefault();
        const datos = new FormData(formulario);
        console.log(datos.values());
    });
}

window.onload = init();