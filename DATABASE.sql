--
-- Table structure for table `courses`
--
CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `crn` varchar(5) NOT NULL,
  `department` varchar(3) NOT NULL,
  `course_number` varchar(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `professor` varchar(100) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `textbooks`
--
CREATE TABLE `textbooks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(13) NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `users`
--
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(34) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `major` varchar(100) NOT NULL,
  `grad_year` varchar(4) NOT NULL,
  `access_level` int(10) unsigned NOT NULL DEFAULT 0,
  `registration_key` varchar(34) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `user_textbooks`
--
CREATE TABLE `user_textbooks` (
  `user_id` int(11) DEFAULT NULL,
  `textbook_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`textbook_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
