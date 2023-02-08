

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/login2/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/login2/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login2/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/login2/css/style.css">

    <title>Login #5</title>
  </head>
  <body>
  
  <div class="d-md-flex half">
    <div class="bg" style="background-image: url('<?php echo base_url();?>assets/login2/images/bg_1.jpg');"></div>
    <div class="contents">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h3 class="text-uppercase">Login to <strong>Colorlib</strong> </h3>
                 <span class='my_error'> <?php if(isset($error))  echo $error; ?></span>
              </div>
              <form action="<?php echo base_url('main/login');?>" method="post">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="mail" class="form-control" name="mail" placeholder="your-email@gmail.com" id="username"
                   value='<?php  if(isset($mail)) echo $mail;   ?>' >
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Your Password" id="password" value='<?php if(isset($password))  echo $password; ?>' >
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                   <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                   <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                </div>

                <input type="submit" value="Log In" class="btn btn-block py-2 btn-primary">

                <span class="text-center my-3 d-block">or</span>
                
                
                <div class="">
                <a href="https://facebook.com" class="btn btn-block py-2 btn-facebook">
                  <span class="icon-facebook mr-3"></span> Login with facebook
                </a>
                <a href="https://google.com" class="btn btn-block py-2 btn-google"><span class="icon-google mr-3"></span> Login with Google</a>
                </div>
                <div class="d-sm-flex mb-5 align-items-center sign">
                    <span class="my_margin">_______<a href="<?php echo base_url('main/sign_up')?>" class="forgot-pass space">    Sign up     </a> _______</span> 
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
   

    <script src="<?php echo base_url();?>assets/login2/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/login2/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/login2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/login2/js/main.js"></script>
  </body>
</html>