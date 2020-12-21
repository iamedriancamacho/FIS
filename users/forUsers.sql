create database Facultydb;
use Facultydb;

create table Users(
 userID	int primary key auto_increment,
 userName varchar(50),
 userPass varchar(255),
 userFirstName varchar(15) not null,
 userLastName varchar(15) not null
);
drop table Users;

create table GroupsList(
 roleID int primary key,
 roleDesc varchar(255)
);

create table UserGroups(
 userGroupID int primary key auto_increment,
 userID int,
 roleID int,
 foreign key (userID) references Users (userID) on delete set null on update cascade,
 foreign key (roleID) references GroupsList (roleID) on delete set null on update cascade
);
drop table  UserGroups;

 -- updateData: add, edit, delete user information
create table UserGroupRights(
 roleID int primary key,
 canCreateUsers boolean,
 canUpdateData boolean,
 canBrowseData boolean,
 canUpdateSelf boolean,
 canUpdateAll boolean,
 foreign key (roleID) references GroupsList (roleID)
);

insert into groupslist values (0, 'Administrator');
insert into groupslist values (1, 'University Official');
insert into groupslist values (2, 'Instructor');
insert into groupslist values (3, 'Student');
insert into groupslist values (4, 'General User');
select * from groupslist;

insert into usergrouprights values (0, TRUE, TRUE, TRUE, TRUE, TRUE);
insert into usergrouprights values (1, FALSE, TRUE, TRUE, TRUE, FALSE);
insert into usergrouprights values (2, FALSE, TRUE, TRUE, TRUE, FALSE);
insert into usergrouprights values (3, FALSE, FALSE, TRUE, FALSE, FALSE);
insert into usergrouprights values (4, FALSE, FALSE, TRUE, FALSE, FALSE);
select * from usergrouprights;
