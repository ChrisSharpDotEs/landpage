export const Table = {
    appendTableData(data){
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
}