

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO admin_info VALUES("1","admin@gmail.com","admin","2");



CREATE TABLE `appointment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(250) DEFAULT NULL,
  `brand` varchar(250) DEFAULT NULL,
  `model` varchar(250) DEFAULT NULL,
  `pms` varchar(250) DEFAULT NULL,
  `schedule` varchar(250) DEFAULT NULL,
  `repair` varchar(250) DEFAULT NULL,
  `time` varchar(250) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `price` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO appointment VALUES("11","marloaquino0213@gmail.com","SAmple","Sample","10KM","2023-03-23","Engine","07:39","Black","Sample Data","1","");



CREATE TABLE `client_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `car` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `access` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO client_info VALUES("7","MArlo M Aquino","marloaquino0213@gmail.com","Unisan, Quezon","0915 437 8500","toyota","12345","1");



CREATE TABLE `employee_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(250) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(250) DEFAULT NULL,
  `nationality` varchar(250) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `age` varchar(250) DEFAULT NULL,
  `placeofbirth` varchar(250) DEFAULT NULL,
  `datestarted` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `lastday` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO employee_info VALUES("5","123123","Employee","marloaquino0213@gmail.com","Unisan, Quezon","12345","3","09124354674","Fil","male","Mechanic","20","Manila","2023-03-31","0","");
INSERT INTO employee_info VALUES("6","0123122","John Does","marloaquino080621@gmail.com","Manila","12345","3","09124354654","Can","Female","Electrician","65","Manila","2023-03-10","0","");
INSERT INTO employee_info VALUES("7","123123199","Kali","marloaquino1234@gmail.com","Anywhere","12345","3","09124354123","Ame","Female","Mechanic","22","Manila","2023-03-16","1","20-03-23");



CREATE TABLE `employee_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(250) DEFAULT NULL,
  `client` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `mechanic` varchar(250) DEFAULT NULL,
  `electrician` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO employee_task VALUES("4","1234567","marloaquino0213@gmail.com","2023-03-23","Preventive Maintenance Service","marloaquino0213@gmail.com","marloaquino080621@gmail.com");



CREATE TABLE `logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `admin` varchar(250) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `client_id` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO logs VALUES("4","CJCE Admin","Appointment has been cancel","08-03-23 09:45:39","09:45:39","marloaquino0213@gmail.com");
INSERT INTO logs VALUES("5","CJCE Admin","Appointment has been approved","08-03-23 09:57:54","09:57:54","marloaquino0213@gmail.com");
INSERT INTO logs VALUES("8","CJCE Admin","Appointment has been approved","20-03-23 08:35:31","08:35:31","marloaquino0213@gmail.com");
INSERT INTO logs VALUES("9","CJCE Admin","Appointment has been approved","21-03-23 07:37:26","07:37:26","marloaquino0213@gmail.com");



CREATE TABLE `pms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ps` varchar(250) DEFAULT NULL,
  `qty` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO pms VALUES("1","Pms15","101","1234","pms15");
INSERT INTO pms VALUES("2","PMS20","12","2221","pms20");
INSERT INTO pms VALUES("3","PMS30","2","32","pms30");
INSERT INTO pms VALUES("4","PMS40","222","1234","pms40");
INSERT INTO pms VALUES("5","PMS80","11","1232","pms80");
INSERT INTO pms VALUES("6","PMS90","21","222","pms90");
INSERT INTO pms VALUES("7","PMS100","22","212","pms100");
INSERT INTO pms VALUES("8","PMS120","12","222","pms120");



CREATE TABLE `repair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ps` varchar(250) DEFAULT NULL,
  `qty` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO repair VALUES("1","Pms15","101","1234","tbr");
INSERT INTO repair VALUES("2","Engine","10","12345","engine");
INSERT INTO repair VALUES("3","wheel","45","567","wheel");
INSERT INTO repair VALUES("4","Oxygen","21","321","oxygen");
INSERT INTO repair VALUES("5","Brake","10","1232","brake");
INSERT INTO repair VALUES("6","Transmission","5","784","trans");
INSERT INTO repair VALUES("7","Clutch","32","3222","clutch");
INSERT INTO repair VALUES("8","radiator","22","2222","radiator");



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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


