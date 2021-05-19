CREATE TABLE tasks (
  TaskId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  TaskNumber varchar(255) NOT NULL,
  TaskType varchar(255) NOT NULL,
  TaskFileUrl varchar(255),
  Client varchar(255) NOT NULL,
  Description text NOT NULL,
  Status varchar(255) NOT NULL,
  AssignedTo varchar(255) NOT NULL,
  CreatedDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FinishedDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
