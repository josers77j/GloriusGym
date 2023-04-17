$(document).ready(function () {
    // Cargar los datos por defecto al cargar la página
    cargarDatos();
  });
  
  //una vez el usuario selecciona editar y sale de la modal, y quiera ingresar a nuevo, los datos se eliminaran
  function limpiarFormulario() {
    $("#form_roles")[0].reset();
    $("button[type='submit']").text("Guardar");
    $("#form_rol").removeAttr("data-id");
  }
  
  //funcion que crea un boton guardar o editar, dependiendo la accion 
  function crearBoton(nombre, id, idRol) {
    var id = idRol
    // Crear el botón
    var boton = document.createElement("button");
    // Establecer el texto y el id del botón
    boton.textContent = nombre;
    boton.id = id;
    // Agregar la clase "btn" y "btn-primary" al botón
    boton.classList.add("btn", "btn-success");
  
    // Agregar el botón al DOM
    containerbutton.appendChild(boton);
    boton.onclick = function () {
      if (!id) {
        nuevoRol();
      } else {
  
        editarRol(id);
      }
    };
  }
  $('#nuevo').click(function () {
    document.getElementById("containerbutton").innerHTML = "";
    var numRegistros = $('#num_reg').val();
    crearBoton("guardar", "guardar", "");
  
  })
  
  
function obtenerEtiqueta(status) {
  if (status == 'inactivo') {
    return '<span class="badge bg-dark">inactivo</span>';
  } else if (status == 'activo') {
    return '<span class="badge bg-success">activo</span>';
  } else {
    return '';
  }
}
  function cargarDatos() {
    // Hacer la petición AJAX
  
   
    $.ajax({
      url: "../Controllers/carga_rol.php",
      type: "GET",
      dataType: "json",
      data: {
      },
      success: function (resultados) {
        // Limpiar la tabla antes de agregar los datos
        var tbody = $("#tabla-roles tbody");
        tbody.empty();
  
        // Agregar los datos a la tabla
        $.each(resultados, function (index, rol) {
          //obtengo los badges
          var status = obtenerEtiqueta(rol.Nombrestatus);
          var tr = $("<tr>");
          tr.append("<td>" + rol.nombre + "</td>");
          tr.append("<td>" + status + "</td>");
          
          tr.append("<td>"
            + "<ul class='list-inline m-0'><li class='list-inline-item'>"
            + "<button data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-warning editar-rol' data-id='" + rol.id + "'> "
            + "<i class='bi bi-pencil-square'></i>"
            + "</button>"
            + "</li> "
            + "<li class='list-inline-item'>"
            + "<button class='btn btn-danger eliminar-rol' data-id='" + rol.id + "'>"
            + "<i class='bi bi-trash2'></i> "
            + "</button></li></ul></td>");
  
          tbody.append(tr);
        });

        // Asignar el evento de click al botón de edición
  
        $(".editar-rol").click(function () {       
          var idRol = $(this).data("id");
          document.getElementById("containerbutton").innerHTML = "";
          crearBoton("editar", "editar", idRol);
          //************************************************************************************** */
          // Hacer la petición AJAX para obtener los datos de la rol a editar
          $.ajax({
            url: "../Controllers/obtener_rol.php?id=" + idRol,
            type: "GET",
            dataType: "json",
            success: function (rol) {
              // Llenar los campos del formulario con los datos de la rol a editar
  
              $("#nombre").val(rol.nombre);
              $("#status").val(rol.status);
              // Cambiar el texto del botón de submit para indicar que se está editando
              $("button[type='submit']").text("Editar");
  
              // Agregar el atributo data-id al formulario para enviar el ID de la rol a editar
              $("#form_rol").attr("data-id", idRol);
  
            },
            error: function () {
              alert("Error al obtener los datos del roles");
  
            },
          });
        });
        /************************************************************************************************* */
        // Asignar el evento de click al botón de eliminación
        $(".eliminar-rol").click(function () {
          var idRol = $(this).data("id");
       
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
                url: "../Controllers/eliminar_rol.php?id=" + idRol,
                type: "GET",
                success: function () {
                  Swal.fire({
                    icon: 'success',
                    title: 'Rol Eliminado Correctamente',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  // Recargar la tabla de roles para mostrar los cambios
                  cargarDatos();
                  $("#cerrarModal").click();
                },
                error: function () {
                  alert("Error al eliminar el rol");
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
  
  
  function nuevoRol() {
    var datos = $("#form_roles").serialize(); // serializa los datos del formulario
  
    $.ajax({
      url: "../Controllers/insertar_rol.php", // archivo PHP para procesar los datos
      type: "GET",
      data: datos,
      success: function (response) {
        Swal.fire({
          icon: 'success',
          title: 'Rol Insertado Satisfactoriamente',
          showConfirmButton: false,
          timer: 1500
        })
        
        $("#form_roles")[0].reset();
        $("#cerrarModal").click();
        cargarDatos();
  
        // hacer algo en respuesta exitosa del servidor
        
      },
      error: function (xhr, status, error) {
        alert("Error al guardar la rol");
        // manejar el error del servidor
      },
    });
  }
  
  
  function editarRol(idRol) {
    var datos = $("#form_roles").serialize(); // serializa los datos del formulario
  
    $.ajax({
      url: "../Controllers/actualizar_rol.php?id=" + idRol, // archivo PHP para procesar los datos
      type: "GET",
      data: datos,
      success: function (response) {
  
        Swal.fire({
          icon: 'success',
          title: 'Rol Modificado Satisfactoriamente',
          showConfirmButton: false,
          timer: 1500
        })
  
        $("#form_roles")[0].reset();
        $("#cerrarModal").click();
        cargarDatos();
  
        // hacer algo en respuesta exitosa del servidor
      },
      error: function (xhr, status, error) {
        alert("Error al guardar la rol");
        // manejar el error del servidor
      },
    });
  }
  
  