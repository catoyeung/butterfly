CREATE TABLE Users
(user_id int NOT NULL IDENTITY(1,1),
username varchar(25) NOT NULL,
password varchar(50) NOT NULL,
display_name varchar(50) NOT NULL,
post varchar(25) NOT NULL,
belongs_to varchar(25) NOT NULL,
deleted bit NOT NULL,
inactive bit NOT NULL,
PRIMARY KEY (user_id),
UNIQUE (username, password, display_name))

INSERT INTO Users (username, password, display_name, post, belongs_to, deleted, inactive)
values
('admin','admin','Cato Yeung','Programmer','admin',0,0)

insert into tableA (field1,field2,field3) 
values
('xxxa','xxxxb','xxxxc'),
('xxxa','xxxxb','xxxxc'),
('xxxa','xxxxb','xxxxc'),
('xxxa','xxxxb','xxxxc')