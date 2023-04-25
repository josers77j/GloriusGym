$(document).ready(function () {
  //obtener el id del select 
  var numRegistros = $('#num_reg').val();
  var fechaActual = new Date().toISOString().slice(0, 10);

  // Cargar los datos por defecto al cargar la página
  cargarDatos("", numRegistros, 1);
  // Asignar el evento de búsqueda al input de búsqueda
  $("#busqueda-empleados").keyup(function () {
    var numRegistros = $('#num_reg').val();
    var buscar = $(this).val();
    cargarDatos(buscar, numRegistros,1);
  });
  // Asignar el evento de cambio de valor al select
  $("#num_reg").change(function () {
    // Obtener el nuevo valor seleccionado
    var nuevoNumRegistros = $(this).val();
    var buscador = $('#busqueda-empleados').val();
    // Agregar el nuevo valor al URL de la página actual
    cargarDatos(buscador, nuevoNumRegistros,1);
  });
});

//una vez el usuario selecciona editar y sale de la modal, y quiera ingresar a nuevo, los datos se eliminaran
function limpiarFormulario() {
  $("#form_empleados")[0].reset();
  $("button[type='submit']").text("Guardar");
  $("#form_empleado").removeAttr("data-id");
}

//funcion que crea un boton guardar o editar, dependiendo la accion 
function crearBoton(nombre, id, idEmpleado, numRegistros) {
  var id = idEmpleado
  var numReg = numRegistros;
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
      nuevoEmpleado(numReg);
    } else {

      editarEmpleado(id,numReg);
    }
  };
}
$('#nuevo').click(function () {
  document.getElementById("containerbutton").innerHTML = "";
  var numRegistros = $('#num_reg').val();
  crearBoton("guardar", "guardar", "", numRegistros);

})

