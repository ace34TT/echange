<div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Hello <?php echo $user['name']; ?></h1> 
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

      </div>
      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
          <?php foreach($produits as $produit)  { ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $produit['nom'];?></a>
                  </h4>
                  <h5>Prix unitaire: <?php echo $produit['prix_unitaire'];?></h5>
                  <small><p class="card-text"><span class='glyphicon glyphicon-map-marker'></span> <?php echo $produit['nom_marque'];?></p></small>
                  <small><p class="card-text"><span class='glyphicon glyphicon-earphone'></span> <?php //echo $produit['phone'];?></p></small>
                  <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!-->
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>