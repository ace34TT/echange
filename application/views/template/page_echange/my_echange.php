<div class="contact_section layout_padding">
         <div class="container">
            <?php foreach($objets as $objet) { ?>       
               <div class="row">
                  <div class="col-md-6">
                  <!-- contact_taital -->
                     <h3 class=""> <b> Mes echanges</b> </h3><?php echo $objet['titre_o1']?> <-> <?php echo $objet['titre_o2']?>
                     <p class="contact_text"> <?php echo $objet['name1']; ?> echange avec <?php echo $objet['name2'];?>
                     
                        <br> </br> </p>
                        
                  </div>
                  <div class="col-md-6">
                     <div class="contact_main">
                        <form action="<?php echo base_url('echange_c/confirmer');?>" method="post">
                           <input type="hidden" name="id_u2" value="<?php echo $objet['id_u2'];?>">
                           <input type="hidden" name="id_u1" value="<?php echo $objet['id_u1'];?>">
                           <input type="hidden" name="id_objet_1" value="<?php echo $objet['id_objet1'];?>">
                           <input type="hidden" name="id_objet_2" value="<?php echo $objet['id_objet2'];?>">
                     
                           <div class="contact_bt">
                           <!-- <a href="<?php //echo base_url('echange_c/confirmer');?>"> -->
                              <button type="submit" <?php echo $objet['sender'];?>>Accepter</button>
                           <!-- </a> -->
                           </div>
                        </form>
                        <div class="newletter_bt"><a href="<?php echo base_url('echange_c/refuser/'.$objet['id_objet1'].'/'.$objet['id_objet2'])?>">Annuler</a></div>
                     </div>
                  </div>
               </div>
            <?php } ?>
         </div>
         <!-- <div class="map_main">
            <div class="map-responsive">
               <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
            </div>
         </div> -->
      </div>