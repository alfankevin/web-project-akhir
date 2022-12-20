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
insert into user values(9, 'roman@gmail.com', 'briannaroman', 'Brianna Roman', now());
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
insert into film values (1, 'The Good Lord Bird', 'Free', 8.3, 'Action', 2019, 15, '1.png', 'https://www.youtube.com/embed/Z0wC_ECqU1o', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 1);
insert into film values (2, 'Peaky Blinders', 'Subs', 9.6, 'Drama', 2013, 16, '2.png', 'https://www.youtube.com/embed/2nsT9uQPIrk', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 2);
insert into film values (3, 'The Dictator', 'Free', 8.1, 'Comedy', 2012, 17, '3.png', 'https://www.youtube.com/embed/TjLaLiwJdok', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 3);
insert into film values (4, 'Get On Up', 'Free', 8.8, 'Biography', 2014, 18, '4.png', 'https://www.youtube.com/embed/bwEUvSKUpYk', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 4);
insert into film values (5, 'Interview With the Vampire', 'Subs', 7.9, 'Horror', 2004, 15, '5.png', 'https://www.youtube.com/embed/q8Oysn9I9K8', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 1);
insert into film values (6, 'Pawn Sacrifice', 'Free', 8.6, 'History', 2015, 16, '6.png', 'https://www.youtube.com/embed/fD2ZARxmpt0', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 2);
insert into film values (7, 'Operation Finale', 'Free', 7, 'Drama', 2018, 17, '7.png', 'https://www.youtube.com/embed/9ACZaJz9t-E', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 3);
insert into film values (8, 'Denial', 'Subs', 7.5, 'Drama', 2016, 18, '8.png', 'https://www.youtube.com/embed/lPD_LoQHBu0', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 4);
insert into film values (9, 'Luce', 'Free', 7.2, 'Drama', 2019, 15, '9.png', 'https://www.youtube.com/embed/2_Zer9iT4FY', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 1);
insert into film values (10, 'Fighting with My Family', 'Free', 8.9, 'Biography', 2020, 16, '10.png', 'https://www.youtube.com/embed/WqF3VTv0cqU', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 2);
insert into film values (11, 'Footloose', 'Subs', 7.2, 'Drama', 2011, 17, '11.png', 'https://www.youtube.com/embed/P4narQca4Oc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 3);
insert into film values (12, 'Swimming for Gold', 'Free', 7.6, 'Drama', 2021, 18, '12.png', 'https://www.youtube.com/embed/7cq4TdLSKvc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 4);
insert into film values (13, 'Infamous', 'Free', 7.1, 'Thriller', 2019, 15, '13.png', 'https://www.youtube.com/embed/ZAkaKX8Xd6s', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 1);
insert into film values (14, 'Above the Shadows', 'Subs', 7.2, 'Science Fiction', 2019, 16, '14.png', 'https://www.youtube.com/embed/AAcplHUDzyI', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 2);
insert into film values (15, 'After Darkness', 'Free', 9.1, 'Science Fiction', 2018, 17, '15.png', 'https://www.youtube.com/embed/HRPalBPCLzU', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 3);
insert into film values (16, 'I Still See You', 'Free', 9, 'Horror', 2018, 18, '16.png', 'https://www.youtube.com/embed/HvPmJQiDr_Y', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 4);
insert into film values (17, 'The Midnight Man', 'Subs', 8.5, 'Thriller', 2018, 15, '17.png', 'https://www.youtube.com/embed/wLx7lF8EyhA', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 1);
insert into film values (18, 'The Dustwalker', 'Free', 6.3, 'Thriller', 2019, 16, '18.png', 'https://www.youtube.com/embed/KoO0YGS_zmA', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 2);
insert into film values (19, 'The Good Lord Bird', 'Free', 5.3, 'Action', 2000, 17, '1.png', 'https://www.youtube.com/embed/Z0wC_ECqU1o', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 1);
insert into film values (20, 'Peaky Blinders', 'Subs', 6.6, 'Drama', 2000, 18, '2.png', 'https://www.youtube.com/embed/2nsT9uQPIrk', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 2);
insert into film values (21, 'The Dictator', 'Free', 5.1, 'Comedy', 2000, 15, '3.png', 'https://www.youtube.com/embed/TjLaLiwJdok', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 3);
insert into film values (22, 'Get On Up', 'Free', 5.8, 'Biography', 2000, 16, '4.png', 'https://www.youtube.com/embed/bwEUvSKUpYk', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 4);
insert into film values (23, 'Interview With the Vampire', 'Subs', 4.9, 'Horror', 2000, 17, '5.png', 'https://www.youtube.com/embed/q8Oysn9I9K8', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 1);
insert into film values (24, 'Pawn Sacrifice', 'Free', 5.6, 'History', 2000, 18, '6.png', 'https://www.youtube.com/embed/fD2ZARxmpt0', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 2);
insert into film values (25, 'Operation Finale', 'Free', 4, 'Drama', 2000, 15, '7.png', 'https://www.youtube.com/embed/9ACZaJz9t-E', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 3);
insert into film values (26, 'Denial', 'Subs', 4.5, 'Drama', 2000, 16, '8.png', 'https://www.youtube.com/embed/lPD_LoQHBu0', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 4);
insert into film values (27, 'Luce', 'Free', 4.2, 'Drama', 2000, 17, '9.png', 'https://www.youtube.com/embed/2_Zer9iT4FY', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 1);
insert into film values (28, 'Fighting with My Family', 'Free', 5.9, 'Biography', 2000, 18, '10.png', 'https://www.youtube.com/embed/WqF3VTv0cqU', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 2);
insert into film values (29, 'Footloose', 'Subs', 4.2, 'Drama', 2000, 15, '11.png', 'https://www.youtube.com/embed/P4narQca4Oc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 3);
insert into film values (30, 'Swimming for Gold', 'Free', 4.6, 'Drama', 2000, 16, '12.png', 'https://www.youtube.com/embed/7cq4TdLSKvc', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe mollitia provident officia consectetur ad, molestias error deserunt molestiae dicta odit assumenda quo sed nam qui doloribus accusamus corrupti id a tempore vel. Assumenda exercitationem eaque amet ullam iste quaerat nihil?', now(), 4);
