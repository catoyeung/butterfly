CREATE TABLE Brand
(brand_id int NOT NULL IDENTITY(1,1),
brand_name nvarchar(100) NOT NULL,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (brand_id),
UNIQUE (brand_name))

CREATE TABLE Post
(post_id int NOT NULL IDENTITY(1,1),
post_name nvarchar(50) NOT NULL,
brand_id int NOT NULL,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (post_id),
FOREIGN KEY ( brand_id ) REFERENCES Brand (brand_id),
UNIQUE (post_name))

CREATE TABLE Staff
(staff_id int NOT NULL IDENTITY(1,1),
username varchar(25) NOT NULL,
password varchar(50) NOT NULL,
display_name nvarchar(50) NOT NULL,
post_id int NOT NULL,
deleted bit NOT NULL,
inactive bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (staff_id),
CONSTRAINT username_is_unique UNIQUE (username),
FOREIGN KEY ( post_id ) REFERENCES Post (post_id))

CREATE TABLE Staff_belongs_to_brand
(staff_id int NOT NULL,
brand_id int NOT NULL,
FOREIGN KEY ( brand_id ) REFERENCES Brand (brand_id))

CREATE TABLE Notice
(notice_id int NOT NULL IDENTITY(1,1),
title nvarchar(100) NOT NULL,
content ntext NOT NULL,
created_by_user int NOT NULL,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (notice_id),
FOREIGN KEY ( created_by_user ) REFERENCES Staff (staff_id))

CREATE TABLE District
(district_id int NOT NULL IDENTITY(1,1),
district_name nvarchar(100) NOT NULL,
brand_id int NOT NULL,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (district_id),
FOREIGN KEY ( brand_id ) REFERENCES Brand (brand_id),
UNIQUE (district_name,brand_id))

CREATE TABLE Ad_source
(ad_source_id int NOT NULL IDENTITY(1,1),
ad_source_name nvarchar(100) NOT NULL,
brand_id int NOT NULL,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (ad_source_id),
FOREIGN KEY ( brand_id ) REFERENCES Brand (brand_id),
UNIQUE (ad_source_name,brand_id))

CREATE TABLE Treatment_type
(treatment_type_id int NOT NULL IDENTITY(1,1),
treatment_type_name nvarchar(100) NOT NULL,
brand_id int NOT NULL,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (treatment_type_id),
FOREIGN KEY ( brand_id ) REFERENCES Brand (brand_id),
UNIQUE (treatment_type_name,brand_id))

CREATE TABLE Enquiry_content
(enquiry_content_id int NOT NULL IDENTITY(1,1),
enquiry_content_name nvarchar(100) NOT NULL,
description text,
brand_id int NOT NULL,
treatment_type_id int,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (enquiry_content_id),
FOREIGN KEY ( brand_id ) REFERENCES Brand (brand_id),
UNIQUE (enquiry_content_name,brand_id))

CREATE TABLE Authentication_by_post
(authentication_by_post_id int NOT NULL IDENTITY(1,1),
post_id int NOT NULL,
controller varchar(50) NOT NULL,
controller_method varchar(50) NOT NULL,
http_method varchar(50) NOT NULL,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (authentication_by_post_id),
FOREIGN KEY ( post_id ) REFERENCES Post (post_id))