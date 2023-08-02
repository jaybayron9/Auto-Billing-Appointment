<?php

return [
    // HTTP Error Response Page
    '403'    => view('errors', '403'),
    '404'    => view('errors', '404'),

    // Guest Home Page
    ''      => view(), 

    // Admin Authorization
    '_admin'                   => view('accts/admin/lock', 'login'),
    '_admin/forgot_password'   => view('accts/admin/lock', 'forgot-pass'),
    '_admin/reset_password'    => view('accts/admin/lock', 'reset-pass'),
    // 
    '_admin/'                  => view('accts/admin/unlock'),
    '_admin/profile'           => view('accts/admin/unlock/settings', 'profile'),
    '_admin/system'            => view('accts/admin/unlock/settings', 'system'),
    '_admin/users'             => view('accts/admin/unlock', 'users'),
    '_admin/supports'          => view('accts/admin/unlock', 'supports'),
    '_admin/inbox'             => view('accts/admin/unlock', 'inbox'), 
    '_admin/pendings'          => view('accts/admin/unlock', 'pendings'), 
    '_admin/confirmed'         => view('accts/admin/unlock', 'confirmed'), 
    '_admin/walkin'            => view('accts/admin/unlock', 'walkin'), 
    '_admin/transact'          => view('accts/admin/unlock', 'transact'), 
    '_admin/pms'               => view('accts/admin/unlock', 'pms'), 
    '_admin/services'          => view('accts/admin/unlock', 'services'), 
    '_admin/resigned'          => view('accts/admin/unlock', 'resigned'), 
    '_admin/serv_his'          => view('accts/admin/unlock', 'history'), 

    // Support Authorization
    '_sup'                     => view('accts/support/lock', 'login'),
    '_sup/forgot_password'     => view('accts/support/lock', 'forgot-pass'),
    '_sup/reset_password'      => view('accts/support/lock', 'reset-pass'),
    //
    '_sup/'                    => view('accts/support/unlock'),
    '_sup/profile'             => view('accts/support/unlock/settings', 'profile'),
    '_sup/system'              => view('accts/support/unlock/settings', 'system'),
    '_sup/job_order'           => view('accts/support/unlock', 'joborder'),
    '_sup/serv_his'            => view('accts/support/unlock', 'servhis'), 
    '_sup/inbox'               => view('accts/support/unlock', 'inbox'), 
    '_sup/service'             => view('accts/support/unlock', 'estimator'), 

    // Users Authorization
    'login'                    => view('accts/user/lock', 'login'),
    'register'                 => view('accts/user/lock', 'register'),
    'forgot_password'          => view('accts/user/lock', 'forgot-pass'),
    'reset_password'           => view('accts/user/lock', 'reset-pass'),
    // 
    '_/'                       => view('accts/user/unlock'),
    '_/profile'                => view('accts/user/unlock/settings', 'profile'),
    'appointments'             => view('accts/user/unlock/', 'appointments'),
    'status'                   => view('accts/user/unlock/', 'status'),
    'history'                  => view('accts/user/unlock/', 'history'),
    'mycar'                    => view('accts/user/unlock/', 'mycar'),
    'receipt'                  => view('', 'receipt'),
];