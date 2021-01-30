<?php

require_once "controller/plantilla.controlador.php";
require_once "controller/usuarios.controlador.php";
require_once "controller/categorias.controlador.php";
require_once "controller/productos.controlador.php";
require_once "controller/clientes.controlador.php";
require_once "controller/ventas.controlador.php";

require_once "model/usuarios.modelo.php";
require_once "model/categorias.modelo.php";
require_once "model/productos.modelo.php";
require_once "model/clientes.modelo.php";
require_once "model/ventas.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();