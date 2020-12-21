create database facultydb;
use facultydb;
select * from publication;
select * from department;
select * from faculty;
select  * from authored_books;
select * from books;


select * from books inner join authored_books on books.title = authored_books.title inner join faculty on authored_books.fIDNumber = faculty.fIDNumber where deptID = 'SCS';
SELECT DISTINCT title FROM books WHERE title in (SELECT title FROM authored_books where fIDNumber = 1);
select * from faculty inner join department on faculty.deptID = department.deptID;

select * from faculty;
select * from degree;
select * from department;

create table department(
deptID varchar(5) primary key,
deptName varchar(255),
telephoneNumber varchar(11),
deptAddress varchar(255)
);

insert into department values('SCS','School of Computer Studies','1111111','Basak Campus');
insert into department values('SAS','School of Arts and Sciences','222222','Main Campus');
insert into department values('SEng','School of Engineering','333333','Main Campus');
insert into department values('SBM', 'School of Business and Management','444444','Main Campus');
insert into department values('SAMS','School of Allied Medical Sciences','555555','Main Campus');
insert into department values('SL','School of Law','666666','Main Campus');
insert into department values('SE','School of Education','777777','Basak Campus');

create table faculty(
fIDNumber varchar(8) primary key,
fFirstName varchar (255) not null,
fLastName varchar (255) not null,
fEmailAdd varchar(255),
deptID varchar(5),
fMiddleName varchar(50),
foreign key (deptID) references department(deptID)
on delete set null on update cascade
);
drop table faculty;

select count(userID) from users;
select * from users;
select * from faculty;

select count(userID) from users;
# alter table faculty add fMiddleName varchar(50);
insert into faculty values('1','Onin','Pantaleon','onin@gmail.com','SCS','T');
insert into faculty values('2','Wesley','Gamponia','wesley@gmail.com','SCS','V');
insert into faculty values('3','Jeremiah','Galorn','asdfg@gmail.com','SAS','A');
insert into faculty values('4','Bordon','Haluma','borasd@gmail.com','SBM','X');
insert into faculty values('5','Turat','Bakasi','bakasi@gmail.com','SL','Y');

select * from department;
select * from faculty;

create table publication_type(
pubtypeID int auto_increment primary key,
pubtype varchar(255)
);

create table publication(
pubID int auto_increment primary key,
pubName varchar(255),
pubAddress varchar(255)
);

create table books(
bookID int primary key auto_increment,
title varchar(255) not null,
pubName varchar(255), 
pubType varchar(255)
);

drop table publication;
drop table books;
drop table author_books;

create table course(
courseID varchar(5) primary key,
courseDesc varchar(255) not null,
courseDay varchar(50),
courseTime varchar(50),
courseRoom varchar(50)
);

create table degree(
degreeID int auto_increment primary key,
degree varchar(255),
degreeYear int(4), 
fIDNumber varchar(8),
foreign key(fIDNumber) references faculty(fIDNumber) on delete set null on update cascade
);

create table work_history(
company varchar(255) primary key,
companyPosition varchar(255),
workYear varchar(4),
fIDNumber varchar(8),
foreign key (fIDNumber) references faculty(fIDNumber) on delete set null on update cascade
);

select * from award;
create table award(
awardID int auto_increment primary key,
awardDesc varchar(255),
awardMonth varchar(255),
awardDate varchar(5),
awardYear varchar(4)
);
select * from usergroups;

SELECT DISTINCT awardDesc,awardMonth,awardDate,awardYear FROM award WHERE awardDesc in (SELECT awardDesc FROM grant_recipeints where fIDNumber = 1);

create table grant_recipeints(
awardDesc varchar(255),
fIDNumber varchar(8),
foreign key (fIDNumber) references faculty(fIDNumber) on delete set null on update cascade
);

create table courses_taught(
courseID varchar(5),
fIDNumber varchar(8),
foreign key (fIDNumber) references faculty(fIDNumber) on delete set null on update cascade,
foreign key (courseID) references course(courseID) on delete set null on update cascade
);

create table authored_books(
fIDNumber varchar(8),
title varchar(255),
foreign key (fIDNumber) references faculty(fIDNumber) on delete set null on update cascade
);	


create table degree_program(
degreeID int auto_increment primary key,
degree varchar(255)
);

insert into publication(pubName,pubAddress) values('rex','solis');
insert into publication(pubName,pubAddress) values('hops','cow');
insert into publication(pubName,pubAddress) values('josh','dots');
select * from publication;

insert into publication_type(pubType) values('novel');
insert into publication_type(pubType) values('journal');

#wla nako gi insert
select * from course;
insert into course values('1','Web','Friday','3:00 - 6:00','MS Teams');
insert into course values('2','Mobile','Friday','8:00 - 11:00','MS Teams');

#wala nako gi insert
insert into courses_taught values ('1','1');
insert into courses_taught values ('1','2');
insert into courses_taught values ('2','1');
insert into courses_taught values ('2','2');

select * from courses_taught;

