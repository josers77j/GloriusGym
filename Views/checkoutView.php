<?php
include('../config.php');
include('../Includes/header.php');
include('../Includes/loginCheck.php'); ?>
<title>membresias</title>
</head>
<?php
include('../Includes/menu.php');
include('../Includes/saludo.php');

$query2 = $pdo->prepare("SELECT * FROM tbl_miembros");
$query2->execute();
$miembro = $query2->fetchAll();

$query2 = $pdo->prepare("SELECT * FROM tbl_membresias");
$query2->execute();
$membresia = $query2->fetchAll();



?>



<div class="container">
  <main>
    <div class="row mx-3 my-2 py-3">

      <div class="col-md-4 col-lg-4 order-md-last my-3">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Informacion de pago</span>
        </h4>
        <div class="my-3">
          <div class="form-check">
            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
            <label class="form-check-label" for="credit">Efectivo</label>
          </div>
          <hr class="my-3">
        </div>
        <div class="row py-3">
          <form id="FormNuevoCheckout" method="post">
            <div class="col-md-6">
              <label for="cc-number" class="form-label">Costo de la membresia:</label>
              <div class="container fs-5">
                <span class="badge bg-primary" id="costo">$0.00</span>
                <small class="text-body-secondary">Total</small>
              </div>
            </div>

        </div>

        <div class="col-md-6 py-2">
          <label for="cc-name" class="form-label">Cancela:</label>
          <div class="input-group has-validation">
            <span class="input-group-text">$</span>
            <input type="text" class="form-control" id="monto" name="monto" placeholder="0.00" required>
            <div class="invalid-feedback">
              El pago es necesario.
            </div>
          </div>
        </div>

        <div class="col-md-6 py-2">
          <label for="cc-number" class="form-label">Cambio:</label>
          <div class="container">
            <span class="badge bg-primary" id="cambio">$0.00</span>
          </div>
        </div>
        <hr class="my-4">
        <button class="w-100 btn btn-primary btn-lg" id="nuevo-checkout" type="submit">Procesar</button>

      </div>

      <div class="col-md-7 col-lg-8 py-2 bg-white rounded">
        <h4 class="mb-3">Seleccion Inicial</h4>

        <div class="row g-3">

          <div class="col-sm-6">
            <label for="firstName" class="form-label">Nombre del miembro</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-badge"></i></span>
              <select class="form-control" id="mySelect" name="id_miembro">
                <option selected value="id_empleados">Selecciona a un Miembro</option>
                <?php
                foreach ($miembro as $key) :
                ?>
                  <option value="<?php echo $key['id']; ?>"><?php echo $key['nombre']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

          </div>

          <div class="col-sm-6">
            <label for="firstName" class="form-label">Membresias</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-view-list"></i></span>
              <select class="form-control" id="id_membresia" name="id_membresia">
                <option selected value="id_membresia">Selecciona una Membresia</option>
                <?php
                foreach ($membresia as $key) :
                ?>
                  <option value="<?php echo $key['id']; ?>"><?php echo $key['nombre']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

          </div>

          <div class="col-sm-6">
            <label for="firstName" class="form-label">Fecha de inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
          </div>


          <div class="col-sm-6">
            <label class="form-label">Estado del pago </label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-earmark-check"></i></span>
              <select class="form-control" id="status" name="status">
                <option value="1">Cancelado</option>
                <option value="0">Pendiente</option>
              </select>
            </div>
          </div>

          <input type="hidden" name="duracion" id="duracion">

          <div class="col-12">
            <label for="email" class="form-label">Observaciones <span class="text-body-secondary">(Optional)</span></label>
            <textarea class="form-control" id="observaciones" name="observaciones" aria-label="With textarea"></textarea>
          </div>

        </div>
        <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id']; ?>">
        <hr class="my-4">
        <h4 class="mb-3">Checkout realizado por:</h4>
        <div class="col-6">
          <div class="input-group has-validation">
            <select class="form-control" id="id_usuario" name="id_usuario" aria-label="Disabled select example" disabled>

              <option selected value="<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['username']; ?></option>

            </select>
            <div class="invalid-feedback">
              Your username is required.
            </div>
          </div>
        </div>

        </form>
      </div>

    </div>
  </main>
</div>

<?php include("../Includes/footer.php"); ?>
<script src="../js/checkout.js"></script>


</body>

</html>