CREATE TABLE admins (
    id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) DEFAULT NULL,
    phone varchar(100) DEFAULT NULL,
    email varchar(255) DEFAULT NULL UNIQUE,
    email_verify_token varchar(100) DEFAULT NULL,
    email_verified_at datetime DEFAULT NULL,
    password varchar(255) NOT NULL,
    password_reset_token varchar(100) DEFAULT NULL,
    profile_photo_path varchar(1000) DEFAULT NULL,
    account_role VARCHAR(20) DEFAULT 'Admin',
    access_enabled tinyint(1) DEFAULT 1,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);

CREATE TABLE supports (
    id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) DEFAULT NULL,
    phone varchar(100) DEFAULT NULL,
    email varchar(255) DEFAULT NULL UNIQUE,
    address varchar(250) DEFAULT NULL,
    mobile_no varchar(250) DEFAULT NULL,
    nationality varchar(250) DEFAULT NULL,
    gender varchar(250) DEFAULT NULL,
    position varchar(250) DEFAULT NULL,
    age varchar(250) DEFAULT NULL,
    dateofbirth varchar(250) DEFAULT NULL,
    placeofbirth varchar(250) DEFAULT NULL,
    datestarted varchar(250) DEFAULT NULL,
    status varchar(250) DEFAULT 'employed',
    lastday varchar(250) DEFAULT NULL, 
    email_verify_token varchar(100) DEFAULT NULL,
    email_verified_at datetime DEFAULT NULL,
    password varchar(255) NOT NULL,
    password_reset_token varchar(100) DEFAULT NULL,
    profile_photo_path varchar(1000) DEFAULT NULL,
    account_role VARCHAR(20) DEFAULT 'Employee',
    access_enabled tinyint(1) DEFAULT 1,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);

CREATE TABLE users (
    id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) DEFAULT NULL,
    phone varchar(100) DEFAULT NULL,
    email varchar(255) DEFAULT NULL UNIQUE,
    email_verify_token varchar(100) DEFAULT NULL,
    email_verified_at datetime DEFAULT NULL,
    password varchar(255) NOT NULL,
    password_reset_token varchar(100) DEFAULT NULL,
    profile_photo_path varchar(1000) DEFAULT NULL,
    account_role VARCHAR(20) DEFAULT 'Customer',
    access_enabled tinyint(1) DEFAULT 1,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);

drop table users;
drop table supports;
drop table admins;

CREATE TABLE estimator (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    car_type VARCHAR(50),
    service VARCHAR(100),
    name VARCHAR(100),
    price VARCHAR(50),
    inclusions VARCHAR(100),
    img BLOB, 
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
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
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);     
drop table `booking_summary`;

CREATE TABLE bussiness_hours(
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    available_time VARCHAR(100),
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
); 

CREATE TABLE appointments (
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
    payment_status varchar(20) DEFAULT 'Unpaid',
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);    
drop table `appointments`;


create table services (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(50) DEFAULT NULL, 
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

CREATE TABLE walkin (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(50) DEFAULT NULL,
    email varchar(50) DEFAULT NULL,
    phone varchar(20) DEFAULT NULL,
    address varchar(100) DEFAULT NULL,
    plate_no VARCHAR(10)  DEFAULT NULL,
    service_id varchar(11) DEFAULT NULL,
    brand varchar(50) DEFAULT NULL,
    model varchar(50) DEFAULT NULL,
    schedule_date varchar(250) DEFAULT NULL,
    service_time_id varchar(11) DEFAULT NULL,
    appointment_status VARCHAR(20) DEFAULT 'Confirmed',
    payment_status varchar(20) DEFAULT 'Unpaid',
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);   
drop table `walkin`;


CREATE TABLE convo (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    from_user varchar(255) DEFAULT NULL,
    send_to varchar(255) DEFAULT NULL,
    message longtext DEFAULT NULL,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);
drop table convo;

CREATE TABLE payments (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    appointment_id varchar(11) DEFAULT NULL,
    name varchar(250) DEFAULT NULL,
    email varchar(250) DEFAULT NULL,
    phone varchar(250) DEFAULT NULL,
    description longtext DEFAULT NULL,
    total_due varchar(250) DEFAULT NULL,
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

drop table payments;