<?php
require_once(__DIR__ . '/vendor/autoload.php');

$classDirs = array(
    __DIR__,
    __DIR__ . '/entidades',
);

new \iRAP\Autoloader\Autoloader($classDirs);

function getEntityManager(): \Doctrine\ORM\EntityManager
{
    $entityManager = null;
    if ($entityManager === null) {
        $paths = array(__DIR__ . '/entidades');
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths);
        $connectionParams = array(
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '',
            'dbname' => 'mochonArticulos',
            'host' => '127.0.0.1',
        );
        $entityManager = \Doctrine\ORM\EntityManager::create($connectionParams, $config);
    }
    return $entityManager;
}