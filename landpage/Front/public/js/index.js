import { Table } from 'Table.js';
import { HttpClient } from 'HttpClient.js';


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
    console.log(data);
}

function getCustomerData(){
    HttpClient.url = "";
    HttpClient.get('../publicRouter.php?test').then(data =>{
        console.log(data);
    });
}

function init(){
    getCustomerData();
    let formulario = document.querySelector('form');
    formulario.addEventListener('submit', function(ev){
        ev.preventDefault();
        const datos = new FormData(formulario);

        
    });
}

window.onload = init();