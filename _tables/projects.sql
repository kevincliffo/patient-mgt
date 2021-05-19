CREATE TABLE projects (
  ProjectId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ProjectNumber varchar(255) NOT NULL,
  ProjectType varchar(255) NOT NULL, --internal or external
  ProjectFileUrl varchar(255),
  Client varchar(255) NOT NULL,
  Description text NOT NULL,
  Status varchar(255) NOT NULL, --not started, started, halted, finished
  AssignedTo varchar(255) NOT NULL,
  CreatedDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FinishedDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
