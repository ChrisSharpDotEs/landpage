let url = "../../proyecto-back/src/router.php?/test";

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

function peticion(datos, action){
    fetch(url, {
        method: 'POST',
        body: datos
    })
    .then(response =>{
        if(response.ok && response.status == 200){
            return response.json();
        }
    })
    .then(data => {
        action(data);
    })
    .catch(error => console.error(error));
}

function init(){
    let formulario = document.querySelector('form');
    formulario.addEventListener('submit', function(ev){
        ev.preventDefault();
        const datos = new FormData(formulario);

        peticion(datos, showResult);
    });
}

window.onload = init();