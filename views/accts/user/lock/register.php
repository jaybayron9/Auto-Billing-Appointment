<!-- Google Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js?render=6LdIqu0mAAAAAHKhiSg-EnuA7O3-9EuayBVbUxMv"></script>

<div class="flex justify-center items-center mt-[40px]">
    <div class="w-5/6">
        <div class="flex justify-center items-center mb-5 gap-x-3">
            <img src="assets/storage/system/home.png" alt="logo" class="h-14 w-14">
            <a href="./" class="font-bold text-1xl mt-1 capitalize">Register</a>
        </div>
        <form id="register-form" class=" rounded border border-gray-300 bg-white p-10">
            <div id="alert" hidden class="py-3">
                <p id="msg" class="border-y border-r border-l-red-600 border-l-4 rounded py-3 px-5 shadow text-red-700 text-[14.5px]"></p>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-1 md:gap-5 justify-center items-center">
                <div class="cols-span-1 md:pr-5 md:border-r-2 md:border-gray-300">
                    <input type="hidden" name="csrf_token" id="csrf-token" value="<?= $_SESSION['csrf_token'] ?>">
                    <div class="mb-4">
                        <div class="mb-2">
                            <label for="name" class="text-[14.5px]">Full Name</label>
                        </div>
                        <input type="text" name="name" id="name" maxlength="50" placeholder="Example Name" class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
                        <span id="name-msg" class="text-xs text-red-700"></span>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2">
                            <label for="email" class="text-[14.5px]">Email Address</label>
                        </div>
                        <input type="text" name="email" id="email" maxlength="50" placeholder="user123@example.com" class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
                        <span id="email-msg" class="block text-xs text-red-700"></span>
                        <span id="invalid-email-msg" class="block text-xs text-red-700"></span>
                        <span id="similar-email-msg" class="block text-xs text-red-700"></span>
                    </div> 
                    <div class="mb-4">
                        <div class="mb-2">
                            <label for="phone" class="text-[14.5px]">Phone Number</label>
                        </div>
                        <input type="text" name="phone" id="phone" maxlength="11" placeholder="09504568090" class="number block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
                        <span id="phone-msg" class="block text-xs text-red-700"></span>
                        <span id="char-phone-msg" class="block text-xs text-red-700"></span>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2">
                            <label for="password" class="text-[14.5px]">Password</label>
                        </div>
                        <input type="password" name="password" id="password" maxlength="50" placeholder="Your password" autocomplete="off" class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
                        <span id="pass-msg" class="text-xs text-red-700"></span>
                        <ul id="password-format" class="list-disc grid grid-cols-2 ml-4 mt-1">
                            <li id="min" class="text-xs text-red-600">8 Characters</li>
                            <li id="small_letters" class="text-xs text-red-600">Small Letter</li>
                            <li id="big_letters" class="text-xs text-red-600">Big Letter</li>
                            <li id="_number" class="text-xs text-red-600">Number</li>
                            <li id="special_char" class="text-xs text-red-600">Special Characters</li>
                        </ul>
                        <script type="text/javascript">
                            $('#password-format').hide();
                            $('#password').focusout(() => {
                                $('#password-format').hide();
                                $('#password_msg').show();
                            })
                            $('#password').focus(() => {
                                $('#password_msg').hide();
                                $('#password-format').show();
                                $('#password').keyup(function() {
                                    $('#preloader').remove();
                                    $.ajax({
                                        type: "POST",
                                        url: "?rq=password_validation",
                                        data: {
                                            password: $(this).val()
                                        },
                                        dataType: "json",
                                        success: function(resp) {
                                            resp.lenght == '' ? $('#min').hide() : $('#min').show();
                                            resp.small == '' ? $('#small_letters').hide() : $('#small_letters').show();
                                            resp.number == '' ? $('#_number').hide() : $('#_number').show();
                                            resp.big == '' ? $('#big_letters').hide() : $('#big_letters').show();
                                            resp.symbol == '' ? $('#special_char').hide() : $('#special_char').show();
                                        }
                                    });
                                })
                            })
                        </script>
                    </div>
                    <div class="mb-3">
                        <div class="mb-2">
                            <label for="pasword-confirmation" class="text-[14.5px]">Confirm Password</label>
                        </div>
                        <input type="password" name="password_confirmation" id="password-confirmation" maxlength="50" placeholder="Confirm your password" autocomplete="off" class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
                        <span id="confirm-pass-msg" class="text-xs text-red-700"></span>
                    </div>
                </div>
                <div class="col-span-2 grid grid-cols-1 md:grid-cols-2 gap-x-5 md:mb-20">
                    <div class="mb-4">
                        <div class="mb-2">
                            <label for="platenumber" class="text-[14.5px]">Plate number</label>
                        </div>
                        <input type="text" name="platenumber" id="platenumber" maxlength="8" placeholder="asd 1234" class="plate_no block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300 mb-1">
                        <span id="plateno-msg" class="block text-xs text-red-700"></span> 
                        <span id="format-plateno-msg" class="block text-xs text-red-700"></span> 
                        <span id="similar-plateno-msg" class="block text-xs text-red-700"></span> 
                    </div>
                    <div class="mb-4">
                        <div class="mb-2">
                            <label for="brand" class="text-[14.5px]">Car Brand</label>
                        </div>
                        <input type="text" name="brand" id="brand" maxlength="50" placeholder="Ford" class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300 mb-1">
                        <span id="brand-msg" class="block text-xs text-red-700"></span>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2">
                            <label for="model" class="text-[14.5px]">Model</label>
                        </div>
                        <input type="text" name="model" id="model" maxlength="50" list="modellist" placeholder="1908" autocomplete="off" class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
                        <datalist id="modellist"></datalist>
                        <span id="model-msg" class="text-xs text-red-700"></span>
                    </div>
                    <div class="mb-3">
                        <div class="mb-2">
                            <label for="car type" class="text-[14.5px]">Car Type</label>
                        </div>
                        <select name="cartype" id="cartype" class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
                            <option value="" selected hidden>Select car type</option>
                            <option value="Automatic">Automatic</option>
                            <option value="Manual">Manual</option>
                        </select>
                        <span id="cartype-msg" class="text-xs text-red-700"></span>
                    </div>
                    <div class="mb-3">
                        <div class="mb-2">
                            <label for="fuel type" class="text-[14.5px]">Fuel Type</label>
                        </div>
                        <select name="fueltype" id="fueltype" class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
                            <option value="" selected hidden>Select fuel type</option>
                            <option value="Gas">Gas</option>
                            <option value="Diesel">Diesel</option>
                        </select>
                        <span id="fueltype-msg" class="text-xs text-red-700"></span>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2">
                            <label for="color" class="text-[14.5px]">Color</label>
                        </div>
                        <input type="text" name="color" id="color" maxlength="50" placeholder="Red" autocomplete="off" class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
                        <span id="color-msg" class="text-xs text-red-700"></span>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2">
                            <label for="transmission" class="text-[14.5px]">Transmission Type</label>
                        </div>
                        <input type="text" name="transmission" id="transmission" list="translist" maxlength="50" placeholder="..." autocomplete="off" class="block w-full border border-gray-300 bg-gray-50 text-sm p-2 rounded outline-none focus:border-gray-400 focus:ring-4 focus:ring-blue-200 focus:transition focus:duration-300">
                        <datalist id="translist"></datalist> 
                        <span id="transmission-msg" class="text-xs text-red-700"></span>
                    </div>
                </div>
            </div>
            <div class="md:flex gap-5">
                <div class="ml-auto flex items-center">
                    <input id="agree" type="checkbox" name="agree" required class="w-4 h-4">
                    <label for="agree" class="ml-2 text-sm text-gray-900 select-none">I've read and agree to the <a href="" class="text-blue-700">terms and service.</a></label>
                </div>
                <div class="text-center my-2">
                    <button type="submit" class="flex items-center justify-center w-full bg-blue-700 text-base text-white hover:bg-blue-500 py-[6px] px-3 rounded transition duration-200">
                        <span id="submit-txt">Sign up</span>
                        <svg id="spinner" hidden class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="flex mt-3 gap-x-2 justify-center items-center text-sm mb-10">
    <p class="text-[14.5px] text-gray-600">Already have account?</p>
    <a href="?vs=login" class="text-blue-700 hover:underline hover:text-blue-600">Sign in</a>
