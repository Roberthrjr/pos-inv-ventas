// SUBIENDO LA FOTO DEL USUARIO
$(".custom-file-input").change(function(){

    var imagen = this.files[0];

    console.log("imagen", imagen);

    // VALIDANDO EL FORMATO DE LA IMAGEN

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
        
        $(".custom-file-input").val("");
        
        Swal.fire({
            icon: 'error',
            title: '¡Error al subir la Imagen!',
            text: '¡La imagen debe de estar en formato JPG o PNG!',
            confirmButtonText: 'Cerrar'
        });

    }else if(imagen["size"] > 2000000){

        $(".custom-file-input").val("");
        
        Swal.fire({
            icon: 'error',
            title: '¡Error al subir la Imagen!',
            text: '¡La imagen no debe pesar màs de 2MB!',
            confirmButtonText: 'Cerrar'
        });

    }else{

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){
            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);
        })

    }
})

// EDITAR USUARIO USUARIO
$(".btnEditarUsuario").click(function(){
    var idUsuario = $(this).attr("idUsuario");

    var datos = new FormData();
    datos.append("idUsuario",idUsuario);

    $.ajax({
        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            // console.log("respuesta",respuesta);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);

            $("#passwordActual").val(respuesta["password"]);
            $("#fotoActual").val(respuesta["foto"]);


            if(respuesta["foto"] != ""){
                console.log(respuesta["foto"]);
                $(".previsualizar").attr("src", respuesta["foto"]);
            }
            
        }
    });
})

// ACTIVAR USUARIO
$(".btnActivar").click(function(){

    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");

    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({
        url:"ajax/usuarios.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

        }
    })

    if(estadoUsuario == 0){

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario',1);

    }else{

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoUsuario',0);

    }

})

// REVISAR SI EL USUARIO YA ESTA REGISTRADO
$("#nuevoUsuario").change(function(){

    var usuario = $(this).val();

    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url:rutaOculta+"ajax/usuarios.ajax.php",
        method:"POST",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            console.log("respuesta",respuesta);
        }
    })

})