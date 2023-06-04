$(document).ready(function () {
    $("#monto").keyup(function () {
        var costo = parseFloat($("#costo").text().substring(1));
        var pago = $("#monto").val();             
        calcularPago(costo,pago);   
    });

    $("#id_membresia").on("change", handleSelectChange);
});

$("#nuevo-checkout").click(function(event) {
    event.preventDefault();
    var datos = $("#FormNuevoCheckout").serialize();
    $.ajax({
      url: "../Controllers/insertar_checkout.php",
      type: "GET",
      data: datos,
      success: function(respuesta) {
        if (respuesta.includes("success")) {
          Swal.fire({
            icon: 'success',
            title: 'El usuario ha sido guardado correctamente',
            showConfirmButton: false,
            timer: 1500
          })
          $("#FormNuevoCheckout")[0].reset();
        } else {
          mostrarError();
        }
      },
      error: function(respuesta) {
        mostrarError();
      },
    });  
  });


// Función que se activa cuando se cambia el valor del elemento select
function handleSelectChange() {
    // Obtener el valor seleccionado
    var idMembresia = $("#id_membresia").val();

    var costoElement = document.getElementById("costo");
    // Asignar el valor de "costo" al contenido del elemento <span>
    costoElement.innerText = "$0.00";
    // Realizar la llamada AJAX
    $.ajax({
        url: "../Controllers/obtener_membresia.php?id=" + idMembresia,
        type: "POST",
        success: function (response) {
            // Parsear la respuesta JSON en un objeto JavaScript
            var data = JSON.parse(response);

            // Acceder a las propiedades individuales del objeto
            duracionGlobal = data.duracion;
            var costo = data.costo;

            // Asignar el valor de "costo" al contenido del elemento <span>
            costoElement.innerText = "$" + costo;
            $("#duracion").val(duracionGlobal);
        
        },
        error: function (response) {
            // Manejar cualquier error que pueda ocurrir durante la solicitud AJAX
            console.error("Error durante la solicitud AJAX:", error);
        }
    });
}

// Agregar un event listener al elemento select para detectar los cambios




function calcularPago(costo,pago){
    var cambioElement = document.getElementById("cambio");

    if (costo >= 1 ) {
        console.log(costo+pago)
        cambio = pago-costo;
        if (cambio < 0) {
            cambioElement.innerText = "$" + parseFloat(cambio.toFixed(2)) + " Inserte una cantidad valida ";
        }else{
            cambioElement.innerText = "$" + parseFloat(cambio.toFixed(2));
        }    

    }else{
        cambioElement.innerText = "$0.00";
    }
        

}

function mostrarError() {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: 'u_u'
      })
  }
  