drop table appuser cascade;
drop table guessgamestats cascade;
drop table puzzle15stats cascade;
drop table pegsolitairestats cascade;
drop table mastermindstats cascade;

create table appuser (
	username varchar(50) primary key,
	password varchar(200),
	gender varchar(50),
	favegame varchar(50)
);

create table guessgamestats (
	username varchar(50) primary key,
	timestried int,
	besttries int
);

create table puzzle15stats (
	username varchar(50) primary key,
	timestried int,
	timeswon int
);

create table pegsolitairestats (
	username varchar(50) primary key,
	timestried int,
	timeswon int
);

create table mastermindstats (
	username varchar(50) primary key,
	timestried int,
	timeswon int
);



