CREATE TABLE notes (
  NoteId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  PatientId int(11) NOT NULL,
  Note text NOT NULL,
  CreatedDate datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;