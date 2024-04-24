let url = "../../proyecto-back/src/router.php?/test";

function showResult(data){
    let formu = document.getElementById('formulario');
    let content = '<div class="info-box">Se ha enviado su mensaje correctamente.</div>';
    let contentNo = '<div class="bg-warning p-2 rounded">No se ha enviado el mensaje</div>';
    console.log(typeof(data));
    if(data == true){
        formu.innerHTML = content;
    }
    else {
        formu.innerHTML = contentNo;
    }
}

function init(){
    let formulario = document.querySelector('form');
    formulario.addEventListener('submit', function(ev){
        ev.preventDefault();
        const datos = new FormData(formulario);

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
            console.log(data);
            showResult(data);
        })
        .catch(error => console.error(error));
    });
}

window.onload = init();