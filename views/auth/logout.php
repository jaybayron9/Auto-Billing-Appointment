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


<script type="text/javascript">
	$(function() {
		$('#logout').click(function() {
			$.ajax({
				url: '?rq=logout',
				success: function(data) {
					window.location.href = './'
				}
			});
		});
	});
</script>