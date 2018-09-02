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
$("#imagen").change(previsualizarImg)

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
                    window.location = "categorias"
                  }
                })
            }
        }

    })
})

$("body .table-dark").on("click", ".btnEditarCategorias", function(){
    var idCategoria = $(this).attr("idCategorias")
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

            $('#formu-editar-categoria input[name="EtituloCategoria"]').val(valor.categoria)
            $('#formu-editar-categoria input[name="ErutaCategoria"]').val(valor.ruta)
            $('#formu-editar-categoria #imagenCategoria').attr("src", valor.imagen)
            $('#formu-editar-categoria input[name="id"]').val(valor.id)
            $('#formu-editar-categoria input[name="rutaActual"]').val(valor.imagen)


        }
    })
})


$("#titulo-subcategoria").on("keyup", function(){
    var cadena = $("#titulo-subcategoria").val()
    cadena = getCleanedString(cadena)
    $("#ruta-subcategoria").val(cadena)
})

$("#titulo-categoria").on("keyup", function(){
    var cadena = $("#titulo-categoria").val()
    cadena = getCleanedString(cadena)
    $("#ruta-categoria").val(cadena)
})

$("#EtituloCategoria").on("keyup", function(){
    var cadena = $("#EtituloCategoria").val()
    cadena = getCleanedString(cadena)
    $("#ErutaCategoria").val(cadena)
})

$("#titulo-productos").on("keyup", function(){
    var cadena = $("#titulo-productos").val()
    cadena = getCleanedString(cadena)
    $("#ruta-productos").val(cadena)
})

function getCleanedString(cadena){
    // Definimos los caracteres que queremos eliminar
    var specialChars = "'´°¬!¡@#$^&%*()+=[]\/{}|:<>¿?,.";
 
    // Los eliminamos todos
    for (var i = 0; i < specialChars.length; i++) {
        cadena= cadena.replace(new RegExp("\\" + specialChars[i], 'gi'), '');
    }   
 
    // Lo queremos devolver limpio en minusculas
    cadena = cadena.toLowerCase();
 
    // Quitamos espacios y los sustituimos por - porque nos gusta mas asi
    cadena = cadena.replace(/ /g,"-");
 
    // Quitamos acentos y "ñ". Fijate en que va sin comillas el primer parametro
    cadena = cadena.replace(/á/gi,"a");
    cadena = cadena.replace(/ä/gi,"a");
    cadena = cadena.replace(/â/gi,"a");
    cadena = cadena.replace(/à/gi,"a");
    
    cadena = cadena.replace(/é/gi,"e");
    cadena = cadena.replace(/ë/gi,"e");
    cadena = cadena.replace(/ê/gi,"e");
    cadena = cadena.replace(/è/gi,"e");

    cadena = cadena.replace(/í/gi,"i");
    cadena = cadena.replace(/ï/gi,"i");
    cadena = cadena.replace(/î/gi,"i");
    cadena = cadena.replace(/ì/gi,"i");

    cadena = cadena.replace(/ó/gi,"o");
    cadena = cadena.replace(/ö/gi,"o");
    cadena = cadena.replace(/ô/gi,"o");
    cadena = cadena.replace(/ò/gi,"o");

    cadena = cadena.replace(/ú/gi,"u");
    cadena = cadena.replace(/ü/gi,"u");
    cadena = cadena.replace(/û/gi,"u");
    cadena = cadena.replace(/ù/gi,"u");

    cadena = cadena.replace(/ñ/gi,"n");
  
    return cadena;
}

})
