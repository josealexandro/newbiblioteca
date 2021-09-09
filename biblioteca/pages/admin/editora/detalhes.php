<?php
session_start();
if (!isset($_SESSION['current_session'])) {
   header('Location: ../login.php');
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/sidebar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/editora.php');

if (isset($_GET['id'])) {
   $editora = buscarEditoraAction($_GET['id']);
   if (empty($editora)) {
      header("Location: ".$_SERVER['PHP_SELF']);
   }
}
?>
         <div class="container-fluid">
            <!-- INICIO CONTEUDO -->
            <div class="row" style="overflow-y: auto; height:100vh;">
               <div class="col" > 
                  <h1>Visualizar Editora</h1>
                  <div class="form-group" >
                     <label for="nome">Nome editora</label>
                     <input readonly value="<?=htmlspecialchars($editora['nome'])?>" type="text" class="form-control"><br/>
                  </div>
                  <div class="form-group" >
                     <label for="estado">Estado</label>
                     <input readonly value="<?=htmlspecialchars($editora['estado'])?>" type="text" class="form-control"><br/>
                  </div>
                  <div class="form-group" >
                     <label for="cidade">Cidade</label>
                     <input readonly value="<?=htmlspecialchars($editora['cidade'])?>" type="text" class="form-control"><br/>
                  </div>
                  <div class="form-group" >
                     <label for="site_editora">Website</label>
                     <input readonly value="<?=htmlspecialchars($editora['site_editora'])?>" type="url" class="form-control"><br/>
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