CREATE TABLE `league` (
  `League_id` int NOT NULL AUTO_INCREMENT,
  `League_Name` varchar(45) NOT NULL,
  `League_Country` varchar(45) NOT NULL,
  PRIMARY KEY (`League_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `league` VALUES (5,'Bundesliga 1','Germany'),(7,'Premier League','England'),(8,'Serie A','Italy'),(10,'La Liga','Spain'),(11,'Champions League','International'),(12,'Indian Soccer League','India');

CREATE TABLE `club` (
  `Club_id` int NOT NULL AUTO_INCREMENT,
  `League_id` int NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Ranking` int NOT NULL,
  `Wins` int NOT NULL,
  `Losses` int NOT NULL,
  `Draws` int NOT NULL,
  `Points` int NOT NULL,
  PRIMARY KEY (`Club_id`),
  KEY `League_id_idx` (`League_id`),
  CONSTRAINT `League_id` FOREIGN KEY (`League_id`) REFERENCES `league` (`League_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `club` VALUES (8,7,'Manchester City',1,4,0,1,13),(9,7,'Liverpool',2,4,1,0,12),(11,5,'Bayern Munich',1,4,0,1,13),(12,10,'Barcelona',1,4,0,1,13);

CREATE TABLE `matches` (
  `Match_id` int NOT NULL AUTO_INCREMENT,
  `Home_Club_id` int NOT NULL,
  `Away_Club_id` int NOT NULL,
  `Home_Goals` int NOT NULL,
  `Away_Goals` int NOT NULL,
  PRIMARY KEY (`Match_id`),
  KEY `Home_Club_id_idx` (`Home_Club_id`),
  KEY `Away_Club_id_idx` (`Away_Club_id`),
  CONSTRAINT `Away_Club_id` FOREIGN KEY (`Away_Club_id`) REFERENCES `club` (`Club_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Home_Club_id` FOREIGN KEY (`Home_Club_id`) REFERENCES `club` (`Club_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `matches` VALUES (10,8,9,4,0);

CREATE TABLE `player` (
  `Player_id` int NOT NULL AUTO_INCREMENT,
  `Club_id` int NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Age` int NOT NULL,
  `Height` int NOT NULL,
  `Weight` int NOT NULL,
  `Rating` int NOT NULL,
  `Number` int NOT NULL,
  `Player_Country` varchar(45) NOT NULL,
  `Position` varchar(45) NOT NULL,
  `Market_Value` int NOT NULL,
  `Goals` int NOT NULL,
  `Assists` int NOT NULL,
  PRIMARY KEY (`Player_id`),
  KEY `Club_id_idx` (`Club_id`),
  CONSTRAINT `Club_id` FOREIGN KEY (`Club_id`) REFERENCES `club` (`Club_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `player` VALUES (9,8,'Sergio Aguero',31,168,72,89,10,'Argentina','ST',60,6,2),(11,12,'Lionel Messi',33,168,68,94,10,'Argentina','RW',100,10,6);
