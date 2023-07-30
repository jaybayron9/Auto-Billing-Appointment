<?php include(view('partials', 'navbar')) ?>

<!-- Google Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js?render=6LdIqu0mAAAAAHKhiSg-EnuA7O3-9EuayBVbUxMv"></script>


<main>
    <section id="home" class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 sm:py-20 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl">CJCE Autoparts</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">Come and experience it for yourself!</p>
                <a href="?vs=login" class="btn inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    Book your car now!
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="assets/storage/system/home.png" alt="mockup" class="h-96 w-96">
            </div>
        </div>
    </section>

    <section id="aboutus" class="bg-white dark:bg-gray-900">
        <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <img class="w-full" src="assets/storage/system/about.png" alt="About us">
            <div class="mt-4 md:mt-0">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">What is CJCE Autoparts?</h2>
                <p class="mb-6 font-light text-gray-700 md:text-lg">Our team of skilled technicians, coupled with state of the art equipment, allow us to fulfill this vision. This vision is what we now refer to as the CJCE Way, and it’s something that separates us from every other competitor out there. Curious about the #CJCEWay and what makes it so good? Come and experience it for yourself!</p>
                <a href="?vs=login" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Book your car now!
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section id="pms" class="bg-white dark:bg-gray-900">
        <div data-popover id="package" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-96 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
            <div class="p-3">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3 rounded-l-lg">
                                    Product Summary
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Unit Price
                                </th>
                                <th scope="col" class="px-4 py-3 rounded-r-lg">
                                    SubTotal
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white">
                                    Air Cleaner Filter
                                </th>
                                <td class="px-4 py-4">
                                    3
                                </td>
                                <td class="px-4 py-4">
                                    1,200.00
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white">
                                    Air Cleaner Filter
                                </th>
                                <td class="px-6 py-4">
                                    3
                                </td>
                                <td class="px-6 py-4">
                                    500.00
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white">
                                    Engine Oil and Oil Filter
                                </th>
                                <td class="px-6 py-4">
                                    3
                                </td>
                                <td class="px-6 py-4">
                                    2200.00
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="font-semibold text-gray-900 dark:text-white">
                                <th scope="row" class="px-6 py-3 text-base">Total</th>
                                <td class="px-6 py-3"></td>
                                <td class="px-6 py-3">3,900.00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div data-popper-arrow></div>
        </div>
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Preventive Repair Maintenance</h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Do we have the service that you're looking for?</p>
            </div>
            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <?php
                $pmsData = ['5KM', '10KM', '30KM', '40KM', '80KM', '90KM', '100KM', '120KM'];
                for ($i = 0; $i < count($pmsData); $i++) {
                ?>
                    <div data-popover-target="package" data-popover-trigger="click" class="hover:cursor-pointer hover:bg-gray-200 border border-gray-300 rounded-md shadow text-center text-gray-500 dark:text-gray-400 p-2">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-md" src="assets/storage/pms/tool-box.png" alt="pms">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <?= $pmsData[$i] ?>
                        </h3>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="repair" class="bg-white dark:bg-gray-900">
        <div data-popover id="package" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-96 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
            <div class="p-3">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3 rounded-l-lg">
                                    Item
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-4 py-3 rounded-r-lg">
                                    Amount
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white">
                                    Oil Seal
                                </th>
                                <td class="px-4 py-4">
                                    4
                                </td>
                                <td class="px-4 py-4">
                                    2,600.0
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white">
                                    Timing Belt
                                </th>
                                <td class="px-6 py-4">
                                    1
                                </td>
                                <td class="px-6 py-4">
                                    1,900.00
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white">
                                    Balancer Belt
                                </th>
                                <td class="px-6 py-4">
                                    1
                                </td>
                                <td class="px-6 py-4">
                                    2,500.00
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="font-semibold text-gray-900 dark:text-white">
                                <th scope="row" class="px-6 py-3 text-base">Total</th>
                                <td class="px-6 py-3"></td>
                                <td class="px-6 py-3">8,500.00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div data-popper-arrow></div>
        </div>
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Repair Services</h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Do we have the service that you're looking for?</p>
            </div>
            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <?php
                $pmsData = ['Timing Beld Replacement', 'Engine Repair', 'Wheel Alignment', 'Oxygen Sensor Replacement', 'Brake Work', 'Transmission Overhaul', 'Clutch Lining Replacement', 'Radiator Replacement '];
                for ($i = 0; $i < count($pmsData); $i++) {
                ?>
                    <div data-popover-target="package" data-popover-trigger="click" class="hover:cursor-pointer hover:bg-gray-200 border border-gray-300 rounded-md shadow text-center text-gray-500 dark:text-gray-400 p-2">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-md" src="assets/storage/pms/wrench.png" alt="pms">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <?= $pmsData[$i] ?>
                        </h3>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="contact" class="bg-white py-6 dark:bg-gray-800 dark:text-gray-50 h-screen">
        <div class="grid max-w-6xl grid-cols-1 px-6 mx-auto lg:px-8 md:grid-cols-2 md:divide-x mt-10">
            <div class="py-6 md:py-0 md:px-6">
                <h1 class="text-4xl font-bold  mb-4">Get in touch</h1>
                <div class="space-y-4 ">
                    <p class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 sm:mr-6">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>5 General Avenue Corner Road 20, Bahay Toro, Proj8 Quezon city, 1106 Metro manila</span>
                    </p>
                    <p class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 sm:mr-6">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                        </svg>
                        <span>0932 747 1796</span>
                    </p>
                    <p class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 sm:mr-6">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                        <span>cjceatoparts@gmail.com</span>
                    </p>
                </div>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d247024.37266269384!2d120.9665709!3d14.6697939!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b6dc63a40457%3A0x9afcfad79681216c!2s5%20General%20Ave%2C%20Project%208%2C%20Quezon%20City%2C%201106%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1689766969876!5m2!1sen!2sph" style="border:20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full" height="400px"></iframe>
        </div>
    </section>

    <section id="developers" class="py-6 dark:bg-gray-800 dark:text-gray-100">
        <div class="container flex flex-col items-center justify-center p-4 mx-auto sm:p-10">
            <p class="p-2 text-sm font-medium tracking-wider text-center uppercase">Development team</p>
            <h1 class="text-4xl font-bold leading-none text-center sm:text-5xl">The talented people behind the scenes</h1>
            <div class="flex flex-row flex-wrap-reverse justify-center mt-8">
                <div class="flex flex-col justify-center w-full px-8 mx-6 my-12 text-center rounded-md md:w-96 lg:w-80 xl:w-64 dark:bg-gray-100">
                    <img alt="singco" class="self-center flex-shrink-0 w-24 h-24 -mt-12 bg-center bg-cover rounded-full dark:bg-gray-500" src="assets/storage/developers/singco.jpg">
                    <div class="flex-1 my-4">
                        <p class="text-xl font-semibold leading-snug">Sean Brad Sinco</p>
                        <p>Front-end Developer</p><br>
                        <p>Responsible for implementing the visual components that users of a web application see and interact with. Typically, back-end web engineers support them</p>
                    </div>
                    <div class="flex items-center justify-center p-3 space-x-3 border-t-2">
                        <a href="https://www.facebook.com/lelekum" class="text-gray-900 hover:text-gray-800 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <p class="text-xs text-gray-600">singco.seanbrad@ue.edu.ph</p>
                    </div>
                </div>
                <div class="flex flex-col justify-center w-full px-8 mx-6 my-12 text-center rounded-md md:w-96 lg:w-80 xl:w-64 dark:bg-gray-100">
                    <img alt="Daniel Joshua Ting" class="self-center flex-shrink-0 w-24 h-24 -mt-12 bg-center bg-cover rounded-full dark:bg-gray-500" src="assets/storage/developers/ting.jpg">
                    <div class="flex-1 my-4">
                        <p class="text-xl font-semibold leading-snug">Daniel Joshua Ting</p>
                        <p>Front-end Developer</p><br>
                        <p>Responsible for implementing the visual components that users of a web application see and interact with. Typically, back-end web engineers support them</p>
                    </div>
                    <div class="flex items-center justify-center p-3 space-x-3 border-t-2">
                        <a href="https://www.facebook.com/DanielTing.22?mibextid=LQQJ4d" class="text-gray-900 hover:text-gray-800 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <p class="text-xs text-gray-600">Ting.danieljoshuajacob@ue.edu.ph</p>
                    </div>
                </div>
                <div class="flex flex-col justify-center w-full px-8 mx-6 my-12 text-center rounded-md md:w-96 lg:w-80 xl:w-64 dark:bg-gray-100">
                    <img alt="" class="self-center flex-shrink-0 w-24 h-24 -mt-12 bg-center bg-cover rounded-full dark:bg-gray-500" src="assets/storage/developers/manuel.jpg">
                    <div class="flex-1 my-4">
                        <p class="text-xl font-semibold leading-snug">Michael Manuel</p>
                        <p>Front-end Developer</p><br>
                        <p>Responsible for implementing the visual components that users of a web application see and interact with. Typically, back-end web engineers support them</p>
                    </div>
                    <div class="flex items-center justify-center p-3 space-x-3 border-t-2">
                        <a href="https://www.facebook.com/iamjudemichael?mibextid=ZbWKwL" class="text-gray-900 hover:text-gray-800 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <p class="text-xs text-gray-600">Manuel.michael@ue.edu.ph</p>
                    </div>
                </div>
                <div class="flex flex-col justify-center w-full px-8 mx-6 my-12 text-center rounded-md md:w-96 lg:w-80 xl:w-64 dark:bg-gray-100">
                    <img alt="" class="self-center flex-shrink-0 w-24 h-24 -mt-12 bg-center bg-cover rounded-full dark:bg-gray-500" src="assets/storage/developers/leal.jpg">
                    <div class="flex-1 my-4">
                        <p class="text-xl font-semibold leading-snug">Ree Victor Leal</p>
                        <p>VBack-end Developer</p><br>
                        <p>Emphasize databases, back-end logic, APIs, infrastructure, and servers for seamless website performance. Utilize programming to facilitate database communication, storage, and deletion in browsers.</p>
                    </div>
                    <div class="flex items-center justify-center p-3 space-x-3 border-t-2">
                        <a href="https://web.facebook.com/rvtylrll?mibextid=ZbWKwL&_rdc=1&_rdr" class="text-gray-900 hover:text-gray-800 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <p class="text-xs text-gray-600">Leal.reevictor@ue.edu.ph</p>
                    </div>
                </div>
                <div class="flex flex-col justify-center w-full px-8 mx-6 my-12 text-center rounded-md md:w-96 lg:w-80 xl:w-64 dark:bg-gray-100">
                    <img alt="" class="self-center flex-shrink-0 w-24 h-24 -mt-12 bg-center bg-cover rounded-full dark:bg-gray-500" src="assets/storage/developers/tatco.jpg">
                    <div class="flex-1 my-4">
                        <p class="text-xl font-semibold leading-snug">Jethro Tatco</p>
                        <p>Project Manager, Full-stack Developer</p><br>
                        <p>Accountable for the project's day-to-day management and must be skilled in managing its six components, including scope, schedule, finances, risk, quality, and resources.</p>
                    </div>
                    <div class="flex items-center justify-center p-3 space-x-3 border-t-2">
                        <a href="https://www.facebook.com/jethrotatco/" class="text-gray-900 hover:text-gray-800 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <p class="text-xs text-gray-600">Tatco.jethro@ue.edu.ph</p>
                    </div>
                </div>
                <div class="flex flex-col justify-center w-full px-8 mx-6 my-12 text-center rounded-md md:w-96 lg:w-80 xl:w-64 dark:bg-gray-100">
                    <img alt="" class="self-center flex-shrink-0 w-24 h-24 -mt-12 bg-center bg-cover rounded-full dark:bg-gray-500" src="assets/storage/developers/arcilla.jpg">
                    <div class="flex-1 my-4">
                        <p class="text-xl font-semibold leading-snug">John Paulo Arcilla</p>
                        <p>Business Analyst, Programmer</p><br>
                        <p>Assess organizations, aid in system improvements, and maintain, debug, and troubleshoot systems & software to ensure smooth operations.</p>
                    </div>
                    <div class="flex items-center justify-center p-3 space-x-3 border-t-2">
                        <a href="https://www.facebook.com/johnpaulo.arcilla.7?mibextid=ZbWKwL" class="text-gray-900 hover:text-gray-800 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <p class="text-xs text-gray-600">Arcilla.Johnpaulo@ue.edu.ph</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="w-full">
        <div class="px-4 py-6 bg-gray-50 text-center">
            <span class="text-sm text-gray-500 sm:text-center">© 2023 <a href="#home">CJCE™</a>. All Rights Reserved.
            </span>
            <div class="block">
                <a href="?vs=_admin" class="text-sm text-blue-700 underline underline-offset-1 mr-5">Administrator</a>
                <a href="?vs=_sup" class="text-sm text-blue-700 underline underline-offset-1">Employee</a>
            </div>
        </div>
    </div>
</footer>