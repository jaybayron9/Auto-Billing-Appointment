    <script src="dashboard/assets/vendors/bootstrap/js/popper.min.js"></script>
    <script src="dashboard/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="dashboard/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="dashboard/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
    <script src="dashboard/assets/vendors/magnific-popup/magnific-popup.js"></script>
    <script src="dashboard/assets/vendors/counter/waypoints-min.js"></script>
    <script src="dashboard/assets/vendors/counter/counterup.min.js"></script>
    <script src="dashboard/assets/vendors/imagesloaded/imagesloaded.js"></script>
    <script src="dashboard/assets/vendors/masonry/masonry.js"></script>
    <script src="dashboard/assets/vendors/masonry/filter.js"></script>
    <script src="dashboard/assets/vendors/owl-carousel/owl.carousel.js"></script>
    <script src='dashboard/assets/vendors/scroll/scrollbar.min.js'></script>
    <script src="dashboard/assets/js/functions.js"></script>
    <script src="dashboard/assets/vendors/chart/chart.min.js"></script>
    <script src="dashboard/assets/js/admin.js"></script>
    <script src='dashboard/assets/vendors/calendar/moment.min.js'></script>
    <script src='dashboard/assets/vendors/calendar/fullcalendar.js'></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();

            $('#calendar').fullCalendar({

                defaultView: 'month',
                defaultDate: '<?php echo date('Y-m-d') ?>',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    <?php
                        $status = 1;
                        $rows = $model->asdf($status);
                        if (!empty($rows)) {
                            foreach ($rows as $row) {
                            }
                        }
                    ?>
                ],
            });

        });
    </script>
</body>
</html>