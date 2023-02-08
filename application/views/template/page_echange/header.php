<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Takalo</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/page_style/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/page_style/style.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/page_style/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/page_style/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="<?php echo base_url();?>assets/page_style/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/page_style/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Open+Sans:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="<?php echo base_url();?>assets/page_style/css/owl.carousel.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/page_style/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-light bg-light justify-content-between">
               <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="<?php echo base_url('user_c/index');?>">Home</a>
                  <a href="<?php echo base_url('user_c/deconexion');?>">Log out</a>
                  <a href="<?php echo base_url('user_c/my_objet');?>">My Objet</a>
                  <a href="client.html">Client</a>
                  <a href="contact.html">Contact</a>
               </div>
               <span class="toggle_icon" onclick="openNav()"><img src=" <?php echo base_url();?>assets/page_style/images/toggle-icon.png"></span>
               <a class="logo" href="index.html"><img src=" <?php echo base_url();?>assets/logoo.png" width="200"></a></a>
               <form class="form-inline ">
                  <div class="login_text">
                     <ul>
                        <li><a href="<?php echo base_url('user_c/index'); ?>"><?php echo $user;?><img src=" <?php echo base_url();?>assets/img/echanges/users/<?php echo $user;?>" width=36 height=36 class='round_profile'></a></li>
                        <li><a href="<?php echo base_url();?>echange_c/my_echange"><img src=" <?php echo base_url();?>assets/page_style/images/bag-icon.png"></a></li>
                        <li><a href="#">Mes echanges<img src=" <?php echo base_url();?>assets/page_style/images/search-icon.png"></a></li>

                        <form method="get" action="<?php echo base_url('echange_c/search')?>" >

                              <input type="text" name="mot_cle" class="form-control" placeholder="mots cle">
                                 <select name="categorie" class="form-control" id=""  width=max-width>
                                    <?php foreach($categories as $categorie)  { ?>
                                    <option  aria-label="..." value="<?php echo $categorie['id_categorie']; ?>"><?php echo $categorie['nom_categorie']; ?></option>
                                    <?php } ?>
                                 </select>
                                 <button type="submit" class="my_button">Search</button>
                        </form>
                     </ul>
                  </div>
               </form>
            </nav>
         </div>
      </div>
      <!-- header section end -->
     