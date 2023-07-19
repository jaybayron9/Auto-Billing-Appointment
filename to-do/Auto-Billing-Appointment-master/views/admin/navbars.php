<?php  Auth::checkAuth($_SESSION['admin_auth'], $_SESSION['admin_email_auth']); ?>
<div class="ttr-sidebar" style="background-color: #1C4E80;">
    <div class="ttr-sidebar-wrapper content-scroll">
        <div class="ttr-sidebar-logo" style=" border-top: 1px solid white; background-color: #1C4E80; border-bottom: solid 0px #cfd8dc; background-position: center;background-repeat: no-repeat;background-size: cover;height: 135px;">
            <div style="padding-left: 12px; padding-top: 12px;">
                <div class="image">
                    <img src="assets/images/profile-pictures/default.jpg" style="width: 50px; height: 50px; border-radius: 50%;object-fit: cover;" alt="User">
                </div>
                <div style="height: 8px;"></div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; font-size: 15px;"><b><?= $_SESSION['admin_email_auth'] ?></b></div>
                </div>
            </div>
        </div>
        <nav class="ttr-sidebar-navi" style="background-color: #1C4E80;">
            <ul>
                <li style="margin-top: 0px; background-color: #00BFFF;">
                    <a href="?vs=?admin" class="ttr-material-button <?php echo ($page == 'dashboard') ? "show2" : ""; ?>">
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
                        <a href="?vs=approved" class="ttr-material-button">
                            <span class="ttr-icon"><i class="ti-notepad"></i></span>
                            <span class="ttr-label" style="color: black;">Approved Appointments</span>
                        </a>
                    </li>
                    <li class="" style="margin-top: 0px; background-color: #00BFFF;">
                        <a href="?vs=walk-in" class="ttr-material-button">
                            <span class="ttr-icon"><i class="ti-notepad"></i></span>
                            <span class="ttr-label" style="color: black;">Walk-In Appointments</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (urlIs('vs=repair-service')) { ?>
                    <li class="" style="margin-top: 0px; background-color: #00BFFF;">
                        <a href="?vs=repairs" class="ttr-material-button">
                            <span class="ttr-icon"><i class="ti-home"></i></span>
                            <span class="ttr-label" style="color: black;"> Back</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>