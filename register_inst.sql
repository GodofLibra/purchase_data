CREATE TABLE `register_inst` (
  `inst_user_id`int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `inst_name` varchar(250) NOT NULL,
  `inst_email` varchar(250) NOT NULL,
  `inst_password` varchar(250) NOT NULL,
  `inst_activation_code` varchar(250) NOT NULL,
  `inst_email_status` enum('not verified','verified') NOT NULL,
  `inst_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;