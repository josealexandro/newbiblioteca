<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/header.php'); ?>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
         </div>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img src="assets/media/obras/obra1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img src="assets/media/obras/obra2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img src="assets/media/obras/obra3.jpg" class="d-block w-100" alt="...">
            </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
         </button>
      </div><br>
      <div class="container">
         <div class="row pb-5">
            <div class="xs-3 col-sm-12 col-md-12 col-lg-6 col-xl-6">
               <div class="card mb-4 mx-auto " style="width: 30rem; ">
                  <img src="assets/media/autoras/autora1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Todas as autoras</h5>
                     <p class="card-text"> Descrição de o que o usuario irá encontrar</p>
                     <a href="pages/autora/listar.php" class="btn btn-primary mx-auto d-block">Ver todas</a>
                  </div>
               </div>
            </div>
            <div class="xs-3 col-sm-12 col-md-12 col-lg-6 col-xl-6">
               <div class="card mb-4 mx-auto" style="width: 30rem; ">
                  <img src="assets/media/obras/obra1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Todas as obras</h5>
                     <p class="card-text">Descrição de o que o usuario irá encontra Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     <a href="pages/obra/listar.php" class="btn btn-primary mx-auto d-block">Ver todas</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include 'pages/partials/footer.php'; ?>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   </body>
</html>