create database films;
use films;

create table user (
    id_user int primary key auto_increment,
    username varchar(20),
    email varchar(20),
    password varchar(20),
    created_date date    
);

create table subs (
    id_subs int primary key auto_increment,
    plan varchar(10),
    price int
);

create table category (
    id_category int primary key auto_increment,
    category varchar(10)
);

create table film (
    id_film int primary key auto_increment,
    title varchar(50),
    label varchar(10),
    rating float,
    genre varchar(20),
    year int,
    image varchar(50),
    video varchar(50),
    id_category int foreign key references category (id_category)
);

create table user_film (
    id_view int primary key auto_increment,
    id_user int foreign key references user (id_user),
    id_film int foreign key references film (id_film),
    comment varchar(100),
    review varchar(100),
    rate float
);

create table user_subs (
    id_buy int primary key auto_increment,
    id_user int foreign key references user (id_user),
    id_subs int foreign key references subs (id_subs),
    buy_date datetime
);