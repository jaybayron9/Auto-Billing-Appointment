    <!-- Tailwind JS -->
    <script src="node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="assets/js/sidebar.js"></script>
    <script src="node_modules/flowbite/dist/datepicker.js"></script>
    <!-- Button Animation -->
    <script src="assets/js/btn-animation.js"></script> 
    <!-- validation -->
    <script src="assets/js/validation.js"></script>
    <!-- Auto Slide Animaton -->
    <script src="node_modules/smooth-scroll/dist/smooth-scroll.js"></script> 
    <script type="text/javascript">
        var scroll = new SmoothScroll('a[href*="#"]', {
            speed: 700
        });

        <?php
            if (isset($_SESSION['alert'])) {
                echo "dialog('border-green-600 text-green-700', '" . $_SESSION['alert'] . "')";
            }
        ?>
    </script>
</body>
</html> 