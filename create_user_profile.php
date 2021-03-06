<!DOCTYPE html>

<html lang="en">
<head>

<?php

// Token verification

if (isset($_REQUEST['token'])) {

    $IDtoken = $_REQUEST['token'];

    $dbConn = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8mb4", "root", "");

    $inputStrVerify = "SELECT `googleIDtoken` from plantogramlogin WHERE `googleIDtoken` = {$IDtoken}";

    $results = $dbConn->query($inputStrVerify);

      while ($thisRow1 = $results->fetch(PDO::FETCH_ASSOC)) {
        if ($thisRow1['googleIDtoken'] === $IDtoken){
            // $tokenFromDatabase = $thisRow['googleIDtoken'];
            break;
        } else {
          echo ("<script>window.location.href = 'create_user_profile.php';</script>");
        }
      }
} else {
    echo ("<script>window.location.href = 'index.php';</script>");
}

$token_var = $_REQUEST['token'];

?>

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
                       <li><a href="plants_followed.php<?php echo('?token='.$token_var); ?>">Plants Followed</a></li>
                        <li><a href="create_plant_profile.php<?php echo('?token='.$token_var); ?>">Create Plant Profile</a></li>
                        <li class="active"><a href="create_user_profile.php<?php echo('?token='.$token_var); ?>">Create User Profile </a></li>
						<li>
							<a href="signout.php" onclick="signOut();">Sign out</a>
							<script>
							function signOut() {
								var auth2 = gapi.auth2.getAuthInstance();
								auth2.signOut().then(function () {
								console.log('User signed out.');
								});
							}
							</script>
						</li>
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
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h4>Create your user profile <strong>here</strong></h4>
				<form id="user_profile" method="post" action="process_user_profile.php">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                    
					<div class="form-group">
                        <input type="text" name="user_name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                        <div class="validation"></div>
                    </div>
                    
					<div class="form-group">
                        <input type="text" class="form-control" name="user_potId" id="potId" placeholder="potId" data-rule="minlen:4" data-msg="Please enter at least 4 characters" required/>
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="user_password" id="password" placeholder="password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="user_owner" id="owner" placeholder="owner" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
                        <div class="validation"></div>
                    </div>
					
                    <div class="form-group">
                        <input type="text" name="user_location" class="form-control" id="location" placeholder="location" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                        <div class="validation"></div>
                    </div>
					<div class="form-group">
                        <input type="text" name="user_plantType" class="form-control" id="plantType" placeholder="plantType" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                        <div class="validation"></div>
                    </div>
					<div class="form-group">
                        <input type="text" name="user_plantPic" class="form-control" id="plantPic" placeholder="plantPic" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                        <div class="validation"></div>
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-theme">Submit Info</button></div>
                </form>
			</div>
		</div>
	</div>
	</section>
	<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
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
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Pages</h5>
					<ul class="link-list">
						<li><a href="#">Press release</a></li>
						<li><a href="#">Terms and conditions</a></li>
						<li><a href="#">Privacy policy</a></li>
						<li><a href="#">Career center</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
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
<script src="js/jquery.js"></script>
<script>
	$(document).ready(function(){
		$('#user_profile').on('submit', function(e){
			e.preventDefault();
			var userName = $('#name').val();
			var userpotId = $('#potId').val();
			var userPassword = $('#password').val();
			var userOwner = $('#owner').val();
			var userLocation = $('#location').val();
			var userPlantType = $('#plantType').val();
			var userplantPic = $('#plantPic').val();
			console.log("hey man nice shot" + userName);
			$.ajax({
				type: "POST",
				url: 'process_user_profile.php',
				data: {
					userName: userName,
					userpotId: userpotId,
					userPassword: userPassword,
					userOwner: userOwner,
					userLocation: userLocation,
					userPlantType: userPlantType,
					userplantPic: userplantPic,
				},
				success: function(data){
					alert(data);
					console.log("hey jackass" + userName);
					$("#user_profile")[0].reset();

				}
			});
		});
	});
</script>

<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//code.jquery.com/jquery-1.11.3.min.js?x41610"></script>
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

</body>
</html>

