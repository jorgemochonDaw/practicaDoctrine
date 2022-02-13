<?php
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$idProveedor = $_POST['idProveedor'];
require_once(__DIR__.'/../../bootstrap.php');
$entityManager = getEntityManager();
$articulo = new Articulo();
$articulo->setNombre($nombre);
$articulo->setDescripcion($descripcion);
$articulo->setCantidad($cantidad);
$articulo->setPrecio($precio);
$proveedor = $entityManager->getRepository('Proveedor')->find($idProveedor);
$articulo->setProveedor($proveedor);
$entityManager->persist($articulo);
$entityManager->flush();
echo 'Articulo añadido';
