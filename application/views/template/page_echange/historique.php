<div class="contact_section layout_padding">
         <div class="container">
            <?php foreach($objets as $objet) { ?>       
               <div class="row">
                  <div class="col-md-6">
                  <!-- contact_taital -->
                     <h3 class=""> <b> Mes echanges</b> </h3><?php echo $objet['titre_o1']?> <-> <?php echo $objet['titre_o2']?>
                     <p class="contact_text"> <?php echo $objet['name1']; ?> echange avec <?php echo $objet['name2'];?>
                     
                        <br><?php echo $objet['date_heure_echange']; ?> </br> </p>
                        
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