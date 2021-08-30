CREATE TABLE appointments (
  AppointmentId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  PatientIdentifier varchar(100) NOT NULL,
  PatientName varchar(100) NOT NULL,
  Symptoms TEXT NOT NULL,
  AppointmentDate datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;