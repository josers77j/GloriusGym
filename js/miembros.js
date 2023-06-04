$(document).ready(function () {
    //obtener el id del select 
    var numRegistros = $('#num_reg').val();

  
    // Cargar los datos por defecto al cargar la página
    cargarDatos("", numRegistros, 1);
    // Asignar el evento de búsqueda al input de búsqueda
    $("#busqueda-miembros").keyup(function () {
      var numRegistros = $('#num_reg').val();
      var buscar = $(this).val();
      cargarDatos(buscar, numRegistros,1);
    });
    // Asignar el evento de cambio de valor al select
    $("#num_reg").change(function () {
      // Obtener el nuevo valor seleccionado
      var nuevoNumRegistros = $(this).val();
      var buscador = $('#busqueda-miembros').val();
      // Agregar el nuevo valor al URL de la página actual
      cargarDatos(buscador, nuevoNumRegistros,1);
    });
  });
  
  //una vez el usuario selecciona editar y sale de la modal, y quiera ingresar a nuevo, los datos se eliminaran
  function limpiarFormulario() {
    $("#form_miembros")[0].reset();
    $("button[type='submit']").text("Guardar");
    $("#form_miembro").removeAttr("data-id");
  }
  
  //funcion que crea un boton guardar o editar, dependiendo la accion 
  function crearBoton(nombre, id, idMiembro, numRegistros) {
    var id = idMiembro
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
        nuevoMiembro(numReg);
      } else {
  
        editarMiembro(id,numReg);
      }
    };
  }
  $('#nuevo').click(function () {
    document.getElementById("containerbutton").innerHTML = "";
    var numRegistros = $('#num_reg').val();
    crearBoton("guardar", "guardar", "", numRegistros);
  
  })
  
  function mostrarBotonesPaginacion(registro, pagina) {
    var buscador = $('#busqueda-miembros').val();
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
      url: "../Controllers/carga_miembro.php",
      type: "GET",
      dataType: "json",
      data: {
        buscar: buscar,
        num_reg: limite,
        inicio: inicio
      },
      success: function (data) {
        // Limpiar la tabla antes de agregar los datos
        var tbody = $("#tabla-miembros tbody");
        tbody.empty();
  
        // Agregar los datos a la tabla
        $.each(data.resultados, function (index, miembro) {
          //obtengo los badges
          var tr = $("<tr>");
          tr.append("<td>" + miembro.nombre + "</td>");
          tr.append("<td>" + miembro.direccion + "</td>");
          tr.append("<td>" + miembro.telefono + "</td>");
          tr.append("<td>" + miembro.correo + "</td>");          
          tr.append("<td>" + miembro.fecha_registro + "</td>");
          
          tr.append("<td>"
            + "<ul class='list-inline m-0'><li class='list-inline-item'>"
            + "<button data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-warning editar-miembro' data-id='" + miembro.id + "'> "
            + "<i class='bi bi-pencil-square'></i>"
            + "</button>"
            + "</li> "
            + "<li class='list-inline-item'>"
            + "<button class='btn btn-danger eliminar-miembro' data-id='" + miembro.id + "'>"
            + "<i class='bi bi-trash2'></i> "
            + "</button></li></ul></td>");
  
          tbody.append(tr);
        });
        mostrarBotonesPaginacion(data.total_registros, pagina);
  
        // Asignar el evento de click al botón de edición
  
        $(".editar-miembro").click(function () {       
          var idMiembro = $(this).data("id");
          var numRegistros = $('#num_reg').val();
          document.getElementById("containerbutton").innerHTML = "";
          crearBoton("editar", "editar", idMiembro, numRegistros);
          //************************************************************************************** */
          // Hacer la petición AJAX para obtener los datos de la miembro a editar
          $.ajax({
            url: "../Controllers/obtener_miembro.php?id=" + idMiembro,
            type: "GET",
            dataType: "json",
            success: function (miembro) {
              // Llenar los campos del formulario con los datos de la miembro a editars
              console.log(miembro);  
              $("#nombre").val(miembro.nombre);
              $("#direccion").val(miembro.direccion);
              $("#telefono").val(miembro.telefono);
              $("#correo").val(miembro.correo);
              $("#fecha_reg").val(miembro.fecha_registro);
            
              // Cambiar el texto del botón de submit para indicar que se está editando
              $("button[type='submit']").text("Editar");
  
              // Agregar el atributo data-id al formulario para enviar el ID de la miembro a editar
              $("#form_miembro").attr("data-id", idMiembro);
  
            },
            error: function () {
              alert("Error al obtener los datos del miembros");
  
            },
          });
        });
        /************************************************************************************************* */
        // Asignar el evento de click al botón de eliminación
        $(".eliminar-miembro").click(function () {
          var idMiembro = $(this).data("id");
       
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
                url: "../Controllers/eliminar_miembro.php?id=" + idMiembro,
                type: "GET",
                success: function () {
                  Swal.fire({
                    icon: 'success',
                    title: 'Miembro Eliminado Correctamente',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  // Recargar la tabla de miembros para mostrar los cambios
                  cargarDatos("", numRegistros, 1);
                  $("#cerrarModal").click();
                },
                error: function () {
                  alert("Error al eliminar el miembro");
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
  
  
  function nuevoMiembro(numRegistros) {
    var datos = $("#form_miembros").serialize(); // serializa los datos del formulario
  
    $.ajax({
      url: "../Controllers/insertar_miembro.php", // archivo PHP para procesar los datos
      type: "GET",
      data: datos,
      success: function (response) {
        var comp = "success";
        if(response.includes(comp)){
          Swal.fire({
            icon: 'success',
            title: 'Miembro Insertado Satisfactoriamente',
            showConfirmButton: false,
            timer: 1500
          })
          
          $("#form_miembros")[0].reset();
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
  
  
  function editarMiembro(idMiembro, numRegistros) {
    var datos = $("#form_miembros").serialize(); // serializa los datos del formulario
  
    $.ajax({
      url: "../Controllers/actualizar_miembro.php?id=" + idMiembro, // archivo PHP para procesar los datos
      type: "GET",
      data: datos,
      success: function (response) {
        var comp = "success";
        if(response.includes(comp)){
        Swal.fire({
          icon: 'success',
          title: 'Miembro Modificado Satisfactoriamente',
          showConfirmButton: false,
          timer: 1500
        })
  
        $("#form_miembros")[0].reset();
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
  
  