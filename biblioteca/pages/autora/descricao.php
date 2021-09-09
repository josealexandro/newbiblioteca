<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/autora.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/header.php');

if (isset($_GET['id'])) {
   $autora = buscarAutoraAction($_GET['id']);
   if (!isset($autora)){
      header("Location: /");
   }
} else {
   header("Location: /");
}
?>
      <div style="height: 50px" >
      </div>
      <div class="container">
         <div class="row">
            <div class="col-sm-3">
               <div style="background-color: #e9e9e9;" class="card" style="width: 15rem; ">
               <h5 style="background-color: #d3d3d3; padding-bottom: 2px;" class="card-title text-center"><?=htmlspecialchars($autora['nome'])?></h5>
               <img src="data:image/jpeg;base64,<?php echo base64_encode($autora['foto']); ?>" class="card-img-top" alt="..." />
               <div class="card-body">
                  <tr>Data de nascimento: 
                     <td><?=htmlspecialchars($autora['data_nasc'])?></td>
                  </tr><br>
                  <tr>Data da morte: <br>
                     <td><?=htmlspecialchars($autora['data_morte']) ?: "-"?></td>
                  </tr>
                  <a href="#" class="btn btn-dark mx-auto d-block">Ver mais</a>
               </div>
               </div>
               <br>
               <a class="btn btn-primary btn-floating" style="background-color: #ac2bac;" href="<?=htmlspecialchars($autora['instagram'])?>" role="button">
               <i class="fab fa-instagram"></i>
               </a>
               <a class="btn btn-primary" style="background-color: #3b5998;" href="<?=htmlspecialchars($autora['facebook'])?>" role="button">
               <i class="fab fa-facebook-f"></i>
               </a>
               <a class="btn btn-primary" style="background-color: #55acee;" href="<?=htmlspecialchars($autora['twitter'])?>" role="button">
               <i class="fab fa-twitter"></i>
               </a>
               <a class="btn btn-primary" style="background-color: #55acee;" href="<?=htmlspecialchars($autora['site_autora'])?>" role="button">
               Site
               </a>
            </div>
            <div class="row col-6 col-md-12 col-sm-12 col-lg-6">
               <p style="color: white;"><?=nl2br(stripcslashes($autora['biografia']))?></p>
            </div>
         </div>
      </div>
      <br>
      <br>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/footer.php'); ?>