<?php
  session_start();
  require "config/config.php";

	if (isset($_SESSION["login"])) {
		header("Location: public/home/index.php");
		exit;
	}


	if (isset($_POST["login"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
		//cek email
		if (mysqli_num_rows($result) === 1) {
			//cek password
			$row = mysqli_fetch_assoc($result);
			if (password_verify($password, $row["password"])) {
				//set session
        $_SESSION["id"] = $row["id"];
				$_SESSION["login"] = true;
				header("Location: home/index.php");
				exit;
			}
		}
		$error = true;
	}
 ?>


 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Icon -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="../resource/assets/css/bootstrap.min.css">
     <!-- Costume CSS -->
     <link rel="stylesheet" href="../resource/assets/css/CostumeCss/login.css">

     <title>LOGIN</title>
   </head>
   <body>

     <!-- ERROR ALERT -->
     <?php if ( isset($error) ) : ?>
     <div class="container mt-3">
       <div class="alert alert-danger" role="alert">
         <b>Email / Password SALAH!</b>
       </div>
     </div>
     <?php endif; ?>
     <!-- End Of ERROR ALERT -->

     <!-- Form Login -->
     <div class="container mt-5">
         <div class="row justify-content-md-center">
             <div class="col-sm-6 col-md-4 col-md-offset-4">
                 <div class="account-wall text-center">
                     <i class="fas fa-user-circle profile-img"></i>
                     <form class="form-signin" method="post">
                       <input type="text" class="form-control" placeholder="Email" name="email" required autofocus>
                       <input type="password" class="form-control" placeholder="Password" name="password" required>
                       <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>
                     </form>
                 </div>
                 <a href="register.php" class="text-center new-account">Create an account </a>
             </div>
         </div>
     </div>
     <!-- End Form Login -->

     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="../resource/assets/js/jquery-3.4.0.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     <script src="../resource/assets/js/bootstrap.min.js"></script>
   </body>
 </html>
