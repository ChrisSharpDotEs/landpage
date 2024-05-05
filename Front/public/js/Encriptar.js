
function encriptado() {
    let url = "./publicRouter.php?/test";
    console.log(url)
    fetch(url)
    .then(response => response.text())
    .then(data => {
        console.log(data);
        decodificar(data);
    })
    .catch(error => console.log(error));

    function decodificar(data){
        var respuesta_encriptada = data;

        // Clave secreta utilizada para la encriptación
        var clave = "1234"; // Debe ser la misma clave que se utilizó en PHP

        // Vector de inicialización (IV) utilizado en el cifrado CBC
        var iv = "1234"; // Debe ser el mismo IV que se utilizó en PHP

        // Convertir la respuesta encriptada de base64 a un objeto WordArray
        var respuesta_encriptada_wordArray = CryptoJS.enc.Base64.parse(respuesta_encriptada);

        // Decodificar la respuesta encriptada utilizando AES en modo CBC
        var decrypted = CryptoJS.AES.decrypt(
            { ciphertext: respuesta_encriptada_wordArray },
            CryptoJS.enc.Utf8.parse(clave),
            { iv: CryptoJS.enc.Utf8.parse(iv) }
        );

        // Convertir la respuesta decodificada a una cadena
        var respuesta_decodificada = decrypted.toString(CryptoJS.enc.Utf8);

        // Imprimir la respuesta decodificada en la consola
        console.log(respuesta_decodificada);
    }
        
}