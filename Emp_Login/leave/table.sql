-- `name`, `id`, `email`, `typeOfLeave`, `fromDate`, `toDate`, `created_at`
CREATE TABLE `leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `typeOfLeave` varchar(255) NOT NULL,
  `fromDate` varchar(255) NOT NULL,
  `toDate` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Add user_name to leave
ALTER TABLE `leave`
  ADD COLUMN `user_name` varchar(255) NOT NULL AFTER `id`;

ALTER TABLE `leave`
  ADD COLUMN `reason` varchar(255) NOT NULL;

-- Status
ALTER TABLE `leave`
  ADD COLUMN `status` int(2) NOT NULL;


-- comments
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;