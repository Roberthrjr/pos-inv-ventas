<?php

class ControladorCategorias{
    // CREAR CATEGORIA
    static public function ctrCrearCategoria(){
        if(isset($_POST["nuevaCategoria"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóú ]+$/', $_POST["nuevaCategoria"])){
                
                $tabla = "categorias";
                $datos = $_POST["nuevaCategoria"];
                $respuesta = ModeloCategorias::mdlCrearCategoria($tabla, $datos);

                if($respuesta == "ok"){
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: '¡La categoría ha sido guardada correctamente!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'categorias';
                            }
                    })</script>";
                }else{
                    echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: '¡La categoría no ha sido guardada correctamente!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'categorias';
                            }
                    })</script>";
                }

            }else{
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: '¡La categoría no puede ir vacía o llevar caracteres especiales!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'categorias';
                            }
                    })</script>";
            }
        }
    }

    // MOSTRAR CATEGORIAS
    static public function ctrMostrarCategorias($item,$valor){

        $tabla = "categorias";

        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

        return $respuesta;
    }

    // ACTUALIZAR CATEGORIA
    static public function ctrEditarCategoria(){
        if(isset($_POST["editarCategoria"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóú ]+$/', $_POST["editarCategoria"])){
                
                $tabla = "categorias";
                $datos = array("categoria"=>$_POST["editarCategoria"], "id"=>$_POST["idCategoria"]);

                $respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);

                if($respuesta == "ok"){
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: '¡La categoría ha sido guardada correctamente!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'categorias';
                            }
                    })</script>";
                }else{
                    echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: '¡La categoría no ha sido guardada correctamente!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'categorias';
                            }
                    })</script>";
                }

            }else{
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: '¡La categoría no puede ir vacía o llevar caracteres especiales!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'categorias';
                            }
                    })</script>";
            }
        }
    }

    static public function ctrBorrarCategoria(){

        if(isset($_GET["idCategoria"])){

            $tabla = "categorias";
            $datos = $_GET["idCategoria"];

            $respuesta =  ModeloCategorias::mdlBorrarCategoria($tabla, $datos);
            
            if($respuesta == "ok"){
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: '¡La categoría ha sido borrada correctamente!',
                    showConfirmButton: true,
                    confirmButtonText: 'Cerrar',
                    closeOnConfirm: false
                }).then((result)=>{
                        if(result.value){
                            window.location = 'categorias';
                        }
                })</script>";
            }else{
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: '¡La categoría no ha sido borrada correctamente!',
                    showConfirmButton: true,
                    confirmButtonText: 'Cerrar',
                    closeOnConfirm: false
                }).then((result)=>{
                        if(result.value){
                            window.location = 'categorias';
                        }
                })</script>";
            }

        }
    }
}