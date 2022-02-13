<?php
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
require_once(__DIR__.'/../../bootstrap.php');
$entityManager = getEntityManager();
$proveedor = new Proveedor();
$proveedor->setNombre($nombre);
$proveedor->setDireccion($direccion);
$entityManager->persist($proveedor);
$entityManager->flush();
echo 'Proveedor añadido';
