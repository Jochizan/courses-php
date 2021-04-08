<DOCTYPE !html>
  <html lang="es">
    <head>
      <meta charset="utf-8">
      <meta name="author" content="Kodinger">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title>Regístrate</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="./css/main.css">
    </head>
    <body class="my-login-page">
      <section class="h-100">
        <div class="container h-100">
          <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
              <div class="brand">
                <img src="img/register.jpg" alt="bootstrap 4 login page">
              </div>
              <div class="card fat">
                <div class="card-body">
                  <h4 class="card-title">Registrarse</h4>
                  <form method="POST" class="my-login-validation" action="connection.php">
                    <div class="form-group">
                      <label for="name">Nombre de usuario</label>
                      <input id="name" type="text" class="form-control" name="name" required autofocus>
                    </div>
                    <div class="form-group">
                      <label for="email">Dirección de correo electrónico</label>
                      <input id="email" type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Contraseña</label>
                      <input id="password1" type="password" class="form-control" name="password1" required data-eye>
                    </div>
                    <div class="form-group">
                      <label for="password">Repetir contraseña</label>
                      <input id="password2" type="password" class="form-control" name="password2" required data-eye>
                    </div>
                    <div class="form-group">
                      <div class="custom-checkbox custom-control">
                        <input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
                        <label for="agree" class="custom-control-label">Estoy de acuerdo con los
                          <a href="#">Términos y Condiciones</a>
                        </label>
                      </div>
                    </div>
                    <div class="form-group m-0">
                      <button type="submit" name="submit" class="btn btn-primary btn-block">
                        Regístrate
                      </button>
                    </div>
                    <div class="mt-4 text-center">
                      ¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a>
                    </div>
                  </form>
                </div>
              </div>
              <div class="footer">
                Copyright &copy; 2020 &mdash; Systems Company 👨‍🎓
              </div>
            </div>
          </div>
        </div>
      </section>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
              integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
              crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
              integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
              crossorigin="anonymous"></script>
    </body>
  </html>