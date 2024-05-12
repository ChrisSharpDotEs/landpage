/**
 * Muestra el formulario de agregar datos.
 */
function agregar() {
    fetch("http://localhost/php/view/crear.php")
        .then(response => response.text())
        .then(data => {
            mostrarElemento.innerHTML = data;
        })
        .catch(error => console.log(error));
}

/**
 * Muestra el formulario de actualizar datos.
 */
function actualizar() {
    fetch("http://localhost/php/view/actualizar.php")
        .then(response => response.text())
        .then(data => {
            mostrarElemento.innerHTML = data;
        })
        .catch(error => console.log(error));
}

/**
 * Muestra el formulario de borrar datos.
 */
function borrar() {
    fetch("http://localhost/php/view/borrar.php")
        .then(response => response.text())
        .then(data => {
            mostrarElemento.innerHTML = data;
        })
        .catch(error => console.log(error));
}

function init() {
    let [b1, b2, b3] = [0, 0, 0];
    let buttons = document.getElementsByTagName("button");

    //Pendiente de refactorizar...
    [...buttons].forEach(button => {
        button.addEventListener('click', e => {
            if (e.target.innerHTML == "Agregar") {
                if (b1 == 0) {
                    mostrarElemento.innerHTML = "";
                    mostrarElemento.removeAttribute("hidden");
                    agregar();
                    b1 = 1;
                    b2 = 0;
                    b3 = 0;
                } else {
                    mostrarElemento.toggleAttribute("hidden");
                    b2 = 0;
                    b3 = 0;
                }
            } else if (e.target.innerHTML == "Actualizar") {
                if (b2 == 0) {
                    mostrarElemento.innerHTML = "";
                    mostrarElemento.removeAttribute("hidden");
                    actualizar();
                    b1 = 0;
                    b2 = 1;
                    b3 = 0;
                } else {
                    mostrarElemento.toggleAttribute("hidden");
                    b1 = 0;
                    b3 = 0;
                }
            } else if (e.target.innerHTML == "Borrar") {
                if (b3 == 0) {
                    mostrarElemento.innerHTML = "";
                    mostrarElemento.removeAttribute("hidden");
                    borrar();
                    b3 = 1;
                } else {
                    mostrarElemento.toggleAttribute("hidden");
                    b1 = 0;
                    b2 = 0;
                }
            }
        })
    });

    //Añadimos un evento a cada fila para mostrar el detalle de cada producto
    [...document.getElementsByTagName("tr")].filter((fila, index) => index > 0).forEach(fila => {
        fila.addEventListener("click", e => {
            id = parseInt(fila.querySelector("td").innerHTML);
            selectedRow.value = id;
            console.log(formtbody.submit());
        })
    })
}

init();