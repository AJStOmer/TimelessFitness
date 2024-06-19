-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 13, 2023 at 05:43 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TimelessFitnessDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Announcement`
--

CREATE TABLE `Announcement` (
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `message` varchar(1000) NOT NULL,
  `Employees_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Announcement`
--

INSERT INTO `Announcement` (`title`, `date`, `message`, `Employees_email`) VALUES
('Bench Press Shortage', '2023-04-06', 'We\'ve been seeing a shortage of Bench press Machine availabilities. Please book in advance. Thanks.', 'ScottSmith@test.ca'),
('Gym Busy, April 6', '2023-04-06', 'The Gym is very busy this weekend. Please book in advance. Thanks', 'ScottSmith@test.ca'),
('No Shows', '2023-04-13', 'Please show up to your bookings. We will start penalizing no shows.', 'pParker@spiderman.ca'),
('Treadmill Damage', '2023-04-06', 'We have noticed damage on the treadmill machines, damage ranges from improper use to aggressive use. Please be careful with the machines. The gym will charge those caught. Thanks', 'pParker@spiderman.ca');

-- --------------------------------------------------------

--
-- Table structure for table `Bookable`
--

CREATE TABLE `Bookable` (
  `bookable_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `Employees_email` varchar(255) DEFAULT NULL,
  `service_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Bookable`
--

