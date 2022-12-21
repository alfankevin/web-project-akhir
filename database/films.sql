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
insert into film values (1, "The Good Lord Bird", "Free", 8.3, "Action", 2019, 13, "1.png", "https://www.youtube.com/embed/Z0wC_ECqU1o", "The Good Lord Bird recounts Little Onion's adventures as he reluctantly accompanies Brown on his anti-slavery crusade: surviving in the wilderness, suffering through Brown's lengthy sermons and crossing paths with key abolitionist leaders, including Frederick Douglass and Harriet Tubman.", now(), 1);
insert into film values (2, "Peaky Blinders", "Subs", 9.6, "Drama", 2013, 14, "2.png", "https://www.youtube.com/embed/2nsT9uQPIrk", "Peaky Blinders is a crime drama centred on a family of mixed Irish Traveller and Romani origins based in Birmingham, England, starting in 1919, several months after the end of the First World War. It centres on the Peaky Blinders street gang and their ambitious, cunning crime boss Tommy Shelby (Murphy).", now(), 2);
insert into film values (3, "The Dictator", "Free", 8.1, "Comedy", 2012, 15, "3.png", "https://www.youtube.com/embed/TjLaLiwJdok", "Aladeen, a brutal dictator, travels to New York in order to address the United Nations Security Council. However, his plans go south when a hitman hired by his uncle, Tamir, kidnaps him.", now(), 3);
insert into film values (4, "Get On Up", "Free", 8.8, "Biography", 2014, 16, "4.png", "https://www.youtube.com/embed/bwEUvSKUpYk", "James Brown (Chadwick Boseman) was born in extreme poverty in 1933 South Carolina and survived abandonment, abuse and jail to become one of the most influential musicians of the 20th century. He joined a gospel group as a teenager, but the jazz and blues along the 'chitlin' circuit' became his springboard to fame.", now(), 4);
insert into film values (5, "Interview With the Vampire", "Subs", 7.9, "Horror", 2004, 13, "5.png", "https://www.youtube.com/embed/q8Oysn9I9K8", "Born as an 18th-century lord, Louis is now a bicentennial vampire, telling his story to an eager biographer. Suicidal after the death of his family, he meets Lestat, a vampire who persuades him to choose immortality over death and become his companion.", now(), 1);
insert into film values (6, "Pawn Sacrifice", "Free", 8.6, "History", 2015, 14, "6.png", "https://www.youtube.com/embed/fD2ZARxmpt0", "American chess legend Bobby Fischer (Tobey Maguire) and Soviet Grandmaster Boris Spassky (Liev Schreiber) enthrall the world with their intense battle of wills and strategy during the 1972 World Chess Championship.", now(), 2);
insert into film values (7, "Operation Finale", "Free", 7, "Drama", 2018, 15, "7.png", "https://www.youtube.com/embed/9ACZaJz9t-E", "Fifteen years after the end of World War II, a team of top-secret Israeli agents travels to Argentina to track down Adolf Eichmann, the Nazi officer who masterminded the transportation logistics that brought millions of innocent Jews to their deaths in concentration camps.", now(), 3);
insert into film values (8, "Denial", "Subs", 7.5, "Drama", 2016, 16, "8.png", "https://www.youtube.com/embed/lPD_LoQHBu0", "In 1993 Deborah Lipstadt and Penguin Books published `Denying the Holocaust'. Two years later the English author David Irving sued her for libel on the grounds that her book had ruined his once well-regarded career as an historian by accusing him of deliberately distorting historical facts.", now(), 4);
insert into film values (9, "Luce", "Free", 7.2, "Drama", 2019, 13, "9.png", "https://www.youtube.com/embed/2_Zer9iT4FY", "Luce, a bright student, gets tormented by his disgruntled history teacher. However, he stays focused on protecting his reputation, not only in high school but also in the eyes of his adoptive parents.", now(), 1);
insert into film values (10, "Fighting with My Family", "Free", 8.9, "Biography", 2020, 14, "10.png", "https://www.youtube.com/embed/WqF3VTv0cqU", "Born into a tight-knit wrestling family, Paige and her brother Zak are ecstatic when they get the once-in-a-lifetime opportunity to try out for the WWE. But when only Paige earns a spot in the competitive training program, she must leave her loved ones behind and face this new cutthroat world alone.", now(), 2);
insert into film values (11, "Footloose", "Subs", 7.2, "Drama", 2011, 15, "11.png", "https://www.youtube.com/embed/P4narQca4Oc", "Teenager Ren and his family move from the city to a small town. He's in for a culture shock and can't quite believe that he's living in a place where rock music and dancing are illegal.", now(), 3);
insert into film values (12, "Swimming for Gold", "Free", 7.6, "Drama", 2021, 16, "12.png", "https://www.youtube.com/embed/7cq4TdLSKvc", "Young elite swimmer Claire is sent to Australia to coach a boys swimming team, where she must overcome an old rival and a secret fear to save the swimming camp from closing.", now(), 4);
insert into film values (13, "Infamous", "Free", 7.1, "Thriller", 2019, 13, "13.png", "https://www.youtube.com/embed/ZAkaKX8Xd6s", "A reckless woman and her new boyfriend become social media sensations when she streams their cross-country robberies online.", now(), 1);
insert into film values (14, "Above the Shadows", "Subs", 7.2, "Science Fiction", 2019, 14, "14.png", "https://www.youtube.com/embed/AAcplHUDzyI", "Holly has faded to the point of becoming invisible, but she has one chance to restore a disgraced MMA fighter, Shane Blackwell, to his former glory, and in doing so regain her foothold in the world around her.", now(), 2);
insert into film values (15, "After Darkness", "Free", 9.1, "Science Fiction", 2018, 15, "15.png", "https://www.youtube.com/embed/HRPalBPCLzU", "As the sun burns out and a brutal darkness shrouds the planet, the hope of rescue is fading for a family who must reckon with long-held grudges and heal painful memories from the past.", now(), 3);
insert into film values (16, "I Still See You", "Free", 9, "Horror", 2018, 16, "16.png", "https://www.youtube.com/embed/HvPmJQiDr_Y", "After a cataclysmic event leaves the world haunted by ghost-like spectres called `Remnants', a high school student is stalked by an angry, violent Remnant who wants to kill her.", now(), 4);
insert into film values (17, "The Midnight Man", "Subs", 8.5, "Thriller", 2018, 13, "17.png", "https://www.youtube.com/embed/wLx7lF8EyhA", "A girl and her friends play a mysterious game which has terrifying results. Playing the game summons a horrifying creature known as the Midnight Man, who uses their worst fears against them.", now(), 1);
insert into film values (18, "The Dustwalker", "Free", 6.3, "Thriller", 2019, 14, "18.png", "https://www.youtube.com/embed/KoO0YGS_zmA", "When an alien spaceship crashes into the Australian desert, the nearby residents start turning into soulless beings.", now(), 2);
insert into film values (19, "The Good Lord Bird", "Free", 8.3, "Action", 2019, 13, "1.png", "https://www.youtube.com/embed/Z0wC_ECqU1o", "The Good Lord Bird recounts Little Onion's adventures as he reluctantly accompanies Brown on his anti-slavery crusade: surviving in the wilderness, suffering through Brown's lengthy sermons and crossing paths with key abolitionist leaders, including Frederick Douglass and Harriet Tubman.", now(), 1);
insert into film values (20, "Peaky Blinders", "Subs", 9.6, "Drama", 2013, 14, "2.png", "https://www.youtube.com/embed/2nsT9uQPIrk", "Peaky Blinders is a crime drama centred on a family of mixed Irish Traveller and Romani origins based in Birmingham, England, starting in 1919, several months after the end of the First World War. It centres on the Peaky Blinders street gang and their ambitious, cunning crime boss Tommy Shelby (Murphy).", now(), 2);
insert into film values (21, "The Dictator", "Free", 8.1, "Comedy", 2012, 15, "3.png", "https://www.youtube.com/embed/TjLaLiwJdok", "Aladeen, a brutal dictator, travels to New York in order to address the United Nations Security Council. However, his plans go south when a hitman hired by his uncle, Tamir, kidnaps him.", now(), 3);
insert into film values (22, "Get On Up", "Free", 8.8, "Biography", 2014, 16, "4.png", "https://www.youtube.com/embed/bwEUvSKUpYk", "James Brown (Chadwick Boseman) was born in extreme poverty in 1933 South Carolina and survived abandonment, abuse and jail to become one of the most influential musicians of the 20th century. He joined a gospel group as a teenager, but the jazz and blues along the 'chitlin' circuit' became his springboard to fame.", now(), 4);
insert into film values (23, "Interview With the Vampire", "Subs", 7.9, "Horror", 2004, 13, "5.png", "https://www.youtube.com/embed/q8Oysn9I9K8", "Born as an 18th-century lord, Louis is now a bicentennial vampire, telling his story to an eager biographer. Suicidal after the death of his family, he meets Lestat, a vampire who persuades him to choose immortality over death and become his companion.", now(), 1);
insert into film values (24, "Pawn Sacrifice", "Free", 8.6, "History", 2015, 14, "6.png", "https://www.youtube.com/embed/fD2ZARxmpt0", "American chess legend Bobby Fischer (Tobey Maguire) and Soviet Grandmaster Boris Spassky (Liev Schreiber) enthrall the world with their intense battle of wills and strategy during the 1972 World Chess Championship.", now(), 2);
insert into film values (25, "Operation Finale", "Free", 7, "Drama", 2018, 15, "7.png", "https://www.youtube.com/embed/9ACZaJz9t-E", "Fifteen years after the end of World War II, a team of top-secret Israeli agents travels to Argentina to track down Adolf Eichmann, the Nazi officer who masterminded the transportation logistics that brought millions of innocent Jews to their deaths in concentration camps.", now(), 3);
insert into film values (26, "Denial", "Subs", 7.5, "Drama", 2016, 16, "8.png", "https://www.youtube.com/embed/lPD_LoQHBu0", "In 1993 Deborah Lipstadt and Penguin Books published `Denying the Holocaust'. Two years later the English author David Irving sued her for libel on the grounds that her book had ruined his once well-regarded career as an historian by accusing him of deliberately distorting historical facts.", now(), 4);
insert into film values (27, "Luce", "Free", 7.2, "Drama", 2019, 13, "9.png", "https://www.youtube.com/embed/2_Zer9iT4FY", "Luce, a bright student, gets tormented by his disgruntled history teacher. However, he stays focused on protecting his reputation, not only in high school but also in the eyes of his adoptive parents.", now(), 1);
insert into film values (28, "Fighting with My Family", "Free", 8.9, "Biography", 2020, 14, "10.png", "https://www.youtube.com/embed/WqF3VTv0cqU", "Born into a tight-knit wrestling family, Paige and her brother Zak are ecstatic when they get the once-in-a-lifetime opportunity to try out for the WWE. But when only Paige earns a spot in the competitive training program, she must leave her loved ones behind and face this new cutthroat world alone.", now(), 2);
insert into film values (29, "Footloose", "Subs", 7.2, "Drama", 2011, 15, "11.png", "https://www.youtube.com/embed/P4narQca4Oc", "Teenager Ren and his family move from the city to a small town. He's in for a culture shock and can't quite believe that he's living in a place where rock music and dancing are illegal.", now(), 3);
insert into film values (30, "Swimming for Gold", "Free", 7.6, "Drama", 2021, 16, "12.png", "https://www.youtube.com/embed/7cq4TdLSKvc", "Young elite swimmer Claire is sent to Australia to coach a boys swimming team, where she must overcome an old rival and a secret fear to save the swimming camp from closing.", now(), 4);
