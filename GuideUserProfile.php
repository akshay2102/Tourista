<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tourista</title>

	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.8/css/mdb.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="styles.css">
	<script type="text/javascript" src="script.js"></script>
	<style type="text/css">
		div.stars {
		  width: 270px;
		  display: inline-block;
		}

		input.star { display: none; }

		label.star {
		  float: right;
		  padding: 10px;
		  font-size: 36px;
		  color: #444;
		  transition: all .2s;
		}

		input.star:checked ~ label.star:before {
		  content: '\f005';
		  color: #FD4;
		  transition: all .25s;
		}

		input.star-5:checked ~ label.star:before {
		  color: #FE7;
		  text-shadow: 0 0 20px #952;
		}

		input.star-1:checked ~ label.star:before { color: #F62; }

		label.star:hover { transform: rotate(-15deg) scale(1.3); }

		label.star:before {
		  content: '\f006';
		  font-family: FontAwesome;
		}
	</style>

</head>
<body class="black-skin">

	<nav class="navbar navbar-expand-md navbar-dark sticky-top" id="navbar" style="background-color: rgba(32,32,32,0.75)">
		<div class="container-fluid">
			<a href="index.php" class="navbar-brand">Tourista</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<div>
					<li class="nav-item nav-prod">
						<a href="index.php" class="nav-link">HOME</a>
					</li>
					</div>
					<li class="nav-item nav-prod">
						<a href="Guide.php" class="nav-link">GUIDE WITH US!</a>
					</li>
					<li class="nav-item nav-prod">
						<a class="nav-link" data-toggle="modal" href="#modalLRForm" id="log">LOGIN/SIGN UP</a>
					</li>
					<li class="nav-item nav-prod">
						<a class="nav-link" href="Logout.php" id="logout">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<?php
		if(isset($_SESSION['login_user'])){
			$id = $_GET['id'];
			$conn = mysqli_connect("localhost","root","","Tourista");
			$sql = "SELECT * FROM Guide WHERE GuideID = '$id'";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)){
				$name = $row['Name'];
				$email = $row['EmailID'];
				$place_of_work = $row['Place_of_Work'];
				$availability = $row['Availability'];
				$image = $row['ProfilePic'];
				$mobile = $row['Mobile_No'];
				$pass = $row['Password'];
				$adhaar = $row['Aadhaar'];
			}
	?>

		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 offset-md-3 offset-lg-3">
					<h3>Guide Details</h3>
					<hr style="color: white;">
					<div>
						<img class="rounded-circle" width="180" height="170" src="<?php echo $image?>">
						<br><br>
						<i class="fa fa-user fa-2x" aria-hidden="true"></i>
						<span><b>Name</b><br><?php echo $name;?></span>
						<br><br>
						<i class="fa fa-phone fa-2x" aria-hidden="true"></i>
						<span><b>Phone</b><br><?php echo $mobile;?></span>
						<br><br>
						<i class="fa fa-envelope fa-2x wow fadeInUp" data-wow-delay="0.7s" aria-hidden="true"></i>
						<span><b>Email</b><br><?php echo $email;?></span>
						<br><br>
						<i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
						<span><b>Place of Work</b><br><?php echo $place_of_work;?></span>
						<br><br><br><br><br>
						<h3>Rate Me</h3>
							<div class="stars">
							  <form action="" method="POST">
							    <input class="star star-5" id="star-5" type="radio" name="star5">
							    <label class="star star-5" for="star-5"></label>
							    <input class="star star-4" id="star-4" type="radio" name="star4">
							    <label class="star star-4" for="star-4"></label>
							    <input class="star star-3" id="star-3" type="radio" name="star3">
							    <label class="star star-3" for="star-3"></label>
							    <input class="star star-2" id="star-2" type="radio" name="star2">
							    <label class="star star-2" for="star-2"></label>
							    <input class="star star-1" id="star-1" type="radio" name="star1">
							    <label class="star star-1" for="star-1"></label>
							    <br>
							    <button type="submit" class="btn btn-success" name="ratesubmit">Submit</button>
							  </form>
							</div>
					</div>
				</div>				
			</div>
		</div>

	<?php
		}
		else if(isset($_SESSION['guide_user_signup'])){
			$id = $_GET['id'];
			$conn = mysqli_connect("localhost","root","","Tourista");
			$sql = "SELECT * FROM Guide WHERE GuideID = '$id'";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)){
				$name = $row['Name'];
				$email = $row['EmailID'];
				$place_of_work = $row['Place_of_Work'];
				$availability = $row['Availability'];
				$image = $row['ProfilePic'];
				$mobile = $row['Mobile_No'];
				$pass = $row['Password'];
				$adhaar = $row['Aadhaar'];
			}

			?>

			<div class="col-11 mx-auto">
			<div class="card mt-3 bg-light">
			<form method="POST" enctype="multipart/form-data" action="GuideUserProfile.php">
			  <div class="card-header text-center">
			    <h4><strong> Guide Details </strong></h4>
			  </div>
			  <div class="card-body">
			  	<div class="row">
			  		<div class="container">
			  			<div>
			  				<a onclick="document.getElementById('imageUpload').click(); return false;">
			  					<img id="userimg" class="user hoverable" src="<?php echo $image?>">
			  				</a>
			  			</div>
			  			<div>
			  				<!-- <button class="btn btn-secondary" onclick="document.getElementById('imageUpload').click(); return false;">Upload Photo</button> -->
			  				<input type="file" name="profilepic" onchange="readURL(this);" id="imageUpload" style="visibility: hidden;" accept=".png, .jpg, .jpeg" required="true">
			  			</div>
			  		</div>		  		
			  	</div>
			  	<div class="row">	
		            <div class="md-form form-sm mb-4 col-md-6">
		                <i class="fa fa-user prefix"></i>
		                <input type="text" id="name" class="form-control form-control-sm validate" name="name" readonly="true" value="<?php echo $name;?>">
		                <label data-error="wrong" data-success="right" for="name" style="margin-left: 3.1rem;">Name</label>
		            </div>
			  		<div class="md-form form-sm mb-4 float-right col-md-6">
		                <i class="fa fa-envelope prefix"></i>
		                <input type="email" id="email" class="form-control form-control-sm validate" name="id" readonly="true" value="<?php echo $email;?>">
		                <label data-error="wrong" data-success="right" for="email" style="margin-left: 3.1rem;">Email</label>
		            </div>
		        </div>
		        <div class="row">
		            <div class="md-form form-sm mb-4 col-md-6">
		                <i class="fa fa-lock prefix"></i>
		                <input type="password" id="password" class="form-control form-control-sm validate" name="password" readonly="true" minlength="6" value="
		                <?php echo $pass;?>">
		                <label data-error="wrong" data-success="right" for="password" style="margin-left: 3.1rem;">Password</label>
		            </div>
		            <div class="md-form form-sm mb-4 float-right col-md-6">
		                <i class="fa fa-credit-card prefix"></i>
		                <input type="tel" id="aadhar" class="form-control form-control-sm validate" name="aadhar" readonly="true" minlength="12" maxlength="12" value="<?php echo $aadhar;?>">
		                <label data-error="wrong" data-success="right" for="aadhar" style="margin-left: 3.1rem;">Aadhar</label>
		            </div>
		        </div>
		        <div class="row">
		            <div class="md-form form-sm mb-2 float-right col-md-6">
		                <i class="fa fa-map-marker prefix"></i>
		                <input type="text" id="work" class="form-control form-control-sm validate" name="work" readonly="true" value="<?php echo $place_of_work;?>">
		                <label data-error="wrong" data-success="right" for="work" style="margin-left: 3.1rem;">Place of Work</label>
		            </div>
	            	<div class="md-form form-sm mb-4 col-md-6">
		            	<!-- Default switch -->
						<label class="bs-switch ml-3">
						  <input type="checkbox" name="avail">
						  <span class="slider round"></span>
						</label>  
		            	<label class="prefix mt-1" style="margin-left: 5.1rem">Availability</label>  
		            </div>	        	
			  </div>
			  <div class="row">
		            <div class="md-form form-sm mb-2 col-md-6">
		                <i class="fa fa-phone prefix"></i>
		                <input type="number" id="mobile" class="form-control form-control-sm validate" name="mobile" readonly="true" value="<?php echo $mobile?>">
		                <label data-error="wrong" data-success="right" for="mobile" style="margin-left: 3.1rem;">Mobile Number</label>
		            </div>
		        </div>
	        	<div class="center text-center form-sm mt-1">
	                <button class="btn btn-info btn-outline-black waves-effect ml-auto lighten-2" type="submit" name="submit" id="btn1">SignUp</button>
	            </div>
			</div>
			</form>
		</div>

	<?php
		}

		if(isset($_POST['ratesubmit'])){
			$rating = 0;
			if(isset($_POST['star5'])){
				$rating = 5;
			}
			elseif (isset($_POST['star4'])) {
				$rating = 4;
			}
			elseif (isset($_POST['star3'])) {
				$rating = 3;
			}
			elseif (isset($_POST['star2'])) {
				$rating = 2;
			}
			elseif (isset($_POST['star1'])) {
				$rating = 1;
			}
			$conn = mysqli_connect("localhost","root","","Tourista");
			$username = $_SESSION['login_user'];
			$sql = "SELECT UserID FROM User WHERE Name = '$username'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);
			$userid = $row['UserID'];
			$sql = "SELECT * FROM gRates WHERE UserID='$userid' AND GuideID='$id'";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)==1){
				$sql = "UPDATE gRates SET Rating = '$rating' WHERE UserID = '$userid'";
			}	
			else{
				$sql = "INSERT INTO gRates VALUES('$id','$userid','$rating')";
			}
			mysqli_query($conn,$sql);
		}
	?>
		<!-- Footer -->
	  <footer class="page-footer font-small" style="background-color: rgba(32,32,32,1)">

	    <!-- Footer Elements -->
	    <div class="container">

	      <!-- Grid row-->
	      <div class="row">

	        <!-- Grid column -->
	        <div class="col-md-12 py-5">
	          <div class="mb-5 flex-center">

	            <!-- Facebook -->
	            <a class="fb-ic">
	              <i class="fa fa-facebook fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
	            </a>
	            <!-- Twitter -->
	            <a class="tw-ic">
	              <i class="fa fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
	            </a>
	            <!-- Google +-->
	            <a class="gplus-ic">
	              <i class="fa fa-google-plus fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
	            </a>
	            <!--Linkedin -->
	            <a class="li-ic">
	              <i class="fa fa-linkedin fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
	            </a>
	            <!--Instagram-->
	            <a class="ins-ic">
	              <i class="fa fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
	            </a>
	            <!--Pinterest-->
	            <a class="pin-ic">
	              <i class="fa fa-pinterest fa-lg white-text fa-2x"> </i>
	            </a>
	          </div>
	        </div>
	        <!-- Grid column -->

	      </div>

	      <!-- Grid row-->
	      <div class="row">
	      	<div class="para col-md-12 py-5" align="center" style="font-family: arial; font-size: 15px">
		    	<p>This project is developed by Nishit Patel, Akshay Kotak and Hardik Rathod as a part of their Third Year project.</p>
		    </div>
	      </div>

	    </div>
	    <!-- Footer Elements -->

	    <!-- Copyright -->
	    <div class="footer-copyright text-center py-3">© 2018 Copyright:
	      <a href="index.php"> Tourista.com</a>
	    </div>
	    <!-- Copyright -->

	  </footer>
	  <!-- Footer -->

	<!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>	
</body>
</html>