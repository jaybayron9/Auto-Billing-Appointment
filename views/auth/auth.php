<!-- login -->
<div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="AHPModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AHPModalLabel"> Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="login-form">
                    <div class="form-outline mb-4">
                        <input type="email" id="form2Example1" name="email" class="form-control" placeholder="Enter Email Address" required>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="form2Example2" name="password" class="form-control" placeholder="Enter Password" required>
                    </div>
                    <br>
                    <div class="text-center">
                        <input type="submit" name="login" class="sign_button btn btn-primary btn-block mb-4" value="Login">
                    </div>
                    <a data-bs-toggle="modal" href="#forgot" style="margin-left: 160px;">Forgot Password ?</a>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Register -->
<div class="modal fade" id="ModalForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Login Form -->
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Create an Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="Name"><span class="text-danger"></span></label>
                        <input type="text" name="name" class="form-control" id="Name" placeholder="Enter Name" required>
                    </div>

                    <div class="mb-3">
                        <label for="Email"><span class="text-danger"></span></label>
                        <input type="email" name="email" class="form-control" id="Email" placeholder="Enter Email" required>
                    </div>

                    <div class="mb-3">
                        <label for="Name"><span class="text-danger"></span></label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" required>
                    </div>

                    <div class="mb-3">
                        <label for="Phone"><span class="text-danger"></span></label>
                        <input type="Number" name="phone" class="form-control" id="Phone" placeholder="Enter Phone Number" required>
                    </div>

                    <div class="mb-3">
                        <label for="Email"><span class="text-danger"></span></label>
                        <input type="text" name="car" class="form-control" id="car" placeholder="Plate Number" required>

                    </div>

                    <div class="mb-3">
                        <label for="Email"><span class="text-danger"></span></label>
                        <input type="text" name="car" class="form-control" id="car" placeholder="Enter Car Brand" required>

                    </div>

                    <div class="mb-3">
                        <label for="Email"><span class="text-danger"></span></label>
                        <input type="text" name="car" class="form-control" id="car" placeholder="Enter Car Model" required>
                    </div>

                    <div class="mb-3">
                        <label for="Email"><span class="text-danger"></span></label>
                        <input type="text" name="car" class="form-control" id="car" placeholder="Type of car" required>
                    </div>

                    <div class="mb-3">
                        <label for="Email"><span class="text-danger"></span></label>

                        <input type="text" name="car" class="form-control" id="car" placeholder="Fuel type" required>


                    </div>

                    <div class="mb-3">
                        <label for="Email"><span class="text-danger"></span></label>
                        <input type="text" name="car" class="form-control" id="car" placeholder="Color of vehicle" required>
                    </div>

                    <div class="mb-3">
                        <label for="Email"><span class="text-danger"></span></label>
                        <input type="text" name="car" class="form-control" id="car" placeholder="Transmission Type" required>
                    </div>

                    <div class="mb-3">
                        <label for="Password"><span class="text-danger"></span></label>
                        <input type="password" name="password" class="form-control" id="Password" placeholder="Enter Password" autocomplete required>
                    </div>

                    <div class="mb-3">
                        <label for="re-password"><span class="text-danger"></span></label>
                        <input type="password" name="repassword" class="form-control" id="rePassword" placeholder="Re-Enter Password" autocomplete required>
                    </div>

                </div>
                <div class="modal-footer pt-4">
                    <input type="submit" name="create" class="btn btn-primary mx-auto w-100" value="Create Account">
                    <!-- <button type="button" class="btn btn-primary mx-auto w-100">Create Account</button> -->
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Forgot Password -->
<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="AHPModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AHPModalLabel"> Forgot Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">

                <form action="index.php" method="POST" enctype="multipart/form-data">

                    <div class="form-outline mb-4">
                        <label for="form2Example1"> Email</label>
                        <input type="email" id="form2Example1" name="email" class="form-control" placeholder="Enter Email Address" required>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label for="form2Example2"> New Password</label>
                        <input type="password" id="form2Example2" name="password" class="form-control" placeholder="Enter Password" required>
                    </div>
                    <br>
                    <div class="text-center">
                        <input type="submit" name="change" class="sign_button btn btn-primary btn-block mb-4" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){ 
        $('#login-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '?rq=login',
                type: 'POST',
                data: $(this).serialize(),
                success: function(resp) {
                    if (resp == 'go_to_admin') {
                        window.location.href = '?vs=?admin';
                    } else if (resp == 'go_to_employee') {
                        window.location.href = '?vs=?emp';
                    } else if (resp == 'go_to_client') {
                        window.location.href = '?vs=?client';
                    } else {
                        alert('Wrong Password or Email. Try Again!')
                    }
                }
            });
        });
    });
</script>