INSERT INTO Brand (brand_name, deleted, created_at)
values
('Dr. Pro', 0, '2013-03-21 07:07:23.367')

INSERT INTO Post (post_name, brand_id, deleted, created_at)
values
('Admin',1,0, '2013-03-21 07:07:23.367')

INSERT INTO Staff (username, password, display_name, post_id, deleted, inactive, created_at)
values
('admin','21232f297a57a5a743894a0e4a801fc3','Cato Yeung',1,0,0,'2013-03-21 07:07:23.367')

INSERT INTO Post (post_name, brand_id, deleted, created_at)
values
('Consultant',1,0, '2013-03-21 07:07:23.367')

INSERT INTO Post (post_name, brand_id, deleted, created_at)
values
('Customer Service',1,0, '2013-03-21 07:07:23.367')

INSERT INTO Staff (username, password, display_name, post_id, deleted, inactive, created_at)
values
('coey','21232f297a57a5a743894a0e4a801fc3','Coey',6,0,0,'2013-03-21 07:07:23.367')

INSERT INTO Staff (username, password, display_name, post_id, deleted, inactive, created_at)
values
('ming','21232f297a57a5a743894a0e4a801fc3','Ming',4,0,0,'2013-03-21 07:07:23.367')

INSERT INTO District (district_name, brand_id, deleted, created_at)
values
('元朗',14,0, '2013-03-21 07:07:23.367')

INSERT INTO Ad_source (ad_source_name, brand_id, deleted, created_at)
values
('東方新地',14,0, '2013-03-21 07:07:23.367')

INSERT INTO Treatment_type (treatment_type_name, brand_id, deleted, created_at)
values
('醫生類',14,0, '2013-03-21 07:07:23.367')

INSERT INTO Enquiry_content (enquiry_content_name, brand_id, treatment_type_id, deleted, created_at)
values
('Botox',14,1,0, '2013-03-21 07:07:23.367')