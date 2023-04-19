$(document).ready(function () {
    //obtener el id del select 
  var numRegistros = $('#num_reg').val();
  // Cargar los datos por defecto al cargar la página
  cargarDatos("", numRegistros, 1);
  // Asignar el evento de búsqueda al input de búsqueda
  $("#busqueda-usuarios").keyup(function () {
    var numRegistros = $('#num_reg').val();
    var buscar = $(this).val();
    cargarDatos(buscar, numRegistros, 1);
  });
  // Asignar el evento de cambio de valor al select
  $("#num_reg").change(function () {
    // Obtener el nuevo valor seleccionado
    var nuevoNumRegistros = $(this).val();
    var buscador = $('#busqueda-usuarios').val();
    // Agregar el nuevo valor al URL de la página actual
    cargarDatos(buscador, nuevoNumRegistros, 1);
  });
});

//una vez el usuario selecciona editar y sale de la modal, y quiera ingresar a nuevo, los datos se eliminaran
function limpiarFormulario() {
  $("#form_usuarios")[0].reset();
  $("#form_usuariosEdit")[0].reset();
  $("button[type='submit']").text("Guardar");
  $("#form_usuariosEdit").removeAttr("data-id");
}
//funcion que crea un boton guardar o editar, dependiendo la accion 
function crearBotonSave(nombre, id,container , numRegistros) {
  var numReg = numRegistros;
  // Crear el botón
  var boton = document.createElement("button");
  // Establecer el texto y el id del botón
  boton.textContent = nombre;
  boton.id = id;
  // Agregar la clase "btn" y "btn-primary" al botón
  boton.classList.add("btn", "btn-success");

  // Agregar el botón al DOM
  container.appendChild(boton);

  boton.onclick = function () {
      nuevoUsuario(numReg);
  };
}

$('#nuevo').click(function () {
  document.getElementById("containerbuttonsave").innerHTML = "";
  var numRegistros = $('#num_reg').val();
  crearBotonSave("guardar", "guardar", document.getElementById("containerbuttonsave"), numRegistros);

})

function crearBotonEdit(nombre, id, tokenUsuario, numRegistros){
  var token = tokenUsuario;
  var numReg = numRegistros;
  // Crear el botón
  var boton = document.createElement("button");
  // Establecer el texto y el id del botón
  boton.textContent = nombre;
  boton.id = id;
  // Agregar la clase "btn" y "btn-primary" al botón
  boton.classList.add("btn", "btn-success");

  // Agregar el botón al DOM
  containerbuttonedit.appendChild(boton);
  boton.onclick = function () {
    editarUsuario(token,numReg);
  };
  
}



