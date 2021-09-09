<?php
session_start();   
if (!isset($_SESSION['current_session'])) {
   header('Location: ../login.php');
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/sidebar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/autora.php');

if (isset($_GET['id'])) {
   $autora = buscarAutoraAction($_GET['id']);
   if (empty($autora)) {
      header("Location: ".$_SERVER['PHP_SELF']);
   }
}
?>
         <div class="container-fluid">
            <!-- INICIO CONTEUDO -->
            <div class="row" style="overflow-y: auto; height:100vh;">
               <div class="col" > 
                  <h1>Visualizar Autora</h1>
                  <div class="form-group" >
                     <label>Nome completo</label>
                     <input readonly value="<?=htmlspecialchars($autora['nome'])?>" type="text" class="form-control"><br/>
                  </div>
                  <div class="form-group" >
                     <label>Biografia</label>
                     <textarea readonly class="form-control" rows="2"><?=stripcslashes($autora['biografia'])?></textarea><br/>
                  </div>
                  <div class="form-group" >
                     <label for="foto" >Foto</label>
                     <div class="image-preview">
                        <div>
                        </div>
                        <img id="preview" class="image-preview" src="<?=("data:image/jpeg;base64," . base64_encode($autora['foto']))?>" alt="" />
                     </div>
                  </div>
                  <div class="form-group" >
                     <label>Data de nascimento</label>
                     <input readonly value="<?=htmlspecialchars($autora['data_nasc'])?>" type="date" class="form-control"><br/>
                  </div>
                  <div class="form-group" >
                     <label>Data da morte</label>
                     <input readonly value="<?=htmlspecialchars($autora['data_morte'])?>" type="date" class="form-control"><br/>
                  </div>
                  <div class="form-group" >
                     <label>Instagram</label>
                     <input readonly value="<?=htmlspecialchars($autora['instagram'])?>" type="text" class="form-control"><br/>
                  </div>
                  <div class="form-group">
                     <label>Facebook</label>
                     <input readonly value="<?=htmlspecialchars($autora['facebook'])?>" type="text" class="form-control"><br/>
                  </div>
                  <div class="form-group" >
                     <label>Twitter</label>
                     <input readonly value="<?=htmlspecialchars($autora['twitter'])?>" type="text" class="form-control"><br/>
                  </div>
                  <div class="form-group" >
                     <label>Website</label>
                     <input readonly value="<?=htmlspecialchars($autora['site_autora'])?>" type="url" class="form-control"><br/>
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