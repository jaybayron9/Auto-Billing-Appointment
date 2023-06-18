<header class="ttr-header">
	<div class="ttr-header-wrapper">
		<div class="ttr-toggle-sidebar ttr-material-button" style="background-color: #1C4E80;">
			<i class="ti-close ttr-open-icon" style="color: white;"></i>
			<i class="ti-menu ttr-close-icon" style="color: white;"></i>
		</div>
		<div class="ttr-header-menu">
		</div>
		<div class="ttr-header-right" style="background-color: #1C4E80;">
			<ul class="ttr-header-navigation">
				<li>
					<a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><i class="fa fa-cog fa-spinn" style="font-size: 32px;"></i></span></a>
					<div class="ttr-header-submenu noti-menu">
						<div class="noti-box-list">
							<ul>
								<a href="#" id="logout" style="text-decoration: none;color: black;">
									<li>
										<span class="notification-icon dashbg-red">
											<i class="fa fa-sign-out" style="font-size: 18px;"></i>
										</span>
										<span style="font-size: 22px;" style="color: black!important;">
											Logout
										</span>
									</li>
								</a>
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</header>

<div class="ttr-sidebar" style="background-color: #1C4E80;">
	<div class="ttr-sidebar-wrapper content-scroll">
		<div class="ttr-sidebar-logo" style=" border-top: 1px solid white; background-color: #1C4E80; border-bottom: solid 0px #cfd8dc; background-position: center;background-repeat: no-repeat;background-size: cover;height: 135px;">
			<div style="padding-left: 12px; padding-top: 12px;">
				<div class="image">
					<img src="assets/images/profile-pictures/default.jpg" style="width: 50px; height: 50px; border-radius: 50%;object-fit: cover;" alt="User">
				</div>
				<div style="height: 8px;"></div>
				<div class="info-container">
					<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-size: 15px;"><b><?= $_SESSION['email_auth'] ?></b></div>
				</div>
			</div>
		</div>

		<nav class="ttr-sidebar-navi" style="background-color: #1C4E80;">
			<ul>
				<li style="margin-top: 0px; background-color: #00BFFF;">
					<a href="<?= HOME() ?>" class="ttr-material-button <?php echo ($page == 'dashboard') ? "show2" : ""; ?>">
						<span class="ttr-icon"><i class="ti-home <?php echo ($page == 'dashboard') ? "show2" : ""; ?>"></i></span>
						<span style="color: black;" class="ttr-label  <?php echo ($page == 'compose') ? "show2" : ""; ?> ">Home</span>
					</a>
				</li>
				<?php if (urlIs('vs=employees')) { ?>
					<li class="" style="margin-top: 0px; background-color: #00BFFF;">
						<a href="#" class="ttr-material-button <?php echo ($page == 'dashboard') ? "show2" : ""; ?>">
							<span class="ttr-icon"><i class="ti-home <?php echo ($page == 'dashboard') ? "show2" : ""; ?>"></i></span>
							<span class="ttr-label <?php echo ($page == 'compose') ? "show2" : ""; ?>" style="color: black;"> Employees</span>
						</a>
					</li>
				<?php } ?>
				<?php if (urlIs('vs=schedules') || urlIs('vs=approved') || urlIs('vs=walk-in')) { ?>
					<li class="" style="margin-top: 0px; background-color: #00BFFF;">
						<a href="?vs=approved" class="ttr-material-button <?php echo ($page == 'dashboard') ? "show2" : ""; ?>">
							<span class="ttr-icon"><i class="ti-notepad <?php echo ($page == 'dashboard') ? "show2" : ""; ?>"></i></span>
							<span class="ttr-label <?php echo ($page == 'compose') ? "show2" : ""; ?>" style="color: black;">Approved Appointments</span>
						</a>
					</li>
					<li class="" style="margin-top: 0px; background-color: #00BFFF;">
						<a href="?vs=walk-in" class="ttr-material-button <?php echo ($page == 'dashboard') ? "show2" : ""; ?>">
							<span class="ttr-icon"><i class="ti-notepad <?php echo ($page == 'dashboard') ? "show2" : ""; ?>"></i></span>
							<span class="ttr-label <?php echo ($page == 'compose') ? "show2" : ""; ?>" style="color: black;">Walk-In Appointments</span>
						</a>
					</li>
				<?php } ?>
				<?php if (urlIs('vs=repair-service')) { ?>
					<li class="" style="margin-top: 0px; background-color: #00BFFF;">
						<a href="?vs=repairs" class="ttr-material-button <?php echo ($page == 'dashboard') ? "show2" : ""; ?>">
							<span class="ttr-icon"><i class="ti-home <?php echo ($page == 'dashboard') ? "show2" : ""; ?>"></i></span>
							<span class="ttr-label <?php echo ($page == 'compose') ? "show2" : ""; ?>" style="color: black;"> Back</span>
						</a>
					</li>
				<?php } ?>
				<?php if (urlIs('vs=?client') || urlIs('vs=inbox') || urlIs('vs=appointments') || urlIs('vs=report-status') || urlIs('vs=service-history') || urlIs('vs=car-list')) { ?>
					<li class="" style="margin-top: 0px; background-color: #00BFFF;">
						<a href="?vs=inbox" class="ttr-material-button <?php echo ($page == 'dashboard') ? "show2" : ""; ?>">
							<span class="ttr-icon"><i class="ti-home <?php echo ($page == 'dashboard') ? "show2" : ""; ?>"></i></span>
							<span class="ttr-label <?php echo ($page == 'compose') ? "show2" : ""; ?>" style="color: black;"> Inbox</span>
						</a>
					</li>
				<?php } ?>
			</ul>
		</nav>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$('#logout').click(function() {
			$.ajax({
				url: '?rq=logout',
				success: function(data) {
					window.location.href = 'index.php'
				}
			});
		});
	});
</script>