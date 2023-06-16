CREATE TABLE appointment (
    id int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    client_id varchar(250) DEFAULT NULL,
    brand varchar(250) DEFAULT NULL,
    model varchar(250) DEFAULT NULL,
    pms varchar(250) DEFAULT NULL,
    schedule varchar(250) DEFAULT NULL,
    repair varchar(250) DEFAULT NULL,
    time varchar(250) DEFAULT NULL,
    color varchar(250) DEFAULT NULL,
    type varchar(250) DEFAULT NULL,
    status tinyint(4) DEFAULT 0,
    price int(10) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
);

create table employee_info (
    id int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    employee_no varchar(250) DEFAULT NULL,
    name varchar(255) DEFAULT NULL,
    email varchar(255) DEFAULT NULL,
    address varchar(250) DEFAULT NULL,
    password varchar(255) DEFAULT NULL,
    access varchar(255) DEFAULT NULL,
    mobile_no varchar(250) DEFAULT NULL,
    nationality varchar(250) DEFAULT NULL,
    gender varchar(250) DEFAULT NULL,
    position varchar(250) DEFAULT NULL,
    age varchar(250) DEFAULT NULL,
    dateofbirth varchar(250) DEFAULT NULL,
    placeofbirth varchar(250) DEFAULT NULL,
    datestarted varchar(250) DEFAULT NULL,
    status tinyint(4) DEFAULT 0,
    lastday varchar(250) DEFAULT NULL,
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

CREATE TABLE client_info (
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