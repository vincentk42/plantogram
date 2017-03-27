<!DOCTYPE html>
<html lang="en">
<head>
<?php
    require("common.php");
?>
<head>
<!-- Google ID sign-in -->
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="<?php echo $googleLogin; ?>">

<meta charset="utf-8">
<title>Sample Plantogram Site</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />

<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

<!-- =======================================================
    Theme Name: Moderna
    Theme URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
======================================================= -->

</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    </button>
                    <a class="navbar-brand" href="index.php"><span>P</span>lantogram</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <!--<li><a href="create_user_profile.php">Create User Profile </a></li>
                        <li><a href="create_plant_profile.php">Create Plant Profile</a></li>
						<li><a href="users_followed.php">Users Followed</a></li>
						<li><a href="plant_profile.php">Plant Profile</a></li>
						<li><a href="plants_followed.php">Plants Followed</a></li>-->

                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div>
	</div>
	</section>
	
	<section class="callaction">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="big-cta">
					<div class="cta-text">
						<h2><span>Plantogram</span>...Instagram for plant enthusiasts</h2>
						    <div class="g-signin2" data-onsuccess="onSignIn"></div>
    						<div id="errorMsg"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="widget">
					<h5 class="widgetheading">Get in touch with us</h5>
					<address>
					<strong>Plantogram LLC</strong><br>
					 310 Teheran-ro, Suite 801(The goddamned frog building yo!)<br>
					 Seoul, South Korea(AKA, not North, West or East) </address>
					<p>
						<i class="icon-phone"></i>02-501-6064<br>
						<i class="icon-envelope-alt"></i> info@wcoding.com
					</p>
				</div>
			</div>
			
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>

<!-- GoogleID sign-in -->

<script>
        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            var id_token = googleUser.getAuthResponse().id_token;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'user_verification.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                var currentUser = xhr.responseText;
                if (profile.getId() === currentUser) {
                    window.location.href = "plants_followed.php" + "?token=" + currentUser;
                } else {
                    document.getElementByID("errorMsg").innerHTML = "Something went wrong. We blame Google.";
                }
            };
            xhr.send('idtoken=' + id_token);
        }
</script>

</body>
</html>