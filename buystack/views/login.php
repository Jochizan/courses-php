<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/login.css">
  </head>
  <body>
    <main>
      <div class="container-fluid" style="font-size: 20px;">
        <div class="row">
          <div class="col-sm-6 login-section-wrapper">
            <div class="brand-wrapper d-block">
              <img src="../img/logoN.jpg" alt="logo">
            </div>
            <div class="login-wrapper my-auto" style="font-size: 20px;">
              <h1 class="login-title">Iniciar Sesión</h1>
              <form method="post" id="formulario">
                <div class="form-group" style="font-size: 20px;">
                  <label for="email" style="font-size: 20px;">Usuario</label>
                  <input type="text" name="logina" id="logina" class="form-control" placeholder="Usuario">
                </div>
                <div class="form-group mb-4">
                  <label for="password" style="font-size: 20px;">Contraseña</label>
                  <input type="password" name="clavea" id="passworda" class="form-control"
                         placeholder="ingrese su contraseña">
                </div>
                <input name="login" id="login" style="font-size: 20px;" class="btn btn-block btn-primary" type="submit"
                       value="Ingresar">
              </form>
              <a href="forgot.php" class="forgot-password-link" style="font-size: 16px; margin-bottom: 2.5%;">Olvido su
                contraseña?</a>
              <p class="login-wrapper-footer-text">¿No tienes una cuenta?
                <a href="register.php" class="text-reset">Registrate aquí</a>
              </p>
            </div>
          </div>
          <div class="col-sm-6 px-0 d-none d-sm-block" style="margin-right: 0%; padding: 0;">
            <img src="../public/images/login.jpg" alt="login image" class="login-img">
          </div>
        </div>
      </div>
    </main>
    <script type="text/javascript" src="../public/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="../public/js/bootbox.min.js"></script>
    <script type="text/javascript" src="./scripts/login.js"></script>
  </body>
</html>
