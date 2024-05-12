<?php
    print '
    <h3>Borrar producto</h3>
    <form class="border rounded p-2"
        action="http://localhost/php/public/enrutado.php" method="POST">
        <div class="form-group row m-2">
            <label for="id" class="col-sm-4">Id</label>
            <input type="number" name="id" id="id" class="fomr-control col-sm-8">
        </div>
        <input type="hidden" name="controlador" value="producto">
        <input type="hidden" name="accion" value="borrar">
        <div class="form-group row m-5">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
    ';
?>