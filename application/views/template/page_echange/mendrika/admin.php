<?php
function admin($admin)
{
if ($admin==1)
{
    return true;
}
return false;
}

?>
<div class="contact_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <h1 class="contact_taital">STATISTIQUE</h1>
                  <p class="contact_text"> Nombre d’utilisateur inscrit 
                      <?php
                      echo $utilisateur_inscrit;
                      ?>
                      <br> Le nombre d’échange effectué</br> </p>
                      <?php
                      echo $echange_effectue;
                      ?>
               </div>
               <div class="col-md-6">
                  <div class="contact_main">
                     <div class="contact_bt"><a href="#">Contact Form</a></div>
                     <div class="newletter_bt"><a href="#">Newletter</a></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="map_main">
            <div class="map-responsive">
               <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
            </div>
         </div>
      </div>