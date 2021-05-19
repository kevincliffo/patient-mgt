CREATE TABLE users (
  UserId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  UserName varchar(50) NOT NULL,
  FirstName varchar(50) NOT NULL,
  LastName varchar(50) NOT NULL,
  UserType varchar(50) NOT NULL,
  Email varchar(50) NOT NULL,
  Password varchar(256) NOT NULL,
  ProfileImage varchar(255) NOT NULL,
  IDNumber varchar(50) NOT NULL,
  MobileNo varchar(50) NOT NULL,
  LastLogin datetime NOT NULL DEFAULT current_timestamp(),
  CreatedDate datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;