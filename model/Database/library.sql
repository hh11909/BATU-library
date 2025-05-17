create database if not exists `Library`;
use `Library`;
create table if not exists Colleges(
	college_ID int primary key auto_increment,
    college_name varchar(100) not null
);
create table if not exists Admins(
	admin_ID int primary key auto_increment,
    admin_name varchar(255) not null,
    `email` varchar(50) not null unique,
    `password`char(32) not null,
    `created_at` timestamp default now(),
    `updated_at` timestamp default now()
);
create table if not exists Categories(
	category_ID int primary key auto_increment,
    category_name varchar(45) not null
);
create table if not exists Departments(
	department_ID int primary key auto_increment,
    department_name varchar(100) not null,
    college_ID int not null,
    constraint fk_Departments_Colleges foreign key (college_ID) references Colleges(college_ID) on update cascade on delete cascade
);

create table if not exists `Students`(
	`student_ID` int primary key auto_increment,
    `name` varchar(255) not null,
    `academy_number` int(7) not null unique,
    `phone` varchar(15) not null unique,
    `gender` enum('male','female') not null,
    `department_ID` int,
    `email` varchar(50) not null unique,
    `password`char(32) not null,
	`student_image` varchar(255),
    `profile_image` varchar(255),
    `is_friend` bool not null default 0,
    `admin_ID` int,
    `created_at` timestamp default now(),
    `updated_at` timestamp default now(),
    constraint fk_Students_Departments foreign key (department_ID) references Departments(department_ID) on update cascade on delete set null,
    constraint fk_Students_Admins foreign key (admin_ID) references Admins(admin_ID) on update cascade on delete set null
);
create table if not exists Books(
	`book_ID` int primary key auto_increment,
    `name` varchar(255) not null,
    `author` varchar(255) not null,
    `image` varchar(255) not null,
    `description` text not null,
    `admin_ID` int,
    `created_at` timestamp default now(),
    `updated_at` timestamp default now(),
    `is_borrowed` bool not null default 0,
    constraint fk_Books_Admins foreign key (admin_ID) references Admins(admin_ID) on update cascade on delete set null
);
create table if not exists `Events`(
	`event_ID` int primary key auto_increment,
    `title` varchar(255) not null,
    `content` text not null,
    `image` varchar(255) not null,
     `date` date not null,
     `state` enum('requested','available','expired') default 'available',
     `start_date` date not null,
     `end_date` date not null,
     `created_at` timestamp default now(),
    `updated_at` timestamp default now(),
	`admin_ID` int,
    `student_ID` int,
    constraint fk_Events_Admins foreign key (admin_ID) references Admins(admin_ID) on update cascade on delete set null,
	constraint fk_student_events_requests foreign key (student_ID) references students(student_ID) on update cascade on delete set null
);
-- drop table Likes;
create table if not exists `Likes`(
	`student_ID` int not null,
    `name` varchar(100) not null,
    constraint fk_Likes_Students foreign key (student_ID) references Students(student_ID) on update cascade on delete cascade,
    constraint fk_Likes_Books foreign key (`name`) references Books(`name`) on update cascade on delete cascade,
    constraint pk_Likes primary key (student_ID,book_ID)
    );
--   drop table Requests;

create table if not exists `Requests`(
	`student_ID` int not null,
    `book_ID` int not null,
	`created_at` timestamp default now(),
    constraint fk_Requests_Students foreign key (student_ID) references Students(student_ID) on update cascade on delete cascade,
    constraint fk_Requests_Books foreign key (book_ID) references Books(book_ID) on update cascade on delete cascade,
    constraint pk_Requests primary key (student_ID,book_ID)
    );
create table if not exists `Wishlists`(
	`student_ID` int not null,
    `name` varchar(255) not null,
    constraint fk_Wishlists_Students foreign key (student_ID) references Students(student_ID) on update cascade on delete cascade,
    constraint fk_Wishlists_Books foreign key (`name`) references Books(`name`) on update cascade on delete cascade,
    constraint pk_Wishlists primary key (student_ID,`name`)
    );
create table if not exists `Books_has_categories`(
	`category_ID` int not null,
    `book_ID` int not null,
    constraint fk_Categories foreign key (category_ID) references Categories(category_ID) on update cascade on delete cascade,
    constraint fk_Books foreign key (book_ID) references Books(book_ID) on update cascade on delete cascade,
    constraint pk_Categories_Books primary key (category_ID,book_ID)
    );
create table if not exists `Joins`(
	`student_ID` int not null,
	`event_ID` int not null,
    constraint fk_joins_Studentsusers foreign key (student_ID) references Students(Student_ID) on update cascade on delete cascade,
    constraint fk_Joins_events foreign key (event_ID) references `Events`(event_ID) on update cascade on delete cascade,
    constraint pk_Joins primary key (student_ID,event_ID)
    );
    create table if not exists contact(
		contact_ID int primary key not null auto_increment,
        `name` varchar(50) not null,
        email varchar(50) not null,
        message TEXT not null,
        student_ID int,
        constraint fk_contact_student foreign key (student_ID) references Students(Student_ID) on update cascade on delete cascade
    );

    create table if not exists `book_requests`(
	`student_ID` int not null,
    `book_ID` int not null,
	`created_at` timestamp default now(),
    `borrow_date` date not null,
    `return_date` date not null,
    constraint fk_book_Student_request foreign key (student_ID) references Students(student_ID) on update cascade on delete cascade,
    constraint fk_Books_requests foreign key (book_ID) references Books(book_ID) on update cascade on delete cascade,
    constraint pk_book_requests primary key (student_ID,book_ID)
    );
    
