<?php
$entityManager = getEntityManager();
$proveedores = $entityManager->getRepository("Proveedor")->findAll();
?>
<h2>Indica si buscas articulos de un proveedor o eres un proovedor nuevo y quieres subir tus articulos</h2>
<form action="index.php" method="POST" enctype="multipart/form-data">
    <select name="proveedor">
        <option name="verArticulos" value="verArticulos">Mostrar botón, ver articulos</option>
        <option name="nuevoProveedor" value="anniadirProveedor">Registrarte como nuevo proveedor</option>
        <?php
        for ($i = 0; $i < count($proveedores); $i++) {
        ?>
            <option name="proveedor" value="<?php echo $proveedores[$i]->id ?>">Proveedor: <?php echo $proveedores[$i]->nombre ?></option>
        <?php
        }
        ?>
    </select>
    <input type="submit" name="seleccionarAccion" value="Confirmar" class="mt-3 btn btn-success">
</form>

<?php
if(isset($_POST['seleccionarAccion'])) {
    session_start();
    $idProveedor = $_POST['proveedor'];
    $_SESSION['idProveedor'] = $idProveedor;
    
}
?>