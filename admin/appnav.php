<style type="text/css">

					.ti-home
					{
						color: black ;
					}
					.ttr-sidebar-navi{
				
						color: red ;
					}
					.ti-home
					{
						color: black;
					}
					.ti-notepad
					{
						color: black ;
					}
					

					</style>

				<nav class="ttr-sidebar-navi" style="background-color: #1C4E80;">
					<ul class="">
						
						<li class="trylang" style="margin-top: 0px; background-color: #00BFFF;">
							<a href="index.php" class="ttr-material-button <?php echo ($page == 'dashboard') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-home <?php echo ($page == 'dashboard') ? "show2" : ""; ?>"></i></span>
								<span class="ttr-label <?php echo ($page == 'compose') ? "show2" : ""; ?>" style="color: black;"> Back</span>
							</a>
						</li>
                        <li class="" style="margin-top: 0px; background-color: #00BFFF;">
							<a href="approvedapp.php" class="ttr-material-button <?php echo ($page == 'dashboard') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-notepad <?php echo ($page == 'dashboard') ? "show2" : ""; ?>"></i></span>
								<span class="ttr-label <?php echo ($page == 'compose') ? "show2" : ""; ?>" style="color: black;">Approved Appointments</span>
							</a>
						</li>
						<li class="" style="margin-top: 0px; background-color: #00BFFF;">
							<a href="walkin.php" class="ttr-material-button <?php echo ($page == 'dashboard') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-notepad <?php echo ($page == 'dashboard') ? "show2" : ""; ?>"></i></span>
								<span class="ttr-label <?php echo ($page == 'compose') ? "show2" : ""; ?>" style="color: black;">Walk-In Appointments</span>
							</a>
						</li>
					

					
					</ul>
				</nav>

				