<!DOCTYPE html>
<?php

// Token verification

if (isset($_REQUEST['token'])) {

    $IDtoken = $_REQUEST['token'];

    $dbConn = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8mb4", "root", "");

    $inputStrVerify = "SELECT `googleIDtoken` from plantogramlogin WHERE `googleIDtoken` = '{$IDtoken}'";

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

// Plants followed tiles board

    $name = "";
    $potId = "";
    $password = "";
    $owner = "";
    $location = "";
    $plantType = "";
        
    $dbConn = new PDO("mysql:host=localhost;dbname=test;charset=utf8mb4", "root", "");

if (isset($_REQUEST["name"]) === true ) {
         $name = ($_REQUEST["name"]);
    }
if (isset($_REQUEST["potId"]) === true ) {
         $potId = ($_REQUEST["potId"]);
    }
if (isset($_REQUEST["passowrd"]) === true ) {
         $password = ($_REQUEST["password"]);
    }
if (isset($_REQUEST["owner"]) === true ) {
         $owner = ($_REQUEST["owner"]);
    }
if (isset($_REQUEST["location"]) === true ) {
         $location = ($_REQUEST["location"]);
    }
if (isset($_REQUEST["plantType"]) === true ) {
         $plantType = ($_REQUEST["plantType"]);
    }

$allMessages = $dbConn->prepare("SELECT `name`, `potId`, `password`, `owner`, `location`, `plantType` from `planttest`");
$allMessages->execute(array());

?>

<html lang="en">
<head>
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


<link href="skins/default.css" rel="stylesheet" />



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
                      <li class="active"><a href="plants_followed.php<?php echo('?token='.$token_var); ?>">Plants Followed</a></li>
                        <li><a href="create_plant_profile.php<?php echo('?token='.$token_var); ?>">Create Plant Profile</a></li>
                        <li><a href="create_user_profile.php<?php echo('?token='.$token_var); ?>">Create User Profile </a></li>
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
	

  <h1>Here are the plants you're following</h1>
  <hr>

  <p>click on the pictures to get more detailed information</p>
  <div class="row">
    <?php

	$inputStr = "SELECT `potID`, `name`, `plantType` from planttest";

    $results = $dbConn->query($inputStr);

      while($thisRow = $results->fetch(PDO::FETCH_ASSOC)){
        echo("<div class=\"col-xs-3\" style=\"overflow: hidden;\">
            <a href='plant_profile.php?token={$token_var}&plant_ID={$thisRow['potID']}'>
			<img src=\"plant1.jpg\"></a>
                <h2>name: {$thisRow['name']}</h2>
                plantType: {$thisRow['plantType']}
            
        </div>");
      } 
    ?>
    
	<section class="callaction">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="big-cta">
					<div class="cta-text">
						<h2><span>Plants</span>...that you're following</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	
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
			<!--<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Latest posts</h5>
					<ul class="link-list">
						<li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
						<li><a href="#">Pellentesque et pulvinar enim. Quisque at tempor ligula</a></li>
						<li><a href="#">Natus error sit voluptatem accusantium doloremque</a></li>
					</ul>
				</div>
			</div>-->
			<!--<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Flickr photostream</h5>
					<div class="flickr_badge">
						<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=34178660@N03"></script>
					</div>
					<div class="clear">
					</div>
				</div>
			</div>-->
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<!--<div class="col-lg-6">
					<div class="copyright">
						<p>&copy; Moderna Theme. All right reserved.</p>
                        <div class="credits">
                            <a href="https://bootstrapmade.com/">Free Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
					</div>
				</div>-->
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
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script>
</script>
<script src="contactform/contactform.js"></script>

</body>
</html>