function mostrarBotonesPaginacion(registro, pagina) {
  var buscador = $('#busqueda-empleados').val();
  var numRegistros = $('#num_reg').val();
  var numPaginas = Math.ceil(registro / numRegistros);
  var paginaActual = pagina;
  var paginador = $("#paginador");
  
  // Limpiar el contenedor de botones de paginación
  paginador.empty();
  
  // Obtener el número de páginas a mostrar y la página inicial a mostrar
  var numPagesDisplayed = Math.min(5, numPaginas);
  var startPage = Math.max(1, paginaActual - 2);
  var endPage = Math.min(numPaginas, startPage + numPagesDisplayed - 1);
  startPage = Math.max(1, endPage - numPagesDisplayed + 1);
  
  // Agregar los enlaces de paginación
  for (var i = startPage; i <= endPage; i++) {
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



function cargarDatos(buscar, numRegistros, pagina) {
  // Hacer la petición AJAX

  var inicio = (pagina - 1) * numRegistros;
  var limite = numRegistros;
  $.ajax({
    url: "../Controllers/carga_empleado.php",
    type: "GET",
    dataType: "json",
    data: {
      buscar: buscar,
      num_reg: limite,
      inicio: inicio
    },
    success: function (data) {
      // Limpiar la tabla antes de agregar los datos
      var tbody = $("#tabla-empleados tbody");
      tbody.empty();

      // Agregar los datos a la tabla
      $.each(data.resultados, function (index, empleado) {
        //obtengo los badges
        var tr = $("<tr>");
        tr.append("<td>" + empleado.nombre + "</td>");
        tr.append("<td>" + empleado.direccion + "</td>");
        tr.append("<td>" + empleado.telefono + "</td>");
        tr.append("<td>" + empleado.correo + "</td>");
        tr.append("<td>" + empleado.fecha_nac + "</td>");
        tr.append("<td>" + empleado.salario + "</td>");
        tr.append("<td>" + empleado.fecha_reg + "</td>");
        tr.append("<td>"
          + "<ul class='list-inline m-0'><li class='list-inline-item'>"
          + "<button data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-warning editar-empleado' data-id='" + empleado.id + "'> "
          + "<i class='bi bi-pencil-square'></i>"
          + "</button>"
          + "</li> "
          + "<li class='list-inline-item'>"
          + "<button class='btn btn-danger eliminar-empleado' data-id='" + empleado.id + "'>"
          + "<i class='bi bi-trash2'></i> "
          + "</button></li></ul></td>");

        tbody.append(tr);
      });
      mostrarBotonesPaginacion(data.total_registros, pagina);

      // Asignar el evento de click al botón de edición

      $(".editar-empleado").click(function () {       
        var idEmpleado = $(this).data("id");
        var numRegistros = $('#num_reg').val();
        document.getElementById("containerbutton").innerHTML = "";
        crearBoton("editar", "editar", idEmpleado, numRegistros);
        //************************************************************************************** */
        // Hacer la petición AJAX para obtener los datos de la empleado a editar
        $.ajax({
          url: "../Controllers/obtener_empleado.php?id=" + idEmpleado,
          type: "GET",
          dataType: "json",
          success: function (empleado) {
            // Llenar los campos del formulario con los datos de la empleado a editar

            $("#nombre").val(empleado.nombre);
            $("#telefono").val(empleado.telefono);
            $("#direccion").val(empleado.direccion);
            $("#correo").val(empleado.correo);
            $("#fecha").val(empleado.fecha_nac);
            $("#salario").val(empleado.salario);
            $("#fecha_reg").val(empleado.fecha_reg);
            // Cambiar el texto del botón de submit para indicar que se está editando
            $("button[type='submit']").text("Editar");

            // Agregar el atributo data-id al formulario para enviar el ID de la empleado a editar
            $("#form_empleado").attr("data-id", idEmpleado);

          },
          error: function () {
            alert("Error al obtener los datos del empleados");

          },
        });
      });
      /************************************************************************************************* */
      // Asignar el evento de click al botón de eliminación
      $(".eliminar-empleado").click(function () {
        var idEmpleado = $(this).data("id");
     
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
              url: "../Controllers/eliminar_empleado.php?id=" + idEmpleado,
              type: "GET",
              success: function () {
                Swal.fire({
                  icon: 'success',
                  title: 'Empleado Eliminado Correctamente',
                  showConfirmButton: false,
                  timer: 1500
                })
                // Recargar la tabla de empleados para mostrar los cambios
                cargarDatos("", numRegistros, 1);
                $("#cerrarModal").click();
              },
              error: function () {
                alert("Error al eliminar el empleado");
              },
            });
          }
        })


        // Hacer la petición AJAX para eliminar el registro

      });
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


function nuevoEmpleado(numRegistros) {
  var datos = $("#form_empleados").serialize(); // serializa los datos del formulario

  $.ajax({
    url: "../Controllers/insertar_empleado.php", // archivo PHP para procesar los datos
    type: "GET",
    data: datos,
    success: function (response) {
      var comp = "success";
      if(response.includes(comp)){
        Swal.fire({
          icon: 'success',
          title: 'Empleado Insertado Satisfactoriamente',
          showConfirmButton: false,
          timer: 1500
        })
        
        $("#form_empleados")[0].reset();
        $("#cerrarModal").click();
        cargarDatos("", numRegistros, 1);
  
        // hacer algo en respuesta exitosa del servidor
        
      }else{
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Error al guardar el registro!'
        })
      }
      
    },
    error: function (xhr, status, error) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Error al guardar el registro!'
      })
      // manejar el error del servidor
    },
  });
}


function editarEmpleado(idEmpleado, numRegistros) {
  var datos = $("#form_empleados").serialize(); // serializa los datos del formulario

  $.ajax({
    url: "../Controllers/actualizar_empleado.php?id=" + idEmpleado, // archivo PHP para procesar los datos
    type: "GET",
    data: datos,
    success: function (response) {
      var comp = "success";
      if(response.includes(comp)){
      Swal.fire({
        icon: 'success',
        title: 'Empleado Modificado Satisfactoriamente',
        showConfirmButton: false,
        timer: 1500
      })

      $("#form_empleados")[0].reset();
      $("#cerrarModal").click();
      cargarDatos("", numRegistros, 1);
    }else{
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Error al modificar el registro!'
      })

    }
      // hacer algo en respuesta exitosa del servidor
    },
    error: function (xhr, status, error) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Error al guardar el registro!'
      })
      // manejar el error del servidor
    },
  });
}

