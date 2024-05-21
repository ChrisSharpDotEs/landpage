CREATE TABLE IF NOT EXISTS customer (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    fecha_creacion DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS cita (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fecha DATE NOT NULL,
    hora TIME NOT NULL
);

CREATE TABLE IF NOT EXISTS customer_comercial (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    id_comercial INT NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES customer(id),
    FOREIGN KEY (id_comercial) REFERENCES Comercial(id)
);

ALTER TABLE customer_comercial
ADD CONSTRAINT unique_cliente_comercial UNIQUE (id_cliente, id_comercial);

CREATE TABLE IF NOT EXISTS citas_comercial_customer (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cita INT NOT NULL,
    id_comercial INT NOT NULL,
    id_cliente INT NOT NULL,
    FOREIGN KEY (id_cita) REFERENCES cita(id),
    FOREIGN KEY (id_comercial) REFERENCES comercial(id),
    FOREIGN KEY (id_cliente) REFERENCES customer(id)
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


INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (1, 1);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (2, 1);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (3, 1);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (4, 2);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (5, 2);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (6, 2);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (7, 3);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (8, 3);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (9, 3);
INSERT INTO customer_comercial (id_cliente, id_comercial) VALUES (10, 3);

INSERT INTO cita (fecha, hora) VALUES ('2024-05-22', '14:00:00');
INSERT INTO cita (fecha, hora) VALUES ('2024-05-22', '15:00:00');
INSERT INTO citas_comercial_customer (id_cita, id_comercial, id_cliente) VALUES
(1, 1, 1), (2, 1, 3);