<!DOCTYPE HTML>

<html>
	<head>
		<title>Asli Mall</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<style>
		#login {
                display: -moz-flex;
                display: -webkit-flex;
                display: -ms-flex;
                display: flex;
                position: relative;
            }
            #login input[type="text"], #login input[type="password"], #login input[type="email"] {
                    width: 18em;
                }
                
                #login > :first-child {
                    margin: 0 0 0 0;
                }
                #login > * {
                    margin: 0 0 0 1em;
                }
		    @media screen and (max-width:768px) {
               header#header img {
                    width: 51%!important;
                }
                .main-content-area {
                    width: 87%!important;
                }
            }
                @media screen and (max-width:425px) {
               header#header img {
                    width: 66%!important;
                }
                .main-content-area {
                    width: 100%!important;
                }
                .main-content-area  p{
                      font-size: 12px!important;

                }
                a.maill-to {
                    border-bottom: 0;
                }
                input.submitt {
                    width: 100%;
                }
            }
		</style>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
			<img style="width: 15%;" src="{{ asset('assets/images/logo.png') }}">
<div class="main-content-area" style="width: 60%;     background: #e74e2b80;
    padding:  13px 13px 5px 13px;
    border-radius: 10px;
    margin-bottom: 13px;">
				<p style="font-size: 18px; margin-bottom: 2px;     color: white;">
					Head office 
2224 28th Ave Gulfport Ms 39507 
2064841034</p>

</div>
<div class="main-content-area" style="width: 60%;     background: #e74e2b80;
    padding:  13px 13px 5px 13px;
    border-radius: 10px;
    margin-bottom: 13px;">
				<p style="font-size: 18px; margin-bottom: 2px;     color: white;">
					Purchasing Office Pakistan 
Usman Aslam
11 st# 2 Nai Abadi gulshan e shehbaz park baghban purah Lahore<br>  
 <i class="fa fa-phone" style="color: red;"></i> +923214420964</p>

</div>
<div class="main-content-area" style="width: 60%;     background: #e74e2b80;
    padding:  13px 13px 5px 13px;
    border-radius: 10px;
    margin-bottom: 13px;">
				<p style="font-size: 18px; margin-bottom: 2px;     color: white;">
					Purchasing office in India
 Miteshkumar D Patel
Sapana M Patel 
Ahmada Abad 
Gujarat India
<i class="fa fa-phone" style="color: red;"></i> +919925100655</p>

</div>

	<p  style="font-size: 18px; margin-bottom: 2px;     color: white;">
	

</p>
<p  style="font-size: 18px; margin-bottom: 2px;     color: white;">
	

</p>			
			</header>

		<!-- Signup Form -->
			<form id="login" method="post" action="">
				<input type="email" name="email" id="email" placeholder="Subscribe to our mailing list" />
				<a class="maill-to" href="mailto:list@mansaalsuwaiq.com">
				    <input  class="submitt" type="submit" name="submit" value="Register" />
				    </a>
			</form>

		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; 2020 Asli Mall</li><li>Credits: <a href="https://edenspell.com/">Eden Spell</a></li>
				</ul>
			</footer>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="{{ asset('assets/js/main.js') }}"></script>

	</body>
</html>



<?php
if (isset($_POST["submit"])){


	$email = $_POST['email'];

	$msg = '';

$msg .= 'A New User Has Subscribed to your Website, User Email = '.$email;

$subject = "New subscription received";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("connect@aslimall.com",$subject,$msg);
}

?>