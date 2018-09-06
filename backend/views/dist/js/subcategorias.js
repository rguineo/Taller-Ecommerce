$(document).ready(function(){
	$("#formu-nuevo-subcategorias").submit(function (e) {
		e.preventDefault()

    	var datos = new FormData($(this)[0])
	
		$.ajax({
			url: 'ajax/ajaxSubCategorias.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta){
				var cadena = respuesta.substr(0,2)

				if (cadena == "ok") {
					swal({				
						type: 'success',
						title: 'Excelente',
						text: 'SubCategoría creada con éxito'
					}).then((result) => {
						if (result.value) {
							window.location = "subcategorias"
						}
					})
				}else if (cadena == "er"){
                    swal({
                        type: 'warning',
                        title: 'Malas Noticias',
                        text: 'La SubCategoría ya existe. Intente Nuevamente'
					}).then((result) => {
                        if (result.value) {
                            window.location = "subcategorias"
                        }
					})                   
                }

			}
		})
	})

    $("body .table-dark").on("click", ".btnEliminarSubCategorias", function(){
		var id = $(this).attr("id")
		var rutaImagen = $(this).attr("rutaImagenSub")
		var datos = new FormData()
		datos.append("id", id)
		datos.append("tipoOperacion", "eliminarSubCategorias")
		datos.append("rutaImagen", rutaImagen)

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
				url: 'ajax/ajaxSubCategorias.php',
				type: 'POST',
				data: datos,
				processData: false,
				contentType: false,
				success: function(respuesta) {
					var cadena = respuesta.substr(0,2)
					
					if ( cadena == "ok") {
						swal(
					      'Eliminado!',
					      'Su archivo a sido eliminado.',
					      'success'
					    ).then((result) => {
						  if (result.value) {
						    window.location = "subcategorias"
						  }
						})
					}
				}

			})
		  }
		})	
	})

	$("body .table-dark").on("click", ".btnEditarSubCategorias", function(){
		var idSubcategoria = $(this).attr("idsubcategoria")
		var datos = new FormData()
		datos.append("id_subcategoria", idSubcategoria)
		datos.append("tipoOperacion", "editarSubcategoria")

		$.ajax({
			url: 'ajax/ajaxSubCategorias.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				var valor = JSON.parse(respuesta)
				
				$('#formu-editar-subcategorias input[name="idSub"]').val(valor.id)
				$('#formu-editar-subcategorias input[name="subcategorias"]').val(valor.subcategoria)
				$('#formu-editar-subcategorias input[name="urlSubcategoria"]').val(valor.ruta)
				$('#formu-editar-subcategorias #imagenSubCategoria').attr("src", valor.imagen)
				$('#formu-editar-subcategorias input[name="id_categoria"]').val(valor.id_categoria)
				$('#formu-editar-subcategorias input[name="rutaActual"]').val(valor.imagen)

			}

		})

	})

	$("#formu-editar-subcategorias").submit(function (e) {
		e.preventDefault()
	
		var datos = new FormData($(this)[0])
	
		$.ajax({
			url: 'ajax/ajaxSubCategorias.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				var cadena = respuesta.substr(0,2)
				console.log(cadena)
				if (cadena == "ok") {
					swal({
					  type: 'success',
					  title: 'Actualizado',
					  text: 'Categoria actualizado con éxito'
					}).then((result) => {
					  if (result.value) {
						window.location = "subcategorias"
					  }
					})
				}
			}
	
		})
	})


	$("#inputCategorias").change(function() {

		if ($("#inputCategorias").val() != "" ) {
			var posicion = $("#inputCategorias").val()
			var RutaSelect  = $('#inputCategorias [value="'+posicion+'"]').attr("rutaImagenCat")
			rutaImagen = RutaSelect.substr(3)
	
			$("#imagenCategoria").css("display", "block")
			$("#imagenCategoria").attr("src", rutaImagen);
		}	
	})


	// PREVISUALIZAR IMAGENES

	$("#imagSubCategoria").change(previsualizarImg)
	$("#imagenEditarSubC").change(previsualizarImg)

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
			$("#imagenSubCategoria").val("")

			swal({
				type: "Error al subir la imagen",
				text: "La imagen debe pesar MAX 2MB",
				icon: 'error',
				confirmButtonText: "¡Cerrar!",
			})
		}

		else {
			$("#imagenSubCategoria").css("display", "block")

			var datosImagen = new FileReader;
			datosImagen.readAsDataURL(imgSlider);

			$(datosImagen).on("load", function(event){

				var rutaImagen = event.target.result;

				$("." + identificador +" #imagenSubCategoria").attr("src", rutaImagen);
			})
		}

	}

})