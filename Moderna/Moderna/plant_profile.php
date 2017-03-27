<?php

	$name = "";
	$comment = "";
	$time = "";

	$host="localhost";
	$username="root";
	$password="";
	$databasename="test";

	$dbConn = new PDO("mysql:host=localhost;dbname=test;charset=utf8mb4", "root", "");

if (isset($_REQUEST["name"]) === true ) {
         $name = ($_REQUEST["name"]);
    }

if (isset($_REQUEST["comment"]) === true ) {
		$comment = ($_REQUEST["comment"]);
}

if(isset($_REQUEST["post_time"]) === true) {
		$time = ($_REQUEST["post_time"]);
}

$allMessages = $dbConn->prepare("SELECT `name`, `comment`, `post_time` from `comments`");
$allMessages->execute(array());

?>
<!DOCTYPE html>
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
<!-- Theme skin -->
<link href="skins/default.css" rel="stylesheet" />

<style>

</style>
<script>

</script>

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
						<li><a href="users_followed.php">Users Followed</a></li>
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

<div class="card" style="width: 40rem;">
  <img class="card-img-top" src="plant1.jpg" alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title">Plant Name</h4>
    <p class="card-text">Small description of plant</p>
    <a href="#" class="btn btn-primary">click on this to enlarge photo</a>
  </div>
</div>
<br>
<br>
<form method='post' action="post_comments.php" id="commentForm">
  <textarea id="comment" placeholder="Write Your Comment Here....."></textarea>
  <br>
  <input type="text" id="name" placeholder="Your Name">
  <br>
  <input type="submit" value="Post Comment" id="finished">
  </form>
  <div id="all_comments">	
	<div class="comment_div"> 
	</div>
  </div>

<div class="row";>

<script src="js/jquery.js"></script>
<script>
	$(document).ready(function(e){
		$('#commentForm').on('submit', function(e){
			e.preventDefault();
			var name = $('#name').val();
			var comment = $('#comment').val();
			//var time = $('#time').val();
			//console.log("hey man" + comment);			
			$.ajax({
				type: "POST",
				url: 'process_comment.php',
				data: {
					name:  name,
					comment: comment,
					//time: time,
				},
				dataType: 'json',
				success: function(data) {
					console.log("BACKATYOU: " + data);
					$("#commentForm")[0].reset();
					//console.log("check this out" + json['post_time']);
				},
				error: function(e) {
					console.log("HAMMER TIME!");
					console.log(e);
				}
			});
		});
	});

</script>
<?php
  while($thisrow = $allMessages->fetch(PDO::FETCH_ASSOC)){
    echo("<div class=\"col-xs-3\" style=\"overflow: hidden; border-color:#333\">
                <p>name: {$thisrow['name']}</p>
                <p>comment: {$thisrow['comment']}</p>
				<p>timesent: {$thisrow['post_time']}</p>
        </div>");
      } 
?>

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
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>
	var nameVal = document.getElementById("name").value;
	var commentVal = document.getElementById("comment").value;
	//console.log('here are your values' + nameVal + " " + commentVal);



</script>
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

