-- Dump file for SchoolOfComputing database

-- Database: `SchoolOfComputing`
CREATE DATABASE IF NOT EXISTS `SchoolOfComputing`;
USE `SchoolOfComputing`;

-- Table structure for table `users`
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY ('id')
);

-- Dumping data for table `users`
INSERT INTO 'users' VALUES (1,'admin','password_hash1','administrator'),(2,'john_doe','password_hash2','user');

-- Table structure for table `activities`
DROP TABLE IF EXISTS `activities`;
CREATE TABLE 'activities' (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
);

-- Dumping data for table `activities`
INSERT INTO `activities` VALUES (1,'Orientation Program','Orientation for new students','2024-06-01'),(2,'Hackathon','Annual hackathon event','2024-07-15');

-- Table structure for table `academic_programmes`
DROP TABLE IF EXISTS `academic_programmes`;
CREATE TABLE `academic_programmes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
);

-- Dumping data for table `academic_programmes`
INSERT INTO `academic_programmes` VALUES (1,'Computer Science','Bachelor of Science in Computer Science'),(2,'Information Technology','Bachelor of Science in Information Technology');

-- Table structure for table `payment_methods`
DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE `payment_methods` (
  `id` int NOT NULL AUTO_INCREMENT,
  `method` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
);

-- Dumping data for table `payment_methods`
INSERT INTO `payment_methods` VALUES (1,'Direct Payment','Direct payment to the university bank account'),(2,'M-Pesa','Payment via M-Pesa');

-- Table structure for table `staff`
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

-- Dumping data for table `staff`
INSERT INTO `staff` VALUES (1,'Dr. Jane Smith','Professor','jane.smith@example.com'),(2,'Mr. John Doe','Lecturer','john.doe@example.com');

-- Table structure for table `applications`
DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `applicant_name` varchar(255) NOT NULL,
  `applicant_email` varchar(255) NOT NULL,
  `programme_id` int NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `programme_id` (`programme_id`),
  CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`programme_id`) REFERENCES `academic_programmes` (`id`)
);

-- Dumping data for table `applications`
INSERT INTO `applications` VALUES (1,'Alice Johnson','alice.johnson@example.com',1,'Pending'),(2,'Bob Brown','bob.brown@example.com',2,'Approved');
