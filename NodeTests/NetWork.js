export const NetWorkAnimation = {
    canvas: null,
    ctx: null,
    nodes: [],
    numNodes: 21,
    maxDistance: window.innerWidth/5,
    maxConnections: 4,
    speedfactor: 0.5,
    minDistance: 50,
    repulsionFactor: 0.05,

    initialize() {
        this.canvas = document.getElementById('networkCanvas');
        this.ctx = this.canvas.getContext('2d');

        this.canvas.width = window.innerWidth;
        this.canvas.height = 250;

        for (let i = 0; i < this.numNodes; i++) {
            this.nodes.push(this.createNode());
        }

        this.animate();
    },

    createNode() {
        return {
            x: Math.random() * this.canvas.width,
            y: Math.random() * this.canvas.height,
            vx: (Math.random() - 0.5) * this.speedfactor,
            vy: (Math.random() - 0.5) * this.speedfactor,
        };
    },

    drawLine(x1, y1, x2, y2) {
        this.ctx.beginPath();
        this.ctx.moveTo(x1, y1);
        this.ctx.lineTo(x2, y2);
        this.ctx.strokeStyle = 'rgba(255, 255, 255, 0.3)';
        this.ctx.stroke();
    },

    updateNodes() {
        this.nodes.forEach((node, index) => {
            node.x += node.vx;
            node.y += node.vy;

            if (node.x < 0 || node.x > this.canvas.width) node.vx *= -1;
            if (node.y < 0 || node.y > this.canvas.height) node.vy *= -1;

            this.nodes.forEach((otherNode, otherIndex) => {
                if (index === otherIndex) return; // No compararse a sí mismo

                const dx = node.x - otherNode.x;
                const dy = node.y - otherNode.y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < this.minDistance) {
                    // Cálculo de la fuerza de repulsión
                    const angle = Math.atan2(dy, dx);
                    const repulsionForce = this.repulsionFactor //* (this.minDistance - distance);
                    
                    // Aplica la fuerza de repulsión
                    node.vx += Math.cos(angle) * repulsionForce;
                    node.vy += Math.sin(angle) * repulsionForce;
                }
            });
        });
    },

    drawNodes() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

        this.nodes.forEach(node => {
            this.ctx.beginPath();
            this.ctx.arc(node.x, node.y, 2, 0, Math.PI * 2);
            this.ctx.fillStyle = 'rgba(255, 255, 255, 0.6)';
            this.ctx.fill();
        });

        const connections = this.nodes.map(() => []);

        // Dibuja las conexiones respetando el límite de conexiones
        for (let i = 0; i < this.nodes.length; i++) {
            for (let j = i + 1; j < this.nodes.length; j++) {
                if (connections[i] >= this.maxConnections || connections[j] >= this.maxConnections) {
                    continue; // Si alguno de los nodos ya alcanzó el máximo, no se conecta
                }

                const dx = this.nodes[i].x - this.nodes[j].x;
                const dy = this.nodes[i].y - this.nodes[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < this.maxDistance) {
                    this.drawLine(this.nodes[i].x, this.nodes[i].y, this.nodes[j].x, this.nodes[j].y);
                    connections[i]++;
                    connections[j]++;
                }
            }
        }
    },

    animate() {
        this.updateNodes();
        this.drawNodes();
        requestAnimationFrame(() => this.animate());
    }
}