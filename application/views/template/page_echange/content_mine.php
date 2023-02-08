      <!-- product section start -->
      <div class="product_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="product_taital">Idee d'echanges</h1>
                  <p class="product_text">voici des listes d'objets des autres pour echanger avec les votres </p>
               </div>
            </div>
            <div class="product_section_2 layout_padding">
               <div class="row">
               <?php
               // echo count($objets);
               foreach($objets as $objet)  { ?>

                     <div class="col-lg-3 col-sm-6">
                        <div class="product_box">
                           <h4 class="bursh_text"><?php echo $objet['titre']; ?></h4>
                           <p class="lorem_text"><?php echo $objet['descriptionn']; ?> </p>
                           <img src=" <?php echo base_url();?>assets/img/echanges/<?php echo $objet['nom_categorie']."/".$objet["photo"]; ?>" class="image_1">
                           <div class="btn_main">
                              <div class="buy_bt">
                                 <ul>
                                    <li>Echanger avec</li>
                                    <li> <a href="<?php echo base_url('echange_c/les_10/'.$objet['prix'].'/'.$objet['id_objet']);?>"> +/-10%</a></li>
                                    <li> <a href="<?php echo base_url('echange_c/les_20/'.$objet['prix'].'/'.$objet['id_objet']);?>"> +/-20%</a></li>
                                    
                                 </ul>
                              </div>
                              <h3 class="price_text">Price <?php echo $objet['prix']; ?></h3>
                           </div>
                        </div>
                     </div>
                  <?php } ?>
               <div class="seemore_bt"><a href="#">See More</a></div>
            </div>
         </div>
      </div>
      <!-- product section end -->