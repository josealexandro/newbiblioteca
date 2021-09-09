<?php
session_start();   
if (!isset($_SESSION['current_session'])) {
   header('Location: ../login.php');
}

$actionMessage = $_SESSION['alert']["action"] ?? null;

require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/sidebar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/autora.php');

if (isset($_POST["cadastrar"])) {
   criarAutoraAction($_POST["nome"], 
                     $_POST["biografia"], 
                     $_FILES['foto']['tmp_name'],
                     $_POST["data_nasc"], 
                     $_POST["data_morte"], 
                     $_POST["instagram"], 
                     $_POST["facebook"], 
                     $_POST["twitter"], 
                     $_POST["site_autora"]);
}

if (isset($_POST["alterar"])) {
   alterarAutoraAction($_POST["cod_autora"],
                     $_POST["nome"], 
                     $_POST["biografia"], 
                     $_FILES['foto']['tmp_name'],
                     $_POST["data_nasc"], 
                     $_POST["data_morte"], 
                     $_POST["instagram"], 
                     $_POST["facebook"], 
                     $_POST["twitter"], 
                     $_POST["site_autora"]);
}

$editMode = null;
if (isset($_GET['id'])) {
   $autora = buscarAutoraAction($_GET['id']);
   if (empty($autora)) {
      header("Location: ".$_SERVER['PHP_SELF']);
   } else {
      $editMode = true;
      $cod_autora = $_GET['id'];
   }
}
?>
         <div class="container-fluid">
            <!-- INICIO CONTEUDO -->
            <?php if (isset($actionMessage)) printActionMessage(); ?>
            <div class="row" style="overflow-y: auto; height:100vh;">
               <div class="col" > 
                  <h1><?=$editMode ? "Editar Autora" : "Cadastrar Autora"?></h1>
                  <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" enctype="multipart/form-data" method="POST" >
                     <div class="form-group" >
                        <label for="nome" >Nome completo*</label>
                        <input value="<?=$editMode ? htmlspecialchars($autora['nome']) : ""?>" type="text" class="form-control" name="nome" maxlength="200" required><br/>
                     </div>
                     <div class="form-group" >
                        <label for="biografia" >Biografia*</label>
                        <textarea class="form-control" name="biografia" rows="2" required><?=$editMode ? stripcslashes($autora['biografia']) : ""?></textarea><br/>
                     </div>


                     <div class="form-group" >
                        <label for="imagem" >Foto</label>
                        <input type="file" class="form-control" name="foto" id="imagem" accept=".jpg,.jpeg,.png,.bmp,.gif"><br/>
                        <div class="image-preview">
                           <img id="preview" class="image-preview" src="<?=$editMode ? ("data:image/jpeg;base64," . base64_encode($autora['foto'])) : ""?>" alt="" />
                        </div>
                     </div>


                     <div class="form-group" >
                        <label for="data_nasc" >Data de nascimento*</label>
                        <input value="<?=$editMode ? htmlspecialchars($autora['data_nasc']) : ""?>" type="date" class="form-control" name="data_nasc" required><br/>
                     </div>
                     <div class="form-group" >
                        <label for="data_morte">Data da morte</label>
                        <input value="<?=$editMode ? htmlspecialchars($autora['data_morte']) : ""?>" type="date" class="form-control" name="data_morte"><br/>
                     </div>
                     <div class="form-group" >
                        <label for="instagra" >Instagram</label>
                        <input value="<?=$editMode ? htmlspecialchars($autora['instagram']) : ""?>" type="text" class="form-control" name="instagram" maxlength="45"><br/>
                     </div>
                     <div class="form-group">
                        <label for="facebook" >Facebook</label>
                        <input value="<?=$editMode ? htmlspecialchars($autora['facebook']) : ""?>" type="text" class="form-control" name="facebook" maxlength="45"><br/>
                     </div>
                     <div class="form-group" >
                        <label for="twitter" >Twitter</label>
                        <input value="<?=$editMode ? htmlspecialchars($autora['twitter']) : ""?>" type="text" class="form-control" name="twitter" maxlength="45"><br/>
                     </div>
                     <div class="form-group" >
                        <label for="site_autora" >Website</label>
                        <input value="<?=$editMode ? htmlspecialchars($autora['site_autora']) : ""?>" type="url" class="form-control" name="site_autora" maxlength="100"><br/>
                     </div>
                     <div class="form-group" >
<?php if ($editMode): ?>
                        <input type="hidden" name="cod_autora" id="cod_autora" value="<?=$cod_autora?>" />
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
      <script src="/assets/js/image-preview.js"></script>
   </body>
</html>