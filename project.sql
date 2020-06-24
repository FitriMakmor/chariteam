CREATE DATABASE project;

USE project;

CREATE TABLE `project` (
  `project_ID` int(100) NOT NULL,
  `userID` int(100) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_start_date` date NOT NULL,
  `p_end_date` date NOT NULL,
  `p_summary` varchar(100) NOT NULL,
  `p_description` varchar(1000) NOT NULL,
  `p_image` longblob NOT NULL,
  `p_image_type` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `project_volunteer` (
  `project_ID` int(100) NOT NULL,
  `volunteer_ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `report` (
  `report_ID` int(100) NOT NULL,
  `project_ID` int(100) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `r_date` date NOT NULL,
  `r_startTime` time NOT NULL,
  `r_endTime` time NOT NULL,
  `r_venue` varchar(100) NOT NULL,
  `r_purpose` varchar(100) NOT NULL,
  `r_content` varchar(3000) NOT NULL,
  `r_comments` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user` (
  `userID` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_telNum` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_IC` varchar(100) NOT NULL,
  `u_bio` varchar(500) NOT NULL,
  `u_DOB` date NOT NULL,
  `u_image` longblob NOT NULL,
  `u_imageType` varchar(25) NOT NULL,
  `dateJoined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `volunteer` (
  `volunteer_ID` int(100) NOT NULL,
  `v_firstName` varchar(100) NOT NULL,
  `v_lastName` varchar(100) NOT NULL,
  `v_IC` varchar(100) NOT NULL,
  `v_email` varchar(100) NOT NULL,
  `v_address1` varchar(100) NOT NULL,
  `v_address2` varchar(100) NOT NULL,
  `v_state` varchar(100) NOT NULL,
  `v_status` varchar(100) NOT NULL,
  `v_telNum` varchar(100) NOT NULL,
  `v_publicInfo` varchar(100) NOT NULL,
  `v_DOR` date NOT NULL,
  `v_occ` varchar(100) NOT NULL,
  `v_image` longblob NOT NULL,
  `v_image_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

ALTER TABLE `user`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT;

ALTER TABLE `project`
  ADD PRIMARY KEY (`project_ID`),
  ADD KEY `userID` (`userID`);

ALTER TABLE `project_volunteer`
  ADD KEY `project_ID_FK` (`project_ID`),
  ADD KEY `volunteer_ID_FK` (`volunteer_ID`);

ALTER TABLE `report`
  ADD PRIMARY KEY (`report_ID`),
  ADD KEY `project_ID_FK2` (`project_ID`);

ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`volunteer_ID`);

ALTER TABLE `project`
  MODIFY `project_ID` int(100) NOT NULL AUTO_INCREMENT;

ALTER TABLE `report`
  MODIFY `report_ID` int(100) NOT NULL AUTO_INCREMENT;

ALTER TABLE `volunteer`
  MODIFY `volunteer_ID` int(100) NOT NULL AUTO_INCREMENT;

ALTER TABLE `project`
  ADD CONSTRAINT `userID_FK` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON UPDATE CASCADE;

ALTER TABLE `project_volunteer`
  ADD CONSTRAINT `project_ID_FK` FOREIGN KEY (`project_ID`) REFERENCES `project` (`project_ID`),
  ADD CONSTRAINT `volunteer_ID_FK` FOREIGN KEY (`volunteer_ID`) REFERENCES `volunteer` (`volunteer_ID`);

ALTER TABLE `report`
  ADD CONSTRAINT `project_ID_FK2` FOREIGN KEY (`project_ID`) REFERENCES `project` (`project_ID`);
COMMIT;