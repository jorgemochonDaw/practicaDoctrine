<?php
require_once(__DIR__ . '/../../bootstrap.php');
$entityManager = getEntityManager();
$idProveedor = $entityManager->getRepository("Proveedor")
    ->findAll();
$articulos = $entityManager->getRepository("Articulo")
    ->findBy(array('proveedor' => $idProveedor));

?>
<h2>Precios</h2>
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
        <form action="precios.php" method="post" enctype="multipart/form-data">
            <select name="filtrarPrecio">
                <option name="precioBarato" value="precioBarato">Filtrar precios de 0 a 25 euros</option>
                <option name="precioMedio" value="precioMedio">Filtrar precios de 26 a 100 euros</option>
                <option name="precioCaro" value="precioCaro">Filtrar precios de 100 a 700 euros</option>
                <option name="precioMuyCaro" value="precioMuyCaro">Filtrar precios a partir de 700 euros</option>
            </select>
            <input type="submit" name="confirmar" value="Confirmar" class="mt-3 btn btn-success">
        </form>
    </section>
</main>
<a href="./../mostrarArticulos.php">Volver a la informacion articulos</a>
<?php
if (isset($_POST['confirmar'])) {
    $_SESSION['filtrarPrecio'] = $_POST['filtrarPrecio'];
    require('./../funciones/funciones.php');
    switch ($_SESSION['filtrarPrecio']) {
        case 'precioBarato':
            filtrarPrecios(0, 26);
            break;
        case 'precioMedio':
            filtrarPrecios(25, 101);
            break;
        case 'precioCaro':
            filtrarPrecios(100, 701);
            break;
        case 'precioMuyCaro':
            filtrarPrecios(700, 1000000);
            break;
    }
}
