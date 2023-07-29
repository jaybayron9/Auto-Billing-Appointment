// $(function() {
//   setLocation = [ <?php echo $lat; ?> , <?php echo $lon; ?> ];
//   var map = L.map('MapBox').setView(setLocation, 14);
//   L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
//       attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
//   }).addTo(map);
//   map.attributionControl.setPrefix(false);
//   var marker = new L.marker(setLocation, {
//       draggable: false
//   });
//   map.addLayer(marker);
// })