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
							<a href="?vs=appointments">My Appointments</a>
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
						<span class="wc-des"></span>
						<span class="wc-stats"></span>
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
							<a href="?vs=report-status">Report Status</a>
						</h3>
						<span class="wc-des"></span>
						<span class="wc-stats"></span>
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
							<a href="?vs=service-history">Service History</a>
						</h3>
						<span class="wc-des"></span>
						<span class="wc-stats"></span>
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
						<span class="wc-des"></span>
						<span class="wc-stats"></span>
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
							<a href="?vs=car-list">List of Cars</a>
						</h3>
						<span class="wc-des"></span>
						<span class="wc-stats"></span>
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
									<input class="form-control" type="text" name="type">

									<label class="col-form-label">Brand</label>
									<input class="form-control" type="text" name="brand" style="background-color: white;">

									<label class="col-form-label">Type of Vehicle</label>
									<select class="form-control" name="pms" id="pms" required style="color: black!important;">
										<option value="">-- Please select --</option>

										<option value="5KM">SEDAN</option>
										<option value="10KM">SUV</option>
										<option value="30KM">AUV</option>
										<option value="40KM">PICK UP</option>


									</select>

									<label class="col-form-label">Vehicle Color</label>
									<input class="form-control" type="text" name="brand" style="background-color: white;">


									<label class="col-form-label">Type of Fuel</label>
									<select class="form-control" name="pms" id="pms" required style="color: black!important;">
										<option value="">-- Please select --</option>

										<option value="5KM">Gas</option>
										<option value="10KM">Diesel</option>


									</select>


									<label class="col-form-label">PMS</label>
									<select class="form-control" name="pms" id="pms" required style="color: black!important;">
										<option value="">-- Please select --</option>

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
									<input class="form-control" type="date" name="schedule" style="background-color: white;">

									<label class="col-form-label">Repair</label>
									<select class="form-control" name="repair" required style="color: black!important;">
										<option value="">-- Please select --</option>
									</select>

									<label class="col-form-label">Time</label>
									<input class="form-control" type="time" name="time" style="background-color: white;">

									<label class="col-form-label">Plate Number</label>
									<input class="form-control" type="text" name="color">


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
									<label class="col-form-label">Your Email</label>
									<input class="form-control" type="text" value="" name="email" style="background-color: white;">
									<label class="col-form-label">Message</label>
									<input class="form-control" type="text" name="message" style="background-color: white;">
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
	</div>
</main>