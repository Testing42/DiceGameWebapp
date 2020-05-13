drop database if exists `dicegame2`;
create database if not exists dicegame2;
# I would remove the above
use `dicegame2`;


create table `users`(
    `username` nvarchar(60) not null primary key,
    `firstname` nvarchar(60) not null,
    `lastname` nvarchar(60) not null,
    `password` char(60) not null,
    `image` longblob,
    unique(`username`)
);


create table `images`(
	`imageId`int(11) unsigned not null auto_increment primary key,
    `image` longblob NOT NULL,
	`uploaded` datetime NOT NULL
);




