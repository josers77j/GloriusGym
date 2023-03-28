$(document).ready(function () {

  // Cargar los datos por defecto al cargar la página
  cargarDatos("");

  // Asignar el evento de búsqueda al input de búsqueda
  $("#busqueda-empleados").keyup(function () {
    var buscar = $(this).val();
    cargarDatos(buscar);
  });
});

$('#nuevo').click(function () {
$.ajax({}).abort();
  //$("button[type=submit]").prop("id") = 'guardar2';
  $("#editar").off("click");
  // Obtener la fecha actual en formato YYYY-MM-DD
var fechaActual = new Date().toISOString().slice(0, 10);

// Asignar la fecha actual al valor del input
document.getElementById("fecha_reg").value = fechaActual;

  $("button[type=submit]").attr("id", "guardar");
  $("#guardar").off("click");
  
  $("#guardar").click(function () {
    nuevoEmpleado();    
  });
})



function limpiarFormulario() {
  $("#form_empleados")[0].reset();
  $("button[type='submit']").text("Guardar");
  $("#form_empleado").removeAttr("data-id");
}


function cargarDatos(buscar) {
  // Hacer la petición AJAX
  $.ajax({
    url: "../Controllers/carga_empleado.php",
    type: "GET",
    dataType: "json",
    data: { buscar: buscar },
    success: function (resultados) {
      // Limpiar la tabla antes de agregar los datos
      var tbody = $("#tabla-empleados tbody");
      tbody.empty();

      // Agregar los datos a la tabla
      $.each(resultados, function (index, empleado) {
        //obtengo los badges
        var tr = $("<tr>");
        tr.append("<td>" + empleado.nombre + "</td>");
        tr.append("<td>" + empleado.direccion + "</td>");
        tr.append("<td>" + empleado.telefono + "</td>");
        tr.append("<td>" + empleado.correo + "</td>");
        tr.append("<td>" + empleado.fecha_nac + "</td>");
        tr.append("<td>" + empleado.salario + "</td>");
        tr.append("<td>" + empleado.fecha_reg + "</td>");
        tr.append(   "<td>" 
                   + "<ul class='list-inline m-0'><li class='list-inline-item'>" 
                   + "<button data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-warning editar-empleado' data-id='" + empleado.id +"'> "
                   + "<i class='bi bi-pencil-square'></i>"
                   + "</button>" 
                   + "</li> "
                   + "<li class='list-inline-item'>"
                   + "<button class='btn btn-danger eliminar-empleado' data-id='" + empleado.id +"'>"
                   + "<i class='bi bi-trash2'></i> "
                   + "</button></li></ul></td>");

        tbody.append(tr);
      });
      // Asignar el evento de click al botón de edición

      $(".editar-empleado").click(function () {
        var idEmpleado = $(this).data("id");
        $("#guardar").off("click");
        $("button[type=submit]").attr("id", "editar")
        $("#editar").off("click");

        $("#editar").click(function () {
          
          editarEmpleado(idEmpleado);
        });
        var idEmpleado = $(this).data("id");
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
                  title: 'Empleado Eliminado',
                  text: 'Satisfactoriamente!'
                })
                // Recargar la tabla de empleados para mostrar los cambios
                cargarDatos("");
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
      alert("Error al cargar los datos");
    },
  });
}


function nuevoEmpleado() {
  var datos = $("#form_empleados").serialize(); // serializa los datos del formulario
  console.log(datos);
  
  $.ajax({
    url: "../Controllers/insertar_empleado.php", // archivo PHP para procesar los datos
    type: "GET",
    data: datos,
    success: function (response) {
     Swal.fire({
        icon: 'success',
        title: 'Empleado Insertado Satisfactoriamente',
        showConfirmButton: false,
        timer: 1500
      })
      $("#form_empleados")[0].reset();
      $("#cerrarModal").click();
      // hacer algo en respuesta exitosa del servidor
      cargarDatos("");
    },
    error: function (xhr, status, error) {
      alert("Error al guardar la empleado");
      // manejar el error del servidor
    },
  });
}


function editarEmpleado(idEmpleado) {


  var datos =$("#form_empleados").serialize() ; // serializa los datos del formulario

  $.ajax({
    url: "../Controllers/actualizar_empleado.php?id=" + idEmpleado, // archivo PHP para procesar los datos
    type: "GET",
    data: datos,
    success: function (response) {
    
      Swal.fire({
        icon: 'success',
        title: 'Empleado Modificado Satisfactoriamente',
        showConfirmButton: false,
        timer: 1500
      })
      $("#form_empleados")[0].reset();
      $("#cerrarModal").click();
      // hacer algo en respuesta exitosa del servidor
      cargarDatos("");
    },
    error: function (xhr, status, error) {
      alert("Error al guardar la empleado");
      // manejar el error del servidor
    },
  });
}

