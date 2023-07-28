CREATE TABLE `supports` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `phone` varchar(100) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `address` varchar(250) DEFAULT NULL,
    `mobile_no` varchar(250) DEFAULT NULL,
    `nationality` varchar(250) DEFAULT NULL,
    `gender` varchar(250) DEFAULT NULL,
    `position` varchar(250) DEFAULT NULL,
    `age` varchar(250) DEFAULT NULL,
    `dateofbirth` varchar(250) DEFAULT NULL,
    `placeofbirth` varchar(250) DEFAULT NULL,
    `datestarted` varchar(250) DEFAULT NULL,
    `status` varchar(250) DEFAULT 'employed',
    `lastday` varchar(250) DEFAULT NULL, 
    `email_verify_token` varchar(100) DEFAULT NULL,
    `email_verified_at` datetime DEFAULT NULL,
    `password` varchar(255) NOT NULL,
    `password_reset_token` varchar(100) DEFAULT NULL,
    `profile_photo_path` varchar(1000) DEFAULT NULL,
    `access_enabled` tinyint(1) DEFAULT 1,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

CREATE TABLE estimator (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    car_type VARCHAR(50),
    service VARCHAR(100),
    name VARCHAR(100),
    price VARCHAR(50),
    inclusions VARCHAR(100),
    img BLOB, 
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
); 

CREATE TABLE booking_summary (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(11),
    car_id VARCHAR(11),
    appointment_id VARCHAR(11),
    products VARCHAR(1000),
    quantity VARCHAR(11),
    price VARCHAR(300),
    total VARCHAR(250),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);    

CREATE TABLE bussiness_hours(
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    available_time VARCHAR(100),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
); 

CREATE TABLE `appointments` (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id varchar(11) DEFAULT NULL,
    car_id VARCHAR(11) DEFAULT NULL,
    book_summary_id VARCHAR(11) DEFAULT NULL,
    assigned_employee_id VARCHAR(11) DEFAULT NULL,
    service_type_id varchar(20) DEFAULT NULL,
    note varchar(250) NOT NULL,
    schedule_date varchar(30) DEFAULT NULL,
    service_time_id varchar(30) DEFAULT NULL,
    appointment_status varchar(20) DEFAULT 'Pending',
    payment_status varchar(20) DEFAULT 'Pending',
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);    

create table services (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) DEFAULT NULL, 
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

CREATE TABLE `walkin` (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(250) DEFAULT NULL,
    email varchar(250) DEFAULT NULL,
    phone varchar(250) DEFAULT NULL,
    address varchar(250) DEFAULT NULL,
    service_id varchar(250) DEFAULT NULL,
    brand varchar(250) DEFAULT NULL,
    model varchar(250) DEFAULT NULL,
    schedule_date varchar(250) DEFAULT NULL,
    service_time_id varchar(250) DEFAULT NULL,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
); 