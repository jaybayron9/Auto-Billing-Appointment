<?php
	session_start();
	include('../dbh.php');
	include('../global/model.php');
	$model = new Model();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no">
		<!-- <link rel="icon" href="../assets/images/<?php echo $web_icon; ?>.png" type="image/x-icon" /> -->
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/2.png" />
		<title>CJCE AUTOPARTS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/assets.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/vendors/calendar/fullcalendar.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/typography.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/shortcodes/shortcodes.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/d.css">
	</head>
	<style type="text/css">
		.btn.dropdown-toggle.btn-default:hover {
			color: #000!important;
		}

		.btn.dropdown-toggle.btn-default:focus {
			color: #000!important;
		}

		.widget-card .icon {
			position: absolute;
			top: auto;
			bottom: -20px;
			right: 5px;
			z-index: 0;
			font-size: 65px;
			color: rgba(0, 0, 0, 0.15);
		}
	</style>
	<?php include '../assets/css/color/color-1.php';  ?>
	<body class="ttr-opened-sidebar ttr-pinned-sidebar"  style="background-color: #F3F3F3!important;">

		<?php include 'navbar.php'; ?>

		<div class="ttr-sidebar"  style="background-color: #1C4E80;">
			<div class="ttr-sidebar-wrapper content-scroll">
				
			<?php 
			
				include 'sidebar.php';
				
				$page = 'dashboard';
				include 'nav.php'; 

			?>
			
			</div>
		</div>
		<main class="ttr-wrapper" style="background-color: #F3F3F3;">
			<div class="container-fluid">
				<div class="db-breadcrumb">
					<h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="fa fa-home"></i>Client Home</li>
					</ul>
				</div> 
				
				



				<div class="row">
					<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-6">
						<div class="widget-card widget-bg3 btn blue" style=" padding: 40px 40px;">		
						<div class="icon">
								<i class="ti-notepad"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
									<a href="appointments.php">My Appointments</a>
									
								</h3>
								<span class="wc-des">
									<!-- <?php echo date('g:i A'); ?> | <?php echo date('l'); ?> -->
								</span>
							</div>			      
						</div>
					</div>


					<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-6">
						<div class="widget-card widget-bg2 btn yellow" style=" padding: 30px 70px;">
							<div class="icon">
								<i class="ti-google"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
								<button data-toggle="modal" style="border: 1px solid none;" data-target="#email" class="btn yellow">
															<div data-toggle="tooltip" title="Edit">
															Email
															</div>
														</button>
								</h3>
								<!-- <span class="wc-des">
									ASSET INFORMATION SYSTEM -->
								</span>
								<span class="wc-stats">
									<!-- <span>20</span> -->
								</span>	
							</div>				      
						</div>
					</div>
					
					<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-6">
						<div class="widget-card widget-bg2 btn red" style=" padding: 40px 60px;">	
							<div class="icon">
								<i class="ti-bookmark-alt"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
									<a href="repairstatus.php">Report Status</a>
									
								</h3>
								<span class="wc-des">
									<!-- ASSET INFORMATION SYSTEM -->
								</span>
								<span class="wc-stats">
									<!-- <span>3</span> -->
								</span>		
							</div>				      
						</div>
					</div>
					<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-6">
						<div class="widget-card widget-bg4 btn green" style=" padding: 40px 60px;">	
							<div class="icon">
								<i class="ti-clipboard"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
								<a href="servicehistory.php">Service History</a>
									
								</h3>
								<span class="wc-des">
									<!-- ASSET INFORMATION SYSTEM -->
								</span>
								<span class="wc-stats">
									<!-- <span>23</span> -->
								</span>		
							</div>				      
						</div>
					</div>

					<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-6">
						<div class="widget-card widget-bg4 btn green" style=" padding: 30px 30px;">	
							<div class="icon">
								<i class="ti-write"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
								<button data-toggle="modal" style="border: 1px solid none;" data-target="#add" class="btn green">
															<div data-toggle="tooltip" title="Edit">
															Book Yor Car Now
															</div>
														</button>
									
								</h3>
								<span class="wc-des">
									<!-- ASSET INFORMATION SYSTEM -->
								</span>
								<span class="wc-stats">
									<!-- <span>23</span> -->
								</span>		
							</div>				      
						</div>
					</div>

					<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-6">
						<div class="widget-card widget-bg4 btn green" style=" padding: 43px 65px;">	
							<div class="icon">
								<i class="ti-list"></i>
							</div>				 
							<div class="wc-item">
								<h3 class="wc-title">
								<a href="list.php">List of Cars</a>
									
								</h3>
								<span class="wc-des">
									<!-- ASSET INFORMATION SYSTEM -->
								</span>
								<span class="wc-stats">
									<!-- <span>23</span> -->
								</span>		
							</div>				      
						</div>
					</div>
				</div>

				

				<div id="add" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Add Appointment</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="form-group col-12">
																	<label class="col-form-label">Car ID</label>
																		<input class="form-control" type="text" name="type"  >

                                                                    	<label class="col-form-label">Brand</label>
																		<input class="form-control" type="text" name="brand" style="background-color: white;" >

																		<label class="col-form-label">Type of Vehicle</label>
																		<select class="form-control" name="pms" id="pms" required style="color: black!important;">
																			<option value="" >-- Please select --</option>

																			<option value="5KM">SEDAN</option>
																			<option value="10KM">SUV</option>
																			<option value="30KM">AUV</option>
																			<option value="40KM">PICK UP</option>


																		</select>
																		
																		<label class="col-form-label">Vehicle Color</label>
																		<input class="form-control" type="text" name="brand" style="background-color: white;" >


																		<label class="col-form-label">Type of Fuel</label>
																		<select class="form-control" name="pms" id="pms" required style="color: black!important;">
																			<option value="" >-- Please select --</option>

																			<option value="5KM">Gas</option>
																			<option value="10KM">Diesel</option>


																		</select>
																		

																		<label class="col-form-label">PMS</label>
																		<select class="form-control" name="pms" id="pms" required style="color: black!important;">
																			<option value="" >-- Please select --</option>

																			<option value="5KM">5KM</option>
																			<option value="10KM">10KM</option>
																			<option value="30KM">30KM</option>
																			<option value="40KM">40KM</option>

																			<option value="80KM">80KM</option>
																			<option value="90KM">90KM</option>
																			<option value="100KM">100KM</option>
																			<option value="120KM">120KM</option>

																		</select>
																		
																		<label class="col-form-label">Schedule</label>
																		<input class="form-control" type="date" name="schedule" style="background-color: white;" >
																		
																		<label class="col-form-label">Repair</label>
																		<select class="form-control" name="repair" required style="color: black!important;">
																			<option value="" >-- Please select --</option>
																		<?php
																			$query=mysqli_query($conn,"select * from repair");
																			while($row=mysqli_fetch_array($query))
																			{
																			?>
																		<option value="<?php echo $row['ps']; ?>"><?php echo $row['ps']; ?></option>

																		<?php } ?>
																		</select>

																		<label class="col-form-label">Time</label>
																		<input class="form-control" type="time" name="time" style="background-color: white;" >

																		<label class="col-form-label">Plate Number</label>
																		<input class="form-control" type="text" name="color" >

																		
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn green radius-xl outline" name="add_app" value="Save Changes">
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>


											<div id="email" class="modal fade" role="dialog">
												<form class="edit-profile m-b30" action="" method="POST" enctype="multipart/form-data">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Email Admin</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="form-group col-12">

																	<?php 
																							$query=mysqli_query($conn,"select * from client_info WHERE email='".$_SESSION['clogin']."'");
																	$cnt=1;
																	while($row=mysqli_fetch_array($query))
																	{
																	?>	

                                                                    	<label class="col-form-label">Your Email</label>
																		<input class="form-control" type="text" value="" name="email" style="background-color: white;" >

																		<?php $cnt=$cnt+1; } ?>

																		<label class="col-form-label">Message</label>
																		<input class="form-control" type="text" name="message"  style="background-color: white;" >
	
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<input type="submit" class="btn green radius-xl outline" value="Save Changes">
																<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</form>
											</div>

				<div class="row">
					<div class="col-lg-5 m-b30">
						<div class="heading-bx left">
							<h2 class="m-b10 title-head"> <span></span></h2>
						</div>
						
						</div>
					</div>
					<div class="col-lg-12 m-b30">



					</div>
				</div>
			</div>
		</main>
		<div class="ttr-overlay"></div>


		<script src="../dashboard/assets/js/jquery.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap/js/popper.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
		<script src="../dashboard/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
		<script src="../dashboard/assets/vendors/magnific-popup/magnific-popup.js"></script>
		<script src="../dashboard/assets/vendors/counter/waypoints-min.js"></script>
		<script src="../dashboard/assets/vendors/counter/counterup.min.js"></script>
		<script src="../dashboard/assets/vendors/imagesloaded/imagesloaded.js"></script>
		<script src="../dashboard/assets/vendors/masonry/masonry.js"></script>
		<script src="../dashboard/assets/vendors/masonry/filter.js"></script>
		<script src="../dashboard/assets/vendors/owl-carousel/owl.carousel.js"></script>
		<script src='../dashboard/assets/vendors/scroll/scrollbar.min.js'></script>
		<script src="../dashboard/assets/js/functions.js"></script>
		<script src="../dashboard/assets/vendors/chart/chart.min.js"></script>
		<script src="../dashboard/assets/js/admin.js"></script>
		<script src='../dashboard/assets/vendors/calendar/moment.min.js'></script>
		<script src='../dashboard/assets/vendors/calendar/fullcalendar.js'></script>
		<script>
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();

				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						// right: 'month'
					},

					defaultView: 'month',
					defaultDate: '<?php echo date('Y-m-d') ?>',
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					events: [
						<?php
								
							$status = 1;
							$rows = $model->displayEquipments($status);

							if (!empty($rows)) {
								foreach ($rows as $row) {

						?>
						{
							type: 'equipment',
							equipment_id: '<?php echo $row['id']; ?>',
							img: '../assets/images/equipments/<?php echo $row['photo']; ?>.jpg',
							title: 'Equipment | <?php echo $row['name']; ?>',
							name: '<?php echo $row['name']; ?>',
							brand: '<?php echo $row['brand']; ?>',
							quantity: '<?php echo $row['quantity']; ?>',
							condition: '<?php echo $row['cond']; ?>',
							date_arrived: '<?php echo date("M. d, Y", strtotime($row['date_arrived'])); ?>',
							start: '<?php echo $row['date_arrived']; ?>'
						},
						<?php

								}
							}

							$rows = $model->displayBorrow();

							if (!empty($rows)) {
								foreach ($rows as $row) {
									

						?>
						{
							type: 'borrowed',
							borrowed_id: '<?php echo $row['id']; ?>',
							img: '../assets/images/equipments/<?php echo $row['photo']; ?>.jpg',
							title: 'Borrowed | <?php echo $row['name']; ?>',
							name: '<?php echo $row['name']; ?>',
							brand: '<?php echo $row['brand']; ?>',
							quantity: '<?php echo $row['quantity']; ?>',
							condition: '<?php echo $row['cond']; ?>',
							qty: '<?php echo $row['qty']; ?>',
							borrowed_type: '<?php echo $row['type']; ?>',
							account_id: '<?php echo $row['account_id']; ?>',
							course: '<?php echo $row['course']; ?>',
							date_borrowed: '<?php echo date('M. d, Y', strtotime($row['date'])); ?>',
							date_returned: '<?php if (!empty($row['date_returned'])) { echo date('M. d, Y', strtotime($row['date_returned'])); } else { echo 'Not returned'; } ?>',
							reported_by: '<?php echo $row['fullname']; ?>',
							start: '<?php echo $row['date']; ?>'		
						},
						<?php

								}
							}

							$rows = $model->displayReports();

							if (!empty($rows)) {
								foreach ($rows as $row) {

						?>
						{
							type: 'report',
							report_id: '<?php echo $row['id']; ?>',
							img: '../assets/images/equipments/<?php echo $row['photo']; ?>.jpg',
							title: 'Report | <?php echo $row['name']; ?>',
							name: '<?php echo $row['name']; ?>',
							brand: '<?php echo $row['brand']; ?>',
							quantity: '<?php echo $row['quantity']; ?>',
							condition: '<?php echo $row['cond']; ?>',
							reported_by: '<?php echo $row['fullname']; ?>',
							items_lost: '<?php echo $row['item_lost']; ?>',
							report_type: '<?php echo $row['type']; ?>',
							account_id: '<?php echo $row['account_id']; ?>',
							course: '<?php echo $row['course']; ?>',
							date_lost: '<?php echo date('M. d, Y', strtotime($row['date_lost'])); ?>',
							reason: '<?php echo $row['reason']; ?>',
							start: '<?php echo $row['date_lost']; ?>'
						},
						<?php

								}
							}

						?>
					],
					eventClick:  function(event, jsEvent, view) {
						if (event.type == 'equipment') {
							$('#equipment-img').attr('src', event.img);
							$('#equipment-name').attr('value', event.name);
							$('#equipment-brand').attr('value', event.brand);
							$('#equipment-qty').attr('value', event.quantity);
							$('#equipment-cond').attr('value', event.condition);
							$('#equipment-date-arrived').attr('value', event.date_arrived);
							$('#equipment-modal').modal();
						}

						else if (event.type == 'borrowed') {
							$('#borrowed-img').attr('src', event.img);
							$('#borrowed-name').attr('value', event.name);
							$('#borrowed-brand').attr('value', event.brand);
							$('#borrowed-qty').attr('value', event.quantity);
							$('#borrowed-cond').attr('value', event.condition);
							$('#borrowed-item-lost').attr('value', event.qty);
							$('#borrowed-type').attr('value', event.borrowed_type);
							$('#borrowed-account-id').attr('value', event.account_id);
							$('#borrowed-name-2').attr('value', event.name);
							$('#borrowed-course').attr('value', event.course);
							$('#date-borrowed').attr('value', event.date_borrowed);
							$('#borrowed-date-returned').attr('value', event.date_returned);
							$('#borrowed-reported-by').attr('value', event.reported_by);
							$('#borrowed-modal').modal();
						}

						else if (event.type == 'report') {
							$('#report-img').attr('src', event.img);
							$('#report-name').attr('value', event.name);
							$('#report-brand').attr('value', event.brand);
							$('#report-qty').attr('value', event.quantity);
							$('#report-cond').attr('value', event.condition);
							$('#reported-by').attr('value', event.reported_by);
							$('#report-item-lost').attr('value', event.items_lost);
							$('#report-type').attr('value', event.report_type);
							$('#report-account-id').attr('value', event.account_id);
							$('#report-name-2').attr('value', event.name);
							$('#report-course').attr('value', event.course);
							$('#report-date-lost').attr('value', event.date_lost);
							$('#report-reason').html(event.reason);
							$('#report-modal').modal();
						}
	  				},
				});

			});
		</script>
	</body>

</html>