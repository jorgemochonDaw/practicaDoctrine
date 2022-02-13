<?php
require_once(__DIR__ . '/../../bootstrap.php');
$entityManager = getEntityManager();
$proveedoores = $entityManager->getRepository("Proveedor")->findAll();
?>
<h2>Proveedores</h2>
<main>
    <section>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Stock</th>
                    <th>Eliminar proveedor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    for ($i = 0; $i < count($proveedoores); $i++) {
                    ?>
                        <td><?php echo $proveedoores[$i]->nombre ?></td>
                        <td><?php echo $proveedoores[$i]->direccion ?></td>
                        <td>
                            <?php
                            $idProveedor = $entityManager->getRepository("Proveedor")
                                ->findAll();
                            $articulos = $entityManager->getRepository("Articulo")
                                ->findBy(array('proveedor' => $idProveedor));
                            echo    $articulos[$i]->cantidad;
                            ?>
                        </td>
                        <td>
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="idProveedor" value="<?php echo $proveedoores[$i]->proveedor->id ?>">
                                <input type="submit" name="borrarProveedor" value="Borrar proveedor" class="mt-3 btn btn-success">
                            </form>
                        </td>
                </tr>
            <?php
                    }
            ?>
            </tbody>
        </table>
    </section>
    <section>
        <form action="proveedores.php" method="post" enctype="multipart/form-data">
            <select name="filtrarProveedor">
                <option name="verNombre" value="verNombre">Filtrar por nombre</option>
                <option name="verDireccion" value="verDireccion">Filtrar por direccion</option>
                <option name="verStock" value="verStock">Filtrar por stock</option>
            </select>
            <input type="submit" name="confirmar" value="Confirmar" class="mt-3 btn btn-success">
        </form>
    </section>
</main>
<?php
if (isset($_POST['confirmar'])) {
    session_start();
    $_SESSION['filtreoProveedor'] = $_POST['filtrarProveedor'];
    switch ($_SESSION['filtreoProveedor']) {
        case 'verNombre':
            foreach ($proveedoores as $proveedoor) {
                echo 'Nombre: ';
                echo $proveedoor->nombre . '<br>';
            }
            break;
        case 'verDireccion':
            foreach ($proveedoores as $proveedoor) {
                echo 'Direccion: ';
                echo $proveedoor->direccion . '<br>';
            }
            break;
        case 'verStock':
            $idProveedor = $entityManager->getRepository("Proveedor")
                ->findAll();
            $articulos = $entityManager->getRepository("Articulo")
                ->findBy(array('proveedor' => $idProveedor));
            for ($i = 0; $i < count($articulos); $i++) {
                echo 'Stock: ';
                echo   $articulos[$i]->cantidad . '<br>';
            }
            break;
    }
}
echo '<br>';
?>

<a href="./../mostrarArticulos.php">Volver a la informacion articulos</a>
