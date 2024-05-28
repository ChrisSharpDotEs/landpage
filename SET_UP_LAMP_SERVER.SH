#!/bin/bash

# Función para verificar si un comando se ejecutó correctamente

check_command() {

    if [ $? -ne 0 ]; then

        echo "Error: El comando '$1' no se ejecutó correctamente."

        exit 1

    fi

}


# Actualizar e instalar los paquetes

sudo apt update

check_command "apt update"

sudo apt install apache2 mysql-server php

check_command "apt install -y apache2 mysql-server php"

echo "Se ha instalado el servidor HTTP Apache, MySQL y PHP"


# Ejecutar la configuración segura de MySQL

sudo mysql_secure_installation

check_command "mysql_secure_installation"

echo "Se ha asegurado MySQL con contraseña"


# Cambiar la contraseña de root en MySQL

sudo mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';"

check_command "mysql -e \"ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';\""


# Reiniciar Apache

sudo systemctl restart apache2

check_command "systemctl restart apache2"

echo "Se ha cambiado la contraseña de root por 'password'"


# Instalar modulos de php para mysqli y php-curl
sudo apt install -y php8.1-mysql php-xml php-curl

sudo systemctl restart apache2

echo "Se ha terminado de configurar PHP y MYSQL"

echo "El usuario y password por defecto es root y password cambiarlo si quiere mayor seguridad"


# Creacion de la carpeta para los proyectos de PHP

if [ -d "/home/cristian/Documents" ]; then

    sudo mkdir /var/www/html/php

    sudo chmod 777 /var/www/html/php

    mkdir 

    ln -s /var/www/html/php $HOME/Documents/php

    echo "Se ha creado el enlace simbólico para php"

elif [ -d "/home/cristian/Documentos" ]; then

    sudo mkdir /var/www/html/php

    sudo chmod 777 /var/www/html/php

    ln -s /var/www/html/php $HOME/Documentos/php

    echo "Se ha creado el enlace simbólico para php"

else

    echo "No se ha podido crear el enlace simbólico"

fi

# Esperar entrada del usuario para cerrar el terminal
echo "1. AHORA DEBES DESCARGAR LA ÚLTIMA VERSIÓN DE PHPMYADMIN EN https://www.phpmyadmin.net/, LO DESCOMPRIMES Y LO MUEVES A LA CARPETA /VAR/WWW/HTML"
echo "2. ACCEDE A LA RUTA http://localhost/phmyadmin, VERÁS UN ERROR."
echo "3. ABRE EL ARCHIVO PHP.INI QUE DEBE ESTAR EN /etc/php/8.1/apache2/php.ini"
echo "4. Descomenta la línea que dice ;    extension=mysqli y reinicia APACHE EL ERROR DEBERÁ HABER DESAPARECIDO."
read -p "Presiona Enter para continuar..."
read -p "¿Quieres instalar NodeJs? (s/n): " r$espuesta
read $respuesta =$(echo "$respuesta" | tr '[:upper:]' '[:lower:]')
