<?php

include('dbh.php');
include('./global/model.php');
$model = new Model();


if (isset($_POST['create'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$phone = $_POST['phone'];
	$car = $_POST['car'];
	$access = 1;

	if ($password == $repassword) {

		$model->addUser($name, $email, $address, $phone, $car, $password, $access);
		echo "<script>alert('Account Successfully Created')</script>";
		echo "<script>window.open('index.php','_self');</script>";
	} else {
		echo "<script>alert('Password Do Not Match. Try Again!')</script>";
		echo "<script>window.open('index.php','_self');</script>";
	}
}


if (!isset($_SESSION)) {
	session_start();


	if (isset($_POST['login'])) {

		// if ($_POST['type'] == "") {
		//   echo "<script>alert('Please select user type')</script>";
		// }
		if ($_POST['email'] == "admin@gmail.com") {

			$email = $_POST['email'];
			$password = $_POST['password'];

			$sql = "SELECT * FROM `admin_info` WHERE `email` = '$email' AND `password` = '$password' AND access='2' LIMIT 1";
			$result = $conn->query($sql);

			#      $query=mysqli_query($conn,"SELECT * FROM admin_info WHERE email='$email' AND password='$password' AND access='2' LIMIT 1");
			if ($result->num_rows > 0) {
				$_SESSION['alogin'] = $_POST['email'];
				echo "<script>alert('Successfully Logged In!');</script>";
				echo "<script>window.open('admin/index.php','_self');</script>";
				exit();
			} else {
				echo "<script>alert('Wrong Password or Email. Try Again!')</script>";
				echo "<script>window.open('index.php','_self');</script>";
			}
		} else if ($_POST['email'] == "mechanic@gmail.com") {

			$email = $_POST['email'];
			$password = $_POST['password'];

			$sql = "SELECT * FROM `employee_info` WHERE `email` = '$email' AND `password` = '$password' AND access='3' AND position='Mechanic' LIMIT 1";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$_SESSION['elogin'] = $_POST['email'];
				echo "<script>alert('Successfully Logged In!');</script>";
				echo "<script>window.open('employee/index.php','_self');</script>";
				exit();
			} else {

				echo "<script>alert('Wrong Password or Email. Try Again!')</script>";
				echo "<script>window.open('index.php','_self');</script>";
			}
		} else if ($_POST['email'] == "electrician@gmail.com") {

			$email = $_POST['email'];
			$password = $_POST['password'];

			$sql = "SELECT * FROM `employee_info` WHERE `email` = '$email' AND `password` = '$password' AND access='3' AND position='Electrician' LIMIT 1";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$_SESSION['elogin'] = $_POST['email'];
				echo "<script>alert('Successfully Logged In!');</script>";
				echo "<script>window.open('electrician/index.php','_self');</script>";
				exit();
			} else {

				echo "<script>alert('Wrong Password or Email. Try Again!')</script>";
				echo "<script>window.open('index.php','_self');</script>";
			}
		} else {

			$email = $_POST['email'];
			$password = $_POST['password'];

			$sql = "SELECT * FROM `client_info` WHERE `email` = '$email' AND `password` = '$password' AND access='1' LIMIT 1";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$_SESSION['clogin'] = $_POST['email'];
				echo "<script>alert('Successfully Logged In!');</script>";
				echo "<script>window.open('client/index.php','_self');</script>";
				exit();
			} else {
				echo "<script>alert('Wrong Password or Email. Try Again!')</script>";
				echo "<script>window.open('index.php','_self');</script>";
			}
		}
	}
}







