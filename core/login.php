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