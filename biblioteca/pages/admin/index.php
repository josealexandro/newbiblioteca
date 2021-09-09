<?php
session_start();
if (!isset($_SESSION['current_session'])) {
   header('Location: login.php');
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/sidebar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/obra.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/autora.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/usuario.php');

$autoras = obterAutorasDb();
$obras = obterObrasDb();
$usuarios = obterUsuariosDb();
?>
         <div class="container-fluid">
            <!-- INICIO CONTEUDO -->
            <div class="row" style="overflow-y: auto; height:100vh;">
               <div class="col" > 
                  <h1>Dashboard</h1>
                  <div class="row">
                     <div class="col">
                        <div class="card" style="width: 18rem;">
                           <div class="card-body">
                              <h2 class="card-title"><?=count($autoras)?></h2>
                              <h6 class="card-subtitle mb-2 text-muted">Autoras</h6>
                              <a href="autora/index.php" class="card-link">Acessar</a>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="card  " style="width: 18rem;">
                           <div class="card-body">
                              <h2 class="card-title"><?=count($obras)?></h2>
                              <h6 class="card-subtitle mb-2 text-muted text-white">Obras</h6>
                              <a href="obra/index.php" class="card-link">Acessar</a>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="card" style="width: 18rem;">
                           <div class="card-body">
                              <h2 class="card-title"><?=count($usuarios)?></h2>
                              <h6 class="card-subtitle mb-2 text-muted">Usuários</h6>
                              <a href="usuario/index" class="card-link">Acessar</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         <!-- FIM CONTEUDO-->
         </div>
      </main>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
      <script src="/assets/js/sidebars.js"></script>
   </body>
</html>