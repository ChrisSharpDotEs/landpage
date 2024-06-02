let url = 'http://127.0.0.1:5500/data.json';

function getData(data){
    if(typeof data == 'object'){
        Object.keys(data).forEach(item =>{
            console.log(item);
            getData(data[item]);
        });
    } else {
        console.log(data);
    }
}

fetch(url)
.then(response => response.json())
.then(data => {
    getData(data);
})
.catch(error => console.log(error));