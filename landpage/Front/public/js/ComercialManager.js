import { HttpClient } from "./HttpClient.js";
import { Card } from './Card.js';
import { Table } from './Table.js';

export const ComercialManager = {
    getComerciales(){
        HttpClient.url = "";
        HttpClient.get('./publicRouter.php?/comerciales').then(data =>{
            console.log(data);
            let card = Object.create(Card);
            let comerciales = document.getElementById("comerciales");
            let content = '';
            data.forEach(item => {
                content += card.createCard(item.Nombre + ' ' + item.Apellidos, null, item.ID);
            });
            comerciales.innerHTML = content;

            data.forEach(item => {
                let button = document.getElementById('button_' + item.ID);
                button.addEventListener('click', (e) => {
                    this.getCitas(item.ID);
                })
            })

        });
    },
    getCitas(id) {
        let url = "./publicRouter.php?/getComercialCitas/" + id;
        console.log(url);
        fetch(url)
            .then(response => {
                if (response.ok && response.status == 200) {
                    return response.json();
                }
            })
            .then(data => {
                let tbody = document.getElementsByTagName("tbody")[1];
                tbody.innerHTML = '';
                Table.appendTableData(data, 1);
            })
            .catch(error => console.error(error));
    },
    getCustomersByComercial() {
        HttpClient.get('./publicRouter.php?/getCustomersByComercial')
            .then(data => {
                Table.appendTableData(data, 0);
            })
            .catch(error => console.error(error));
    }
}