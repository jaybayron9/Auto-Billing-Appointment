<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h4>
        <center>CERTIFICATE OF EMPLOYMENT </center>
    </h4>
    <br>
    <p>
        <center>
            This is to certify that was an employee of CJCE Auto parts from up to as.
        </center>
    </p>
    <p> 
        <center>
            This certification is being issued by Mr./Ms. <?= $_GET['emp'] ?> for whatever legal purpose it may serve.
        </center>
    </p>
    <p>
        <center>
            Given this day of <?= date('Y-m-d') ?> at 5 General Avenue Corner Road 20, Bahay Toro, Proj 8, Quezon City, 1106 Metro Manila
        </center>
    </p>
    <div class="flex">
        <p class="ml-auto">Admin</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            window.print();
        };

        window.onbeforeprint = function() {
            console.log("Print button clicked");
        };

        window.onafterprint = function() {
            window.close();
        };
    </script>
</body>

</html>