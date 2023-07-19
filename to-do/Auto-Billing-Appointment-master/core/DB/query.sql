-- Active: 1666468590274@@127.0.0.1@3306@cjce
CREATE TABLE administrators (
    id int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    email varchar(255) DEFAULT NULL,
    password varchar(255) DEFAULT NULL,
    position varchar(255) DEFAULT NULL,
    access varchar(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
);

CREATE TABLE appointments (
    id int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    client_id varchar(250) DEFAULT NULL,
    car_id varchar(250) DEFAULT NULL,
    emp_id varchar(250) DEFAULT NULL,
    pms varchar(250) DEFAULT NULL,
    repair varchar(250) DEFAULT NULL,
    description longtext NOT NULL,
    schedule varchar(250) DEFAULT NULL,
    status varchar(250) DEFAULT NULL,
    price varchar(250) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
);

create table employees (
    id int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    employee_no varchar(250) DEFAULT NULL,
    name varchar(255) DEFAULT NULL,
    email varchar(255) DEFAULT NULL,
    address varchar(250) DEFAULT NULL,
    password varchar(255) DEFAULT NULL,
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
    access varchar(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
); 

create table cars (
    id int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_id varchar(250) DEFAULT NULL,
    plate_no varchar(250) DEFAULT NULL,
    car_brand varchar(250) DEFAULT NULL,
    car_model varchar(250) DEFAULT NULL,
    car_type varchar(250) DEFAULT NULL,
    fuel_type varchar(250) DEFAULT NULL,
    color varchar(250) DEFAULT NULL,
    trans_type varchar(250) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
);

CREATE TABLE clients (
    id int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name varchar(255) DEFAULT NULL,
    email varchar(255) DEFAULT NULL,
    address varchar(255) DEFAULT NULL,
    phone varchar(255) DEFAULT NULL,
    password varchar(250) DEFAULT NULL,
    access varchar(250) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
);

CREATE TABLE payments (
    id int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name varchar(250) DEFAULT NULL,
    email varchar(250) DEFAULT NULL,
    phone varchar(250) DEFAULT NULL,
    description longtext DEFAULT NULL,
    total_due varchar(250) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
);

CREATE TABLE convo (
    id int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    from_user varchar(255) DEFAULT NULL,
    send_to varchar(255) DEFAULT NULL,
    message longtext DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
);

CREATE TABLE walkin (
    id int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name varchar(250) DEFAULT NULL,
    email varchar(250) DEFAULT NULL,
    address varchar(250) DEFAULT NULL,
    repair varchar(250) DEFAULT NULL,
    brand varchar(250) DEFAULT NULL,
    model varchar(250) DEFAULT NULL,
    schedule varchar(250) DEFAULT NULL,
    time varchar(250) DEFAULT NULL,
    phone varchar(250) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
) ;