create database pos;

use pos;

create table user(id varchar(250) not null primary key, password varchar(250) not null, email varchar(250) not null, name varchar(250) not null);

create table item(name varchar(250) primary key not null, price int not null, date timestamp default current_timestamp);

create table customer(id int primary key auto_increment not null, name varchar(250) not null, phone varchar(250) not null unique);

create table work(id int not null, item varchar(250) not null , amount int not null default 0);

create table sales(id int not null, sale int not null, date timestamp default current_timestamp);