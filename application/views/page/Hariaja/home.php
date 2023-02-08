<div class="container">

<div class="row">

  <div class="col-lg-3">
  <?php if(isset($mail)){?>
    <h1 class="my-4">Bonjour <?php echo $mail;?></h1>
    <?php } ?>
    <div class="list-group">
      <?php if(isset($listeProduit))
      {
        foreach ($listeProduit as $produit) { ?>
          <a href="#" class="list-group-item"><?php echo $produit['nameMarque']?></a>
      <?php }
      }?>
    </div>

  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="<?php echo base_url();?>assets/img/sary.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="<?php echo base_url();?>assets/img/saka.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="<?php echo base_url();?>assets/img/rajako.jpg" alt="Third slide">
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
      <?php foreach ($listeProduit as $produit) {?>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#"><?php echo $produit['nameMarque']?></a>
            </h4>
            <h5>$24.99</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>