CREATE TABLE appointments (
  AppointmentId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  PatientIdentifier varchar(100) NOT NULL,
  PatientType varchar(100) NOT NULL,
  AppointmentType varchar(100) NOT NULL,
  PatientFirstName varchar(100) NOT NULL,
  PatientLastName varchar(100) NOT NULL,
  Symptoms TEXT NOT NULL,
  AppointmentDate datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;