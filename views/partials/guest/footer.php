    <!-- Vendor JS Files -->
	<!-- <script src="client/assets/vendor/purecounter/purecounter.js"></script> -->
	<script src="client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="client/assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="client/assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="client/assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="client/assets/js/main.js"></script>
    <script type="text/javascript">
        $(function() {
			setLocation = [13.80576, 120.996007];
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