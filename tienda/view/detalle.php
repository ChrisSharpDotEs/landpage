<?php
function mostrarDetalles($id, $nombre, $descripcion, $pvp, $tipo){
    return '
        <div class="">
            <div class="">
            <h5 class="">' . $nombre . '</h5>
            </div>
            <div class="">
                <ul>
                    <li>ID: '. $id . '</li>
                    <li>NOMBRE: '. $nombre . '</li>
                    <li>DESCRIPCION: '. $descripcion . '</li>
                    <li>PRECIO: '. $pvp . '</li>
                    <li>TIPO: '. $tipo . '</li>
                </ul>
            </div>
            <div class="">
            <button type="button" class="btn btn-secondary">
                <a href="http://localhost/php/view/listado.php">Volver</a>
            </button>
            </div>
        </div>
        </div>
        </div>';
}

?>