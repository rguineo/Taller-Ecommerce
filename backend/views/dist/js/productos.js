$(document).ready(function(){
	$("#formu-nuevo-productos").submit(function (e) {
		e.preventDefault()

		var datos = new FormData($(this)[0])

		$.ajax({
			url: 'ajax/ajaxProducto.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				if (respuesta == "ok") {
					swal({
					  type: 'success',
					  title: 'Excelente',
					  text: 'Producto creado con éxito'
					}).then((result) => {
					  if (result.value) {
					    window.location = "productos"
					  }
					})
				}
			}

		})

	})
	
	$("#formu-editar-productos").submit(function (e) {
		e.preventDefault()

		var datos = new FormData($(this)[0])

		$.ajax({
			url: 'ajax/ajaxProducto.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				if (respuesta == "ok") {
					swal({
					  type: 'success',
					  title: 'Actualizado',
					  text: 'Producto actualizado con éxito'
					}).then((result) => {
					  if (result.value) {
					    window.location = "productos"
					  }
					})
				}
			}

		})
	})

	$("body .table-dark").on("click", ".btnEditarProductos", function(){
		var idProductos = $(this).attr("idProductos")
		var rutaImagen = $(this).attr("rutaImagen")
		var datos = new FormData()
		datos.append("id", idProductos)
		datos.append("tipoOperacion", "editarProducto")
		datos.append("rutaActual", rutaImagen)

		$.ajax({
			url: 'ajax/ajaxProducto.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				var valor = JSON.parse(respuesta)

				$('#formu-editar-productos input[name="EdCategoria"]').val(valor.categoria)
				$('#formu-editar-productos input[name="EdSubCategoria"]').val(valor.subcategoria)
				$('#formu-editar-productos input[name="rutaProductos"]').val(valor.ruta)
				$('#formu-editar-productos input[name="tituloProductos"]').val(valor.titulo)
				$('#formu-editar-productos input[name="descripcionProductos"]').val(valor.descripcion)
				$('#formu-editar-productos input[name="detalleProductos"]').val(valor.detalle)
				$('#formu-editar-productos input[name="precioProductos"]').val(valor.precio)
				$('#formu-editar-productos #imagenEdProducto').attr("src", valor.imagen)
				$('#formu-editar-productos input[name="ofertaProductos"]').val(valor.oferta)
				$('#formu-editar-productos input[name="precioOfertaProductos"]').val(valor.precioOferta)
				$('#formu-editar-productos input[name="descuentoProductos"]').val(valor.descuento)
				$('#formu-editar-productos input[name="finOfertaProductos"]').val(valor.finOferta)
				$('#formu-editar-productos input[name="idcategoria"]').val(valor.id_categoria)
				$('#formu-editar-productos input[name="idsubcategoria"]').val(valor.id_subcategoria)
				$('#formu-editar-productos input[name="rutaActual"]').val(valor.imagen)


			}

		})

	})

	$("body .table-dark").on("click", ".btnEliminarProductos", function(){
		var idProductos = $(this).attr("idProductos")
		var rutaImagen = $(this).attr("rutaImagen")
		var datos = new FormData()
		datos.append("id", idProductos)
		datos.append("tipoOperacion", "eliminarProducto")
		datos.append("rutaActual", rutaImagen)
    console.log(rutaImagen)
		swal({
		  title: '¿Estás seguro de eliminar?',
		  text: "Los cambios no son reversibles!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Si, Elimina!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
				url: 'ajax/ajaxProducto.php',
				type: 'POST',
				data: datos,
				processData: false,
				contentType: false,
				success: function(respuesta) {
					if ( respuesta == "ok") {
						swal(
					      'Eliminado!',
					      'Su archivo a sido eliminado.',
					      'success'
					    ).then((result) => {
						  if (result.value) {
						    window.location = "productos"
						  }
						})
					}
				}

			})
		  }
		})	
	})



		// PREVISUALIZAR IMAGENES

		$("#imagenNuevaProductos").change(previsualizarImg)
		$("#imagenEditarProductos").change(previsualizarImg)
	
	
		function previsualizarImg(e) {
			var contenedor = e.target.parentNode
	
			var identificador = contenedor.classList[1]
	
			imgSlider = this.files[0];
	
				if( imgSlider["type"] != "image/jpeg" && imgSlider["type"] != "image/png") {
					$("#custom").val("")
	
					swal({
						type: 'error',
						title: 'No es una imagen!!',
						text: 'Debe subir imagenes en formato JPEG o PNG',
					})
				} 
				if ( imgSlider["type"] > 2000000) {
					$("#ruta").val("")
	
					swal({
						type: "Error al subir la imagen",
						text: "La imagen debe pesar MAX 2MB",
						icon: 'error',
						confirmButtonText: "¡Cerrar!",
					})
				}
	
				else {
					$("#ruta").css("display", "block")
	
					var datosImagen = new FileReader;
						datosImagen.readAsDataURL(imgSlider);
	
						$(datosImagen).on("load", function(event){
	
							var rutaImagen = event.target.result;
	
							$("." + identificador +" #ruta").attr("src", rutaImagen);
						})
				}
	
		}

		$(".edit-cat").on("click", function(){
		
			alert("editar Categoria")
		})


		$(".edit-sub").on("click", function(){
		
			alert("editar SubCategoria")
		})

})