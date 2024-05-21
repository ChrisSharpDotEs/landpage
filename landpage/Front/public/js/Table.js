export const Table = {
    appendTableData(data, index){
        data.forEach(element => {
            let row = document.createElement('tr');
            
            Object.keys(element).forEach(item =>{
                let cell = document.createElement('td');
                cell.innerHTML = element[item];
                row.append(cell);
            });
    
            let tbody = document.getElementsByTagName("tbody")[index];
            tbody.append(row);
        });
    }
}