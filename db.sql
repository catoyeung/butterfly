CREATE TABLE Post
(post_id int NOT NULL IDENTITY(1,1),
post_name varchar(50) NOT NULL,
created_at datetime NOT NULL,
PRIMARY KEY (post_id),
UNIQUE (post_name))

INSERT INTO Post (post_name, created_at)
values
('Admin', '2013-03-21 07:07:23.367')

CREATE TABLE Crm_user
(crm_user_id int NOT NULL IDENTITY(1,1),
username varchar(25) NOT NULL,
password varchar(50) NOT NULL,
display_name varchar(50) NOT NULL,
post_id int NOT NULL,
deleted bit NOT NULL,
inactive bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (crm_user_id),
UNIQUE (username, display_name))
FOREIGN KEY ( post_id ) REFERENCES Post (post_id))

INSERT INTO Crm_user (username, password, display_name, post, deleted, inactive, created_at)
values
('admin','admin','Cato Yeung','admin',0,0,'2013-03-21 07:07:23.367')

CREATE TABLE Notice
(notice_id int NOT NULL IDENTITY(1,1),
title varchar(100) NOT NULL,
content text NOT NULL,
created_by_user int NOT NULL,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (notice_id),
FOREIGN KEY ( created_by_user ) REFERENCES Crm_user (crm_user_id))

TRUNCATE TABLE Notice;

insert into Notice (title,content,created_at) 
values
('xxxa','xxxxb','xxxxc'),
('xxxa','xxxxb','xxxxc'),
('xxxa','xxxxb','xxxxc'),
('xxxa','xxxxb','xxxxc')

ALTER TABLE Post
ADD deleted bit NOT NULL
DEFAULT 0

ALTER TABLE {TABLENAME} 
ADD {COLUMNNAME} {TYPE} {NULL|NOT NULL} 
CONSTRAINT {CONSTRAINT_NAME} DEFAULT {DEFAULT_VALUE}

CREATE TABLE Brand
(brand_id int NOT NULL IDENTITY(1,1),
brand_name varchar(100) NOT NULL,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (brand_id))

CREATE TABLE Crm_user_belongs_to_brand
(crm_user_id int NOT NULL,
brand_id int NOT NULL,
FOREIGN KEY ( brand_id ) REFERENCES Brand (brand_id))