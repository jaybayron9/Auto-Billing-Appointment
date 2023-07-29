<?php  Auth::checkAuth($_SESSION['emp_auth'], $_SESSION['emp_email_auth']); ?>
<div class="ttr-sidebar" style="background-color: #1C4E80;">
	<div class="ttr-sidebar-wrapper content-scroll">
		<div class="ttr-sidebar-logo" style=" border-top: 1px solid white; background-color: #1C4E80; border-bottom: solid 0px #cfd8dc; background-position: center;background-repeat: no-repeat;background-size: cover;height: 135px;">
			<div style="padding-left: 12px; padding-top: 12px;">
				<div class="image">
					<img src="assets/images/profile-pictures/default.jpg" style="width: 50px; height: 50px; border-radius: 50%;object-fit: cover;" alt="User">
				</div>
				<div style="height: 8px;"></div>
				<div class="info-container">
					<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-size: 15px;"><b><?= $_SESSION['emp_email_auth'] ?></b></div>
				</div>
			</div>
		</div>

		<nav class="ttr-sidebar-navi" style="background-color: #1C4E80;">
			<ul>
				<li style="margin-top: 0px; background-color: #00BFFF;">
					<a href="?vs=?emp" class="ttr-material-button">
						<span class="ttr-icon"><i class="ti-home"></i></span>
						<span style="color: black;" class="ttr-label">Home</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>