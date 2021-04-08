<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarte</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/login.css">
  </head>
  <body>
    <main>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 login-section-wrapper">
            <div class="box">
              <div class="brand-wrapper d-block" align="center">
                <img src="../img/logoN.jpg" alt="logo">
              </div>
              <h1 class="login-title" align="center">Registrate</h1>
              <form method="post" id="frmAcceso">
                <div align="right" style="color: whitesmoke; font-size: 20px;">
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div align="left">
                      <label for="nombres" align="left">Nombres</label>
                    </div>
                    <input class="form-control" type="hidden" name="idingreso" id="idingreso">
                    <input class="form-control" type="hidden" name="cargo" id="cargo" value="cliente">
                    <input class="form-control" type="text" name="nombre" placeholder="Nombres" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div align="left">
                      <label for="apellidos" align="left">Apellidos</label>
                    </div>
                    <input class="form-control" type="text" name="apellidos" placeholder="Apellidos" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div align="left">
                      <label for="email" align="left">Correo Electrónico</label>
                    </div>
                    <input class="form-control" type="email" name="email" placeholder="Correo Electrónico" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div align="left">
                      <label for="dirección" align="left">Dirección</label>
                    </div>
                    <input class="form-control" type="text" name="direccion" placeholder="Dirección" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div align="left">
                      <label for="ciudad" align="left">Ciudad</label>
                    </div>
                    <input class="form-control" type="text" name="ciudad" placeholder="Ciudad" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div align="left">
                      <label for="pais" align="left">País</label>
                    </div>
                    <input class="form-control" type="text" name="pais" placeholder="País" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div align="left">
                      <label for="codigo postal" align="left">Código Postal</label>
                    </div>
                    <input class="form-control" type="text" name="codigo_postal" placeholder="Codigo Postal" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div align="left">
                      <label for="teléfono" align="left">Teléfono</label>
                    </div>
                    <input class="form-control" value="" aria-describedby="phone-error" type="tel" id="telefono"
                           autocomplete="tel" name="telefono" aria-invalid="true" required>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div align="left">
                      <label for="contraseña" align="left">Contraseña</label>
                    </div>
                    <input class="form-control" type="password" name="clave" placeholder="Contraseña" required data-eye>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div align="left">
                      <label for="imagen">Imagen</label>
                    </div>
                    <input type="file" class="form-control" name="imagen" id="imagen">
                  </div>
                </div>
                <input name="login" id="login" align="center" style="width: 30%; margin-left: 35%; font-size: 20px;"
                       class="btn btn-block btn-success" type="submit" value="Registrarse">
              </form>
            </div>
            <div style="font-size: 20px; margin-top: 1.5%;">
              <div align="center">
                <p class="login-wrapper-footer-text">¿Ya tienes una cuenta?
                  <a href="login.php" class="text-reset">Inicie Sesión aquí</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script type="text/javascript" src="../public/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="../public/js/bootbox.min.js"></script>
    <script type="text/javascript" src="./scripts/register.js"></script>
  </body>
</html>
