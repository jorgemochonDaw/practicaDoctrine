<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mochonArticulos</title>

</head>

<body>
    <header>
        <h1>Mochon Articulos</h1>
    </header>
    <main>

    </main>
    <?php
    require_once __DIR__ . '/../bootstrap.php';
    require_once './proveedor/seleccionarProveedor.php';
    if ($_SESSION['idProveedor'] == 'anniadirProveedor') {
        require_once './proveedor/crearProveedor.php';
    } else if ($_SESSION['idProveedor'] == 'verArticulos') {
    ?>
        <br>
        <a href="./mostrarArticulos.php">Ver articulos</a>
    <?php
    } else {
        require_once './articulo/crearArticulo.php';
    }
    ?>
</body>
<?php
require('./cargarJs.php');
?>

</html>