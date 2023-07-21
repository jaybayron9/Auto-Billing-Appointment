CREATE TABLE `administrators` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO administrators VALUES ('1','admin@gmail.com','admin','Admin','','2023-06-20 18:35:16','2023-06-20 18:35:16');
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
INSERT INTO admins VALUES ('1','Admin One','09204512312212','jaybayron400@gmail.com','','','$2y$10$NQUspJMdMsNrN587juuJFuABq2R1uGwYKoSY3hIbJY9/sBxT3BdVi','','uploads/64b91102cf6cc.png','1','2023-07-19 13:37:20','2023-07-20 18:48:34');
CREATE TABLE `appointments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(250) DEFAULT NULL,
  `car_id` varchar(250) DEFAULT NULL,
  `emp_id` varchar(250) DEFAULT NULL,
  `pms` varchar(250) DEFAULT NULL,
  `repair` varchar(250) DEFAULT NULL,
  `description` longtext NOT NULL,
  `schedule` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
INSERT INTO appointments VALUES ('17','89','24','','100KM','Brake','','2023-07-26T07:58','accepted','','2023-07-20 16:56:04','2023-07-21 13:43:00');
INSERT INTO appointments VALUES ('18','89','24','','120KM','Engine','','2021-03-01T04:18','accepted','','2023-07-20 16:59:03','2023-07-21 13:43:00');
INSERT INTO appointments VALUES ('19','89','21','','90KM','Brake','','2023-01-18T09:31','pending','','2023-07-21 14:28:12','2023-07-21 14:28:12');
CREATE TABLE `cars` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(250) DEFAULT NULL,
  `plate_no` varchar(250) DEFAULT NULL,
  `car_brand` varchar(250) DEFAULT NULL,
  `car_model` varchar(250) DEFAULT NULL,
  `car_type` varchar(250) DEFAULT NULL,
  `fuel_type` varchar(250) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `trans_type` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
INSERT INTO cars VALUES ('21','89','asd1234','Kawasaki','1233','automatic','fuel','Aliquam cumque dolore temporibus porro sint quidem','sdfsdf','2023-07-20 00:26:28','2023-07-20 15:01:25');
INSERT INTO cars VALUES ('22','1','asd 1234','Est sit nemo totam','Quia nobis fugiat pr','Manual','Diesel','Consequuntur delectu','Enim ut pariatur Id','2023-07-20 15:07:26','2023-07-20 15:07:26');
INSERT INTO cars VALUES ('23','89','ass 1223','Qui nemo est quibusd','Fugiat et nulla per','Automatic','Diesel','Repudiandae et quide','Ut ut nobis aliqua ','2023-07-20 15:41:15','2023-07-20 15:41:15');
INSERT INTO cars VALUES ('24','89','cvx 2312','Esse id fugiat laud','Nisi at tenetur mole','Automatic','Gas','Aspernatur ut except','Et ratione ad lorem ','2023-07-20 15:42:37','2023-07-20 15:42:37');
INSERT INTO cars VALUES ('25','89','cvc 1232','Sit sit ut adipisi','Laudantium beatae i','Manual','Diesel','Amet est atque ab ','Iusto est et nostru','2023-07-20 15:43:01','2023-07-20 15:43:01');
CREATE TABLE `clients` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `access` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
CREATE TABLE `employees` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(250) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
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
  `access` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO employees VALUES ('1','','electrician','electrician@gmail.com','asd','123','12312312312','','Female','Electrician','22','2023-06-28','asdf','2023-06-30','employed','','','2023-06-24 17:32:39','2023-06-24 17:32:39');
CREATE TABLE `payments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `total_due` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `pms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ps` varchar(250) DEFAULT NULL,
  `qty` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
INSERT INTO pms VALUES ('1','5KM','101','1234','pms15');
INSERT INTO pms VALUES ('2','10KM','12','2221','pms20');
INSERT INTO pms VALUES ('3','30KM','2','32','pms30');
INSERT INTO pms VALUES ('4','40KM','222','1234','pms40');
INSERT INTO pms VALUES ('5','80KM','11','1232','pms80');
INSERT INTO pms VALUES ('6','90KM','21','222','pms90');
INSERT INTO pms VALUES ('7','100KM','22','212','pms100');
INSERT INTO pms VALUES ('8','120KM','12','222','pms120');
CREATE TABLE `repair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ps` varchar(250) DEFAULT NULL,
  `qty` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
