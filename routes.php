<?php

return [
    '' => view(),
    '404' => view('auth', '404'),
    '?admin' => view('admin'),
    '?emp' => view('employee'),
    '?client' => view('client'),
    'developers' => view('', 'developers'),

    // Admin
    'employees' => view('admin', 'employees'),
    'schedules' => view('admin/schedules'),
    'approved' => view('admin/schedules', 'approved'),
    'walk-in' => view('admin/schedules', 'walk-in'),
    'reports' => view('admin', 'reports'),
    'pms' => view('admin/pms'),
    'pms-i' => view('admin/pms', 'pms'),
    'repairs' => view('admin/repairs'),
    'repair-service' => view('admin/repairs', 'repairs'),
    'user-settings' => view('admin', 'user-settings'),
    'backup' => view('admin', 'backup'),
    'history' => view('admin', 'history'),
    'payments' => view('admin', 'payments'),

    // client
    'client' => view('client'),
    'appointments' => view('client', 'appointments'),
    'inbox' => view('client', 'inbox'),
    'report-status' => view('client', 'report-status'),
    'service-history' => view('client', 'service-history'),
    'car-list' => view('client', 'car-list'),
];