let url = "../../Back/App/router.php?/test";

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

function appendTableData(data){
    data.forEach(element => {
        let row = document.createElement('row');

        Object.keys(element).forEach(item =>{
            let cell = document.createElement('td');
            cell.innerHTML = element[item];
            row.append(cell);
        });

        let tbody = document.getElementsByTagName("tbody")[0];
        tbody.append(row);
    });
}

function getCustomerData(){
    fetch("../../Back/App/router.php?/getCustomers")
    .then(response =>{
        if(response.ok && response.status == 200){
            try{
                return response.json();
            } catch(error){
                console.log(error);
                window.location.href = "./error.php";
            }
            
        }
    })
    .then(data => {
        console.log("obtenido");
        appendTableData(data);
    })
    .catch(error => console.error(error));
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