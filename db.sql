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

CREATE TABLE Notice
(notice_id int NOT NULL IDENTITY(1,1),
title varchar(100) NOT NULL,
content text NOT NULL,
created_by_user int NOT NULL,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (notice_id),
FOREIGN KEY ( created_by_user ) REFERENCES Users (user_id))

TRUNCATE TABLE Notice;

insert into Notice (title,content,created_at) 
values
('xxxa','xxxxb','xxxxc'),
('xxxa','xxxxb','xxxxc'),
('xxxa','xxxxb','xxxxc'),
('xxxa','xxxxb','xxxxc')