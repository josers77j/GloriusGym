// Establecer el tiempo de espera en minutos (cambia esto según tus necesidades)
var tiempoEspera = 5;

// Establecer el temporizador
var timeoutID = setTimeout(function() {
    // Llamada al script de logout PHP después de que se haya agotado el tiempo de espera
    window.location.href = "logout.php";
}, tiempoEspera * 60 * 1000); // Multiplicar por 60 segundos y 1000 milisegundos para convertir a milisegundos

// Reiniciar el temporizador cuando se detecta una actividad del usuario
document.addEventListener("mousemove", function() {
    clearTimeout(timeoutID);
    timeoutID = setTimeout(function() {
        window.location.href = "../Includes/logout.php";
    }, tiempoEspera * 60 * 1000);
});
