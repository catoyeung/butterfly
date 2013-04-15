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

CREATE TABLE Web_enquiry_form
(web_enquiry_form_id int NOT NULL IDENTITY(1,1),
customer_name nvarchar(50) NOT NULL,
customer_phone_no varchar(50) NOT NULL,
customer_age nvarchar(50),
customer_email varchar(50),
district_id int NOT NULL,
details nvarchar(200),
questions nvarchar(200),
brand_id int NOT NULL,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (web_enquiry_form_id),
FOREIGN KEY (brand_id) REFERENCES Brand (brand_id),
FOREIGN KEY (district_id) REFERENCES District (district_id))

CREATE TABLE Customer
(customer_id int NOT NULL IDENTITY(1,1),
name nvarchar(100) NOT NULL,
phone_no nvarchar(100) NOT NULL,
age nvarchar(100),
email nvarchar(100),
district_id int,
brand_id int NOT NULL,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (customer_id),
FOREIGN KEY ( brand_id ) REFERENCES Brand (brand_id),
UNIQUE (phone_no))

CREATE TABLE Customer_life
(customer_life_id int NOT NULL IDENTITY(1,1),
customer_id int NOT NULL,
enquiry_content_id int,
ad_source_id int,
responsible_cs_id int,
responsible_consultant_id int,
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (customer_life_id),
FOREIGN KEY ( customer_id ) REFERENCES Customer (customer_id))

CREATE TABLE No_booking_reason
(no_booking_reason_id int NOT NULL IDENTITY(1,1),
brand_id int NOT NULL,
details nvarchar(100),
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
FOREIGN KEY ( brand_id ) REFERENCES Brand (brand_id)
);

CREATE TABLE Stage
(stage_id int NOT NULL IDENTITY(1,1),
stage_type varchar(50) NOT NULL,
customer_life_id int NOT NULL,
start_message varchar(200),
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (stage_id),
FOREIGN KEY ( customer_life_id ) REFERENCES Customer_life (customer_life_id))

CREATE TABLE Journal
(journal_id int NOT NULL IDENTITY(1,1),
stage_id int NOT NULL,
details nvarchar(200),
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
FOREIGN KEY ( stage_id ) REFERENCES Stage (stage_id)
);

CREATE TABLE Journal_no_booking
(journal_id int NOT NULL IDENTITY(1,1),
no_booking_reason_id int NOT NULL
FOREIGN KEY ( journal_id ) REFERENCES Journal (journal_id),
FOREIGN KEY ( no_booking_reason_id ) REFERENCES No_booking_reason (no_booking_reason_id)
);

CREATE TABLE Stage_booking
(stage_id int NOT NULL,
booking_date datetime NOT NULL,
booking_start_time varchar(50) NOT NULL,
booking_end_time varchar(50),
FOREIGN KEY ( stage_id ) REFERENCES Stage (stage_id)
);

CREATE TABLE Branch
(branch_id int NOT NULL IDENTITY(1,1),
district_id int NOT NULL,
branch_name varchar(50), 
brand_id int NOT NULL, 
deleted bit NOT NULL,
created_at datetime NOT NULL,
updated_at datetime,
PRIMARY KEY (branch_id),
FOREIGN KEY ( district_id ) REFERENCES District (district_id),
FOREIGN KEY ( brand_id ) REFERENCES Brand (brand_id),
UNIQUE (branch_name, brand_id))