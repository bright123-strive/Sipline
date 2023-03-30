<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sipline</title>

        <!--Bootstrap-->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!--Font Awesome-->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!--NProgress-->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

        <!-- Animate.css -->
        <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">

    </head>

    <body class="login">

		<?php
			require_once("sip_backend/login_backend.php");
		?>

        <div>

            <div class="login_wrapper">
                <div class="animate form login_form">

                    <section class="login_content">
                        <form action="" method="POST" enctype="multiple/form-data" novalidate>
                            <h1>SIPLINE ICALL</h1>

                            <div>
            					<span> <?php  echo $msg;  ?></span>
        				    </div>

                            <div>
                                <input type="email" name="email" autocomplete="off" class="form-control" placeholder="sip@gmail.com" >
                            </div>

                            <div>
                                <input type="password" name="password" class="form-control" placeholder="Password">
=======
<?php

		require_once ("sip_backend/login_backend.php");

	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>icall</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
  <style>
  #login-wrap{
    position: absolute;
    top: 22%;
    left: 2%; 
    height: 60%;
    width: 30%;
    padding:0px;
    padding-top:0px;
    margin-right:2%;
    margin-left: 200px;
    margin-top: 0px;
    border: 0px solid #d1c7a3;
    border-radius:3px;
}
.btn-xl {
    padding: 2px 30px;
    border-radius: 2px;
}
#intro{
  background-image: url('images/image.png');
  height: 100vh;
  background-attachment: fixed;
  background-position: right;
  background-repeat:no-repeat;
}
</style>
</head>
<body>
<div class="container" id="intro" style="padding-left:0px;">
        <div class="row">
            <div class="col-md-4 offset-md-4" id="login-wrap" style="border-radius:3px;">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="" method="post" class="row g-3" autocomplete="off">
                        <h4>iCall Login</h4>
                        <div class="col-12">
                            <label>Username</label>
                            <input type="text" name ="email" class="form-control" placeholder="Username">
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" name="password1" class="form-control" placeholder="Password">
                        </div>
                        <br>
                        <div class="col-12">
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                              <!-- Checkbox -->
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                                <label class="form-check-label" for="form1Example3">
                                  Remember me
                                </label>
                              </div>
>>>>>>> c29f02f1da4d59a05306761a2fd2c4adfee4e5a4
                            </div>

                            <div class="col text-center">
                              <!-- Simple link -->
                              <a href="#!">Forgot password?</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary btn-block btn-xl">Log In</button>
                        </div>
                    </form>
                    
                    <div class="col-12">
                        <p class="text-center mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>
</html>