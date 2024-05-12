<?php
    print '
    <h3>Actualizar producto</h3>
    <form class="border rounded p-2"
        action="http://localhost/php/public/enrutado.php" method="POST">
        <div class="form-group row m-2">
            <label for="id" class="col-sm-4">Id</label>
            <input type="number" name="id" id="id" class="fomr-control col-sm-8">
        </div>
        <div class="form-group row m-2">
            <label for="nombre" class="col-sm-4">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="fomr-control col-sm-8" maxlength="20">
        </div>
        <div class="form-group row m-2">
            <label for="descripcion" class="col-sm-4">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" maxlength="40" class="fomr-control col-sm-8">
        </div>
        <div class="form-group row m-2">
            <label for="pvp" class="col-sm-4">PVP</label>
            <input type="text" name="pvp" id="pvp" class="fomr-control col-sm-8">
        </div>
        <div class="form-group row m-2">
            <label for="tipo" class="col-sm-4">Tipo producto</label>
            <select class="col-sm-8 p-2" name="tipo">
                <option value="">Elige un valor</option>
                <option value="automóvil">automóvil</option>
                <option value="motocicleta">motocicleta</option>
                <option value="moto">moto</option>
            </select>
        </div>
        <input type="hidden" name="controlador" value="producto">
        <input type="hidden" name="accion" value="actualizar">
        <div class="form-group row m-5">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
    ';
?>