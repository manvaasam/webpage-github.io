-- Time Management table

CREATE TABLE IF NOT EXISTS `time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time_in` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- add timeSpend column to employee table
ALTER TABLE `employee` ADD `timeSpend` INT(11) NOT NULL DEFAULT '0';