</div>

<!-- Phone -->
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script type="text/javascript">
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
        initialCountry: "ph",
        separateDialCode: true,
    });
    iti.setNumber("+63");

    $('#register-form').submit(function(e) {
        e.preventDefault();
        $('#submit-txt').attr('hidden', '');
        $('#spinner').show();

        grecaptcha.ready(function() {
            grecaptcha.execute('6LdIqu0mAAAAAHKhiSg-EnuA7O3-9EuayBVbUxMv', {
                action: 'submit'
            }).then(function(token) {
                var tok = token;
                $.ajax({
                    url: '?rq=user_register',
                    type: 'POST',
                    data: {
                        recaptcha: token,
                        csrf_token: $('#csrf-token').val(),
                        name: $('#name').val(),
                        email: $('#email').val(),
                        phone: $('#phone').val(),
                        password: $('#password').val(),
                        password_confirmation: $('#password-confirmation').val(),
                        platenumber: $('#platenumber').val(),
                        brand: $('#brand').val(),
                        model: $('#model').val(),
                        cartype: $('#cartype').val(),
                        fueltype: $('#fueltype').val(),
                        color: $('#color').val(),
                        transmission: $('#transmission').val(),
                    },
                    dataType: 'json',
                    success: function(resp) { 
                        if (resp.status == 200) { 
                            console.log('working')
                            window.location.href = '?vs=_/';
                        } else {
                            resp.name ? $('#name-msg').text(`*${resp.name}`) : $('#name-msg').text('');   
                            resp.email ? $('#email-msg').text(`*${resp.email}`) : $('#email-msg').text('');    
                            resp.invalid_email && !resp.email ? $('#invalid-email-msg').text(`*${resp.invalid_email}`) : $('#invalid-email-msg').text('');  
                            resp.similar_email && !resp.email && !resp.invalid_email ? $('#similar-email-msg').text(`*${resp.similar_email}`) : $('#similar-email-msg').text('');  
                            resp.phone ? $('#phone-msg').text(`*${resp.phone}`) : $('#phone-msg').text('');
                            resp.char_phone && !resp.phone ? $('#char-phone-msg').text(`*${resp.char_phone}`) : $('#char-phone-msg').text('');
                            resp.password ? $('#pass-msg').text(`*${resp.password}`) : $('#pass-msg').text('');
                            resp.pass_lenght ? $('#password-format').show() : '';
                            resp.pass_small ? $('#password-format').show() : '';
                            resp.pass_big ? $('#password-format').show() : '';
                            resp.pass_number ? $('#password-format').show() : '';
                            resp.pass_symbol ? $('#password-format').show() : '';
                            resp.confirm_password ? $('#confirm-pass-msg').text(resp.confirm_password) : $('#confirm-pass-msg').text('');
                            resp.plate_no ? $('#plateno-msg').text(`*${resp.plate_no}`) : $('#plateno-msg').text('');
                            resp.plate_no_format && !resp.plate_no ? $('#format-plateno-msg').text(`*${resp.plate_no_format}`) : $('#format-plateno-msg').text('');
                            resp.similar_plate_no && !resp.plate_no && !resp.plate_no_format ? $('#similar-plateno-msg').text(`*${resp.similar_plate_no}`) : $('#similar-plateno-msg').text('');
                            resp.brand ? $('#brand-msg').text(resp.brand) : $('#brand-msg').text('');
                            resp.model ? $('#model-msg').text(resp.model) : $('#model-msg').text('');
                            resp.cartype ? $('#cartype-msg').text(resp.cartype) : $('#cartype-msg').text('');
                            resp.fueltype ? $('#fueltype-msg').text(resp.fueltype) : $('#fueltype-msg').text('');
                            resp.transmission ? $('#transmission-msg').text(resp.transmission) : $('#transmission-msg').text('');
                            resp.color ? $('#color-msg').text(resp.color) : $('#color-msg').text(''); 
                        }

                        $('#submit-txt').removeAttr('hidden');
                        $('#spinner').hide();
                    }
                })
            });
        });
    });

    // $('#brand').on('input', function() {
    //     var model = $(this).val(); 
    //     $.ajax({
    //         method: 'GET',
    //         url: 'https://cars-by-api-ninjas.p.rapidapi.com/v1/cars?limit=100&make=' + model,
    //         headers: {
    //             'X-RapidAPI-Key': '37633832b2msh57b474baeab9e69p1b44bbjsn38f6726378d6',
    //             'X-RapidAPI-Host': 'cars-by-api-ninjas.p.rapidapi.com'
    //         },
    //         contentType: 'application/json',
    //         success: function(resp) { 
    //             var list = '';
    //             resp.forEach(element => {
    //                 list += '<option>'+ element.model +'</option>';
    //             });
    //             $('#modellist').append(list);
    //         },
    //         error: function ajaxError(jqXHR) {
    //             console.error('Error: ', jqXHR.responseText);
    //         }
    //     });
    // }) 
</script>