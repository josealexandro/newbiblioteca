<?php
session_start();   
if (!isset($_SESSION['current_session'])) {
   header('Location: ../login.php');
}

$actionMessage = $_SESSION['alert']["action"] ?? null;

require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/sidebar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/tipo-obra.php');

if (isset($_POST["cadastrar"])) {
   criarTipoAction($_POST["descricao"]); 
}

if (isset($_POST["alterar"])) {
   alterarTipoAction($_POST["cod_tipo"],
                     $_POST["descricao"]); 
}

$editMode = null;
if (isset($_GET['id'])) {
   $tipo = buscarTipoAction($_GET['id']);
   if (empty($tipo)) {
      header("Location: ".$_SERVER['PHP_SELF']);
   } else {
      $editMode = true;
      $cod_tipo = $_GET['id'];
   }
}
?>
         <div class="container-fluid">
            <!-- INICIO CONTEUDO -->
            <?php if (isset($actionMessage)) printActionMessage(); ?>
            <div class="row" style="overflow-y: auto; height:100vh;">
               <div class="col" > 
                  <h1><?=$editMode ? "Editar Tipo de Obra" : "Cadastrar Tipo de Obra"?></h1>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                     <div class="form-group" >
                        <label for="descricao">Descrição*</label>
                        <input value="<?=$editMode ? htmlspecialchars($tipo['descricao']) : ""?>" type="text" class="form-control" name="descricao" maxlength="45" required><br/>
                     </div>
                     <div class="form-group" >
<?php if ($editMode): ?>
                        <input type="hidden" name="cod_tipo" id="cod_tipo" value="<?=$cod_tipo?>" />
<?php endif; ?>
                        <input type="submit" class="btn btn-success" name="<?=$editMode ? "alterar" : "cadastrar"?>" value="<?=$editMode ? "Salvar alterações" : "Cadastrar"?>">
                     </div>
                  </form>
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
      <script src="/assets/js/estados.js"></script>
      <script src="/assets/js/cidades.js"></script>
   </body>
</html>