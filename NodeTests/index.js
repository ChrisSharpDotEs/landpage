import { NetWorkAnimation } from "./NetWork.js";

function tirar() {
    return new Promise((resolve, reject) => {
        const hits = Math.round(Math.random() * 10);
        const time = Math.round(Math.random() * 2000);
        if (hits > 0) {
            setTimeout(resolve(hits), time);
        } else {
            setTimeout(reject(hits), time);
        }
    });
};

function init() {
    var tirada = [];
    let turn = tirar();

    turn
        .then(
            hits => hits
        );

    console.log(turn['[[PromiseResult]]'])
};

function buildSquare(radius, top, left, bg) {
    let div = document.createElement('div');
    div.classList.add('border', 'rounded', 'rounded-circle', 'p-4', 'position-absolute');
    div.style.width = `${radius}rem`;
    div.style.height = `${radius}rem`;
    div.style.top = `${top}px`;
    div.style.left = `${left}px`;
    div.style.zIndex = 0;
    div.style.backgroundColor = getRandomRgbColor();
    return div;
};

function getRandomRgbColor() {
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);
    return `rgb(${r},${g},${b})`;
}

function startInterval(ymax, xmax) {
    return setInterval(() => {
        if (document.getElementsByTagName('div').length < 100) {
            let randTop = Math.random() * ymax;
            let randLeft = Math.random() * xmax;
            let radius = Math.random() * 10;
            let div = document.getElementsByTagName('div')[0];
            //if(div)
            //div.remove();
            document.body.appendChild(buildSquare(radius, randTop, randLeft));
        }
    }, 100);
}

function stopInterval(interval) {
    clearInterval(interval);
}

function a(){
    let btn = document.getElementsByTagName('button')[0];
    let ymax = window.innerHeight - 320;
    let xmax = window.innerWidth - 320;
    console.log(xmax)

    let started = 0;
    let interval = null;

    btn.addEventListener('click', () => {
        if(started == 0){
                interval = startInterval(ymax, xmax);
                started = 1;
        } else {
            stopInterval(interval);
            started = 0;
        }
    });
}

function animateCircle(){
    // Configura el canvas y el contexto
    const canvas = document.getElementById('micanvas');
    const ctx = canvas.getContext('2d');

    // Ajusta el tamaño del canvas a las dimensiones de la ventana
    canvas.width = window.innerWidth;

    function drawCircle(x, y, radius, color) {
        ctx.beginPath();
        ctx.arc(x, y, radius, 0, Math.PI * 2);
        ctx.fillStyle = color;
        ctx.fill();
        ctx.closePath();
    }

    function animate() {
        // Limpia el canvas para el siguiente frame
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Dibuja círculos en posiciones aleatorias
        for (let i = 0; i < 100; i++) {
            const x = Math.random() * canvas.width;
            const y = Math.random() * canvas.height;
            const radius = Math.random() * 20 + 5; // Radio entre 5 y 25
            const color = `rgba(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, 0.5)`;
            drawCircle(x, y, radius, color);
        }

        // Solicita el siguiente frame de animación
        requestAnimationFrame(animate);
    }

    // Comienza la animación
    animate();
}

window.addEventListener('load', () => {
    let animation = Object.create(NetWorkAnimation);
    animation.initialize();
});