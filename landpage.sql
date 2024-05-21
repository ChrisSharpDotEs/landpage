CREATE TABLE IF NOT EXISTS customer (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    fecha_creacion DATE NOT NULL
);
INSERT INTO customer (nombre, fecha_creacion) VALUES ('Juan Perez', '2023-01-01');
INSERT INTO customer (nombre, fecha_creacion) VALUES ('Maria Gomez', '2023-02-15');
INSERT INTO customer (nombre, fecha_creacion) VALUES ('Carlos Rodriguez', '2023-03-10');
INSERT INTO customer (nombre, fecha_creacion) VALUES ('Ana Martinez', '2023-04-05');
INSERT INTO customer (nombre, fecha_creacion) VALUES ('Luis Hernandez', '2023-05-20');
INSERT INTO customer (nombre, fecha_creacion) VALUES ('Sofia Ramirez', '2023-06-25');
INSERT INTO customer (nombre, fecha_creacion) VALUES ('Miguel Torres', '2023-07-30');
INSERT INTO customer (nombre, fecha_creacion) VALUES ('Laura Diaz', '2023-08-18');
INSERT INTO customer (nombre, fecha_creacion) VALUES ('Jorge Lopez', '2023-09-12');
INSERT INTO customer (nombre, fecha_creacion) VALUES ('Elena Castillo', '2023-10-01');

CREATE TABLE IF NOT EXISTS customer_comercial (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    id_comercial INT NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES customer(id),
    FOREIGN KEY (id_comercial) REFERENCES Comercial(id)
);

ALTER TABLE customer_comercial
ADD CONSTRAINT unique_cliente_comercial UNIQUE (id_cliente, id_comercial);

-- Relacionando cliente 1 con los comerciales 1, 2, y 3
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (1, 1);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (1, 2);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (1, 3);

-- Relacionando cliente 2 con los comerciales 1, 2, y 3
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (2, 1);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (2, 2);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (2, 3);

-- Relacionando cliente 3 con los comerciales 1, 2, y 3
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (3, 1);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (3, 2);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (3, 3);

-- Relacionando cliente 4 con el comercial 1
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (4, 1);

-- Relacionando cliente 5 con el comercial 2
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (5, 2);

-- Relacionando cliente 6 con el comercial 3
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (6, 3);

-- Relacionando cliente 7 con el comercial 1
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (7, 1);

-- Relacionando cliente 8 con el comercial 2
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (8, 2);

-- Relacionando cliente 9 con el comercial 3
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (9, 3);

-- Relacionando cliente 10 con el comercial 1
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (10, 1);

