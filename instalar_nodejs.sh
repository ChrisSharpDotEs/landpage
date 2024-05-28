read -p 'Quieres instalar NodeJs? (s/n): ' respuesta
respuesta = $(echo "$respuesta" | tr '[:upper:]' '[:lower:]')
if [ "$respuesta" == "s" ]; then
    sudo apt install nodejs
    version=$(nodejs --version)
    echo "Se ha instalado Node.js version: $version"
fi
echo "Fin de programa"
