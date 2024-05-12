#! /bin/bash
# Creacion de la carpeta para los proyectos de PHP
xdg-open https://www.phpmyadmin.net/downloads/

# Solicitar al usuario que ingrese el nombre del archivo descargado
read -p "Por favor, introduce el nombre del archivo descargado (incluyendo la extensión .zip): " archivo_descargado

cd $HOME/Descargas/
# Descomprimir el archivo de phpMyAdmin
unzip archivo_descargado -d $HOME/Descargas/

# Extraer el nombre del directorio sin la extensión .zip
nombre_directorio=$(basename -s .zip "$archivo_descargado")

# Cambiar el nombre del directorio a phpmyadmin
mv "$nombre_directorio" phpmyadmin

# Mover el directorio phpmyadmin a /var/www/html
sudo mv phpmyadmin /var/www/html

echo "El archivo $archivo_descargado se ha descomprimido, renombrado como phpmyadmin y movido a /var/www/html."

