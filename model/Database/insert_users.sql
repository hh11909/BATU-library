use library;
insert into colleges (college_name) value("Industry and Energy faculty");
select * from colleges;
insert into departments (department_name,college_ID) values("IT",1);
select * from departments;
insert into admins (admin_name,email,password) values ("MM","mm@gmail.com",md5("123"));
insert into students (name,academy_number,phone,gender,email,password) values ("mm","2320434","01200403232","male","aaaa@gmail.com",md5(123));