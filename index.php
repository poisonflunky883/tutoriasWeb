<?php
session_start();
$route = 'views/partials/';
require 'views/partials/indexHead.php';
require 'classes/userFunctions.php';
require 'classes/sessionFunctions.php';
sessionFunctions:: verifyActiveSession();
if (!empty($_POST['boleta']) && !empty($_POST['password'])) {
  $user = userFunctions:: logIn($_POST['boleta'],$_POST['password']);
  $userT = userFunctions:: logInTeacher($_POST['boleta'],$_POST['password']);
  if ($user[1] == 3 || $user[1] == 1){
    sessionFunctions:: createSession($user);
  }else{
    sessionFunctions:: createSession($userT);
  }
 
  
}
?>
<body>
    <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="header-nav">
          <img class="logo-batiz" src="<?php echo '' . $route . ''; ?>img/batiz.png" alt="">
          <img class="logo-ipn" src="<?php echo '' . $route . ''; ?>img/ipn.png" alt="">
        </div>
        <div class="row align-items-center">
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">Tutorias</h1>
            <h2 class="mb-4">Iniciar Sesion</h2>
            <p class="text-muted">Inicia Sesion para continuar...</p>
            <form id="loginForm" action="index.php" method="POST" class="mt-4">
              <div class="form-group mb-4">
                <input type="text" name="boleta" placeholder="Ingresar Boleta" class="form-control border-0 shadow form-control-lg">
              </div>
              <div class="form-group mb-4">
                <input type="password" name="password" placeholder="Contraseña" class="form-control border-0 shadow form-control-lg text-violet">
              </div>
              <div class="form-group mb-4">

              </div>
              <button type="submit" class="btn btn-primary shadow px-5">Iniciar</button>
            </form>
          </div>
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="container-center">
              <h2 class="mb-4 mb-4-center">¿Aun no tienes cuenta?</h2>
              <a href="views/signup.php" class="btn btn-primary shadow px-5">¡Registrate!</a>              
            </div>
            <div class="pr-lg-5"><img src="<?php echo '' . $route . ''; ?>img/illustration.svg" alt="" class="img-fluid"></div>
          </div>
        </div>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                 -->
      </div>
    </div>
<?php
require 'views/partials/foot.php';
?>