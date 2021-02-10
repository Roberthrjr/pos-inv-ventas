<?php

class ControladorUsuarios{
    // METODO PARA MOSTRAR USUARIOS
    static public function ctrMostrarUsuarios($item, $valor){
        
        $tabla = "usuarios";
        
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

    // METODO PARA EL INGRESO DE USUARIOS 
    static public function ctrIngresoUsuario(){
        if(isset($_POST["ingUsuario"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) && 
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                $encriptar = crypt($_POST["ingPassword"], '$2a$07$usesomesillystringforsalt$');

                $tabla = "usuarios";

                $item = "usuario";
                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){
                    
                    // VERIFICAR EL ESTADO PARA MANDAR LAS VARIABLES DE SESIÒN
                    if($respuesta["estado"] == 1){

                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["usuario"] = $respuesta["usuario"];
                    $_SESSION["foto"] = $respuesta["foto"];
                    $_SESSION["perfil"] = $respuesta["perfil"];

                    // REGISTRAR LA FECHA PARA SABER EL ULTIMO LOGIN
                    date_default_timezone_set('America/Lima');

                    $fecha = date('y-m-d');
                    $hora = date('H:i:s');

                    $fechaActual = $fecha.' '.$hora;

                    $item1 = "ultimo_login";
                    $valor1 = $fechaActual;

                    $item2 = "id";
                    $valor2 = $respuesta["id"];

                    $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                    if($ultimoLogin == "ok"){
                        echo '<script>

                            window.location = "inicio";

                        </script>';
                    }

                    }else{
                        echo '<br><div class="alert alert-danger">El usuario aún no está activado</div>';
                    }

                }else{
                    echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                }
            }

        }
    }

    // REGISTRO DE USUARIO
    static public function ctrCrearUsuario(){
        if(isset($_POST["nuevoUsuario"])){

            if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

                // VALIDAR IMAGEN
                $ruta = "";

                if(isset($_FILES["nuevaFoto"]["tmp_name"])){

                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    // CREAR EL DIRECTORIO EN DONDE GUARDAMOS LA FOTO DEL USUARIO

                    $directorio = "view/img/usuarios/".$_POST["nuevoUsuario"];

                    mkdir($directorio, 0755);

                    // DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP

                    if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

                        // GUARDAR LA IMAGEN EN EL DIRECTORIO

                        $aleatorio = mt_rand(100,999);
                        $ruta = "view/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAlto, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);

                    }

                    if($_FILES["nuevaFoto"]["type"] == "image/png"){

                        // GUARDAR LA IMAGEN EN EL DIRECTORIO

                        $aleatorio = mt_rand(100,999);
                        $ruta = "view/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAlto, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }
                
                $tabla = "usuarios";

                // ENCRIPTAR LA CONTRASEÑA CON EL UTILIZANDO BLOWFISH
                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$usesomesillystringforsalt$');

                $datos = array("nombre" => $_POST["nuevoNombre"],
                    "usuario" => $_POST["nuevoUsuario"],
                    "password" => $encriptar,
                    "perfil" => $_POST["nuevoPerfil"],
                    "foto" => $ruta);

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
                
                if($respuesta == "ok"){
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: '¡El usuario ha sido guardado correctamente!',
                        showConfirmButton: true,
                        confirmButtonText: 'Cerrar',
                        closeOnConfirm: false
                    }).then((result)=>{
                            if(result.value){
                                window.location = 'usuarios';
                            }
                    })</script>";
                }

            }else{
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: '¡El usuario no puede ir vacío o llevar caracteres especiales!',
                    showConfirmButton: true,
                    confirmButtonText: 'Cerrar',
                    closeOnConfirm: false
                  }).then((result)=>{
                        if(result.value){
                            window.location = 'usuarios';
                        }
                })</script>";
            } 
        }
    }

    // EDITAR USUARIO
    static public function ctrEditarUsuario(){

        if(isset($_POST["editarUsuario"])){

            if( preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){
                    
                // VALIDAR IMAGEN
                $ruta = $_POST["fotoActual"];

                if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    // CREAR EL DIRECTORIO EN DONDE GUARDAMOS LA FOTO DEL USUARIO

                    $directorio = "view/img/usuarios/".$_POST["editarUsuario"];

                    // PRIMERO PREGUNTAMOS SI EXISTE OTRA FOTO EN LA BASE DE DATOS
                    if(!empty($_POST["fotoActual"])){

                        unlink($_POST["fotoActual"]);

                    }else{
                        mkdir($directorio, 0755);
                    }

                    // DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP

                    if($_FILES["editarFoto"]["type"] == "image/jpeg"){

                        // GUARDAR LA IMAGEN EN EL DIRECTORIO

                        $aleatorio = mt_rand(100,999);
                        $ruta = "view/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAlto, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);

                    }

                    if($_FILES["editarFoto"]["type"] == "image/png"){

                        // GUARDAR LA IMAGEN EN EL DIRECTORIO

                        $aleatorio = mt_rand(100,999);
                        $ruta = "view/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAlto, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "usuarios";

                if($_POST["editarPassword"] != ""){

                    if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

                        $encriptar = crypt($_POST["editarPassword"], '$2a$07$usesomesillystringforsalt$');

                    }else{

                        echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: '¡La contraseña no puede ir vacia o llevar caracteres especiales!',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                          }).then((result)=>{
                                if(result.value){
                                    window.location = 'usuarios';
                                }
                        })</script>";

                        return;
                    }

                }else{

                    $encriptar = $_POST["passwordActual"];

                }

                $datos = array( "nombre"=>$_POST["editarNombre"],
                                "usuario"=>$_POST["editarUsuario"],
                                "password"=>$encriptar,
                                "perfil"=>$_POST["editarPerfil"],
                                "foto"=>$ruta,);

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if($respuesta == "ok"){
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'El usuario ha sido modificado correctamente',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                          }).then((result)=>{
                                if(result.value){
                                    window.location = 'usuarios';
                                }
                        })</script>";
                }

            }else{
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: '¡El usuario no puede ir vacio o llevar caracteres especiales!',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                          }).then((result)=>{
                                if(result.value){
                                    window.location = 'usuarios';
                                }
                        })</script>";
            }

        }
    }
}