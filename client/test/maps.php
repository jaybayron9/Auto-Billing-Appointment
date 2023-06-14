
<html lang="en">
    <head>
        <title>Map</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
        <style>
            body {
                background: rgb(73, 234, 188);
            }
            .container {
                background-color: white;
                width: 25rem;
                position: absolute;
                top: 40%;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 1.4rem;
                box-shadow: 1px 5px 5px 0 rgba(0, 0, 0, 0.20);
                border-radius: 0.2rem;
                box-sizing: border-box;
            }
            .container * {
                box-sizing: inherit;
                font-size: inherit;
            }
            .container #MapBox {
                margin-bottom: 0.75rem;
            }
        </style>
    </head>
    <body>

            <div id="MapBox" style="height: 21rem"> </div>

        <script>
            $(function() {
                setLocation = [ 13.80576 , 120.996007 ];
                var map = L.map('MapBox').setView(setLocation, 14);
                L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                map.attributionControl.setPrefix(false);
                var marker = new L.marker(setLocation, {
                    draggable: false
                });
                map.addLayer(marker);
            })
        </script>
    </body>
</html>