<?php include(view('auth', 'auth')) ?>

<style type="text/css">
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        background-image: url('assets/images/awdawdad.jpg');
    }

    html {
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    .column {
        float: left;
        width: 25.3%;
        margin-bottom: 16px;
        padding: 0 4px;
        margin-left: 85px;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        margin: 4px;
    }

    img {
        margin-left: 90px;
    }

    .about-section {
        padding: 80px;
        text-align: center;
        background-color: #1960f8;
        color: white;
    }

    .container {
        padding: 0 16px;
    }

    .container::after,
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    .title {
        color: grey;
        text-align: center;
    }

    .button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
    }

    p {
        text-align: left;
    }

    .button:hover {
        background-color: #555;
    }

    h2 {
        text-align: center;
    }

    .desc {
        text-align: center;
    }

    @media screen and (max-width: 650px) {
        .column {
            width: 100%;
            display: block;
        }
    }

    .hidden {
        display: none !important;
    }
</style>

<header id="header" class="fixed-top" style="background-color: #1C4E80;">
    <div class="container d-flex align-items-center">
        <a href="index.php" class="logo"><img src="assets/images/2.png" alt="" class="img-fluid"></a>
        <h1 class="logo me-auto" style="padding-left: 10px;"><a href="index.php">CJCE AUTOPARTS</a></h1>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto hero" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto about" href="#about">About Us</a></li>
                <li><a class="nav-link scrollto services" href="#services">PMS</a></li>
                <li><a class="nav-link scrollto repairs" href="#repairs">Repair</a></li>
                <li><a class="nav-link scrollto developers" href="#sec-developers" id="developers">Developers</a></li>
                <li><a class="nav-link scrollto contact" href="#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <a data-bs-toggle="modal" href="#Login" class="appointment-btn scrollto" style="background-color: grey;">
            <span class="d-none d-md-inline"></span>
            LogIn
        </a>
        <a data-bs-toggle="modal" data-bs-target="#ModalForm" class="appointment-btn scrollto" style="background-color: grey; cursor: pointer;"><span class="d-none d-md-inline">
                Register
        </a>
    </div>
</header>

<div class="modal fade" id="repair" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ATypeModalLabel">REPAIR</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">
                <table id="table" class="table hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Oil Seal</td>
                            <td>4</td>
                            <td>2,600.00</td>
                        </tr>
                        <tr>
                            <td>Timing Belt</td>
                            <td>1</td>
                            <td>1,900.00</td>
                        </tr>
                        <tr>
                            <td>Balancer Belt</td>
                            <td>1</td>
                            <td>2,500.00</td>
                        </tr>
                        <tr>
                            <td>Alternator Belt</td>
                            <td>1</td>
                            <td>1,500.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Total: 8,500.00
                </button>
            </div>
        </div>
    </div>
</div>

<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <img src="assets/images/UPDATED_LOGO.png" style="width: 207%; margin-top: -20px; margin-left: -16px;" alt="">
    </div>
</section>

