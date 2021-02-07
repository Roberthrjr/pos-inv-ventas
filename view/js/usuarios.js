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