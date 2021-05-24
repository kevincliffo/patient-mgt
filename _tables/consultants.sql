CREATE TABLE consultants (
  ConsultantId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ConsultantName varchar(255) NOT NULL,
  PracticeNumber varchar(255) NOT NULL,
  Email varchar(255) NOT NULL,
  Field varchar(255) NOT NULL,
  MobileNumber varchar(255),
  AddedDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