<section id="sec-developers" class="hidden">
    <div class="about-section">
        <h1>The Developers</h1>
        <p class="desc">Developers are in charge of creating, coding, implementing, and maintaining software systems.</p>
        <p class="desc">They are also known as software developers or computer programmers.</p>
    </div>

    <h2 style="text-align:center">Our Team</h2>
    <div class="row">
        <div class="column">
            <div class="card">
                <img src="assets/images/Tatco.jpg" alt="Jane" style="width:50%; height: 180px;">
                <div class="container">
                    <h2>Jethro Tatco</h2>
                    <p class="title">Project Manager, Full-stack Developer</p>
                    <p>Accountable for the project's day-to-day management and must be skilled in managing its six components, including scope, schedule, finances, risk, quality, and resources.</p><br><br><br>
                    <p>Tatco.jethro@ue.edu.ph</p>
                    <a href="https://www.facebook.com/jethrotatco/">
                        <p><button class="button">Contact</button></p>
                    </a>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="assets/images/Arcilla.jpg" alt="Mike" style="width:50%; height: 180px;">
                <div class="container">
                    <h2>John Paulo Arcilla</h2>
                    <p class="title">Business Analyst, Programmer</p>
                    <p>Evaluate how well organizations are doing and assist the team in making improvements to their systems and processes. To make sure everything is working well, he is also involved in maintaining, debugging, and troubleshooting systems and software.
                    </p>
                    <br>
                    <p>Arcilla.Johnpaulo@ue.edu.ph</p>
                    <a href="https://www.facebook.com/johnpaulo.arcilla.7?mibextid=ZbWKwL">
                        <p><button class="button">Contact</button></p>
                    </a>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="assets/images/Leal.jpg" alt="John" style="width:50%; height: 180px;">
                <div class="container">
                    <h2>Ree Victor Leal</h2>
                    <p class="title">Back-end Developer</p>
                    <p>Focus on databases, back-end logic, application programming interfaces, infrastructure, and servers to guarantee the website operates as intended. They employ programming that facilitates database communication, data storage, and deletion for browsers.
                    </p><br>
                    <p>Leal.reevictor@ue.edu.ph</p>
                    <a href="https://www.facebook.com/rvtylrll?mibextid=ZbWKwL">
                        <p><button class="button">Contact</button></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <img src="assets/images/Singco.jpg" alt="John" style="width:50%; height: 180px;">
                <div class="container">
                    <h2>Sean Brad Sinco</h2>
                    <p class="title">Front-end Developer</p>
                    <p>Responsible for implementing the visual components that users of a web application see and interact with. Typically, back-end web engineers support them</p>
                    <p>singco.seanbrad@ue.edu.ph</p>
                    <a href="https://www.facebook.com/lelekum">
                        <p><button class="button">Contact</button></p>
                    </a>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="assets/images/Ting.jpg" alt="John" style="width:50%; height: 180px;">
                <div class="container">
                    <h2>Daniel Joshua Ting</h2>
                    <p class="title">Front-end Developer</p>
                    <p>Responsible for implementing the visual components that users of a web application see and interact with. Typically, back-end web engineers support them</p>
                    <p>Ting.danieljoshuajacob@ue.edu.ph</p>
                    <a href="https://www.facebook.com/DanielTing.22?mibextid=LQQJ4d">
                        <p><button class="button">Contact</button></p>
                    </a>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="assets/images/Manuel.jpg" alt="John" style="width:50%; height: 180px;">
                <div class="container">
                    <h2>Michael Manuel</h2>
                    <p class="title">Front-end Developer</p>
                    <p>Responsible for implementing the visual components that users of a web application see and interact with. Typically, back-end web engineers support them</p>
                    <p>Manuel.michael@ue.edu.ph</p>
                    <a href="https://www.facebook.com/iamjudemichael?mibextid=ZbWKwL">
                        <p><button class="button">Contact</button></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<main id="main">
    <section id="about" class="about">
        <div class="container-fluid">
            <div class="section-title">
                <h2>About Us</h2>
                <div class="row">
                    <div class="picture col-xl-4 col-lg-4 video-box d-flex justify-content-center align-items-stretch position-relative">
                        <img src="assets/images/about.png" alt="service img">
                    </div>
                    <div class="about-img col-xl-5 col-lg-5 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h3>What is CJCE Autoparts?</h3>
                        <p>Our team of skilled technicians, coupled with state of the art equipment, allow us to fulfill this vision. This vision is what we now refer to as the CJCE Way, and it’s something that separates us from every other competitor out there. Curious about the #CJCEWay and what makes it so good? Come and experience it for yourself!</p>
                    </div>
                </div>
            </div>
    </section>

    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>Preventive Repair Maintenance</h2>
                <p>Do we have the service that you're looking for?</p>
            </div>
            <!-- Aircon Check up -->
            <div class="row">
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="icon-box" style="width: 100%;">
                        <div class="icon"><i class="fas fa-person-chalkboard"></i></div>
                        <h4><a data-bs-toggle="modal" href="#ATypeModal2">5KM</a></h4>

                        <div class="modal fade" id="ATypeModal2" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="table" class="table hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Product Summary</th>
                                                    <th>Unit Price</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Engine Anti-Rust Coolant</td>
                                                    <td>3</td>
                                                    <td>1,200.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Air Cleaner Filter</td>
                                                    <td>3</td>
                                                    <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Engine Oil and Oil Filter</td>
                                                    <td>3</td>
                                                    <td>2,200.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- Aircon Installation -->
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                    <div class="icon-box" style=" width: 100%;">
                        <div class="icon"><i class="fa-solid fa-screwdriver"></i></div>
                        <h4><a data-bs-toggle="modal" href="#ATypeModal">10KM</a></h4>
                        <!-- Aircon Type Modal -->
                        <div class="modal fade" id="ATypeModal" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="table" class="table hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Product Summary</th>
                                                    <th>Unit Price</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Engine Anti-Rust Coolant</td>
                                                    <td>3</td>
                                                    <td>1,200.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Air Cleaner Filter</td>
                                                    <td>3</td>
                                                    <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Engine Oil and Oil Filter</td>
                                                    <td>3</td>
                                                    <td>2,200.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box" style="width: 100%;">
                        <div class="icon"><i class="fas fa-hammer"></i></div>
                        <h4><a data-bs-toggle="modal" href="#ATypeModal1">30KM</a></h4>

                        <div class="modal fade" id="ATypeModal1" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="table" class="table hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Product Summary</th>
                                                    <th>Unit Price</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Engine Anti-Rust Coolant</td>
                                                    <td>3</td>
                                                    <td>1,200.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Air Cleaner Filter</td>
                                                    <td>3</td>
                                                    <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Engine Oil and Oil Filter</td>
                                                    <td>3</td>
                                                    <td>2,200.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box" style=" width: 100%;">
                        <div class="icon"><i class="fas fa-hammer"></i></div>
                        <h4><a data-bs-toggle="modal" href="#ATypeModal3">40KM</a></h4>

                        <div class="modal fade" id="ATypeModal3" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="table" class="table hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Product Summary</th>
                                                    <th>Unit Price</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Engine Anti-Rust Coolant</td>
                                                    <td>3</td>
                                                    <td>1,200.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Air Cleaner Filter</td>
                                                    <td>3</td>
                                                    <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Engine Oil and Oil Filter</td>
                                                    <td>3</td>
                                                    <td>2,200.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box" style="width: 100%;">
                        <div class="icon"><i class="fa-solid fa-spray-can-sparkles"></i></div>
                        <h4><a data-bs-toggle="modal" href="#ATypeModal5">80KM</a></h4>

                        <div class="modal fade" id="ATypeModal5" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="table" class="table hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Product Summary</th>
                                                    <th>Unit Price</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Engine Anti-Rust Coolant</td>
                                                    <td>3</td>
                                                    <td>1,200.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Air Cleaner Filter</td>
                                                    <td>3</td>
                                                    <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Engine Oil and Oil Filter</td>
                                                    <td>3</td>
                                                    <td>2,200.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box" style="width: 100%;">
                        <div class="icon"><i class="fas fa-wrench"></i></div>
                        <h4><a data-bs-toggle="modal" href="#ATypeModal6">90KM</a></h4>

                        <div class="modal fade" id="ATypeModal6" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="table" class="table hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Product Summary</th>
                                                    <th>Unit Price</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Engine Anti-Rust Coolant</td>
                                                    <td>3</td>
                                                    <td>1,200.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Air Cleaner Filter</td>
                                                    <td>3</td>
                                                    <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Engine Oil and Oil Filter</td>
                                                    <td>3</td>
                                                    <td>2,200.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box" style="width: 100%;">
                        <div class="icon"><i class="fas fa-wrench"></i></div>
                        <h4><a data-bs-toggle="modal" href="#ATypeModal7">100KM</a></h4>

                        <div class="modal fade" id="ATypeModal7" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="table" class="table hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Product Summary</th>
                                                    <th>Unit Price</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Engine Anti-Rust Coolant</td>
                                                    <td>3</td>
                                                    <td>1,200.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Air Cleaner Filter</td>
                                                    <td>3</td>
                                                    <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Engine Oil and Oil Filter</td>
                                                    <td>3</td>
                                                    <td>2,200.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box" style="width: 100%;">
                        <div class="icon"><i class="fas fa-wrench"></i></div>
                        <h4><a data-bs-toggle="modal" href="#ATypeModal8">120KM</a></h4>

                        <div class="modal fade" id="ATypeModal8" tabindex="-1" role="dialog" aria-labelledby="ATypeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ATypeModalLabel">PREVENTIVE MAINTENANCE SCHEDULE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="table" class="table hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Product Summary</th>
                                                    <th>Unit Price</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Engine Anti-Rust Coolant</td>
                                                    <td>3</td>
                                                    <td>1,200.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Air Cleaner Filter</td>
                                                    <td>3</td>
                                                    <td>500.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Engine Oil and Oil Filter</td>
                                                    <td>3</td>
                                                    <td>2,200.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Total: 3,900.00</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="repairs" class="services">
        <div class="container">
            <div class="section-title">
                <h2> Repair Services </h2>
                <p>Do we have the service that you're looking for?</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="icon-box" style="width: 100%;">
                        <div class="icon"><i class="fas fa-person-chalkboard"></i></div>
                        <h4><a data-bs-toggle="modal" href="#repair">Timing belt replacement</a></h4>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                    <div class="icon-box" style=" width: 100%;">
                        <div class="icon"><i class="fa-solid fa-screwdriver"></i></div>
                        <h4><a data-bs-toggle="modal" href="#repair">Engine Repair</a></h4>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box" style="width: 100%;">
                        <div class="icon"><i class="fas fa-hammer"></i></div>
                        <h4>
                            <a data-bs-toggle="modal" href="#repair">
                                Wheel Alignment
                            </a>
                        </h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box" style=" width: 100%;">
                        <div class="icon"><i class="fas fa-hammer"></i></div>
                        <h4>
                            <a data-bs-toggle="modal" href="#repair">
                                Oxygen Sensor Replacement
                            </a>
                        </h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box" style="width: 100%;">
                        <div class="icon"><i class="fa-solid fa-spray-can-sparkles"></i></div>
                        <h4>
                            <a data-bs-toggle="modal" href="#repair">
                                Brake Work
                            </a>
                        </h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box" style="width: 100%;">
                        <div class="icon"><i class="fas fa-wrench"></i></div>
                        <h4>
                            <a data-bs-toggle="modal" href="#repair">
                                Transmission Overhaul
                            </a>
                        </h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box" style="width: 100%;">
                        <div class="icon"><i class="fas fa-wrench"></i></div>
                        <h4>
                            <a data-bs-toggle="modal" href="#repair">
                                Clutch Lining Replacement
                            </a>
                        </h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box" style="width: 100%;">
                        <div class="icon"><i class="fas fa-wrench"></i></div>
                        <h4>
                            <a data-bs-toggle="modal" href="#repair">
                                Radiator Replacement
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="appointment" class="appointment section-bg">
        <div class="container"></div>
    </section>

    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contact</h2>
                <p>Get in touch with us!</p>
            </div>
        </div>

        <div id="MapBox" style="height:350px"></div>

        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>5 General Avenue Corner Road 20, Bahay Toro, Proj8 Quezon city,
                                1106 Metro manila</p>
                        </div>
                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>cjceatoparts@gmail.com</p>
                        </div>
                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>0932 747 1796</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>CJCE AUTOPARTS</h3>
                    <p>
                        5 General Avenue Corner Road 20, Bahay Toro, <br>
                        Proj8 Quezon city,
                        1106 Metro manila <br><br>
                        <strong>Phone:</strong> 0932 747 1796<br>
                        <strong>Email:</strong> cjceatoparts@gmail.com<br>
                    </p>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a><br>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="preloader"></div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>

<script type="text/javascript">
    $(function() {
        $('#developers').click(function() {
            $('#sec-developers').removeClass('hidden');
            $('#hero, #about, #repairs, #services, #contact').addClass('hidden');
        });

        $('.hero, .about, .repairs, .services, .contact').click(function() {
            $('#sec-developers').addClass('hidden');
            $('#hero, #about, #repairs, #services, #contact').removeClass('hidden');
        });
    });
</script>