CREATE TABLE clients (
  ClientId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ClientNumber varchar(255) NOT NULL,
  ClientType varchar(255) NOT NULL,
  CompanyName varchar(255) NOT NULL,
  CompanyEmail varchar(255) NOT NULL,
  CompanyTelephone varchar(255) NOT NULL,
  ContactPersonName varchar(255) NOT NULL,
  ContactPersonEmail varchar(255) NOT NULL,
  ContactPersonTelephone varchar(255) NOT NULL,
  Address varchar(255) NOT NULL,
  CreatedDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
