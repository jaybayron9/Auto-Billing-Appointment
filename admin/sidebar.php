<?php
	include('../dbh.php');
?>


				<div class="ttr-sidebar-logo" style=" border-top: 1px solid white; background-color: #1C4E80; border-bottom: solid 0px #cfd8dc; background-position: center;background-repeat: no-repeat;background-size: cover;height: 135px;">
					<div style="padding-left: 12px; padding-top: 12px;">
						<div class="image">
							<img src="../assets/images/profile-pictures/default.jpg" style="width: 50px; height: 50px; border-radius: 50%;object-fit: cover;" alt="User">
						</div>
						<div style="height: 8px;">
						</div>
						<div class="info-container">

						<?php 
						
						$query=mysqli_query($conn,"select * from admin_info WHERE email='".$_SESSION['alogin']."'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>	


							<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-size: 15px;"><b><?php echo $row['email']; ?></b></div>

							<?php $cnt=$cnt+1; } ?>

						</div>
					</div>
				</div>