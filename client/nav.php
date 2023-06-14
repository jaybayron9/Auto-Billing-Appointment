				<style type="text/css">
					.show2 {
						
						color: black;
					}
				</style>

				<nav class="ttr-sidebar-navi" style="background-color: #1C4E80;">
					<ul>
						
						
						<li class="" onMouseOver="this.style.color='#0F0'" style="margin-top: 0px; background-color: #00BFFF;;">
							<a href="index.php"  class="ttr-material-button <?php echo ($page == 'dashboard') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-home <?php echo ($page == 'dashboard') ? "show2" : ""; ?>"></i></span>
								<span class="ttr-label <?php echo ($page == 'compose') ? "show2" : ""; ?>">Home</span>
							</a>
						</li>
						<li style="margin-top: 0px; background-color: #00BFFF;">
							<a href="inbox.php" class="ttr-material-button <?php echo ($page == 'inbox') ? "show2" : ""; ?>">
								<span class="ttr-icon"><i class="ti-notepad <?php echo ($page == 'inbox') ? "show2" : ""; ?>"></i></span>
								<span class="ttr-label <?php echo ($page == 'inbox') ? "show2" : ""; ?>">Inbox</span>
							</a>
						</li>
						

					
					</ul>
				</nav>