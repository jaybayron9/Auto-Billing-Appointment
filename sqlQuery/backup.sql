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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
INSERT INTO appointments VALUES ('20','89','21','76, 67','80KM','Transmission','','1995-06-17T19:20','Done','','2023-07-22 13:45:24','2023-07-22 18:30:22');
INSERT INTO appointments VALUES ('22','89','23','76, 67','40KM','Transmission','','2020-01-22T16:09','Done','','2023-07-22 14:53:04','2023-07-22 18:30:22');
INSERT INTO appointments VALUES ('23','89','23','76, 67','40KM','Clutch','','1972-03-08T01:00','Underway','','2023-07-22 15:13:44','2023-07-22 20:49:24');
INSERT INTO appointments VALUES ('24','89','24','76, 67','30KM','Clutch','','2015-02-08T23:52','Underway','','2023-07-22 16:52:18','2023-07-22 20:49:24');
INSERT INTO appointments VALUES ('25','89','23','76, 67','80KM','multi-inspection','','2019-05-16T17:54','Underway','','2023-07-22 17:07:37','2023-07-22 20:49:09');
INSERT INTO appointments VALUES ('26','89','25','','40KM','Brake','','2023-07-23T21:23','Cancelled','','2023-07-23 21:24:02','2023-07-23 21:24:09');
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
INSERT INTO cars VALUES ('22','1','asd 1234','Est sit nemo totam','Quia nobis fugiat pr','Manual','Diesel','Consequuntur delectu','Enim ut pariatur Id','2023-07-20 15:07:26','2023-07-20 15:07:26');
INSERT INTO cars VALUES ('24','89','cvx 2312','Esse id fugiat laud','Nisi at tenetur mole','Automatic','Gas','Aspernatur ut except','Et ratione ad lorem ','2023-07-20 15:42:37','2023-07-20 15:42:37');
INSERT INTO cars VALUES ('25','89','cvc 1232','Sit sit ut adipisi','Laudantium beatae i','Manual','Diesel','Amet est atque ab ','Iusto est et nostru','2023-07-20 15:43:01','2023-07-20 15:43:01');
INSERT INTO cars VALUES ('26','89','asd 1234','Perferendis molestia','Deleniti at sit saep','Manual','Diesel','Architecto non id ve','Adipisci nihil inven','2023-07-23 17:47:55','2023-07-23 17:47:55');
INSERT INTO cars VALUES ('27','89','asd 1232','Incididunt tempore ','Consequatur volupta','Manual','Diesel','Sit dolorum consequa','Asperiores neque vel','2023-07-23 17:48:35','2023-07-23 17:48:35');
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
INSERT INTO clients VALUES ('1','jay','jaybayron400@gmail.com','','','password','','2023-07-20 00:29:18','2023-07-22 17:18:41');
CREATE TABLE `convo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `from_user` varchar(255) DEFAULT NULL,
  `send_to` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;
INSERT INTO convo VALUES ('95','89','','asdf','2023-07-21 17:08:22','2023-07-22 00:36:41');
INSERT INTO convo VALUES ('96','89','','Hello','2023-07-21 17:09:37','2023-07-22 00:34:49');
INSERT INTO convo VALUES ('97','89','89','hiii','2023-07-21 17:09:54','2023-07-22 00:34:49');
INSERT INTO convo VALUES ('98','89','89','helll','2023-07-21 17:10:32','2023-07-22 00:36:19');
INSERT INTO convo VALUES ('99','89','1','asdf','2023-07-22 01:01:13','2023-07-22 01:01:13');
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
CREATE TABLE `estimator` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `car_type` varchar(50) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `inclusions` varchar(100) DEFAULT NULL,
  `img` blob DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

INSERT INTO estimator VALUES ('1','1','1','PMS GAS REGULAR EXPRESS','1500','4L Oil, Oil Filter','','2023-07-23 19:02:14','2023-07-23 19:09:14');
INSERT INTO estimator VALUES ('2','1','1','PMS GAS REGULAR PLUS','2450','4L Oil, Oil Filter, Spark Plugs, tire Rotation','','2023-07-23 19:02:23','2023-07-23 19:09:14');
INSERT INTO estimator VALUES ('3','1','1','PMS GAS REGULAR PREMIUM','3650','4L Oil,Oil Filter, Spark Plugs,Engine Flush, Air Filter','','2023-07-23 19:02:23','2023-07-23 19:09:14');
INSERT INTO estimator VALUES ('4','1','1','PMS GAS SEMI- SYNTHETIC EXPRESS','2250','4L Oil,Oil Filter','','2023-07-23 19:02:23','2023-07-23 19:09:14');
INSERT INTO estimator VALUES ('5','1','1','PMS GAS SEMI-SYNTHETIC PLUS','3200','4L Oil, Oil Filter, Spark Plugs,T ire Rotation','','2023-07-23 19:05:45','2023-07-23 19:09:14');
INSERT INTO estimator VALUES ('6','1','1','PMS GAS SEMI-SYNTHETIC PREMIUM','4400','4L Oil, Oil Filter, Spark Plugs, Air Filter, Engine Flush','','2023-07-23 19:05:45','2023-07-23 19:09:14');
INSERT INTO estimator VALUES ('7','1','1','PMS GAS SYNTHETIC EXPRESS','3250','4L Oil,Oil Filter','','2023-07-23 19:05:45','2023-07-23 19:09:14');
INSERT INTO estimator VALUES ('8','1','1','PMS GAS SYNTHETIC PLUS','4200','4L Oil, Oil Filter, Spark Plugs, Tire Rotation','','2023-07-23 19:05:45','2023-07-23 19:09:14');
INSERT INTO estimator VALUES ('9','1','1','PMS GAS SYNTHETIC PREMIUM','5400','4L Oil, Oil Filter, Spark Plugs, Air Filter, Engine Flush','','2023-07-23 19:05:45','2023-07-23 19:09:14');
INSERT INTO estimator VALUES ('10','1','2','Multi-point Inspection','0','Rapide\'s famous FREE multi-point inspection includes physical observation of all core vehicle compon','','2023-07-23 19:15:52','2023-07-23 19:15:52');
INSERT INTO estimator VALUES ('11','1','2','ATF Flushing','2850','','','2023-07-23 19:15:52','2023-07-23 19:15:52');
INSERT INTO estimator VALUES ('12','1','2','Clutch Fluid Flushing','550','','','2023-07-23 19:15:52','2023-07-23 19:15:52');
INSERT INTO estimator VALUES ('13','1','2','Bulb ( Signal Lights, Brake Lights)','250','','','2023-07-23 19:15:52','2023-07-24 15:42:12');
INSERT INTO estimator VALUES ('14','1','2','Wiper Blade','450','SPECIAL SERVICE PRICE MAY VARRIED','','2023-07-23 19:15:52','2023-07-23 19:15:52');
INSERT INTO estimator VALUES ('15','1','2','Air Filter','890','','','2023-07-23 19:15:52','2023-07-23 19:15:52');
INSERT INTO estimator VALUES ('16','1','2','Basic Tune Up','870','SPECIAL SERVICE','','2023-07-23 19:15:52','2023-07-23 19:15:52');
INSERT INTO estimator VALUES ('17','1','2','Gear Oil (PER Liter)','480','SPECIAL SERVICE PRICE MAY VARRIED','','2023-07-23 19:15:52','2023-07-23 19:15:52');
INSERT INTO estimator VALUES ('18','1','2','Coolant (Per Liter)','250','SPECIAL SERVICE PRICE MAY VARRIED','','2023-07-23 19:15:52','2023-07-23 19:15:52');
INSERT INTO estimator VALUES ('19','1','2','Drive Belts','1850','SPECIAL SERVICE PRICE MAY VARRIED','','2023-07-23 19:15:52','2023-07-23 19:15:52');
INSERT INTO estimator VALUES ('20','1','2','Wheel Alignment / No camber alignment','1500','SPECIAL SERVICE PRICE MAY VARRIED','','2023-07-23 19:15:52','2023-07-23 19:15:52');
INSERT INTO estimator VALUES ('21','1','3','Radiator Flushing','550','','','2023-07-23 19:18:13','2023-07-23 19:18:13');
INSERT INTO estimator VALUES ('22','1','3','Freon Charging','850','SPECIAL SERVICE PRICE MAY VARRIED','','2023-07-23 19:18:13','2023-07-23 19:18:13');
INSERT INTO estimator VALUES ('23','1','4','BRAKE CLEAN AND ADJUST','450','LABOR','','2023-07-23 19:19:28','2023-07-23 19:21:10');
INSERT INTO estimator VALUES ('24','1','4','BRAKE FLUID','450','LABOR','','2023-07-23 19:19:28','2023-07-23 19:21:10');
INSERT INTO estimator VALUES ('25','1','4','BRAKE REFACE (PER ROTOR)','800','SPECIAL SERVICE PRICE MAY VARRIED','','2023-07-23 19:19:28','2023-07-23 19:21:10');
INSERT INTO estimator VALUES ('26','1','4','BRAKE REFACE (PER DRUM)','900','SPECIAL SERVICE PRICE MAY VARRIED','','2023-07-23 19:19:28','2023-07-23 19:21:10');
INSERT INTO estimator VALUES ('27','2','1','PMS DIESEL REGULAR EXPRESS','2350','4L Oil, Oil Filter','','2023-07-23 19:26:04','2023-07-23 19:26:04');
INSERT INTO estimator VALUES ('28','2','1','PMS DIESEL REGULAR PLUS','3100','4L Oil, Oil Filter, Spark Plugs, Tire Rotation','','2023-07-23 19:26:04','2023-07-23 19:26:04');
INSERT INTO estimator VALUES ('29','2','1','PMS DIESEL REGULAR PREMIUM','4600','4L Oil, Oil Filter, Spark Plugs, Air Filter, Engine Flush','','2023-07-23 19:26:04','2023-07-23 19:26:04');
INSERT INTO estimator VALUES ('30','2','1','PMS DIESEL SEMI-SYNTHETIC EXPRESS','3450','4L Oil, Oil Filter','','2023-07-23 19:26:04','2023-07-23 19:26:04');
INSERT INTO estimator VALUES ('31','2','1','PMS DIESEL SEMI-SYNTHETIC PLUS','4200','4L Oil, Oil Filter, Spark Plugs, Air Filter, Engine Flush','','2023-07-23 19:26:04','2023-07-23 19:26:04');
INSERT INTO estimator VALUES ('32','2','1','PMS DIESEL SEMI-SYNTHETIC PREMIUM','5700','4L Oil, Oil Filter, Spark Plugs, Air Filter, Engine Flush','','2023-07-23 19:26:04','2023-07-23 19:26:04');
INSERT INTO estimator VALUES ('33','2','1','PMS DIESEL SYNTHETIC EXPRESS','4750','4L Oil, Oil Filter','','2023-07-23 19:26:04','2023-07-23 19:26:04');
INSERT INTO estimator VALUES ('34','2','1','PMS DIESEL SYNTHETIC PLUS','5500','4L Oil, Oil Filter, Spark Plugs, Tire Rotation','','2023-07-23 19:26:04','2023-07-23 19:26:04');
INSERT INTO estimator VALUES ('35','2','1','PMS DIESEL SYNTHETHIC PREMIUM','7000','4L Oil, Oil Filter, Spark Plugs, Air Filter,Engine Flush','','2023-07-23 19:26:04','2023-07-23 19:26:04');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO payments VALUES ('1','jay','jaybayron400@gmail.com','','','1000','2023-07-22 17:33:50','2023-07-22 17:33:50');
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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
INSERT INTO supports VALUES ('67','Employee one','091029301293','jaybayron400@gmail.com','','','','','Electrician','','','','','employed','','','','$2y$10$Ez6j.2LwNDmrRNyL5P4hHuq9yVW26vMPIiDE7.oY/qV0k4h/FIN1W','','uploads/64bd229596a14.png','1','2023-07-21 15:54:52','2023-07-23 20:52:37');
INSERT INTO supports VALUES ('76','Finn Grant 123123','','hiwutoz@mailinator.com','25-Oct-1992','+1 (343) 396-4006','30-Dec-1980','Male','Mechanic','','2008-08-13','06-Jun-2022','2022-09-10','employed','','','','$2y$10$y8WLHE1DSOyhWyelN5vQSugtMmo5KL2iMSQhXPL0rotFbpOYjgbUG','','','1','2023-07-22 01:23:22','2023-07-22 01:38:25');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
INSERT INTO walkin VALUES ('4','bozi@mailinator.com','rusocev@mailinator.com','godufam@mailinator.com','Oxygen','casysiter@mailinator.com','sykegykomy@mailinator.com','01:45','','byqaq@mailinator.com','2023-07-21 21:17:42','2023-07-21 21:17:42');
INSERT INTO walkin VALUES ('5','qafacy@mailinator.com','womosyge@mailinator.com','mynybivom@mailinator.com','wheel','tozihoc@mailinator.com','rinufaricu@mailinator.com','17:02','','bahobap@mailinator.com','2023-07-21 21:17:53','2023-07-21 21:17:53');
INSERT INTO walkin VALUES ('6','goqimoxyfa@mailinator.com','qiritifij@mailinator.com','xiwusogiju@mailinator.com','Brake','seqozap@mailinator.com','kuwevywyjy@mailinator.com','22:10','','lytylafo@mailinator.com','2023-07-21 21:24:44','2023-07-21 21:24:44');
