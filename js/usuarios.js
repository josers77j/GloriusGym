$(document).ready(function () {

  // Cargar los datos por defecto al cargar la página
  cargarDatos("");

  // Asignar el evento de búsqueda al input de búsqueda
  $("#busqueda-usuarios").keyup(function () {
    var buscar = $(this).val();
    cargarDatos(buscar);
  });
});



$('#nuevo').click(function () {
$.ajax({}).abort();
  //$("button[type=submit]").prop("id") = 'guardar2';
  $("#editar").off("click");
  $("button[type=submit]").attr("id", "guardar");
  $("#guardar").off("click");

  $("#guardar").click(function () {
    nuevoUsuario();    
  });
})



function limpiarFormulario() {
  $("#form_usuarios")[0].reset();
  $("button[type='submit']").text("Guardar");
  $("#form_usuario").removeAttr("data-id");
}

function obtenerEtiqueta(status) {
  if (status == 'inactivo') {
    return '<span class="badge bg-dark">inactivo</span>';
  } else if (status == 'activo') {
    return '<span class="badge bg-success">activo</span>';
  } else {
    return '';
  }
}

$(document).on("click", ".ver-password", function () {
  var passwordText = $(this).prev(".password-text");
  if (passwordText.hasClass("oculto")) {
    passwordText.text(passwordText.data("password"));
    passwordText.removeClass("oculto");
  } else {
    passwordText.text("********");
    passwordText.addClass("oculto");
  }
});


function cargarDatos(buscar) {
  // Hacer la petición AJAX
  $.ajax({
    url: "../Controllers/carga_usuario.php",
    type: "GET",
    dataType: "json",
    data: { buscar: buscar },
    success: function (resultados) {
      // Limpiar la tabla antes de agregar los datos
      var tbody = $("#tabla-usuarios tbody");
      tbody.empty();

      // Agregar los datos a la tabla
      $.each(resultados, function (index, usuario) {
        //obtengo los badges
        var status = obtenerEtiqueta(usuario.status);

        var tr = $("<tr>");
        tr.append("<td>" + usuario.usuario + "</td>");
        tr.append("<td>" + usuario.nombre_rol + "</td>");
        tr.append("<td>" + usuario.nombre_empleado + "</td>");
        tr.append("<td>" + status + "</td>");
        tr.append(   "<td>" 
                   + "<ul class='list-inline m-0'><li class='list-inline-item'>" 
                   + "<button data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-warning editar-usuario' data-id='" + usuario.id +"'> "
                   + "<i class='bi bi-pencil-square'></i>"
                   + "</button>" 
                   + "</li> "
                   + "<li class='list-inline-item'>"
                   + "<button class='btn btn-danger eliminar-usuario' data-id='" + usuario.id +"'>"
                   + "<i class='bi bi-trash2'></i> "
                   + "</button></li></ul></td>");

        tbody.append(tr);
      });
      // Asignar el evento de click al botón de edición

      $(".editar-usuario").click(function () {
        var idUsuario = $(this).data("id");
        $("#guardar").off("click");
        $("button[type=submit]").attr("id", "editar")
        $("#editar").off("click");

        $("#editar").click(function () {
          
          editarUsuario(idUsuario);
        });
        var idUsuario = $(this).data("id");
        //************************************************************************************** */
        // Hacer la petición AJAX para obtener los datos de la usuario a editar
        $.ajax({
          url: "../Controllers/obtener_usuario.php?id=" + idUsuario,
          type: "GET",
          dataType: "json",
          success: function (usuario) {
            // Llenar los campos del formulario con los datos de la usuario a editar
            
            $("#nombre").val(usuario.usuario);
            $("#id_roles").val(usuario.id_roles);
            $("#id_empleados").val(usuario.id_empleados);
            $("#id_status").val(usuario.status);

            // Cambiar el texto del botón de submit para indicar que se está editando
            $("button[type='submit']").text("Editar");

            // Agregar el atributo data-id al formulario para enviar el ID de la usuario a editar
            $("#form_usuario").attr("data-id", idUsuario);

          },
          error: function () {
            alert("Error al obtener los datos del usuarios");

          },
        });
      });
      /************************************************************************************************* */
      // Asignar el evento de click al botón de eliminación
      $(".eliminar-usuario").click(function () {
        var idUsuario = $(this).data("id");

        Swal.fire({
          title: '¿Estas seguro?',
          text: "No hay vuelta atras despues de esta accion!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Eliminar!',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "../Controllers/eliminar_usuario.php?id=" + idUsuario,
              type: "GET",
              success: function () {
                Swal.fire({
                  icon: 'success',
                  title: 'Usuario Eliminado',
                  text: 'Satisfactoriamente!'
                })
                // Recargar la tabla de usuarios para mostrar los cambios
                cargarDatos("");
                $("#cerrarModal").click();
              },
              error: function () {
                alert("Error al eliminar el usuario");
              },
            });
          }
        })

        
        // Hacer la petición AJAX para eliminar el registro
        
      });
    },
    error: function () {
      alert("Error al cargar los datos");
    },
  });
}


function nuevoUsuario() {
  var datos = $("#form_usuarios").serialize(); // serializa los datos del formulario
  console.log(datos);
  $.ajax({
    url: "../Controllers/insertar_usuario.php", // archivo PHP para procesar los datos
    type: "GET",
    data: datos,
    success: function (response) {
      Swal.fire({
        icon: 'success',
        title: 'Usuario Insertado Satisfactoriamente',
        showConfirmButton: false,
        timer: 1500
      })
      $("#form_usuarios")[0].reset();
      $("#cerrarModal").click();
      // hacer algo en respuesta exitosa del servidor
      cargarDatos("");
    },
    error: function (xhr, status, error) {
      alert("Error al guardar la usuario");
      // manejar el error del servidor
    },
  });
}


function editarUsuario(idUsuario) {


  var datos =$("#form_usuarios").serialize() ; // serializa los datos del formulario
  console.log(datos);
  $.ajax({
    url: "../Controllers/actualizar_usuario.php?id=" + idUsuario, // archivo PHP para procesar los datos
    type: "GET",
    data: datos,
    success: function (response) {
      Swal.fire({
        icon: 'success',
        title: 'Usuario Modificado Satisfactoriamente',
        showConfirmButton: false,
        timer: 1500
      })
      $("#form_usuarios")[0].reset();
      $("#cerrarModal").click();
      // hacer algo en respuesta exitosa del servidor
      cargarDatos("");
    },
    error: function (xhr, status, error) {
      alert("Error al guardar la usuario");
      // manejar el error del servidor
    },
  });
}

