<?php 
require_once("../modelo/modelo.php");
$denuncias = new Denuncias();
$datos = $denuncias->getdenuncia();
require_once("../vista/vista.php");