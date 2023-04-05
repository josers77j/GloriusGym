function mostrarUsuario() {
    var usuario = "<?php echo $_SESSION['username']; ?>";
    console.log(usuario); // para verificar que la variable se ha almacenado correctamente
  }