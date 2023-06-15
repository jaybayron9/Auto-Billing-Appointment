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