if (isset($_POST['change'])) {

	if ($_POST['type'] == "") {
		echo "<script>alert('Please select user type')</script>";
	} else if ($_POST['type'] == "1") {

		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = mysqli_query($conn, "SELECT * FROM client_info WHERE email='$email'");
		$num = mysqli_fetch_array($query);

		if ($num > 0) {
			mysqli_query($conn, "update client_info set password='$password' WHERE email='$email' ");
			echo "<script>alert('Password Changed Successfully!')</script>";
			echo "<script>window.open('index.php','_self');</script>";
			exit();
		} else {
			echo "<script>alert('Wrong Password or Email. Try Again!')</script>";
			echo "<script>window.open('index.php','_self');</script>";
			exit();
		}
	} else if ($_POST['type'] == "2") {

		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = mysqli_query($conn, "SELECT * FROM admin_info WHERE email='$email'");
		$num = mysqli_fetch_array($query);

		if ($num > 0) {
			mysqli_query($conn, "update admin_info set password='$password' WHERE email='$email' ");
			echo "<script>alert('Password Changed Successfully!')</script>";
			echo "<script>window.open('index.php','_self');</script>";
			exit();
		} else {
			echo "<script>alert('Wrong Password or Email. Try Again!')</script>";
			echo "<script>window.open('index.php','_self');</script>";
			exit();
		}
	} else if ($_POST['type'] == "3") {

		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = mysqli_query($conn, "SELECT * FROM employee_info WHERE email='$email'");
		$num = mysqli_fetch_array($query);

		if ($num > 0) {
			mysqli_query($conn, "update employee_info set password='$password' WHERE email='$email' ");
			echo "<script>alert('Password Changed Successfully!')</script>";
			echo "<script>window.open('index.php','_self');</script>";
			exit();
		} else {
			echo "<script>alert('Wrong Password or Email. Try Again!')</script>";
			echo "<script>window.open('index.php','_self');</script>";
			exit();
		}
	} else if ($_POST['type'] == "4") {

		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = mysqli_query($conn, "SELECT * FROM employee_info WHERE email='$email'");
		$num = mysqli_fetch_array($query);

		if ($num > 0) {
			mysqli_query($conn, "update employee_info set password='$password' WHERE email='$email' ");
			echo "<script>alert('Password Changed Successfully!')</script>";
			echo "<script>window.open('index.php','_self');</script>";
			exit();
		} else {
			echo "<script>alert('Wrong Password or Email. Try Again!')</script>";
			echo "<script>window.open('index.php','_self');</script>";
			exit();
		}
	}
}