function mostrarBotonesPaginacion(registro, pagina) {
  var buscador = $('#busqueda-usuarios').val();
  var numRegistros = $('#num_reg').val();
  var numPaginas = Math.ceil(registro / numRegistros);
  var paginaActual = pagina;
  var paginador = $("#paginador");

  // Limpiar el contenedor de botones de paginación
  paginador.empty();

  // Obtener el número de páginas a mostrar y la página inicial a mostrar
  var numPagesDisplayed = Math.min(5, numPaginas);
  var startPage = paginaActual;
  if (paginaActual > 3) {
    startPage = paginaActual - 2;
  } else if (numPaginas > numPagesDisplayed) {
    numPagesDisplayed = Math.min(numPagesDisplayed, 4 + paginaActual);
  }

  // Agregar los enlaces de paginación
  for (var i = startPage; i < startPage + numPagesDisplayed && i <= numPaginas; i++) {
    var enlace = $("<a>").addClass("page-link mx-1").text(i).attr("href", "#");

    if (i == paginaActual) {
      enlace.addClass("active");
    } else {
      // Agregar el evento click para enviar el número de página
      enlace.click((function (numeroDePagina) {
        return function () {
          cargarDatos(buscador, numRegistros, numeroDePagina);
        }
      })(i));
    }

    var span = $("<span>").addClass("page-item");
    span.append(enlace);

    var li = $("<li>").addClass("page-item");
    li.append(span);

    paginador.append(li);
  }

  // Agregar el enlace de página anterior si no estamos en la primera página
  // Agregar el enlace de página anterior si no estamos en la primera página
  if (paginaActual > 1) {
    var prevLink = $("<a>").addClass("page-link mx-1").html('<i class="bi bi-chevron-left"></i>').attr("href", "#");
    prevLink.click(function () {
      cargarDatos(buscador, numRegistros, paginaActual - 1);
    });

    var span = $("<span>").addClass("page-item");
    span.append(prevLink);

    var li = $("<li>").addClass("page-item");
    li.append(span);

    paginador.prepend(li);
  }

  // Agregar el enlace de página siguiente si no estamos en la última página
  if (paginaActual < numPaginas) {
    var nextLink = $("<a>").addClass("page-link mx-1").html('<i class="bi bi-chevron-right"></i>').attr("href", "#");
    nextLink.click(function () {
      cargarDatos(buscador, numRegistros, paginaActual + 1);
    });

    var span = $("<span>").addClass("page-item");
    span.append(nextLink);

    var li = $("<li>").addClass("page-item");
    li.append(span);

    paginador.append(li);
  }

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

function cargarDatos(buscar, numRegistros, pagina) {
  // Hacer la petición AJAX
  var inicio = (pagina - 1) * numRegistros;
  var limite = numRegistros;
  $.ajax({
    url: "../Controllers/carga_usuario.php",
    type: "GET",
    dataType: "json",
    data: {
      buscar: buscar,
      num_reg: limite,
      inicio: inicio
    },
    success: function (data) {
      // Limpiar la tabla antes de agregar los datos
      var tbody = $("#tabla-usuarios tbody");
      tbody.empty();

      // Agregar los datos a la tabla
      $.each(data.resultados, function (index, usuario) {
        //obtengo los badges
        var status = obtenerEtiqueta(usuario.status);

        var tr = $("<tr>");
        tr.append("<td>" + usuario.usuario + "</td>");
        tr.append("<td>" + usuario.nombre_rol + "</td>");
        tr.append("<td>" + usuario.nombre_empleado + "</td>");
        tr.append("<td>" + status + "</td>");
        tr.append("<td>"
          + "<ul class='list-inline m-0'><li class='list-inline-item'>"
          + "<button data-bs-toggle='modal' data-bs-target='#ModalEdit' class='btn btn-warning editar-usuario' data-id='" + usuario.token + "'> "
          + "<i class='bi bi-pencil-square'></i>"
          + "</button>"
          + "</li> "
          + "<li class='list-inline-item'>"
          + "<button class='btn btn-danger eliminar-usuario' data-id='" + usuario.token + "'>"
          + "<i class='bi bi-trash2'></i> "
          + "</button></li></ul></td>");

        tbody.append(tr);
      });
      //actualizamos los botones de la paginacion
      mostrarBotonesPaginacion(data.total_registros, pagina);

      $(".editar-usuario").click(function () {
        var tokenUsuario = $(this).data("id");
        var numRegistros = $('#num_reg').val();
        document.getElementById("containerbuttonedit").innerHTML = "";
        crearBotonEdit("editar", "editar", tokenUsuario, numRegistros);

        //************************************************************************************** */
        // Hacer la petición AJAX para obtener los datos de la usuario a editar
        $.ajax({
          url: "../Controllers/obtener_usuario.php?token=" + tokenUsuario,
          type: "GET",
          dataType: "json",
          success: function (data) {
            // Llenar los campos del formulario con los datos de la usuario a editar
            $("#nombre").val(data.resultados.usuario);
            $("#id_roles").val(data.resultados.id_roles);
            $("#id_empleados").val(data.resultados.id_empleados);
            $("#id_status").val(data.resultados.status);

            var select = $("#selectEmpleados");
            select.empty(); // Vaciar opciones anteriores, si es que existen
            
            // Crear la opción seleccionada
            var optionSeleccionada = $("<option>").val(data.resultados.id_empleados).text(data.resultados.empleado);
            optionSeleccionada.prop("selected", true);
            
            // Agregar la opción seleccionada al select
            select.append(optionSeleccionada);
            
            // Agregar las opciones adicionales para los demás empleados
            $.each(data.empleados, function(index, empleado) {
              select.append($("<option>").val(empleado.id).text(empleado.nombre));
            });
            // Cambiar el texto del botón de submit para indicar que se está editando
         

            // Agregar el atributo data-id al formulario para enviar el ID de la usuario a editar
            $("#form_usuariosEdit").attr("data-id", tokenUsuario);

          },
          error: function (data) {
            console.log(data.resultados)
            alert("Error al obtener los datos del usuarios");

          },
        });
      });
      /************************************************************************************************* */
      // Asignar el evento de click al botón de eliminación
      $(".eliminar-usuario").click(function () {
        var tokenUsuario = $(this).data("id");

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
              url: "../Controllers/eliminar_usuario.php?token=" + tokenUsuario,
              type: "GET",
              success: function () {
                Swal.fire({
                  icon: 'success',
                  title: 'Usuario Eliminado',
                  text: 'Satisfactoriamente!'
                })
                // Recargar la tabla de usuarios para mostrar los cambios
                cargarDatos("", numRegistros, 1);
                $("#cerrarModal").click();
              },
              error: function () {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Ocurrio un error al procesar la informacion!'
                })
              },
            });
          }
        })


        // Hacer la petición AJAX para eliminar el registro

      });
    },
    error: function (data) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Ocurrio un error al procesar la informacion!'
      })
    },
  });
}


function nuevoUsuario(numRegistros) {
  var datos = $("#form_usuarios").serialize(); // serializa los datos del formulario
  $.ajax({
    url: "../Controllers/insertar_usuario.php", // archivo PHP para procesar los datos
    type: "GET",
    data: datos,
    success: function (response) {
      var comp = "success";
      if (response.includes(comp)) {
        Swal.fire({
          icon: 'success',
          title: 'Usuario Insertado Satisfactoriamente',
          showConfirmButton: false,
          timer: 1500
        })
        $("#form_usuarios")[0].reset();
        $("#cerrarModalSave").click();
        // hacer algo en respuesta exitosa del servidor
        cargarDatos("", numRegistros, 1);
      }
      else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Ocurrio un error al procesar la informacion!'
        })
      }

    },
    error: function (xhr, status, error) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Ocurrio un error de lado del servidor!'
      })
      // manejar el error del servidor
    },
  });
}


function editarUsuario(tokenUsuario, numRegistros) {


  var datos = $("#form_usuariosEdit").serialize(); // serializa los datos del formulario
  console.log(datos);
  $.ajax({
    url: "../Controllers/actualizar_usuario.php?token=" + tokenUsuario, // archivo PHP para procesar los datos
    type: "GET",
    data: datos,
    success: function (response) {
      var comp = "success"
      if (response.includes(comp)) {
        Swal.fire({
          icon: 'success',
          title: 'Usuario Modificado Satisfactoriamente',
          showConfirmButton: false,
          timer: 1500
        })
        $("#form_usuariosEdit")[0].reset();
        $("#cerrarModalEdit").click();
        // hacer algo en respuesta exitosa del servidor
        cargarDatos("", numRegistros, 1);
      }
      else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Ocurrio un error al procesar la informacion!'
        })
      }



    },
    error: function (xhr, status, error) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Ocurrio un error al procesar la informacion!'
      })
      // manejar el error del servidor
    },
  });
}

