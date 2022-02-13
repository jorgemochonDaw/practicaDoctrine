<?php
function filtrarPrecios($n1, $n2)
{
    require_once(__DIR__ . '/../../bootstrap.php');
    $entityManager = getEntityManager();
    $precios = $entityManager->createQueryBuilder('p')
        ->select("p,a")
        ->from('Proveedor', 'p')
        ->innerJoin('Articulo', 'a')
        ->where('a.proveedor = p.id')
        ->andwhere('a.precio > ' . $n1 . 'and a.precio <  ' . $n2)
        ->getQuery()
        ->getResult();
    echo '<br> Precios  <br>';
    foreach ($precios as $precio) {
        echo $precio->precio . '<br>';
    }
}

function filtrarCantidad($n1, $n2)
{
    require_once(__DIR__ . '/../../bootstrap.php');
    $entityManager = getEntityManager();
    $cantidades = $entityManager->createQueryBuilder('p')
        ->select("p,a")
        ->from('Proveedor', 'p')
        ->innerJoin('Articulo', 'a')
        ->where('a.proveedor = p.id')
        ->andwhere('a.cantidad > ' . $n1 . 'and a.cantidad <  ' . $n2)
        ->getQuery()
        ->getResult();
    echo '<br> Cantidades  <br>';
    foreach ($cantidades as $cantidad) {
        echo $cantidad->cantidad . '<br>';
    }
}
