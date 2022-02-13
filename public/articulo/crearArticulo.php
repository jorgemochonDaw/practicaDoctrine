<?php
session_start();
$entityManager = getEntityManager();
$proveedor = $entityManager->getRepository("Proveedor")->find($idProveedor);
?>
<h2>Crear articulo</h1>
    <form id="fomrArticulo" action="index.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">
        <label for="descripcion">Descripcion</label>
        <input type="text" id="descripcion" name="descripcion">
        <label for="precio">Precio</label>
        <input type="number" id="precio" name="precio">
        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad">
        <label for="proveedor">Proveedor</label>
        <input ReadOnly type="text" id="proveedor" value="<?php echo $proveedor->nombre ?>" name="idProveedor">
        <input type="hidden" id="idProveedor" name="idProveedor" value="<?php echo $proveedor->id ?>">
        <input type="submit" value="Enviar" name="crearArticulo">
    </form>