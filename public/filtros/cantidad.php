<?php
require_once(__DIR__ . '/../../bootstrap.php');
$entityManager = getEntityManager();
$idProveedor = $entityManager->getRepository("Proveedor")
    ->findAll();
$articulos = $entityManager->getRepository("Articulo")
    ->findBy(array('proveedor' => $idProveedor));

?>
<h2>cantidades</h2>
<main>
    <section>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Proveedor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    for ($i = 0; $i < count($articulos); $i++) {
                    ?>
                        <td><?php echo $articulos[$i]->nombre ?></td>
                        <td><?php echo $articulos[$i]->descripcion ?></td>
                        <td><?php echo $articulos[$i]->cantidad ?></td>
                        <td><?php echo $articulos[$i]->precio ?></td>
                        <td><?php echo $articulos[$i]->proveedor->nombre ?></td>
                </tr>

            <?php
                    }
            ?>
            </tbody>
        </table>
    </section>
    <section>
        <form action="cantidad.php" method="post" enctype="multipart/form-data">
            <select name="filtrarCantidad">
                <option name="cantidadPequeña" value="cantidadPequeña">Filtrar cantidades de 0 a 25 articulos</option>
                <option name="cantidadMediana" value="cantidadMediana">Filtrar cantidades de 26 a 100 articulos</option>
                <option name="cantidadGrande" value="cantidadGrande">Filtrar cantidades de 100 a 700 articulos</option>
                <option name="cantidadEnorme" value="cantidadEnorme">Filtrar cantidades a partir de 700 articulos</option>
            </select>
            <input type="submit" name="confirmar" value="Confirmar" class="mt-3 btn btn-success">
        </form>
    </section>
</main>
<a href="./../mostrarArticulos.php">Volver a la informacion articulos</a>
<?php
if (isset($_POST['confirmar'])) {
    $_SESSION['filtrarCantidad'] = $_POST['filtrarCantidad'];
    require('./../funciones/funciones.php');

    switch ($_SESSION['filtrarCantidad']) {
        case 'cantidadPequeña':
            filtrarCantidad(0, 26);
            break;
        case 'cantidadMediana':
            filtrarCantidad(25, 101);
            break;
        case 'cantidadGrande':
            filtrarCantidad(100, 701);
            break;
        case 'cantidadEnorme':
            filtrarCantidad(700, 1000000);
            break;
    }
}
