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

CREATE TABLE gas (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    service VARCHAR(100),
    name VARCHAR(100),
    price VARCHAR(50),
    inclusions VARCHAR(100),
    img BLOB, 
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
);

CREATE TABLE diesel (
    id int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    service VARCHAR(100),
    name VARCHAR(100),
    price VARCHAR(50),
    inclusions VARCHAR(100),
    img BLOB, 
    created_at timestamp NOT NULL DEFAULT current_timestamp(),
    updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
);


