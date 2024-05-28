DELIMITER $$
DROP PROCEDURE IF EXISTS `cambiar_cliente_de_comercial`$$

CREATE PROCEDURE `cambiar_cliente_de_comercial`(IN `id_cliente` INT, IN `id_comercial_viejo` INT, IN `id_comercial_nuevo` INT)
BEGIN
	DECLARE comercial_viejo_existe INT;
    DECLARE comercial_nuevo_existe INT;
    DECLARE cliente_existe INT;
    
    SELECT COUNT(*) INTO comercial_viejo_existe FROM comercial WHERE comercial.ID = id_comercial_viejo;
    SELECT COUNT(*) INTO comercial_nuevo_existe FROM comercial WHERE comercial.ID = id_comercial_nuevo;
    SELECT COUNT(*) INTO cliente_existe FROM customer WHERE customer.ID = id_cliente;
    
    IF comercial_viejo_existe = 1 AND comercial_nuevo_existe = 1 THEN
    	SELECT 'Ambos existen' AS mensaje;
    ELSEIF comercial_viejo_existe = 1 AND comercial_nuevo_existe = 0 THEN
    	SELECT 'Error: No existe el comercial nuevo' AS mensaje;
    ELSEIF comercial_viejo_existe = 0 AND comercial_nuevo_existe = 1 THEN
    	SELECT 'Error: No existe el comercial viejo' AS mensaje;
    ELSEIF comercial_viejo_existe = 0 AND comercial_nuevo_existe = 0 THEN
    	SELECT 'Error: No existe el comercial nuevo' AS mensaje;
    END IF;
    
    IF cliente_existe > 0 THEN
    	SELECT 'Existe el cliente' AS mensaje;
    END IF;
END$$
DELIMITER ;