?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>CJCE AUTOPARTS</title>

	<!-- Maps related links -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

	<!-- Favicons -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/1.png" />
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


	<!-- Vendor CSS Files -->
	<link href="client/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="client/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="client/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="client/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="client/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="client/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="client/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="client/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<script src="https://kit.fontawesome.com/e02ccf2d8a.js" crossorigin="anonymous"></script>
	<link href="client/assets/css/style.css" rel="stylesheet">
	<!-- =======================================================
  * Template Name: Medilab - v4.7.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
	<!-- ======= Top Bar ======= -->

	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top" style="background-color: #1C4E80;">
		<div class="container d-flex align-items-center">
			<a href="index.php" class="logo"><img src="assets/images/2.png" alt="" class="img-fluid"></a>
			<h1 class="logo me-auto" style="padding-left: 10px;"><a href="index.php">CJCE AUTOPARTS</a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->

			<nav id="navbar" class="navbar order-last order-lg-0">
				<ul>
					<li><a class="nav-link scrollto" href="#hero">Home</a></li>
					<li><a class="nav-link scrollto" href="#about">About Us</a></li>
					<li><a class="nav-link scrollto" href="#services">PMS</a></li>
					<li><a class="nav-link scrollto" href="#repairs">Repair</a></li>
					<li><a class="nav-link scrollto" href="Developers.php">Developers</a></li>
					<li><a class="nav-link scrollto" href="#contact">Contact</a></li>

				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->
			<a data-bs-toggle="modal" href="#Login" class="appointment-btn scrollto" style="background-color: grey;"><span class="d-none d-md-inline"></span>LogIn</a>

			<a data-bs-toggle="modal" data-bs-target="#ModalForm" class="appointment-btn scrollto" style="background-color: grey; cursor: pointer;"><span class="d-none d-md-inline">Register</a>
		</div>
	</header><!-- End Header -->

	<div class="modal fade" id="repair" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ATypeModalLabel">REPAIR</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</button>
				</div>
				<div class="modal-body">
					<table id="table" class="table hover" style="width:100%">
						<thead>
							<tr>
								<th>Item</th>
								<th>Quantity</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Oil Seal</td>
								<td>4</td>
								<td>2,600.00</td>
							</tr>
							<tr>
								<td>Timing Belt</td>
								<td>1</td>
								<td>1,900.00</td>
							</tr>
							<tr>
								<td>Balancer Belt</td>
								<td>1</td>
								<td>2,500.00</td>
							</tr>
							<tr>
								<td>Alternator Belt</td>
								<td>1</td>
								<td>1,500.00</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 8,500.00</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="AHPModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="AHPModalLabel"> Login</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</button>
				</div>
				<div class="modal-body">

					<form action="index.php" method="POST" enctype="multipart/form-data">

						<div class="form-outline mb-4">
							<input type="email" id="form2Example1" name="email" class="form-control" placeholder="Enter Email Address" required>
						</div>
						<!-- Password input -->
						<div class="form-outline mb-4">
							<input type="password" id="form2Example2" name="password" class="form-control" placeholder="Enter Password" required>
						</div>
						<br>
						<div class="text-center">
							<input type="submit" name="login" class="sign_button btn btn-primary btn-block mb-4" value="Login">
						</div>
						<a data-bs-toggle="modal" href="#forgot" style="margin-left: 160px;">Forgot Password ?</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="AHPModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="AHPModalLabel"> Forgot Password</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</button>
				</div>
				<div class="modal-body">

					<form action="index.php" method="POST" enctype="multipart/form-data">

						<div class="form-outline mb-4">
							<label for="form2Example1"> Email</label>
							<input type="email" id="form2Example1" name="email" class="form-control" placeholder="Enter Email Address" required>
						</div>
						<!-- Password input -->
						<div class="form-outline mb-4">
							<label for="form2Example2"> New Password</label>
							<input type="password" id="form2Example2" name="password" class="form-control" placeholder="Enter Password" required>
						</div>
						<br>
						<div class="text-center">
							<input type="submit" name="change" class="sign_button btn btn-primary btn-block mb-4" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center">
		<div class="container">
			<img src="assets/images/UPDATED_LOGO.png" style="width: 207%; margin-top: -20px; margin-left: -12px;" alt="">
		</div>
	</section>

	<main id="main">

		<!-- ======= About Section ======= -->
		<section id="about" class="about">
			<div class="container-fluid">
				<div class="section-title">
					<h2>About Us</h2>

					<div class="row">
						<div class="picture col-xl-4 col-lg-4 video-box d-flex justify-content-center align-items-stretch position-relative">
							<img src="./client/assets/img/about.png" alt="service img">
						</div>

						<div class="about-img col-xl-5 col-lg-5 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
							<h3>What is CJCE Autoparts?</h3>
							<p>Our team of skilled technicians, coupled with state of the art equipment, allow us to fulfill this vision. This vision is what we now refer to as the CJCE Way, and it’s something that separates us from every other competitor out there. Curious about the #CJCEWay and what makes it so good? Come and experience it for yourself!</p>

						</div>
					</div>
				</div>
		</section>
		<!-- End About Section -->


		<!-- ======= Services Section ======= -->
		<section id="services" class="services">
			<div class="container">

				<div class="section-title">
					<h2>Preventive Repair Maintenance</h2>
					<p>Do we have the service that you're looking for?</p>
				</div>
				<!-- Aircon Check up -->
				<div class="row">
					<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
						<div class="icon-box" style="width: 100%;">
							<div class="icon"><i class="fas fa-person-chalkboard"></i></div>
							<h4><a data-bs-toggle="modal" href="#ATypeModal2">5KM</a></h4>

							<div class="modal fade" id="ATypeModal2" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</button>
										</div>
										<div class="modal-body">
											<table id="table" class="table hover" style="width:100%">
												<thead>
													<tr>
														<th>Product Summary</th>
														<th>Unit Price</th>
														<th>Sub Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Engine Anti-Rust Coolant</td>
														<td>3</td>
														<td>1,200.00</td>
													</tr>
													<tr>
														<td>Air Cleaner Filter</td>
														<td>3</td>
														<td>500.00</td>
													</tr>
													<tr>
														<td>Engine Oil and Oil Filter</td>
														<td>3</td>
														<td>2,200.00</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
										</div>
									</div>
								</div>
							</div>


						</div>
					</div>
					<!-- Aircon Installation -->
					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
						<div class="icon-box" style=" width: 100%;">
							<div class="icon"><i class="fa-solid fa-screwdriver"></i></div>
							<h4><a data-bs-toggle="modal" href="#ATypeModal">10KM</a></h4>
							<!-- Aircon Type Modal -->
							<div class="modal fade" id="ATypeModal" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</button>
										</div>
										<div class="modal-body">
											<table id="table" class="table hover" style="width:100%">
												<thead>
													<tr>
														<th>Product Summary</th>
														<th>Unit Price</th>
														<th>Sub Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Engine Anti-Rust Coolant</td>
														<td>3</td>
														<td>1,200.00</td>
													</tr>
													<tr>
														<td>Air Cleaner Filter</td>
														<td>3</td>
														<td>500.00</td>
													</tr>
													<tr>
														<td>Engine Oil and Oil Filter</td>
														<td>3</td>
														<td>2,200.00</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>


					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
						<div class="icon-box" style="width: 100%;">
							<div class="icon"><i class="fas fa-hammer"></i></div>
							<h4><a data-bs-toggle="modal" href="#ATypeModal1">30KM</a></h4>

							<div class="modal fade" id="ATypeModal1" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</button>
										</div>
										<div class="modal-body">
											<table id="table" class="table hover" style="width:100%">
												<thead>
													<tr>
														<th>Product Summary</th>
														<th>Unit Price</th>
														<th>Sub Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Engine Anti-Rust Coolant</td>
														<td>3</td>
														<td>1,200.00</td>
													</tr>
													<tr>
														<td>Air Cleaner Filter</td>
														<td>3</td>
														<td>500.00</td>
													</tr>
													<tr>
														<td>Engine Oil and Oil Filter</td>
														<td>3</td>
														<td>2,200.00</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
						<div class="icon-box" style=" width: 100%;">
							<div class="icon"><i class="fas fa-hammer"></i></div>
							<h4><a data-bs-toggle="modal" href="#ATypeModal3">40KM</a></h4>

							<div class="modal fade" id="ATypeModal3" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</button>
										</div>
										<div class="modal-body">
											<table id="table" class="table hover" style="width:100%">
												<thead>
													<tr>
														<th>Product Summary</th>
														<th>Unit Price</th>
														<th>Sub Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Engine Anti-Rust Coolant</td>
														<td>3</td>
														<td>1,200.00</td>
													</tr>
													<tr>
														<td>Air Cleaner Filter</td>
														<td>3</td>
														<td>500.00</td>
													</tr>
													<tr>
														<td>Engine Oil and Oil Filter</td>
														<td>3</td>
														<td>2,200.00</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
										</div>
									</div>
								</div>
							</div>


						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
						<div class="icon-box" style="width: 100%;">
							<div class="icon"><i class="fa-solid fa-spray-can-sparkles"></i></div>
							<h4><a data-bs-toggle="modal" href="#ATypeModal5">80KM</a></h4>

							<div class="modal fade" id="ATypeModal5" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</button>
										</div>
										<div class="modal-body">
											<table id="table" class="table hover" style="width:100%">
												<thead>
													<tr>
														<th>Product Summary</th>
														<th>Unit Price</th>
														<th>Sub Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Engine Anti-Rust Coolant</td>
														<td>3</td>
														<td>1,200.00</td>
													</tr>
													<tr>
														<td>Air Cleaner Filter</td>
														<td>3</td>
														<td>500.00</td>
													</tr>
													<tr>
														<td>Engine Oil and Oil Filter</td>
														<td>3</td>
														<td>2,200.00</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
										</div>
									</div>
								</div>
							</div>


						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
						<div class="icon-box" style="width: 100%;">
							<div class="icon"><i class="fas fa-wrench"></i></div>
							<h4><a data-bs-toggle="modal" href="#ATypeModal6">90KM</a></h4>

							<div class="modal fade" id="ATypeModal6" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</button>
										</div>
										<div class="modal-body">
											<table id="table" class="table hover" style="width:100%">
												<thead>
													<tr>
														<th>Product Summary</th>
														<th>Unit Price</th>
														<th>Sub Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Engine Anti-Rust Coolant</td>
														<td>3</td>
														<td>1,200.00</td>
													</tr>
													<tr>
														<td>Air Cleaner Filter</td>
														<td>3</td>
														<td>500.00</td>
													</tr>
													<tr>
														<td>Engine Oil and Oil Filter</td>
														<td>3</td>
														<td>2,200.00</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
						<div class="icon-box" style="width: 100%;">
							<div class="icon"><i class="fas fa-wrench"></i></div>
							<h4><a data-bs-toggle="modal" href="#ATypeModal7">100KM</a></h4>

							<div class="modal fade" id="ATypeModal7" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</button>
										</div>
										<div class="modal-body">
											<table id="table" class="table hover" style="width:100%">
												<thead>
													<tr>
														<th>Product Summary</th>
														<th>Unit Price</th>
														<th>Sub Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Engine Anti-Rust Coolant</td>
														<td>3</td>
														<td>1,200.00</td>
													</tr>
													<tr>
														<td>Air Cleaner Filter</td>
														<td>3</td>
														<td>500.00</td>
													</tr>
													<tr>
														<td>Engine Oil and Oil Filter</td>
														<td>3</td>
														<td>2,200.00</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
						<div class="icon-box" style="width: 100%;">
							<div class="icon"><i class="fas fa-wrench"></i></div>
							<h4><a data-bs-toggle="modal" href="#ATypeModal8">120KM</a></h4>

							<div class="modal fade" id="ATypeModal8" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</button>
										</div>
										<div class="modal-body">
											<table id="table" class="table hover" style="width:100%">
												<thead>
													<tr>
														<th>Product Summary</th>
														<th>Unit Price</th>
														<th>Sub Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Engine Anti-Rust Coolant</td>
														<td>3</td>
														<td>1,200.00</td>
													</tr>
													<tr>
														<td>Air Cleaner Filter</td>
														<td>3</td>
														<td>500.00</td>
													</tr>
													<tr>
														<td>Engine Oil and Oil Filter</td>
														<td>3</td>
														<td>2,200.00</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- End Services Section -->

		<!-- ======= Services Section ======= -->
		<section id="repairs" class="services">
			<div class="container">

				<div class="section-title">
					<h2> Repair Services </h2>
					<p>Do we have the service that you're looking for?</p>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
						<div class="icon-box" style="width: 100%;">
							<div class="icon"><i class="fas fa-person-chalkboard"></i></div>
							<h4><a data-bs-toggle="modal" href="#repair">Timing belt replacement</a></h4>

						</div>
					</div>
					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
						<div class="icon-box" style=" width: 100%;">
							<div class="icon"><i class="fa-solid fa-screwdriver"></i></div>
							<h4><a data-bs-toggle="modal" href="#repair">Engine Repair</a></h4>

						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
						<div class="icon-box" style="width: 100%;">
							<div class="icon"><i class="fas fa-hammer"></i></div>
							<h4><a data-bs-toggle="modal" href="#repair">Wheel Alignment</a></h4>



						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
						<div class="icon-box" style=" width: 100%;">
							<div class="icon"><i class="fas fa-hammer"></i></div>
							<h4><a data-bs-toggle="modal" href="#repair">Oxygen Sensor Replacement</a></h4>



						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
						<div class="icon-box" style="width: 100%;">
							<div class="icon"><i class="fa-solid fa-spray-can-sparkles"></i></div>
							<h4><a data-bs-toggle="modal" href="#repair">Brake Work</a></h4>




						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
						<div class="icon-box" style="width: 100%;">
							<div class="icon"><i class="fas fa-wrench"></i></div>
							<h4><a data-bs-toggle="modal" href="#repair">Transmission Overhaul</a></h4>

						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
						<div class="icon-box" style="width: 100%;">
							<div class="icon"><i class="fas fa-wrench"></i></div>
							<h4><a data-bs-toggle="modal" href="#repair">Clutch Lining Replacement</a></h4>


						</div>
					</div>

					<div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
						<div class="icon-box" style="width: 100%;">
							<div class="icon"><i class="fas fa-wrench"></i></div>
							<h4><a data-bs-toggle="modal" href="#repair">Radiator Replacement</a></h4>



						</div>
					</div>

				</div>
			</div>
		</section>

		<section id="appointment" class="appointment section-bg">
			<div class="container">
			</div>

			<!-- Modal Form -->
			<div class="modal fade" id="ModalForm" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<!-- Login Form -->
						<form action="index.php" method="POST" enctype="multipart/form-data">
							<div class="modal-header">
								<h5 class="modal-title">Create an Account</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="mb-3">
									<label for="Name"><span class="text-danger"></span></label>
									<input type="text" name="name" class="form-control" id="Name" placeholder="Enter Name" required>
								</div>

								<div class="mb-3">
									<label for="Email"><span class="text-danger"></span></label>
									<input type="email" name="email" class="form-control" id="Email" placeholder="Enter Email" required>
								</div>

								<div class="mb-3">
									<label for="Name"><span class="text-danger"></span></label>
									<input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" required>
								</div>

								<div class="mb-3">
									<label for="Phone"><span class="text-danger"></span></label>
									<input type="Number" name="phone" class="form-control" id="Phone" placeholder="Enter Phone Number" required>
								</div>

								<div class="mb-3">
									<label for="Email"><span class="text-danger"></span></label>
									<input type="text" name="car" class="form-control" id="car" placeholder="Plate Number" required>

								</div>

								<div class="mb-3">
									<label for="Email"><span class="text-danger"></span></label>
									<input type="text" name="car" class="form-control" id="car" placeholder="Enter Car Brand" required>

								</div>

								<div class="mb-3">
									<label for="Email"><span class="text-danger"></span></label>
									<input type="text" name="car" class="form-control" id="car" placeholder="Enter Car Model" required>
								</div>

								<div class="mb-3">
									<label for="Email"><span class="text-danger"></span></label>
									<input type="text" name="car" class="form-control" id="car" placeholder="Type of car" required>
								</div>

								<div class="mb-3">
									<label for="Email"><span class="text-danger"></span></label>

									<input type="text" name="car" class="form-control" id="car" placeholder="Fuel type" required>


								</div>

								<div class="mb-3">
									<label for="Email"><span class="text-danger"></span></label>
									<input type="text" name="car" class="form-control" id="car" placeholder="Color of vehicle" required>
								</div>

								<div class="mb-3">
									<label for="Email"><span class="text-danger"></span></label>
									<input type="text" name="car" class="form-control" id="car" placeholder="Transmission Type" required>
								</div>

								<div class="mb-3">
									<label for="Password"><span class="text-danger"></span></label>
									<input type="password" name="password" class="form-control" id="Password" placeholder="Enter Password" autocomplete required>
								</div>

								<div class="mb-3">
									<label for="re-password"><span class="text-danger"></span></label>
									<input type="password" name="repassword" class="form-control" id="rePassword" placeholder="Re-Enter Password" autocomplete required>
								</div>

							</div>
							<div class="modal-footer pt-4">
								<input type="submit" name="create" class="btn btn-primary mx-auto w-100" value="Create Account">
								<!-- <button type="button" class="btn btn-primary mx-auto w-100">Create Account</button> -->
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- ======= Contact Section ======= -->
			<section id="contact" class="contact">
				<div class="container">

					<div class="section-title">
						<h2>Contact</h2>
						<p>Get in touch with us!</p>
					</div>
				</div>

				<div id="MapBox" style="height:350px"></div>
				<div class="container">
					<div class="row mt-5">

						<div class="col-lg-12">
							<div class="info">
								<div class="address">
									<i class="bi bi-geo-alt"></i>
									<h4>Location:</h4>
									<p>5 General Avenue Corner Road 20, Bahay Toro, Proj8 Quezon city,
										1106 Metro manila</p>
								</div>

								<div class="email">
									<i class="bi bi-envelope"></i>
									<h4>Email:</h4>
									<p>cjceatoparts@gmail.com</p>
								</div>

								<div class="phone">
									<i class="bi bi-phone"></i>
									<h4>Call:</h4>
									<p>0932 747 1796</p>
								</div>

							</div>

						</div>
			</section>
			<!-- End Contact Section -->

	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer">

		<div class="footer-top">
			<div class="container">
				<div class="row">

					<div class="col-lg-3 col-md-6 footer-contact">
						<h3>CJCE AUTOPARTS</h3>
						<p>
							5 General Avenue Corner Road 20, Bahay Toro, <br>
							Proj8 Quezon city,
							1106 Metro manila <br><br>
							<strong>Phone:</strong> 0932 747 1796<br>
							<strong>Email:</strong> cjceatoparts@gmail.com<br>
						</p>
						<a href="#" class="facebook"><i class="bi bi-facebook"></i></a><br>
					</div>

				</div>
			</div>
		</div>

	</footer>

	<!-- End Footer -->

	<div id="preloader"></div>
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<!-- <script src="client/assets/vendor/purecounter/purecounter.js"></script> -->
	<script src="client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="client/assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="client/assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="client/assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="client/assets/js/main.js"></script>

	<!-- script for maps -->
	<script>
		$(function() {
			setLocation = [13.80576, 120.996007];
			var map = L.map('MapBox').setView(setLocation, 14);
			L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
				attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
			}).addTo(map);
			map.attributionControl.setPrefix(false);
			var marker = new L.marker(setLocation, {
				draggable: false
			});
			map.addLayer(marker);
		})
	</script>


</body>

</html>