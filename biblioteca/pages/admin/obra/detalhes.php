<?php
session_start();
if (!isset($_SESSION['current_session'])) {
   header('Location: ../login.php');
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/sidebar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/obra.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/autora.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/tipo-obra.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/editora.php');

if (isset($_GET['id'])) {
   $obra = buscarObraAction($_GET['id']);
   if (empty($obra)) {
      header("Location: ".$_SERVER['PHP_SELF']);
   }
   $autora = buscarAutoraAction($obra['autora_obra']);
   $tipo = buscarTipoAction($obra['tipo_obra']);
   $editora = buscarEditoraAction($obra['editora_obra']);   
}
?>
         <div class="container-fluid">
            <!-- INICIO CONTEUDO -->
            <div class="row" style="overflow-y: auto; height:100vh;">
               <div class="col" > 
                  <h1>Visualizar Obra</h1>
                  <div class="form-group" >
                     <label>Título</label>
                     <input readonly value="<?=htmlspecialchars($obra['titulo'])?>" type="text" class="form-control"><br/>
                  </div>
                  <div class="form-group" >
                     <label>Resumo</label>
                     <textarea readonly class="form-control" rows="2"><?=stripcslashes($obra['resumo'])?></textarea><br/>
                  </div>
                  <div class="form-group" >
                     <label>Ano</label>
                     <input readonly value="<?=htmlspecialchars($obra['ano'])?>" type="text" class="form-control"><br/>
                  </div>
                  <div class="form-group" >
                     <label for="capa" >Capa</label>
                     <div class="image-preview">
                        <div>
                        </div>
                        <img id="preview" class="image-preview" src="<?=("data:image/jpeg;base64," . base64_encode($obra['capa']))?>" alt="" />
                     </div>
                  </div>                  
                  <div class="form-group" >
                     <label>Link</label>
                     <input readonly value="<?=htmlspecialchars($obra['url'])?>" type="url" class="form-control"><br/>
                  </div>
                  <div class="form-group" >
                     <label>Autora</label>
                     <input readonly value="<?=htmlspecialchars($autora['nome'])?>" type="text" class="form-control"><br/>
                  </div>
                  <div class="form-group" >
                     <label for="tipo_obra">Tipo de Obra</label>
                     <input readonly value="<?=htmlspecialchars($tipo['descricao'])?>" type="text" class="form-control"><br/>
                  </div>
                  <div class="form-group" >
                     <label for="editora_obra">Editora</label>
                     <input readonly value="<?=htmlspecialchars($editora['nome'])?>" type="text" class="form-control"><br/>
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
      <script src="/assets/js/image-preview.js"></script>
   </body>
</html>