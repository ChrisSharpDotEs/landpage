#!/bin/bash

sudo apt update
sudo apt instal apache2 mysql-server php

echo "Se ha instalado el servidor HTTP Apache, MySQL y PHP"

sudo mysql_secure_installation

echo "Se ha asgurado MySQL con contraseña"

sudo mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';"

sudo systemctl restart apache2

echo "Se ha cambiado la contraseña de root por 'password'"
