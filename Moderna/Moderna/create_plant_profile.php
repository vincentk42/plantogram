<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Plant Profile Page</title>
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
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="create_user_profile.php">Create User Profile </a></li>
                        <li><a href="create_plant_profile.php">Create Plant Profile</a></li>
						<li><a href="user_profiles.php">User Profile</a></li>
						<li><a href="plant_profile.php">Plant Profile</a></li>
						<li><a href="plants_followed.php">Plants Followed</a></li>
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

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h4>Create your plant profile below</h4>
				<form method="post" action="process_plant_profile.php" id="plant_profile">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <div class="form-group">
                    <input type="text" name="plant_Owner" class="form-control" id="plant_Owner" placeholder="Plant Owner" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="plant_Name" id="plant_Name" placeholder="Plant Name" data-rule="minlen:4" data-msg="Please enter at least 4 characters" required/>
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="plant_Type" id="plant_Type" placeholder="Plant Type" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required />
                    <div class="validation"></div>
                </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="plant_Location" id="plant_Location" placeholder="Plant Location" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
                <div class="validation"></div>
                </div>

                <div class="text-center"><button type="submit" class="btn btn-theme">Submit Info</button></div> 
                </form>
			</div>
		</div>
	</div				
	
    
    
    
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
<script src="js/jquery.js"></script>
<script>
	$(document).ready(function(){
		$('#plant_profile').on('submit', function(e){
			//Stop the form from submitting itself to the server.
			e.preventDefault();
			var plantOwner = $('#plant_Owner').val();
			var plantName = $('#plant_Name').val();
			var plantType = $('#plant_Type').val();
			var plantLocation = $('#plant_Location').val();
			$.ajax({
				type: "POST",
				url: 'process_plant_profile.php',
				data: {
					plantOwner: plantOwner,
					plantName: plantName,
					plantType: plantType,
					plantLocation: plantLocation	

				},
				success: function(data){
					alert(data);
					$("#plant_profile")[0].reset();

				}
			});
		});
	});

</script>

<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="//code.jquery.com/jquery-1.11.3.min.js?"></script>-->
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