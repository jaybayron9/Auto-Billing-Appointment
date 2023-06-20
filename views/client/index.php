<?php include view('client', 'navbars') ?>
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
	</div>
</main>

<div id="add" class="modal fade" role="dialog">
    <form id="appointment-form" class="edit-profile m-b30">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Add Appointment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12">
							<input type="hidden" name="user_id" id="user-id" value="<?= $_SESSION['client_auth'] ?>">
                            
							<label class="col-form-label">Car</label>
                            <select class="form-control" name="car_id" required>
								<option value="" selected hidden>-- Select Car --</option>
								<?php foreach( DBConn::select('cars', '*', ['user_id' => $_SESSION['client_auth']]) as $item) { ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['plate_no'] ?></option>
                                <?php } ?>
							</select>

							<label class="col-form-label">PMS</label>
                            <select class="form-control" name="pms" required>
								<option value="" selected hidden>-- Select PMS --</option>
								<?php foreach( DBConn::select('pms', '*') as $item) { ?>
                                    <option value="<?= $item['ps'] ?>"><?= $item['ps'] ?></option>
                                <?php } ?>
							</select>

                            <label class="col-form-label">Repair</label>
                            <select class="form-control" name="repair" required>
                                <option value="" selected hidden>-- Select Repair --</option>
                                <?php foreach( DBConn::select('repair') as $item) { ?>
                                    <option value="<?= $item['ps'] ?>"><?= $item['ps'] ?></option>
                                <?php } ?>
                            </select>

                            <label class="col-form-label">Schedule</label>
                            <input class="form-control" type="datetime-local" name="schedule" style="background-color: white;" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green radius-xl outline">SUBMIT</button>
                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div id="email" class="modal fade" role="dialog">
	<div class="edit-profile m-b30">
		<div class="modal-dialog modal-lg">
			<form id="send-email-form" class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Email Admin</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-12">
							<label class="col-form-label">Your Email</label>
							<input class="form-control" type="text" value="<?= $_SESSION['email_auth'] ?>" name="email" style="background-color: white;" disabled>
							<label class="col-form-label">Message</label>
							<textarea class="form-control" name="message" style="background-color: white;"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn green radius-xl outline">SEND</button>
					<button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$('#appointment-form').submit(function(e){
			e.preventDefault();

			$.ajax({
				url: '?rq=client_add_appointment',
				type: "POST",
				data: $(this).serialize(),
				success: function(resp) {
					alert(resp);
					window.location.reload(true);
				}
			});
		});

		$('#send-email-form').submit(function(e) {
			e.preventDefault();

			$.ajax({
				url: '?rq=send_email',
				type: "POST",
				data: $(this).serialize(),
				success: function(resp) {
					alert(resp);
				}
			})
		});
	})
</script>