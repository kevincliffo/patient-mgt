CREATE TABLE documents (
  DocumentId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  DocumentName varchar(255) NOT NULL,
  DocumentInternalName varchar(255) NOT NULL,
  DocumentType varchar(255) NOT NULL,
  DocumentFileUrl varchar(255),
  Owner varchar(255) NOT NULL,
  Description text NOT NULL,
  UploadedBy varchar(255) NOT NULL,
  UploadedDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
