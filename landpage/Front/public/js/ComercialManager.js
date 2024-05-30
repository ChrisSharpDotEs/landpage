import { HttpClient } from "./HttpClient.js";
import { Card } from './Card.js';
import { Table } from './Table.js';

export const ComercialManager = {
    getComerciales(){
        HttpClient.url = "";
        HttpClient.get('./publicRouter.php?/comerciales').then(data =>{
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
                    this.getCustomersByComercial(item.ID);
                });
            });
        });
    },
    getCitas(id) {
        let url = './publicRouter.php?/getComercialCitas/' + id;
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
    getCustomersByComercial(id) {
        fetch('./publicRouter.php?/getCustomersByComercial/' + id)
        .then(response => {
            if(response.ok && response.status == 200){
                return response.json();
            }
        })
        .then(data => {
            if(data.status == "error") return null;
            let tbody = document.getElementsByTagName("tbody")[0];
            tbody.innerHTML = '';
            Table.appendTableData(data, 0);
        })
        .catch(error => console.error(error));
    }
}