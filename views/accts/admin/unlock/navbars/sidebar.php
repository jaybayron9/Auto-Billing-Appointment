<aside id="sidebar" class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width" aria-label="Sidebar">
    <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 space-y-2">
                    <li>
                        <a href="?vs=_admin/" class="<?= urlIs('vs=_admin/') ? 'bg-gray-100 shadow border border-gray-300' : '' ?> flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md group font-semibold text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?= urlIs('vs=_admin/') ? 'text-gray-900' : 'text-gray-500' ?> group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>  
                    <li>
                        <button type="button" class="<?= urlIs('vs=_admin/pendings') || urlIs('vs=_admin/confirmed') || urlIs('vs=_admin/walkin') ? 'bg-gray-100 shadow border border-gray-300' : '' ?> flex w-full items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md group font-semibold text-sm" aria-controls="appointments" data-collapse-toggle="appointments">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Appointments</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                            </svg> 
                        </button>
                        <ul id="appointments" class="<?= urlIs('vs=_admin/pendings') || urlIs('vs=_admin/confirmed') || urlIs('vs=_admin/walkin') ? ' ' : 'hidden' ?> py-2 space-y-2">
                            <li>
                                <a href="?vs=_admin/pendings" class="<?= urlIs('vs=_admin/pendings') ? 'shadow border border-gray-200' : '' ?> flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-md pl-11 group hover:bg-gray-100 text-sm">Pendings</a>
                            </li>
                            <li>
                                <a href="?vs=_admin/confirmed" class="<?= urlIs('vs=_admin/confirmed') ? 'shadow border border-gray-200' : '' ?> flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-sm">Confirmed</a>
                            </li>
                            <li>
                                <a href="?vs=_admin/walkin" class="<?= urlIs('vs=_admin/walkin') ? 'shadow border border-gray-200' : '' ?> flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 text-sm">Walk-in</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?vs=_admin/transact" class="<?= urlIs('vs=_admin/transact') ? 'bg-gray-100 shadow border border-gray-300' : '' ?> flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md group font-semibold text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?= urlIs('vs=_admin/') ? 'text-gray-900' : 'text-gray-500' ?> group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="ml-3">Transactions</span>
                        </a>
                    </li>
                    <li>
                        <a href="?vs=_admin/pms" class="<?= urlIs('vs=_admin/pms') ? 'bg-gray-100 shadow border border-gray-300' : '' ?> flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md group font-semibold text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?= urlIs('vs=_admin/pms') ? 'text-gray-900' : 'text-gray-500' ?> group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                            <span class="ml-3">PMS</span>
                        </a>
                    </li>
                    <li>
                        <a href="?vs=_admin/services" class="<?= urlIs('vs=_admin/services') ? 'bg-gray-100 shadow border border-gray-300' : '' ?> flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md group font-semibold text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?= urlIs('vs=_admin/services') ? 'text-gray-900' : 'text-gray-500' ?> group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
                            </svg>
                            <span class="ml-3">Services</span>
                        </a>
                    </li> 
                    <li>
                        <a href="?vs=_admin/serv_his" class="<?= urlIs('vs=_admin/serv_his') ? 'bg-gray-100 shadow border border-gray-300' : '' ?> flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md group font-semibold text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?= urlIs('vs=_admin/serv_his') ? 'text-gray-900' : 'text-gray-500' ?> group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="ml-3">Service History</span>
                        </a>
                    </li>
                    <li>
                        <a href="?vs=_admin/inbox" class="<?= urlIs('vs=_admin/inbox') ? 'bg-gray-100 shadow border border-gray-300' : '' ?> flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md group font-semibold text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?= urlIs('vs=_admin/inbox') ? 'text-gray-900' : 'text-gray-500' ?> group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <span class="ml-3">Inbox</span>
                        </a>
                    </li>
                </ul>
                <div class="pt-2 space-y-2">
                    <a href="?vs=_admin/supports" class="<?= urlIs('vs=_admin/supports') || urlIs('vs=_admin/resigned') ? 'bg-gray-100 shadow border border-gray-300' : '' ?> flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md group font-semibold text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?= urlIs('vs=_admin/supports') || urlIs('vs=_admin/resigned') ? 'text-gray-900' : 'text-gray-500' ?> group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="ml-3">Employees</span>
                    </a>
                    <a href="?vs=_admin/users" class="<?= urlIs('vs=_admin/users') ? 'bg-gray-100 shadow border border-gray-300' : '' ?> flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-md group font-semibold text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?= urlIs('vs=_admin/users') ? 'text-gray-900' : 'text-gray-500' ?> group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="ml-3">Users</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside>

<div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>