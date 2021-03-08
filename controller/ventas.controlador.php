<?php

class ControladorVentas{

    /*=============================================
	MOSTRAR VENTAS
	=============================================*/
	static public function ctrMostrarVentas($item, $valor){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR VENTA
	=============================================*/
	static public function ctrCrearVenta(){
		if(isset($_POST["nuevaVenta"])){
			/*=============================================
			ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
			=============================================*/
			$listaProductos = json_decode($_POST["listaProductos"], true);

			$totalProductosComprados = array();

			foreach ($listaProductos as $key => $value) {

				array_push($totalProductosComprados, $value["cantidad"]);

				$tablaProductos = "productos";

				$item = "id";
				$valor = $value["id"];

				$traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor);

				$item1a = "ventas";
				$valor1a = $value["cantidad"] + $traerProducto["ventas"];

				$nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

				$item1b = "stock";
				$valor1b = $value["stock"];

				$nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

			}

			$tablaClientes = "clientes";

			$item = "id";
			$valor = $_POST["seleccionarCliente"];

			$traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item, $valor);

			$item1a = "compras";
			$valor1a = array_sum($totalProductosComprados) + $traerCliente["compras"];

			$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valor);

			$item1b = "ultima_compra";

			date_default_timezone_set('America/Lima');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$valor1b = $fecha.''.$hora;

			$fechaCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1b, $valor1b, $valor);

			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/
			$tabla = "ventas";

			$datos = array( "id_vendedor"=>$_POST["idVendedor"],
							"id_cliente"=>$_POST["seleccionarCliente"],
							"codigo"=>$_POST["nuevaVenta"],
							"productos"=>$_POST["listaProductos"],
							"impuesto"=>$_POST["nuevoPrecioImpuesto"],
							"neto"=>$_POST["nuevoPrecioNeto"],
							"total"=>$_POST["totalVenta"],
							"metodo_pago"=>$_POST["listaMetodoPago"]);

			$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);

			if($respuesta == "ok"){

				echo "<script>
				Swal.fire({
					icon: 'success',
					title: '¡La venta ha sido registrada correctamente!',
					showConfirmButton: true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
				}).then((result)=>{
						if(result.value){
							window.location = 'ventas';
						}
				})</script>";

			}elseif($respuesta == "error"){
				echo "<script>
				Swal.fire({
					icon: 'error',
					title: '¡La venta no ha sido registrada correctamente!',
					showConfirmButton: true,
					confirmButtonText: 'Cerrar',
					closeOnConfirm: false
				}).then((result)=>{
						if(result.value){
							window.location = 'ventas';
						}
				})</script>";
			}

		}
	}
    
}