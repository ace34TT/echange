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
                                       <img src=" <?php echo base_url();?>assets/img/echanges/users/<?php echo $objet['photo_users']; ?>" width=36 height=36 class='round_profile'>

                                    
                                    <li>Echanger avec</li>
                                    <form action="<?php echo base_url()?>echange_c/with_my_objet" method="post">
                                       <input type="hidden" name="id_objet_other"value='<?php echo $objet['id_objet'];?>'>
                                       <select name="my_objet" id="" class="form-control" width=max-width>
                                          <?php foreach($my_objets as $my_objet)  { ?>
                                          <option  aria-label="..." value="<?php echo $my_objet['id_objet']; ?>"><?php echo $my_objet['titre'].' '. $my_objet['prix']; ?></option>
                                          <?php } ?>
                                       </select>
                                       <button type="submit" class="btn btn-default">Echanger</button>
                                    </form>
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