<?php
session_start();
if (!isset($_SESSION['current_session'])) {
   header('Location: ../login.php');
}

$actionMessage = $_SESSION['alert']["action"] ?? null;

require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/sidebar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/obra.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/autora.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/tipo-obra.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/editora.php');

if (isset($_POST["cadastrar"])) {
   criarObraAction($_POST["titulo"],
                   $_POST["resumo"],
                   $_POST["ano"],
                   $_FILES['capa']['tmp_name'],
                   $_POST["url"],
                   $_POST["autora_obra"],
                   $_POST["tipo_obra"],
                   $_POST["editora_obra"]);
}

if (isset($_POST["alterar"])) {
   alterarObraAction($_POST["cod_obra"],
                     $_POST["titulo"],
                     $_POST["resumo"],
                     $_POST["ano"],
                     $_FILES['capa']['tmp_name'],
                     $_POST["url"],
                     $_POST["autora_obra"],
                     $_POST["tipo_obra"],
                     $_POST["editora_obra"]);
}

$editMode = null;
if (isset($_GET['id'])) {
   $obra = buscarObraAction($_GET['id']);
   if (empty($obra)) {
      header("Location: ".$_SERVER['PHP_SELF']);
   } else {
      $editMode = true;
      $cod_obra = $_GET['id'];
   }
}

$autoras = obterAutorasAction();
$tipos = obterTiposAction();
$editoras = obterEditorasAction();

if (empty($autoras) || empty($tipos) || empty($editoras)) {
   $_SESSION['alert'] = [
      'status' => $alterarEditoraDb == true ? 'success' : 'error',
      'action' => 'update',
      'message' => 'Verifique se há registros de Autora, Tipo de obra e Editora disponíveis.'
   ];
   
	return header("Location: /pages/admin/obra/index.php");
}
?>
         <div class="container-fluid">
            <!-- INICIO CONTEUDO -->
            <?php if (isset($actionMessage)) printActionMessage(); ?>
            <div class="row" style="overflow-y: auto; height:100vh;">
               <div class="col" > 
                  <h1><?=$editMode ? "Editar Obra" : "Cadastrar Obra"?></h1>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="POST">
                     <div class="form-group" >
                        <label for="titulo">Título*</label>
                        <input value="<?=$editMode ? htmlspecialchars($obra['titulo']) : ""?>" type="text" class="form-control" name="titulo" maxlength="200" required><br/>
                     </div>
                     <div class="form-group" >
                        <label for="resumo">Resumo*</label>
                        <textarea class="form-control" name="resumo" rows="2" required><?=$editMode ? stripcslashes($obra['resumo']) : ""?></textarea><br/>
                     </div>
                     <div class="form-group" >
                        <label for="ano">Ano*</label>
                        <input value="<?=$editMode ? htmlspecialchars($obra['ano']) : ""?>" type="text" class="form-control" name="ano" id="ano" maxlength="4" required><br/>
                     </div>


                     <div class="form-group" >
                        <label for="imagem" >Foto</label>
                        <input type="file" class="form-control" name="capa" id="imagem" accept=".jpg,.jpeg,.png,.bmp,.gif"><br/>
                        <div class="image-preview">
                           <img id="preview" class="image-preview" src="<?=$editMode ? ("data:image/jpeg;base64," . base64_encode($obra['capa'])) : ""?>" alt="" />
                        </div>
                     </div>

                     
                     <div class="form-group" >
                        <label for="url">Link</label>
                        <input value="<?=$editMode ? htmlspecialchars($obra['url']) : ""?>" type="url" class="form-control" name="url" maxlength="200"><br/>
                     </div>
                     <div class="form-group" >
                        <label for="autora_obra">Autora*</label>
                        <select class="form-select" name="autora_obra" id="autora_obra" required>
                           <option value="" hidden>Selecione uma autora...</option>
<?php foreach($autoras as $index => $row): ?>
                           <option value="<?=htmlspecialchars($row['cod_autora'])?>"<?=htmlspecialchars($row['cod_autora']) === htmlspecialchars($obra['autora_obra']) ? "selected" : ""?>><?=htmlspecialchars($row['nome'])?></option>
<?php endforeach; ?>
                        </select><br/>
                     </div>
                     <div class="form-group" >
                        <label for="tipo_obra">Tipo de Obra*</label>
                        <select class="form-select" name="tipo_obra" id="tipo_obra" required>
                           <option value="" hidden>Selecione um tipo de obra...</option>
<?php foreach($tipos as $index => $row): ?>
                           <option value="<?=htmlspecialchars($row['cod_tipo'])?>"<?=htmlspecialchars($row['cod_tipo']) === htmlspecialchars($obra['tipo_obra']) ? "selected" : ""?>><?=htmlspecialchars($row['descricao'])?></option>
<?php endforeach; ?>
                        </select><br/>
                     </div>
                     <div class="form-group" >
                        <label for="editora_obra">Editora*</label>
                        <select class="form-select" name="editora_obra" id="editora_obra" required>
                           <option value="" hidden>Selecione uma editora...</option>
<?php foreach($editoras as $index => $row): ?>
                           <option value="<?=htmlspecialchars($row['cod_editora'])?>"<?=htmlspecialchars($row['cod_editora']) === htmlspecialchars($obra['editora_obra']) ? "selected" : ""?>><?=htmlspecialchars($row['nome'])?></option>
<?php endforeach; ?>
                        </select><br/>
                     </div>
                     <div class="form-group" >
<?php if ($editMode): ?>
                        <input type="hidden" name="cod_obra" id="cod_obra" value="<?=$cod_obra?>" />
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