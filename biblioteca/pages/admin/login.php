<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/admin.php');

if (isset($_POST['logout'])) logoutAction();

$loginResponse = (isset($_POST['email']) && isset($_POST['email'])) ? loginAction($_POST['email'], $_POST['senha']) : null;
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Login Template</title>
      <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="/assets/css/login.css">
   </head>
   <body>
      <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
         <div class="container">
<?php if (isset($_SESSION['current_session'])): ?>
            <!-- Bootstrap Message -->
            <div class="alert alert-primary mb-3">
               Olá, <b><?php echo $_SESSION['current_session']['user']; ?></b>! Seja bem-vindo.
            </div>
            <!-- Bootstrap Message -->
            <script>setTimeout("location.href = 'index.php';",1500);</script>
<?php endif; ?>
            <div class="card login-card">
               <div class="row no-gutters">
                  <div class="col-md-5">
                     <img src="/assets/media/logos/ifsertao.png"  alt="login" class="login-card-img">
                  </div>
                  <div class="col-md-7">
                     <div class="card-body">
                        <div class="brand-wrapper">
                           <img src="/assets/media/logos/login.png"  alt="logo" class="logo">
                        </div>
                        <p class="login-card-description">Entre na sua conta</p>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                           <div class="form-group">
                              <label for="email" class="sr-only">Email</label>
                              <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                           </div>
                           <div class="form-group mb-4">
                              <label for="password" class="sr-only">Senha</label>
                              <input type="password" name="senha" id="senha" class="form-control" placeholder="***********" required>
                           </div>
                           <button type="submit" class="btn btn-block login-btn mb-4">Entrar</button>
                        </form>
                        <a href="#!" class="forgot-password-link">Esqueceu sua senha?</a>
                        <p class="login-card-footer-text">
<?php if ($loginResponse === false): ?>
                           <!-- Bootstrap Alert -->
                           <div class="alert alert-danger alert-dismissable mb-3">
                              Dados inválidos, tente novamente.
                           </div>
                           <!-- Bootstrap Alert -->
<?php endif; ?>
                        </p>                
                     </div>
                  </div>
               </div>
            </div>
            <!-- <div class="card login-card">
            <img src="../../assets/images/login.jpg" alt="login" class="login-card-img">
            <div class="card-body">
               <h2 class="login-card-title">Login</h2>
               <p class="login-card-description">Sign in to your account to continue.</p>
               <form action="#!">
                  <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-prompt-wrapper">
                  <div class="custom-control custom-checkbox login-card-check-box">
                     <input type="checkbox" class="custom-control-input" id="customCheck1">
                     <label class="custom-control-label" for="customCheck1">Remember me</label>
                  </div>              
                  <a href="#!" class="text-reset">Forgot password?</a>
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
               </form>
               <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
            </div>
            </div> -->
         </div>
      </main>
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   </body>
</html>