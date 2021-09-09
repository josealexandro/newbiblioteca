<?php
session_start();
if (!isset($_SESSION['current_session'])) {
   header('Location: ../login.php');
}

$actionMessage = $_SESSION['alert']["action"] ?? null;

require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/sidebar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/editora.php');

if (isset($_POST["cadastrar"])) {
   criarEditoraAction($_POST["nome"], 
                      $_POST["estado"], 
                      $_POST["cidade"], 
                      $_POST["site_editora"]); 
}

if (isset($_POST["alterar"])) {
   alterarEditoraAction($_POST["cod_editora"], 
                        $_POST["nome"], 
                        $_POST["estado"], 
                        $_POST["cidade"], 
                        $_POST["site_editora"]);
}

$editMode = null;
if (isset($_GET['id'])) {
   $editora = buscarEditoraAction($_GET['id']);
   if (empty($editora)) {
      header("Location: ".$_SERVER['PHP_SELF']);
   } else {
      $editMode = true;
      $cod_editora = $_GET['id'];
   }
}
?>
         <div class="container-fluid">
            <!-- INICIO CONTEUDO -->
            <?php if (isset($actionMessage)) printActionMessage(); ?>
            <div class="row" style="overflow-y: auto; height:100vh;">
               <div class="col" > 
                  <h1><?=$editMode ? "Editar Editora" : "Cadastrar Editora"?></h1>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                     <div class="form-group" >
                        <label for="nome">Nome editora*</label>
                        <input value="<?=$editMode ? htmlspecialchars($editora['nome']) : ""?>" type="text" class="form-control" name="nome" maxlength="100" required><br/>
                     </div>
                     <div class="form-group" >
                        <label for="estado">Estado*</label>
                        <select class="form-select" name="estado" id="estado" onchange="popular_cidades(this.value);" required>
                        </select><br/>
                     </div>
                     <div class="form-group" >
                        <label for="cidade">Cidade*</label>
                        <select class="form-select" name="cidade" id="cidade" required>
                        </select><br/>
                     </div>
                     <div class="form-group" >
                        <label for="site_editora" >Website</label>
                        <input value="<?=$editMode ? htmlspecialchars($editora['site_editora']) : ""?>" type="url" class="form-control" name="site_editora" maxlength="100"><br/>
                     </div>
                     <div class="form-group" >
<?php if ($editMode): ?>
                        <input type="hidden" name="cod_editora" id="cod_editora" value="<?=$cod_editora?>" />
                        <input type="hidden" id="estado_edit" value="<?=htmlspecialchars($editora['estado'])?>" />
                        <input type="hidden" id="cidade_edit" value="<?=htmlspecialchars($editora['cidade'])?>" />
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