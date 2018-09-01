$(document).ready(function(){
	$("#formu-nuevo-categorias").submit(function (e) {
		e.preventDefault()

		var datos = new FormData($(this)[0])

		$.ajax({
			url: 'ajax/ajaxCategorias.php',
			type: 'POST',
			data: datos,
			processData: false,
			contentType: false,
			success: function(respuesta) {
				if (respuesta == "ok") {
					swal({
					  type: 'success',
					  title: 'Excelente',
					  text: 'Categoría creada con éxito'
					}).then((result) => {
					  if (result.value) {
					    window.location = "categorias"
					  }
					})
				}
			}

		})

    })

// PREVISUALIZAR IMAGENES

$("#imagenNueva").change(previsualizarImg)
$("#imagenEditarCategoria").change(previsualizarImg)

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
            $("#imagenCategoria").val("")

            swal({
                type: "Error al subir la imagen",
                text: "La imagen debe pesar MAX 2MB",
                icon: 'error',
                confirmButtonText: "¡Cerrar!",
            })
        }

        else {
            $("#imagenCategoria").css("display", "block")

            var datosImagen = new FileReader;
              datosImagen.readAsDataURL(imgSlider);

              $(datosImagen).on("load", function(event){

                  var rutaImagen = event.target.result;

                  $("." + identificador +" #imagenCategoria").attr("src", rutaImagen);
              })
        }

    }

$("#titulo-categoria").on("keyup", function(){
    var cadena = $("#titulo-categoria").val()
    cadena = getCleanedString(cadena)
    $("#ruta-categoria").val(cadena)
})

$("#formu-editar-categoria").submit(function (e) {
    e.preventDefault()

    var datos = new FormData($(this)[0])

    $.ajax({
        url: 'ajax/ajaxCategorias.php',
        type: 'POST',
        data: datos,
        processData: false,
        contentType: false,
        success: function(respuesta) {
            if (respuesta == "ok") {
                swal({
                  type: 'success',
                  title: 'Actualizado',
                  text: 'Categoria actualizado con éxito'
                }).then((result) => {
                  if (result.value) {
                    window.location = "slider"
                  }
                })
            }
        }

    })
})

$("body .table-dark").on("click", ".btnEditarCategoria", function(){
    var idCategoria = $(this).attr("idSlider")
    var datos = new FormData()
    datos.append("id", idCategoria)
    datos.append("tipoOperacion", "editarCategoria")

    $.ajax({
        url: 'ajax/ajaxCategorias.php',
        type: 'POST',
        data: datos,
        processData: false,
        contentType: false,
        success: function(respuesta) {
            var valor = JSON.parse(respuesta)
            console.log(valor.id)
            console.log(valor.titulo_slider)

            $('#formu-editar-categoria input[name="tituloCategoria"]').val(valor.categoria)
            $('#formu-editar-categoria input[name="rutaCategoria"]').val(valor.ruta)
            $('#formu-editar-categoria #imagenSlider').attr("src", valor.imagen)
            $('#formu-editar-categoria input[name="id_slider"]').val(valor.idCategoria)
        }
    })
})

})
