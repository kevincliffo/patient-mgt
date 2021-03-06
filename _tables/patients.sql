CREATE TABLE patients (
  PatientId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  AddedBy int(11) NOT NULL,
  PatientIdentifier varchar(50) NOT NULL,
  FirstName varchar(50) NOT NULL,
  LastName varchar(50) NOT NULL,
  IDNumber varchar(50) NOT NULL,
  Gender varchar(50) NOT NULL,
  PatientType varchar(50) NOT NULL,
  DOB datetime NOT NULL DEFAULT current_timestamp(),
  Email varchar(50),
  MobileNo varchar(50),
  PatientImage varchar(255),
  UnderlyingCondition text,
  Address text,
  Location text,
  CreatedDate datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;