INSERT INTO repair VALUES ('1','Engine','1','1000','engine');
INSERT INTO repair VALUES ('2','wheel','1','800','wheel');
INSERT INTO repair VALUES ('3','Oxygen','1','2000','oxygen');
INSERT INTO repair VALUES ('4','Brake','1','550','brake');
INSERT INTO repair VALUES ('5','Transmission','1','880','trans');
INSERT INTO repair VALUES ('6','Clutch','1','900','clutch');
INSERT INTO repair VALUES ('7','radiator','1','2000','radiator');
INSERT INTO repair VALUES ('8','multi-inspection','1','0','');
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(250) DEFAULT NULL,
  `quantity` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
INSERT INTO services VALUES ('1','Engine','1','1200','engine','2023-06-25 00:06:02','2023-06-25 00:06:02');
INSERT INTO services VALUES ('2','wheel','1','880','wheel','2023-06-25 00:06:02','2023-06-25 00:06:02');
INSERT INTO services VALUES ('3','Oxygen','1','500','oxygen','2023-06-25 00:06:02','2023-06-25 00:06:02');
INSERT INTO services VALUES ('4','Brake','1','900','brake','2023-06-25 00:06:02','2023-06-25 00:06:02');
INSERT INTO services VALUES ('5','Transmission','1','1500','trans','2023-06-25 00:06:02','2023-06-25 00:06:02');
INSERT INTO services VALUES ('6','Clutch','1','480','clutch','2023-06-25 00:06:02','2023-06-25 00:06:02');
INSERT INTO services VALUES ('7','radiator','1','700','radiator','2023-06-25 00:06:02','2023-06-25 00:06:02');
CREATE TABLE `supports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
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
INSERT INTO supports VALUES ('1','Support One','','jaybayron400@gmail.com','','','$2y$10$38kHm6f94fRipynrAMEpDOM8/fjfIq0Nhn1cRCj/odXXs7DfVtEyC','','','1','2023-07-19 13:37:20','2023-07-20 14:07:50');
INSERT INTO supports VALUES ('64','Jolene Mccormick','+1 (372) 242-5322','palomyvysa@mailinator.com','','','$2y$10$Hh0I9iJeu8k.RGh30XuXXewi6WKp.TIJJcwzhw0KUvUlMhhYxoRMC','','','1','2023-07-19 15:10:48','2023-07-19 15:10:48');
INSERT INTO supports VALUES ('65','Summer Cobb','+1 (892) 111-9138','kilivuli@mailinator.com','','','$2y$10$NrDOUcs6svpH5ziu14nkKe.tgl3Q5mCOSuVaHwaYZ0fAjzenC0Yea','','','1','2023-07-20 21:31:02','2023-07-20 21:31:02');
INSERT INTO supports VALUES ('66','Donovan Grimes','+1 (619) 372-8762','cexubyg@mailinator.com','','','$2y$10$0PrH5L8ykU1Q8ID8rZPHXOzUL06aQix.Jut/hTrOK87NZH.54Z4cG','','','1','2023-07-20 21:33:55','2023-07-20 21:33:55');
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;
INSERT INTO users VALUES ('89','jay bayron','09123812938','jaybayron400@gmail.com','','','$2y$10$OutD4a0jY01ph7NHcYpRh.tJF.BwjKoYL7e9To3/quo8kh629cfh6','','uploads/64b80ebfeb654.png','1','2023-07-20 00:26:28','2023-07-20 00:26:39');
INSERT INTO users VALUES ('90','user two','','','','','','','','1','2023-07-21 15:01:45','2023-07-21 15:01:45');
INSERT INTO users VALUES ('91','user three','','','','','','','','1','2023-07-21 15:01:52','2023-07-21 15:01:52');
CREATE TABLE `walkin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `repair` varchar(250) DEFAULT NULL,
  `brand` varchar(250) DEFAULT NULL,
  `model` varchar(250) DEFAULT NULL,
  `schedule` varchar(250) DEFAULT NULL,
  `time` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO walkin VALUES ('1','Amos Levine','tacypy@mailinator.com','Magni commodo autem ','Transmission','Nulla ullamco sapien','Quibusdam eveniet d','2012-11-19T19:54','','+1 (185) 499-7252','2023-07-21 14:02:07','2023-07-21 14:02:07');