insert into degree_program(degree) values('Bachelor of Science in NURSING');
insert into degree_program(degree) values('Bachelor of Science in MEDICAL TECHNOLOGY');
insert into degree_program(degree) values('Bachelor of Arts in COMMUNICATION');
insert into degree_program(degree) values('Bachelor of Arts in MARKETING COMMUNICATION');
insert into degree_program(degree) values('Bachelor of Arts in JOURNALISM');
insert into degree_program(degree) values('Bachelor of Arts in ENGLISH LANGUAGE STUDIES');
insert into degree_program(degree) values('Bachelor of Arts in INTERNATIONAL STUDIES');
insert into degree_program(degree) values('Bachelor of Arts in POLITICAL SCIENCE');
insert into degree_program(degree) values('Bachelor of Science in BIOLOGY major in MEDICAL BIOLOGY');
insert into degree_program(degree) values('Bachelor of Science in BIOLOGY major in MICROBIOLOGY');
insert into degree_program(degree) values('Bachelor of Arts in PHILOSOPHY');
insert into degree_program(degree) values('Bachelor of Science in PSYCHOLOGY');
insert into degree_program(degree) values('Bachelor of LIBRARY and INFORMATION SCIENCE');
insert into degree_program(degree) values('Bachelor of Science in CIVIL ENGINEERING');
insert into degree_program(degree) values('Bachelor of Science in COMPUTER ENGINEERING');
insert into degree_program(degree) values('Bachelor of Science in ELECTRICAL ENGINEERING');
insert into degree_program(degree) values('Bachelor of Science in ELECTRONICS ENGINEERING');
insert into degree_program(degree) values('Bachelor of Science in INDUSTRIAL ENGINEERING');
insert into degree_program(degree) values('Bachelor of Science in MECHANICAL ENGINEERING');
insert into degree_program(degree) values('Bachelor of Science in ACCOUNTANCY');
insert into degree_program(degree) values('Bachelor of Science in MANAGEMENT ACCOUNTING');
insert into degree_program(degree) values('Bachelor of Science in BUSINESS ADMINISTRATION major in FINANCIAL MANAGEMENT');
insert into degree_program(degree) values('Bachelor of Science in BUSINESS ADMINISTRATION major in OPERATIONS MANAGEMENT');
insert into degree_program(degree) values('Bachelor of Science in BUSINESS ADMINISTRATION major in HUMAN RESOURCE MANAGEMENT');
insert into degree_program(degree) values('Bachelor of Science in BUSINESS ADMINISTRATION major in MARKETING MANAGEMENT');
insert into degree_program(degree) values('Bachelor of Science in ENTREPRENEURSHIP');
insert into degree_program(degree) values('Bachelor of Science in HOSPITALITY MANAGEMENT');
insert into degree_program(degree) values('Bachelor of Science in HOSPITALITY MANAGEMENT major in FOOD and BEVERAGE');
insert into degree_program(degree) values('Bachelor of Science in TOURISM MANAGEMENT');
insert into degree_program(degree) values('Bachelor of ELEMENTARY EDUCATION');
insert into degree_program(degree) values('Bachelor of EARLY CHILDHOOD EDUCATION');
insert into degree_program(degree) values('Bachelor of PHYSICAL EDUCATION');
insert into degree_program(degree) values('Bachelor of SPECIAL NEEDS EDUCATION- GENERALIST');
insert into degree_program(degree) values('Bachelor of SPECIAL NEEDS EDUCATION major in EARLY CHILDHOOD EDUCATION');
insert into degree_program(degree) values('Bachelor of SPECIAL NEEDS EDUCATION major in ELEMENTARY SCHOOL TEACHING');
insert into degree_program(degree) values('Bachelor of SECONDARY EDUCATION major in ENGLISH');
insert into degree_program(degree) values('Bachelor of SECONDARY EDUCATION major in FILIPINO');
insert into degree_program(degree) values('Bachelor of SECONDARY EDUCATION major in MATHEMATICS');
insert into degree_program(degree) values('Bachelor of SECONDARY EDUCATION major in SCIENCE');
insert into degree_program(degree) values('Bachelor of Science in COMPUTER SCIENCE');
insert into degree_program(degree) values('Bachelor of Science in ENTERTAINMENT & MULTIMEDIA COMPUTING');
insert into degree_program(degree) values('Bachelor of Science in INFORMATION TECHNOLOGY');
insert into degree_program(degree) values('Bachelor of Science in INFORMATION SYSTEMS');
select * from degree_program;

create table faculty_month(
fMonth varchar(255)
);

insert into faculty_month values('January');
insert into faculty_month values('Febuary');
insert into faculty_month values('March');
insert into faculty_month values('April');
insert into faculty_month values('May');
insert into faculty_month values('June');
insert into faculty_month values('July');
insert into faculty_month values('August');
insert into faculty_month values('September');
insert into faculty_month values('October');
insert into faculty_month values('November');
insert into faculty_month values('December');

create table faculty_date(
fDate varchar(2)
);
create table faculty_year(
fYear varchar(4)
);


drop procedure if exists addDate;
delimiter $$
create procedure addDate()
begin
declare fdate int default 1;
repeat
	insert into faculty_date values (fdate);
	set fdate = fdate + 1;
    until fdate = 32
end repeat;

end $$
delimiter ;

call addDate();

drop procedure if exists addYear;
delimiter $$
create procedure addYear()
begin
declare fyear int default 1980;
repeat
	insert into faculty_year values (fyear);
	set fyear = fyear + 1;
    until fyear = 2021
end repeat;

end $$
delimiter ;

call addYear();


select * from faculty_year;
select * from faculty_date;



