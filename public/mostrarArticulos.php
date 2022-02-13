<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once(__DIR__ . '/../bootstrap.php');
    $entityManager = getEntityManager();
    $idProveedor = $entityManager->getRepository("Proveedor")
        ->findAll();
    $articulos = $entityManager->getRepository("Articulo")
        ->findBy(array('proveedor' => $idProveedor));

    ?>
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
                        <th>Eliminar proveedor</th>
                        <th>Eliminar articulo</th>
                        <th>Actualizar articulo</th>
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
                            <td>
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="idProveedor" value="<?php echo $articulos[$i]->proveedor->id ?>">
                                    <input type="submit" name="borrarProveedor" value="Borrar proveedor" class="mt-3 btn btn-success">
                                </form>
                            </td>
                            <td>
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="idArticulo" value="<?php echo $articulos[$i]->id ?>">
                                    <input type="submit" name="borrarArticulo" value="Borrar articulo" class="mt-3 btn btn-success">
                                </form>
                            </td>
                            <td>
                                <form action="#" id="formUpdateArticulo" method="POST" enctype="multipart/form-data">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" value="<?php echo $articulos[$i]->nombre ?>"> <br>
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" id="descripcion" name="descripcion" value="<?php echo $articulos[$i]->descripcion ?>"> <br>
                                    <label for="precio">Precio</label>
                                    <input type="number" id="precio" name="precio" value="<?php echo $articulos[$i]->precio ?>"> <br>
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" id="cantidad" name="cantidad" value="<?php echo $articulos[$i]->cantidad ?>"> <br>
                                    <input type="hidden" id="idArticulo" name="idArticulo" value="<?php echo $articulos[$i]->id ?>">
                                    <input type="hidden" id="idProveedor" name="idProveedor" value="<?php echo $articulos[$i]->proveedor->id  ?>">
                                    <input type="submit" value="Actualizar articulo" name="actualizarArticulo">
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
            <form action="filtros/resultadosFiltros.php" method="post" enctype="multipart/form-data">
                <select name="filtrar">
                    <option name="verPrecios" value="verPrecios">Filtrar por precios</option>
                    <option name="verProveedores" value="verProveedores">Filtrar por proveedores</option>
                    <option name="verCantidad" value="verCantidad">Filtrar por cantidad</option>
                </select>
                <input type="submit" name="confirmar" value="Confirmar" class="mt-3 btn btn-success">
            </form>
        </section>
    </main>

    <br>

    <a href="./index.php">Volver al home</a>
</body>

</html>

<?php
if (isset($_POST['borrarProveedor'])) {
    $idProveedor = $_POST['idProveedor'];
    $proveedor = $entityManager->find('Proveedor', $idProveedor);
    $entityManager->remove($proveedor);
    $entityManager->flush();
    echo 'Proveedor eliminado';
}

if (isset($_POST['borrarArticulo'])) {
    $idArticulo = $_POST['idArticulo'];
    $articulo = $entityManager->find('Articulo', $idArticulo);
    $entityManager->remove($articulo);
    $entityManager->flush();
    echo 'Articulo eliminado';
}

if (isset($_POST['actualizarArticulo'])) {
    require_once(__DIR__ . '/../bootstrap.php');
    $entityManager = getEntityManager();
    $entityManager->getRepository("Proveedor")
        ->findAll();
    $entityManager->getRepository("Articulo")
        ->findBy(array(
            'proveedor' => $_POST['idProveedor'],
            'id' => $_POST['idArticulo'],
        ));
    $actualizarArticulo = $entityManager->getReference('Articulo', $_POST['idArticulo']);
    $actualizarArticulo->setNombre($_POST['nombre']);
    $actualizarArticulo->setDescripcion($_POST['descripcion']);
    $actualizarArticulo->setCantidad($_POST['cantidad']);
    $actualizarArticulo->setPrecio($_POST['precio']);
    $entityManager->flush();
    echo '<br> Articulo actualizado';
}
