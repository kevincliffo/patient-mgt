CREATE TABLE clinics (
  ClinicId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name varchar(255) NOT NULL,
  Manager varchar(255) NOT NULL,
  Location varchar(255) NOT NULL,
  PhoneNumber varchar(255) NOT NULL,
  CreatedDate datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;