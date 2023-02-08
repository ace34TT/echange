 <div class="contents">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5"> 
                <h3 class="text-uppercase">
                   <!-- <span class='glyphicon glyphicon-arrow-left'></span>  -->
                   <a href="<?php echo base_url('main/index');?>"><img src="<?php echo base_url('assets/img/back.png');?>" alt="back" align=left width=60px class='my_img'></a>
                   Join us <strong><!-- Site_name --></strong>
                   </h3>
                 <span class='my_error'> <?php if(isset($error))  echo $error; ?></span>
              </div>
              <form action="<?php echo base_url('main/insert');?>" method="post">
                <div class="form-group first">
                  <label for="username">Mail</label>
                  <input type="mail" class="form-control" name="mail" placeholder="your-email@gmail.com" id="mail"
                   value='<?php  if(isset($mail)) echo $mail;   ?>' >
                </div>
                <div class="form-group first">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="your name" id="name"
                   value='<?php  if(isset($name)) echo $name;   ?>' >
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Your Password" id="password" value='<?php if(isset($password))  echo $password; ?>' >
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password again</label>
                  <input type="password" class="form-control" name="password_again" placeholder="Your Password again" id="password_again" value='<?php if(isset($password_again))  echo $password_again; ?>' >
                </div>

                <input type="submit" value="Sign Up" class="btn btn-block py-2 btn-primary">

                <span class="text-center my-3 d-block"></span>
   
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>