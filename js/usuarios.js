$(document).ready(function () {

    // Cargar los datos por defecto al cargar la página
    cargarDatos("");
  
    // Asignar el evento de búsqueda al input de búsqueda
    $("#busqueda-usuarios").keyup(function () {
      var buscar = $(this).val();
      cargarDatos(buscar);
    });
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
          var tr = $("<tr>");
          tr.append("<td>" + usuario.usuario + "</td>");
          tr.append("<td>" + usuario.password + "</td>");
          tr.append("<td>" + usuario.nombre_rol + "</td>");
          tr.append("<td>" + usuario.nombre_empleado + "</td>");
          tr.append("<td>" + usuario.status + "</td>");
        tr.append("<td><ul class='list-inline m-0'><li class='list-inline-item'> <button data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-info editar-usuario' data-id='" +
        usuario.id +
        "'><i class='bi bi-pencil-square'></i></button> </li><li class='list-inline-item'> <button class='btn btn-danger eliminar-usuario' data-id='" +
        usuario.id +
        "'><i class='bi bi-trash2'></i></button> </li></ul></td>");
        
          tbody.append(tr);
        });
        // Asignar el evento de click al botón de edición
        $(".editar-usuario").click(function () {
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
              $("#password").val(usuario.password);
              $("#id_roles").val(usuario.id_roles);
              $("#id_persona").val(usuario.id_persona);
              $("#status").val(usuario.status);
  
              // Cambiar el texto del botón de submit para indicar que se está editando
              $("button[type='submit']").text("Editar");
  
              // Agregar el atributo data-id al formulario para enviar el ID de la usuario a editar
              $("#form_usuario").attr("data-id", idUsuario);
            },
            error: function () {
              alert("Error al obtener los datos del usuario");
            },
          });
        });
        /************************************************************************************************* */
        // Asignar el evento de click al botón de eliminación
        $(".eliminar-usuario").click(function () {
          var idUsuario = $(this).data("id");
  
          // Hacer la petición AJAX para eliminar el registro
          $.ajax({
            url: "ajax/eliminar_usuario.php?id=" + idUsuario,
            type: "GET",
            success: function () {
              alert("Usuario eliminado exitosamente");
              // Recargar la tabla de usuarios para mostrar los cambios
              cargarDatos("");
            },
            error: function () {
              alert("Error al eliminar el usuario");
            },
          });
        });
      },
      error: function () {
        alert("Error al cargar los datos");
      },
    });
  }
  
  $("#form_usuarios").submit(function (event) {
    event.preventDefault(); // detiene el envío del formulario
    guardarusuario(); // llama a la función para guardar la usuario
  });
  function guardarusuario() {
    var datos = $("#form_usuarios").serialize(); // serializa los datos del formulario
    $.ajax({
      url: "Modals/usuarioCreate.php", // archivo PHP para procesar los datos
       type: "post",
      data: datos,
      success: function (response) {
        alert("usuario guardado exitosamente");
        $("#form_usuarios")[0].reset();
  
        // hacer algo en respuesta exitosa del servidor
        cargarDatos("");
      },
      error: function (xhr, status, error) {
        alert("Error al guardar la usuario");
        // manejar el error del servidor
      },
    });
  }
  