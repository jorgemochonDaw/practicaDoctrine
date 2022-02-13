<?php
if (isset($_POST['confirmar'])) {
    switch ($_POST['filtrar']) {
        case 'verProveedores':
            require('./../filtros/proveedores.php');
            break;
        case 'verPrecios':
            require('./../filtros/precios.php');
            break;
        case 'verCantidad':
            require('./../filtros/cantidad.php');
            break;
    }
}

?>

<a href="./../mostrarArticulos.php">Volver a informacion articulos</a>