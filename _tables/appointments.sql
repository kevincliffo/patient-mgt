CREATE TABLE appointments (
  AppointmentId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  PatientId int(11) NOT NULL,
  Symptoms TEXT NOT NULL,
  AppointmentDate datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;