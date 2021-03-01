<?php

require_once "../controller/categorias.controlador.php";
require_once "../model/categorias.modelo.php";

class AjaxCategorias{

    // EDITAR CATEGORIAS
    public $idCategoria;

    public function ajaxEditarCategoria(){
        
        $item = "id";
        $valor = $this->idCategoria;

        $respuesta = ControladorCategorias::ctrMostrarCategorias($item,$valor);

        echo json_encode($respuesta);
    }
}

// EDITAR CATEGORIA 
if(isset($_POST["idCategoria"])){

    $categoria = new AjaxCategorias();
    $categoria -> idCategoria = $_POST["idCategoria"];
    $categoria -> ajaxEditarCategoria();

}