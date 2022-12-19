create database films;
use films;

create table user (
    id_user int primary key auto_increment,
    email varchar(40),
    password varchar(20),
    username varchar(30),
    create_date datetime
);

create table subs (
    id_subs int primary key auto_increment,
    plan varchar(10),
    price float
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
    age int,
    image varchar(50),
    video varchar(50),
    film_desc varchar(500),
    film_date datetime,
    id_category int,
    foreign key (id_category) references category (id_category)
);

create table user_film (
    id_view int primary key auto_increment,
    id_user int,
    id_film int,
    review_title varchar(20),
    comment varchar(500),
    review varchar(500),
    rate float,
    save char(1),
    text_date datetime,
    foreign key (id_user) references user (id_user),
    foreign key (id_film) references film (id_film)
);

create table user_subs (
    id_buy int primary key auto_increment,
    id_user int,
    id_subs int,
    buy_date datetime,
    foreign key (id_user) references user (id_user),
    foreign key (id_subs) references subs (id_subs)
);

insert into user values(1, 'hamilton@gmail.com', 'leonhamilton', 'Leon Hamilton', now());
insert into user values(2, 'wells@gmail.com', 'nataliewells', 'Natalie Wells', now());
insert into user values(3, 'reeves@gmail.com', 'guyreeves', 'Guy Reeves', now());
insert into user values(4, 'turner@gmail.com', 'bessieturner', 'Bessie Turner', now());
insert into user values(5, 'cordova@gmail.com', 'aminahcordova', 'Aminah Cordova', now());
insert into user values(6, 'webb@gmail.com', 'armaanwebb', 'Armaan Webb', now());
insert into user values(7, 'daugherty@gmail.com', 'eugenedaugherty', 'Eugene Daugherty', now());
insert into user values(8, 'larsen@gmail.com', 'evelynlarsen', 'Evelyn Larsen', now());
insert into user values(9, 'eoman@gmail.com', 'briannaroman', 'Brianna Roman', now());
insert into user values(10, 'ryan@gmail.com', 'rexryan', 'Rex Ryan', now());
insert into subs values(1, 'Free', 0);
insert into subs values(2, 'Regular', 11.99);
insert into subs values(3, 'Premium', 34.99);
insert into subs values(4, 'Cinematic', 49.99);
insert into category values(1, 'Movie');
insert into category values(2, 'Series');
insert into category values(3, 'TV Show');
insert into category values(4, 'Cartoon');
insert into user_subs values(1, 1, 1, now());
insert into user_subs values(2, 2, 2, now());
insert into user_subs values(3, 3, 3, now());
insert into user_subs values(4, 4, 4, now());
insert into user_subs values(5, 5, 1, now());
insert into user_subs values(6, 6, 2, now());
insert into user_subs values(7, 7, 3, now());
insert into user_subs values(8, 8, 4, now());
insert into user_subs values(9, 9, 1, now());
insert into user_subs values(10, 10, 2, now());