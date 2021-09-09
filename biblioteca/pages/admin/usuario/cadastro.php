<?php
session_start();   
if (!isset($_SESSION['current_session'])) {
   header('Location: ../login.php');
}

$actionMessage = $_SESSION['alert']["action"] ?? null;

require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/sidebar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/usuario.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/perfil.php');

if (isset($_POST["cadastrar"])) {
   criarUsuarioAction($_POST["nome"], 
                      $_POST["email"], 
                      $_POST["senha"], 
                      $_POST["perfil_usuario"]); 
}

if (isset($_POST["alterar"])) {
   alterarUsuarioAction($_POST["cod_usuario"], 
                        $_POST["nome"], 
                        $_POST["email"], 
                        $_POST["senha"], 
                        $_POST["perfil_usuario"]); 
}

$editMode = null;
if (isset($_GET['id'])) {
   $usuario = buscarUsuarioAction($_GET['id']);
   if (empty($usuario)) {
      header("Location: ".$_SERVER['PHP_SELF']);
   } else {
      $editMode = true;
      $cod_usuario = $_GET['id'];
   }
}

$perfis = obterPerfisAction();
?>
         <div class="container-fluid">
            <!-- INICIO CONTEUDO -->
            <?php if (isset($actionMessage)) printActionMessage(); ?>
            <div class="row" style="overflow-y: auto; height:100vh;">
               <div class="col" > 
                  <h1><?=$editMode ? "Editar Usuário" : "Cadastrar Usuário"?></h1>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" oninput='senha2.setCustomValidity(senha2.value != senha.value ? "Passwords do not match." : "")'>
                     <div class="form-group" >
                        <label for="nome">Nome Completo*</label>
                        <input value="<?=$editMode ? htmlspecialchars($usuario['nome']) : ""?>" type="text" class="form-control" name="nome" maxlength="150" required><br/>
                     </div>
                     <div class="form-group" >
                        <label for="email">E-mail*</label>
                        <input value="<?=$editMode ? htmlspecialchars($usuario['email']) : ""?>" type="email" class="form-control" name="email" maxlength="200" required><br/>
                     </div>
                     <div class="form-group" >
                        <label for="senha">Senha*</label>
                        <input type="password" class="form-control" name="senha" maxlength="30" required><br/>
                     </div>
                     <div class="form-group" >
                        <label for="senha2">Repita a Senha*</label>
                        <input type="password" class="form-control" name="senha2" maxlength="30" required><br/>
                     </div>
                     <div class="form-group" >
                        <label for="perfil_usuario">Perfil de Usuário*</label>
                        <select class="form-select" name="perfil_usuario" id="perfil_usuario" required>
                        <option value="" hidden>Selecione um perfil...</option>
<?php foreach($perfis as $index => $row): ?>
                           <option value="<?=htmlspecialchars($row['cod_perfil'])?>"<?=htmlspecialchars($row['cod_perfil']) === htmlspecialchars($usuario['perfil_usuario']) ? "selected" : ""?>><?=htmlspecialchars($row['descricao'])?></option>
<?php endforeach; ?>
                        </select><br/>
                     </div>
                     <div class="form-group" >
<?php if ($editMode): ?>
                        <input type="hidden" name="cod_usuario" id="cod_usuario" value="<?=$cod_usuario?>" />
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