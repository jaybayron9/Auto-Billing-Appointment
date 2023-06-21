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
            <form id="register-form">
                <div class="modal-header">
                    <h5 class="modal-title">Create an Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="Name"><span class="text-danger"></span></label>
                        <input type="text" name="name" class="form-control" id="Name" placeholder="Enter Name" required>
                    </div>

                    <div class="mb-1">
                        <label for="Email"><span class="text-danger"></span></label>
                        <input type="email" name="email" id="Email" class="form-control" placeholder="Enter Email" required>
                    </div>

                    <div class="mb-1">
                        <label for="address"><span class="text-danger"></span></label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" required>
                    </div>

                    <div class="mb-1">
                        <label for="phone"><span class="text-danger"></span></label>
                        <input type="text" name="phone" id="phone" maxlength="11" class="form-control number" placeholder="Enter Phone Number" required>
                        <span class="msgphone" style="color: red;"></span>
                    </div>

                    <div class="mb-1">
                        <label for="plateNumber"><span class="text-danger"></span></label>
                        <input type="text" name="plateNumber" id="plateNumber" maxlength="8" class="form-control plateNumber" placeholder="Plate Number" required>
                        <span class="msgPlateNumber" style="color: red;"></span>
                    </div>

                    <div class="mb-1">
                        <label for="brand"><span class="text-danger"></span></label>
                        <input type="text" name="brand" id="brand" class="form-control" placeholder="Enter Car Brand" required>
                    </div>

                    <div class="mb-1">
                        <label for="carmodel"><span class="text-danger"></span></label>
                        <input type="text" name="carModel" id="carmodel" class="form-control" placeholder="Enter Car Model" required>
                    </div>

                    <div class="mb-1">
                        <label for="cartype"><span class="text-danger"></span></label>
                        <select type="text" name="carType" id="cartype" class="form-control" placeholder="Type of car" required>
                            <option value="" selected hidden>-- Select car type --</option>
                            <option value="Automatic">Automatic</option>
                            <option value="Manual">Manual</option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <label for="fueltype"><span class="text-danger"></span></label>
                        <select type="text" name="fuelType" id="fueltype" class="form-control" placeholder="Fuel type" required>
                            <option value="" selected hidden>-- Select fuel type --</option>
                            <option value="Gas">Gas</option>
                            <option value="Diesel">Diesel</option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <label for="carcolor"><span class="text-danger"></span></label>
                        <input type="text" name="carColor" id="carcolor" class="form-control" placeholder="Color of vehicle" required>
                    </div>

                    <div class="mb-4">
                        <label for="transtype"><span class="text-danger"></span></label>
                        <input type="text" name="transType" id="transtype" class="form-control" placeholder="Transmission Type" required>
                    </div>

                    <div class="mb-3">
                        <div class="pass-field form-control">
                            <span class="text-danger"></span>
                            <input type="password" style="width: 400px; border: none; outline: none;" name="password" id="password" class="" placeholder="Create password" required>
                            <i class="fa-solid fa-eye"></i>
                        </div>
                    </div>
                    <div class="content">
                        <p>Password must contains</p>
                        <ul class="requirement-list">
                            <li>
                                <i class="fa-solid fa-circle"></i>
                                <span>At least 8 characters length</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle"></i>
                                <span>At least 1 number (0...9)</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle"></i>
                                <span>At least 1 lowercase letter (a...z)</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle"></i>
                                <span>At least 1 special symbol (!...$)</span>
                            </li>
                            <li>
                                <i class="fa-solid fa-circle"></i>
                                <span>At least 1 uppercase letter (A...Z)</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <label for="repassword"><span class="text-danger"></span></label>
                        <input type="password" name="repassword" id="repassword" class="form-control repassword" placeholder="Re-Enter Password" autocomplete required>
                        <span class="msgrePassword" style="color: red;"></span>
                    </div>
                </div>
                <div class="modal-footer pt-4">
                    <button type="submit" id="register" class="btn btn-primary mx-auto w-100">REGISTER</button>
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
                <form id="forgot-password-form" method="POST" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="femail"> Email</label>
                        <input type="email" id="femail" name="email" class="form-control" placeholder="Enter Email Address" required>
                        <span id="femail-msg" style="color:red;"></span>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="fphone"> Phone</label>
                        <input type="text" id="fphone" name="phone" maxlength="11" class="form-control number" placeholder="Enter Phone Number" required>
                        <span id="fphone-msg" style="color:red;"></span>
                    </div>
                    <!-- Password input -->
                    <div id="pass-div" class="hidden">
                        <div class="form-outline mb-4">
                            <label for="new-password"> New Password</label>
                            <input type="password" id="new-password" name="password" class="form-control" placeholder="Enter Password" required>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="new-password"> Re-enter Password</label>
                            <input type="password" id="re-password" name="repassword" class="form-control" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <br>
                    <div id="sub-btn" class="text-center">
                        <button id="checkcred" class="sign_button btn btn-primary btn-block mb-4">SUBMIT</button>
                    </div>
                    <div id="change-btn" class="text-center hidden">
                        <button type="submit" class="sign_button btn btn-primary btn-block mb-4">CHANGE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
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

        $('#register-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '?rq=register',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(resp) {
                    if (resp.status == 'success') {
                        alert(resp.msg);
                        window.location.href = '?vs=?client';
                    } else {
                        alert(resp.msg);
                    }
                }
            });
        });

        $('#checkcred').click(function() {
            $.ajax({
                url: '?rq=check_credentials',
                type: 'POST',
                data: {
                    email: $('#femail').val(),
                    phone: $('#fphone').val(),
                },
                success: function(resp) {
                    if (resp == 'success') {
                        $('#sub-btn').addClass('hidden');
                        $('#change-btn').removeClass('hidden');
                        $('#pass-div').removeClass('hidden');
                    } else {
                        alert('Email or phone number is not registered.');
                    }
                }
            })
        });

        $('#forgot-password-form').submit(function(e) {
            e.preventDefault();
            
            $.ajax({
                url: '?rq=forgot_password',
                type: 'POST',
                data: $(this).serialize(),
                success: function(resp) {
                    if (resp == 'go_to_client') {
                        window.location.href = '?vs=?client';
                    } else {
                        alert(resp);
                    }
                }
            });
        });

        $('.number').on('keydown keyup', function(event) {
            var input = $(this);
            var value = input.val();
            var msgphone = $('.msgphone');

            value = value.replace(/[^0-9\.]/g, '');

            var decimalCount = (value.match(/\./g) || []).length;
            if (decimalCount > 1) {
                value = value.replace(/\.+$/, '');
            }

            input.val(value);

            if (value.length !== 11) {
                msgphone.text('Phone number must be at least 11 characters long')
            } else {
                msgphone.text('');
            }

        });

        $('#plateNumber').on('input', function() {
            var inputValue = $(this).val();
            var pattern = /^[A-Za-z]{3}[-\s]?\d{4}$/;
            var msg = $('.msgPlateNumber');

            if (!pattern.test(inputValue)) {
                msg.text('Invalid format');
            } else {
                msg.text('');
            }
        });

        // $('#password').on('input', function() {
        //     var passwordValue = $(this).val();
        //     var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).*$/;
        //     var msg = $('.msgPassword');

        //     if (!pattern.test(passwordValue)) {
        //         msg.text('Password must contain upper and lower case letters, numbers, and special characters.');
        //     } else {
        //         msg.text('');
        //     }
        // });

        const passwordInput = $(".pass-field input");
        const eyeIcon = $(".pass-field i");
        const requirementList = $(".requirement-list li");

        const requirements = [
                { regex: /.{8,}/, index: 0 },
                { regex: /[0-9]/, index: 1 },
                { regex: /[a-z]/, index: 2 },
                { regex: /[^A-Za-z0-9]/, index: 3 },
                { regex: /[A-Z]/, index: 4 }
            ];

        passwordInput.on("keyup", function(e) {
            requirements.forEach(function(item) {
                const isValid = item.regex.test(e.target.value);
                const requirementItem = requirementList.eq(item.index);

                if (isValid) {
                    requirementItem.addClass("valid");
                    requirementItem.find("i").removeClass().addClass("fa-solid fa-check");
                } else {
                    requirementItem.removeClass("valid");
                    requirementItem.find("i").removeClass().addClass("fa-solid fa-circle");
                }
            });
        });

        eyeIcon.on("click", function() {
            passwordInput.attr("type", function(index, attr) {
                return attr === "password" ? "text" : "password";
            });

            eyeIcon.removeClass().addClass("fa-solid fa-eye" + (passwordInput.attr("type") === "password" ? "" : "-slash"));
        });

        $('#repassword').on('input', function() {
            var repasswordValue = $(this).val();
            var password = $('#password').val();
            var msg = $('.msgrePassword')

            if (repasswordValue != password) {
                msg.text('Password does not match.');
            } else {
                msg.text('');
            }
        });
    });
</script>