INSERT INTO `Bookable` (`bookable_id`, `status`, `type`, `Employees_email`, `service_date`) VALUES
(1, 'Active', 'Machine', NULL, NULL),
(2, 'Inactive', 'Court', 'emp@e.com', '2023-04-12'),
(3, 'Inactive', 'Machine', 'emp@e.com', '2023-04-12'),
(4, 'Active', 'PT_Session', 'emp@e.com', '2023-04-12'),
(6, 'Active', 'Court', 'emp@e.com', '2023-04-11'),
(7, 'Active', 'Machine', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Booking`
--

CREATE TABLE `Booking` (
  `Member_email` varchar(255) NOT NULL,
  `bookingId` int(11) NOT NULL,
  `bookableid` int(11) NOT NULL,
  `employees_email` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `Time_Out` varchar(255) NOT NULL,
  `Time_In` varchar(255) NOT NULL,
  `Booking_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Booking`
--

INSERT INTO `Booking` (`Member_email`, `bookingId`, `bookableid`, `employees_email`, `status`, `Time_Out`, `Time_In`, `Booking_Date`) VALUES
('jsmith@test.ca', 1, 1, 'emp@e.com', 'Inactive', '6:00', '5:30', '2023-04-07'),
('jsmith@test.ca', 2, 2, NULL, 'Active', '6:30', '6:00', '2023-04-07'),
('jsmith@test.ca', 3, 4, NULL, 'Active', '7:30', '7:00', '2023-04-07'),
('jsmith@test.ca', 6, 1, NULL, 'Active', '6:00', '5:30', '2023-04-11'),
('jsmith@test.ca', 7, 1, NULL, 'Active', '10:30', '10:00', '2023-04-10'),
('jsmith@test.ca', 8, 1, NULL, 'Active', '10:00', '9:30', '2023-04-10'),
('jsmith@test.ca', 9, 1, NULL, 'Active', '2:30', '2:00', '2023-04-11'),
('jsmith@test.ca', 10, 1, NULL, 'Active', '4:30', '4:00', '2023-04-14'),
('jsmith@test.ca', 11, 2, NULL, 'Active', '10:30', '10:00', '2023-04-10'),
('jsmith@test.ca', 12, 2, NULL, 'Active', '10:30', '10:00', '2023-04-11'),
('jsmith@test.ca', 13, 2, NULL, 'Active', '10:30', '10:00', '2023-04-12'),
('jsmith@test.ca', 14, 4, NULL, 'Active', '10:30', '10:00', '2023-04-10'),
('jsmith@test.ca', 15, 4, NULL, 'Active', '10:30', '10:00', '2023-04-13'),
('jsmith@test.ca', 16, 6, NULL, 'Active', '10:30', '10:00', '2023-04-11'),
('jsmith@test.ca', 17, 6, NULL, 'Active', '10:30', '10:00', '2023-04-14'),
('jsmith@test.ca', 18, 4, 'emp@e.com', 'Inactive', '10:30', '10:00', '2023-04-16'),
('jsmith@test.ca', 19, 4, NULL, 'Active', '11:00', '10:30', '2023-04-10'),
('jsmith@test.ca', 20, 4, NULL, 'Active', '4:00', '3:30', '2023-04-13'),
('jsmith@test.ca', 21, 4, NULL, 'Active', '4:00', '3:30', '2023-04-16'),
('jsmith@test.ca', 22, 6, NULL, 'Active', '8:00', '7:30', '2023-04-12'),
('jsmith@test.ca', 23, 2, NULL, 'Active', '10:30', '10:00', '2023-04-13'),
('jsmith@test.ca', 24, 3, NULL, 'Active', '1:30', '1:00', '2023-04-13'),
('jsmith@test.ca', 25, 3, NULL, 'Active', '5:00', '4:30', '2023-04-11'),
('jsmith@test.ca', 26, 1, NULL, 'Active', '1:30', '1:00', '2023-04-13'),
('jsmith@test.ca', 27, 1, NULL, 'Active', '10:30', '10:00', '2023-04-12'),
('jsmith@test.ca', 28, 3, NULL, 'Active', '10:30', '10:00', '2023-04-11'),
('jsmith@test.ca', 29, 1, NULL, 'Active', '8:30', '8:00', '2023-04-14'),
('jsmith@test.ca', 30, 3, NULL, 'Active', '2:00', '1:30', '2023-04-13'),
('jsmith@test.ca', 31, 7, NULL, 'Active', '8:30', '8:00', '2023-04-14'),
('jsmith@test.ca', 47, 4, NULL, 'Active', '10:30', '10:00', '2023-04-19'),
('jsmith@test.ca', 48, 1, NULL, 'Active', '10:30', '10:00', '2023-04-19'),
('jsmith@test.ca', 49, 6, NULL, 'Active', '10:30', '10:00', '2023-04-19'),
('jsmith@test.ca', 50, 6, NULL, 'Active', '2:30', '2:00', '2023-04-18'),
('lbj23@gmail.com', 32, 2, NULL, 'Active', '11:00', '10:30', '2023-04-13'),
('lbj23@gmail.com', 33, 3, NULL, 'Active', '7:30', '7:00', '2023-04-14'),
('lbj23@gmail.com', 34, 1, NULL, 'Active', '12:30', '12:00', '2023-04-14'),
('lbj23@gmail.com', 35, 4, NULL, 'Active', '10:30', '10:00', '2023-04-12'),
('lbj23@gmail.com', 36, 4, NULL, 'Active', '10:30', '10:00', '2023-04-11'),
('lbj23@gmail.com', 37, 1, NULL, 'Active', '8:00', '7:30', '2023-04-13'),
('lbj23@gmail.com', 38, 7, NULL, 'Active', '1:30', '1:00', '2023-04-13'),
('lbj23@gmail.com', 39, 6, NULL, 'Active', '10:30', '10:00', '2023-04-18'),
('lbj23@gmail.com', 40, 4, NULL, 'Active', '10:30', '10:00', '2023-04-18'),
('lbj23@gmail.com', 41, 1, NULL, 'Active', '10:30', '10:00', '2023-04-13'),
('lbj23@gmail.com', 42, 2, NULL, 'Active', '10:30', '10:00', '2023-04-18'),
('lbj23@gmail.com', 43, 6, NULL, 'Active', '10:30', '10:00', '2023-04-13'),
('lbj23@gmail.com', 44, 6, NULL, 'Active', '10:30', '10:00', '2023-04-15'),
('lbj23@gmail.com', 45, 6, NULL, 'Active', '5:30', '5:00', '2023-04-16'),
('lbj23@gmail.com', 46, 2, NULL, 'Active', '10:30', '10:00', '2023-04-16'),
('lbj23@gmail.com', 51, 4, NULL, 'Active', '4:30', '4:00', '2023-04-20'),
('lbj23@gmail.com', 52, 1, NULL, 'Active', '7:30', '7:00', '2023-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `Court`
--

CREATE TABLE `Court` (
  `bookable_id` int(11) NOT NULL,
  `sport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Court`
--

INSERT INTO `Court` (`bookable_id`, `sport`) VALUES
(2, 'Basketball Court'),
(6, 'Soccer Field');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `email` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`email`, `access`) VALUES
('emp@e.com', 'Full'),
('pParker@spiderman.ca', 'Full'),
('ScottSmith@test.ca', 'Full');

-- --------------------------------------------------------

--
-- Table structure for table `Exercise`
--

CREATE TABLE `Exercise` (
  `name` varchar(255) NOT NULL,
  `Muscle_Group` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Exercise`
--

INSERT INTO `Exercise` (`name`, `Muscle_Group`, `description`) VALUES
('Bench Press', 'Chest', 'Put weights on bar and lay down on bench. Perform a barbell push and press.'),
('Row Machine', 'Back', 'Hold grip, sit leaning back and pull like a rowing boat.'),
('Shoulder Press', 'Shoulders', 'Grab handle grips, wide stance and arms should be 90 degrees. Then push up.');

-- --------------------------------------------------------

--
-- Table structure for table `Includes`
--

CREATE TABLE `Includes` (
  `Exercise_Name` varchar(255) NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `PT_email` varchar(255) NOT NULL,
  `daysperWeek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Includes`
--

INSERT INTO `Includes` (`Exercise_Name`, `program_name`, `PT_email`, `daysperWeek`) VALUES
('Bench Press', 'Fitness 101', 'pTrainer@gmail.com', 5),
('Bench Press', 'Fitness 471', 'pTrainer@gmail.com', 4),
('Bench Press', 'Fitness505', '122dd@gmail.com', 3),
('Bench Press', 'Fitness506', '122dd@gmail.com', 3),
('Bench Press', 'gft', '122dd@gmail.com', 0),
('Bench Press', 'Program Fit 471', 'pTrainer@gmail.com', 1),
('Bench Press', 'Test Program', 'pTrainer@gmail.com', 4),
('Bench Press', 'testPorf', '122dd@gmail.com', 3),
('Bench Press', 'TestProg', '122dd@gmail.com', 2),
('Row Machine', 'Fitness 471', 'pTrainer@gmail.com', 4),
('Row Machine', 'Fitness505', '122dd@gmail.com', 3),
('Row Machine', 'Fitness506', '122dd@gmail.com', 3),
('Row Machine', 'Program Fit 471', 'pTrainer@gmail.com', 1),
('Row Machine', 'Test Program', 'pTrainer@gmail.com', 4),
('Row Machine', 'testPorf', '122dd@gmail.com', 3),
('Shoulder Press', 'Fast Fitness', 'pTrainer@gmail.com', 5),
('Shoulder Press', 'Fitness 101', 'pTrainer@gmail.com', 3),
('Shoulder Press', 'Fitness505', '122dd@gmail.com', 3),
('Shoulder Press', 'Fitness506', '122dd@gmail.com', 3),
('Shoulder Press', 'Program Fit 471', 'pTrainer@gmail.com', 1),
('Shoulder Press', 'Test Program', 'pTrainer@gmail.com', 4),
('Shoulder Press', 'testPorf', '122dd@gmail.com', 3),
('Shoulder Press', 'TestProg', '122dd@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Machine`
--

CREATE TABLE `Machine` (
  `bookable_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Machine`
--

INSERT INTO `Machine` (`bookable_id`, `location`, `name`) VALUES
(1, 'Top Floor', 'Bench Press'),
(3, 'Bottom Floor', 'Shoulder Press'),
(7, 'Top Floor', 'Bench Press');

-- --------------------------------------------------------

--
-- Table structure for table `Meal_plan`
--

CREATE TABLE `Meal_plan` (
  `plan_name` varchar(255) NOT NULL,
  `calorieCount` int(11) NOT NULL,
  `mealsPerDay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Meal_plan`
--

INSERT INTO `Meal_plan` (`plan_name`, `calorieCount`, `mealsPerDay`) VALUES
('FatBurn Diet', 1700, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Meal_Plan_Meals`
--

CREATE TABLE `Meal_Plan_Meals` (
  `plan_name` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `meal_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Meal_Plan_Meals`
--

INSERT INTO `Meal_Plan_Meals` (`plan_name`, `time`, `meal_name`) VALUES
('FatBurn Diet', 'Afternoon', 'Chicken and Rice'),
('FatBurn Diet', 'Evening', 'Protein Shake and granola bar'),
('FatBurn Diet', 'Morning', 'Scrambled Eggs');

-- --------------------------------------------------------

--
-- Table structure for table `Member`
--

CREATE TABLE `Member` (
  `email` varchar(255) NOT NULL,
  `ProgramName` varchar(255) NOT NULL,
  `Program_PT_email` varchar(255) NOT NULL,
  `MembershipType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Member`
--

INSERT INTO `Member` (`email`, `ProgramName`, `Program_PT_email`, `MembershipType`) VALUES
('ffrr@ma.ca', '', '', 3),
('jsmith@test.ca', 'Fast Fitness', 'pTrainer@gmail.com', 3),
('lbj23@gmail.com', 'Fitness 471', 'pTrainer@gmail.com', 3),
('wewe@gmail.com', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Person`
--

CREATE TABLE `Person` (
  `email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Person`
--

INSERT INTO `Person` (`email`, `Password`, `Phone`, `Fname`, `Lname`, `Address`, `Age`, `user_type`) VALUES
('122dd@gmail.com', '123', '123-332-1223', 'ptttt', 'trainer', '123 sniend ', 22, 'personalTrainer'),
('emp@e.com', '123', '123-332-2322', 'emp', 'e', 'eeee', 23, 'employee'),
('ffrr@ma.ca', '21', '123-443-1211', 'tee', 'eewe', 'dee', 21, 'member'),
('jsmith@test.ca', 'password123', '403-321-1234', 'John', 'Smith', '441 Uni Drive', 22, 'member'),
('lbj23@gmail.com', 'kingJ23', '403-222-1332', 'Lebron', 'James', '123 Lakers way', 37, 'member'),
('pParker@spiderman.ca', 'parker123', '123-323-4432', 'Peter', 'Parker', '123 Spider Street', 25, 'employee'),
('pTrainer@gmail.com', 'pt123', '122-432-2343', 'The', 'Rock', '123 Rock Way', 50, 'personalTrainer'),
('ScottSmith@test.ca', 'pass431', '403-132-1223', 'Scott', 'Smith', '4221 Test Blvd', 19, 'employee'),
('wewe@gmail.com', '12', '123-321-1323', 'jidendd', 'eff21', '3323 ddede', 23, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `Personal_Trainer`
--

CREATE TABLE `Personal_Trainer` (
  `email` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Personal_Trainer`
--

INSERT INTO `Personal_Trainer` (`email`, `specialty`) VALUES
('pTrainer@gmail.com', 'BodyBuilding'),
('122dd@gmail.com', 'Fitness');

-- --------------------------------------------------------

--
-- Table structure for table `Program`
--

CREATE TABLE `Program` (
  `Program_name` varchar(255) NOT NULL,
  `PT_email` varchar(255) NOT NULL,
  `difficulty` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `mealPlan_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Program`
--

INSERT INTO `Program` (`Program_name`, `PT_email`, `difficulty`, `duration`, `mealPlan_name`) VALUES
('bjbj', '122dd@gmail.com', 'Easy', 33, 'FatBurn Diet'),
('Fast Fitness', 'pTrainer@gmail.com', 'Medium', 15, 'FatBurn Diet'),
('Fitness 101', 'pTrainer@gmail.com', 'Easy', 4, 'FatBurn Diet'),
('Fitness 471', 'pTrainer@gmail.com', 'Hard', 5, 'FatBurn Diet'),
('Fitness Fanatics', 'pTrainer@gmail.com', 'Easy', 20, 'FatBurn Diet'),
('Fitness Freaks', 'pTrainer@gmail.com', 'Hard', 5, 'FatBurn Diet'),
('Fitness505', '122dd@gmail.com', 'Medium', 12, 'FatBurn Diet'),
('Fitness506', '122dd@gmail.com', 'Medium', 12, 'FatBurn Diet'),
('Freaky Fitness', 'pTrainer@gmail.com', 'Hard', 12, 'FatBurn Diet'),
('gft', '122dd@gmail.com', 'Easy', 0, 'FatBurn Diet'),
('Program Fit 471', 'pTrainer@gmail.com', 'Hard', 3, 'FatBurn Diet'),
('Test Program', 'pTrainer@gmail.com', 'Easy', 2, 'FatBurn Diet'),
('testPorf', '122dd@gmail.com', 'Hard', 22, 'FatBurn Diet'),
('TestProg', '122dd@gmail.com', 'Hard', 32, 'FatBurn Diet');

-- --------------------------------------------------------

--
-- Table structure for table `PT_Session`
--

CREATE TABLE `PT_Session` (
  `bookable_id` int(11) NOT NULL,
  `Session_Focus` varchar(255) NOT NULL,
  `PT_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PT_Session`
--

INSERT INTO `PT_Session` (`bookable_id`, `Session_Focus`, `PT_email`) VALUES
(4, 'Body-Building', 'pTrainer@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Used_For`
--

CREATE TABLE `Used_For` (
  `bookable_id` int(11) NOT NULL,
  `exercise_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Used_For`
--

INSERT INTO `Used_For` (`bookable_id`, `exercise_name`) VALUES
(1, 'Bench Press'),
(3, 'Shoulder Press');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Announcement`
--
ALTER TABLE `Announcement`
  ADD PRIMARY KEY (`title`,`date`),
  ADD KEY `empEmail` (`Employees_email`);

--
-- Indexes for table `Bookable`
--
ALTER TABLE `Bookable`
  ADD PRIMARY KEY (`bookable_id`),
  ADD KEY `employeesEmail` (`Employees_email`);

--
-- Indexes for table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`Member_email`,`bookingId`,`bookableid`),
  ADD KEY `E_email` (`employees_email`),
  ADD KEY `bb_id` (`bookableid`);

--
-- Indexes for table `Court`
--
ALTER TABLE `Court`
  ADD KEY `bk_idc` (`bookable_id`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `Exercise`
--
ALTER TABLE `Exercise`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `Includes`
--
ALTER TABLE `Includes`
  ADD PRIMARY KEY (`Exercise_Name`,`program_name`,`PT_email`),
  ADD KEY `cns2` (`program_name`),
  ADD KEY `cns3` (`PT_email`);

--
-- Indexes for table `Machine`
--
ALTER TABLE `Machine`
  ADD PRIMARY KEY (`bookable_id`);

--
-- Indexes for table `Meal_plan`
--
ALTER TABLE `Meal_plan`
  ADD PRIMARY KEY (`plan_name`);

--
-- Indexes for table `Meal_Plan_Meals`
--
ALTER TABLE `Meal_Plan_Meals`
  ADD PRIMARY KEY (`plan_name`,`time`,`meal_name`);

--
-- Indexes for table `Member`
--
ALTER TABLE `Member`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `Person`
--
ALTER TABLE `Person`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `Personal_Trainer`
--
ALTER TABLE `Personal_Trainer`
  ADD KEY `pt_fk` (`email`);

--
-- Indexes for table `Program`
--
ALTER TABLE `Program`
  ADD PRIMARY KEY (`Program_name`,`PT_email`),
  ADD KEY `pt_prog` (`PT_email`),
  ADD KEY `mln` (`mealPlan_name`);

--
-- Indexes for table `PT_Session`
--
ALTER TABLE `PT_Session`
  ADD PRIMARY KEY (`bookable_id`),
  ADD KEY `ptem` (`PT_email`);

--
-- Indexes for table `Used_For`
--
ALTER TABLE `Used_For`
  ADD PRIMARY KEY (`bookable_id`,`exercise_name`),
  ADD KEY `pk2` (`exercise_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Announcement`
--
ALTER TABLE `Announcement`
  ADD CONSTRAINT `empEmail` FOREIGN KEY (`Employees_email`) REFERENCES `Employee` (`email`);

--
-- Constraints for table `Bookable`
--
ALTER TABLE `Bookable`
  ADD CONSTRAINT `employeesEmail` FOREIGN KEY (`Employees_email`) REFERENCES `Employee` (`email`);

--
-- Constraints for table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `E_email` FOREIGN KEY (`employees_email`) REFERENCES `Employee` (`email`),
  ADD CONSTRAINT `M_email` FOREIGN KEY (`Member_email`) REFERENCES `Member` (`email`),
  ADD CONSTRAINT `bb_id` FOREIGN KEY (`bookableid`) REFERENCES `Bookable` (`bookable_id`);

--
-- Constraints for table `Court`
--
ALTER TABLE `Court`
  ADD CONSTRAINT `bk_idc` FOREIGN KEY (`bookable_id`) REFERENCES `Bookable` (`bookable_id`);

--
-- Constraints for table `Employee`
--
ALTER TABLE `Employee`
  ADD CONSTRAINT `emailFKEmp` FOREIGN KEY (`email`) REFERENCES `Person` (`email`);

--
-- Constraints for table `Includes`
--
ALTER TABLE `Includes`
  ADD CONSTRAINT `cns1` FOREIGN KEY (`Exercise_Name`) REFERENCES `Exercise` (`name`),
  ADD CONSTRAINT `cns2` FOREIGN KEY (`program_name`) REFERENCES `Program` (`Program_name`),
  ADD CONSTRAINT `cns3` FOREIGN KEY (`PT_email`) REFERENCES `Program` (`PT_email`);

--
-- Constraints for table `Machine`
--
ALTER TABLE `Machine`
  ADD CONSTRAINT `b_key` FOREIGN KEY (`bookable_id`) REFERENCES `Bookable` (`bookable_id`);

--
-- Constraints for table `Meal_Plan_Meals`
--
ALTER TABLE `Meal_Plan_Meals`
  ADD CONSTRAINT `plan` FOREIGN KEY (`plan_name`) REFERENCES `Meal_plan` (`plan_name`);

--
-- Constraints for table `Member`
--
ALTER TABLE `Member`
  ADD CONSTRAINT `emailFKMemb` FOREIGN KEY (`email`) REFERENCES `Person` (`email`);

--
-- Constraints for table `Personal_Trainer`
--
ALTER TABLE `Personal_Trainer`
  ADD CONSTRAINT `pt_fk` FOREIGN KEY (`email`) REFERENCES `Person` (`email`);

--
-- Constraints for table `Program`
--
ALTER TABLE `Program`
  ADD CONSTRAINT `mln` FOREIGN KEY (`mealPlan_name`) REFERENCES `Meal_plan` (`plan_name`),
  ADD CONSTRAINT `pt_prog` FOREIGN KEY (`PT_email`) REFERENCES `Personal_Trainer` (`email`);

--
-- Constraints for table `PT_Session`
--
ALTER TABLE `PT_Session`
  ADD CONSTRAINT `ptId` FOREIGN KEY (`bookable_id`) REFERENCES `Bookable` (`bookable_id`),
  ADD CONSTRAINT `ptem` FOREIGN KEY (`PT_email`) REFERENCES `Personal_Trainer` (`email`);

--
-- Constraints for table `Used_For`
--
ALTER TABLE `Used_For`
  ADD CONSTRAINT `pk1` FOREIGN KEY (`bookable_id`) REFERENCES `Bookable` (`bookable_id`),
  ADD CONSTRAINT `pk2` FOREIGN KEY (`exercise_name`) REFERENCES `Exercise` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
