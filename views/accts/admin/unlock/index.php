<?php include view('accts/admin/unlock', 'head.auth') ?> 
<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<script src='assets/js/fullcallendar.min.js'></script>
<script type="text/javascript"> 
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'listYear',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'listYear,dayGridMonth',
            },
            height: 'auto',   
            eventSources: [
                {
                    url: '?admin_rq=todays_appointments',
                    type: 'POST',
                    success: function(resp) { 
                        var events = []; 
                        for (var i = 0; i < resp.length; i++) {
                            events.push({
                                title: `${resp[i].available_time} | ${resp[i].plate_no}`,
                                start: resp[i].schedule_date, 
                            });
                        } 
                        calendar.setOption('events', events); 
                    }
                },
            ], 
        });
        calendar.render(); 
    }); 
</script> 

<main id="main-content" class="relative overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 my-[80px]">
        <div class="p-5 mt-6 lg:mt-0 rounded shadow bg-white h-screen overflow-auto">
            <h1 class="font-bold text-3xl font-sans mb-3 text-center">Welcome back!</h1>
            <div id="calendar"></div>
        </div>
    </div>
</main> 