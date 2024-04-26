DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `nuevo_cliente`(
    IN nombre VARCHAR(40),
    IN localidad VARCHAR(40),
    IN comercial INT
)
BEGIN
	DECLARE id_cliente_existente INT;
    
	INSERT INTO cliente (nombre, localidad) VALUES(nombre, localidad);
    
    SELECT id INTO id_cliente_existente FROM cliente WHERE cliente.nombre = nombre AND cliente.localidad = localidad;
    
    IF id_cliente_existente IS NOT NULL THEN
        INSERT INTO comercial_cliente (id_comercial, id_cliente) VALUES (comercial, id_cliente_existente);
    END IF;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_citas`()
BEGIN
	select citas.id, cliente.nombre, cliente.codigo, cliente.localidad, citas.fecha, citas.hora from citas join
cliente on citas.id_cliente = cliente.id;
end$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_clientes`()
BEGIN
	SELECT * FROM cliente;
END$$
DELIMITER ;