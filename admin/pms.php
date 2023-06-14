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
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/1.png" />
		<title>CJCE AUTOPARTS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/assets.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/vendors/calendar/fullcalendar.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/typography.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/shortcodes/shortcodes.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="../dashboard/assets/css/d.css">
        <link href="../client/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../client/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../client/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="../client/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../client/assets/css/style.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/e02ccf2d8a.js" crossorigin="anonymous"></script>
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
				
				$page = 'appointments';
				include 'nav.php'; 

			?>
			
			</div>
		</div>
		<main class="ttr-wrapper" style="background-color: #F3F3F3;">
			<div class="container-fluid">
				<div class="db-breadcrumb">
					<h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
					<ul class="db-breadcrumb-list">
						<li><i class="fa fa-home"></i>Preventive Maintenance Services</li>
					</ul>
				</div> 
				
				
				



                <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2> PREVENTIVE MAINTENANCE SERVICE </h2>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="icon-box" style="width: 100%;">
              <div class="icon"><i class="fas fa-person-chalkboard"></i></div>
              <h4><a href="pms15.php" >15KM</a></h4>
            </div>
          </div>
  
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box" style=" width: 100%;">
              <div class="icon"><i class="fa-solid fa-screwdriver"></i></div>
              <h4><a href="pms20.php">20KM</a></h4>
              

            

            </div>
          </div>


          <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box" style="width: 100%;">
              <div class="icon"><i class="fas fa-hammer"></i></div>
              <h4><a href="pms30.php">30KM</a></h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box" style=" width: 100%;">
              <div class="icon"><i class="fas fa-hammer"></i></div>
              <h4><a href="pms40.php">40KM</a></h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box" style="width: 100%;">
              <div class="icon"><i class="fa-solid fa-spray-can-sparkles"></i></div>
              <h4><a href="pms80.php">80KM</a></h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box" style="width: 100%;">
              <div class="icon"><i class="fas fa-wrench"></i></div>
              <h4><a href="pms90.php">90KM</a></h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box" style="width: 100%;">
              <div class="icon"><i class="fas fa-wrench"></i></div>
              <h4><a href="pms100.php">100KM</a></h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box" style="width: 100%;">
              <div class="icon"><i class="fas fa-wrench"></i></div>
              <h4><a href="pms120.php">120KM</a></h4>
            </div>
          </div>

        </div>
      </div>
    </section>
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