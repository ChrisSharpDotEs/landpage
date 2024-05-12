import { Card } from './Card.js';

function getJSONData(url, action) {
    fetch(url)
        .then(response => {
            if (response.ok && response.status == 200) {
                return response.json();
            }
        })
        .then(data => {
            action(data);
        })
        .catch(error => console.error(error));
}

function appendTableData(data, tbody) {
    tbody.innerHTML = "";
    data.forEach(element => {
        let row = document.createElement('tr');

        Object.keys(element).forEach(item => {
            let cell = document.createElement('td');
            cell.appendChild(document.createTextNode(element[item]));
            row.append(cell);
        });

        tbody.append(row);
    });

}

function getCustomerData(id) {
    let url = "./publicRouter.php?/getCustomersByComercial/" + id;
    getJSONData(url, (data) => {
        appendTableData(data, document.getElementsByTagName("tbody")[0]);
    })
}

function getCitas() {
    let url = "./publicRouter.php?/getCustomersByComercial/";
    fetch(url)
        .then(response => {
            if (response.ok && response.status == 200) {
                return response.text();
            }
        })
        .then(data => {
            console.log(data);
            //appendTableData(data, document.getElementsByTagName("tbody")[1]);
        })
        .catch(error => console.error(error));
}

function getUserData() {
    let url = "./publicRouter.php?/comerciales";
    getJSONData(url, (data) => {
        let card = Object.create(Card);
        let comerciales = document.getElementById("comerciales");
        let content = '';
        data.forEach(item => {
            content += card.createCard(item.nombre, null, item.id);
        });
        comerciales.innerHTML = content;

        let button1 = document.getElementById('button_1');
        let button2 = document.getElementById('button_2');

        [button1, button2].forEach(item => {
            item.addEventListener('click', (e) => {
                let comercialId =item.id.replace("button_", "");
                getCustomerData(parseInt(comercialId));
            })
        });
    })
}


function init() {
    getUserData();
}

window.addEventListener('load', () => {
    init();
});