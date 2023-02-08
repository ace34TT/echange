<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="page/login.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css">
    <title>Login Page</title>
</head>

<body>
    <div id="page">
        <div id="content1">
            <h1 class="Poppins">Sign in</h1>
            <p class="Poppins">or use your account</p>
            <form action="<?php echo base_url('welcome/login');?>" method="post">
                <input type="email" name="mail" placeholder="Email" ><br>
                <input type="password" name="pass" placeholder="Password" >
                <h4><a href="page/updatePass.php"> Forgot Passwors ? </a></h4>
                <input type="submit" value="Sign In" class="btnInscr">
            </form>
        </div>
        <!-- ---------------------------Page-Right---------------------------------- -->
        <div id="content2">
            <h1 class="Poppins">Hello,Friend!</h1>
            <p class="Poppins">Enter your personal details and start journey with us</p>
            <form action="page/inscription.php">
                <input type="submit" value="SIGN UP" class="signup" class="Poppins">
            </form>
        </div>
    </div>
</body>
</html>