<?php
require_once(__DIR__."/../mdb/mdbTienda.php");
session_start();
$tiendas=vertiendas();
echo json_encode($tiendas);  