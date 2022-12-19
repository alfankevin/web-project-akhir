<?php
require "./main/functions.php";
$film = query("SELECT * FROM film LIMIT 18");
$newest = query("SELECT * FROM film ORDER BY year DESC LIMIT 18");
$popular = query("SELECT * FROM film ORDER BY rating DESC LIMIT 18");

if(isset($_POST["search"])) {
    $film = search($_POST["keyword"]);
} else if(isset($_POST["featured"])) {
    $film = featured();
} else if(isset($_POST["popular"])) {
    $film = popular();
} else if(isset($_POST["newest"])) {
    $film = newest();
} else if(isset($_POST["more"])) {
    $film = more();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Films</title>
        <link rel="icon" href="./assets/images/icon/icon.png">
        <script src="https://kit.fontawesome.com/f6faa850c8.js" crossorigin="anonymous"></script>
        <!-- Personal assets -->
        <link rel="stylesheet" href="./assets/styles/style.css">
        <script type="text/javascript" src="./assets/js/script.js" defer></script>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </head>

    <body>
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <div class="logo"><a href="./index.php">Fil<span>ms</span></a></div>
                    <div class="nav-menu">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="./index.php">Home <span class="dot"></span></a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catalog <span class="dot"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Catalog</a></li>
                                    <li><a class="dropdown-item" href="./main/category.php">Category</a></li>
                                    <li><a class="dropdown-item" href="./main/watchlist.php">Watchlist</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">Pricing plans</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">LIVE <span class="dot" id="live"></span></a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#"><span class="dot" id="more"></span><span class="dot" id="more"></span><span class="dot"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="login()">Sign in</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="regist()">Sign up</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="forget()">Forgot password</a></li>
                                    <li><a class="dropdown-item" href="#">Privacy policy</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="./admin/admin.php">Admin pages</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="nav__action">
                        <form action="" method="post" spellcheck="false" autocomplete="off" class="nav__form">
                            <input type="input" name="keyword" placeholder="I'm looking for..." class="nav__search">
                            <button type="submit" name="search" class="nav__action-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                        <div class="nav__login">
                            <span class="nav-link" onclick="login()">Sign in &ensp;<span class="nav__action-btn"><i class="fa-solid fa-arrow-right-to-bracket"></i></span></span>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <section class="signin" id="signin">
            <div class="container">
                <div class="sign__content">
                    <form class="sign__form" action="" method="post" spellcheck="false" autocomplete="off">
                        <span class="sign__exit" onclick="exit()"><i class="fa-solid fa-xmark"></i></span>
                        <a class="sign__logo" href="./index.php">Fil<span>ms</span></a>
                        <div class="sign__group">
                            <input type="email" name="email" placeholder="Email" class="sign__input">
                        </div>
                        <div class="sign__group">
                            <input type="password" name="password" placeholder="Password" class="sign__input">
                        </div>
                        <div class="sign__group">
                            <input type="checkbox" name="remember" checked="checked" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <button type="submit" class="sign__button">Sign in</button>
                        <span class="sign__delimiter">or</span>
                        <div class="sign__social">
                            <a href="#" class="fb"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="tw"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="gl"><i class="fa-brands fa-google"></i></a>
                        </div>
                        <span class="sign__text">Don't have an account? <span onclick="regist()">Sign up!</span></span>
                        <span class="sign__text"><span onclick="forget()">Forgot password?</span></span>
                    </form>
                </div>
            </div>
        </section>

        <section class="signup" id="signup">
            <div class="container">
                <div class="sign__content">
                    <form class="sign__form" action="" method="post" spellcheck="false" autocomplete="off">
                        <span class="sign__exit" onclick="exit()"><i class="fa-solid fa-xmark"></i></span>
                        <a class="sign__logo" href="./index.php">Fil<span>ms</span></a>
                        <div class="sign__group">
                            <input type="text" name="name" placeholder="Name" class="sign__input">
                        </div>
                        <div class="sign__group">
                            <input type="email" name="email" placeholder="Email" class="sign__input">
                        </div>
                        <div class="sign__group">
                            <input type="password" name="password" placeholder="Password" class="sign__input">
                        </div>
                        <div class="sign__group">
                            <input type="checkbox" name="remember" checked="checked" id="remember">
                            <label for="agree">I agree to the <a href="#" class="sign__privacy">Privacy Policy</a></label>
                        </div>
                        <button type="submit" class="sign__button">Sign up</button>
                        <span class="sign__delimiter">or</span>
                        <div class="sign__social">
                            <a href="#" class="fb"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="tw"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="gl"><i class="fa-brands fa-google"></i></a>
                        </div>
                        <span class="sign__text">Already have an account? <span onclick="login()">Sign in!</span></span>
                    </form>
                </div>
            </div>
        </section>

        <section class="forgot" id="forgot">
            <div class="container">
                <div class="sign__content">
                    <form class="sign__form" action="" method="post" spellcheck="false" autocomplete="off">
                        <span class="sign__back" onclick="back()"><i class="fa-solid fa-angle-left"></i></span>
                        <span class="sign__exit" onclick="exit()"><i class="fa-solid fa-xmark"></i></span>
                        <a class="sign__logo" href="./index.php">Fil<span>ms</span></a>
                        <div class="sign__group">
                            <input type="email" name="email" placeholder="Email" class="sign__input">
                        </div>
                        <div class="sign__group">
                            <input type="checkbox" name="agree" checked="checked" id="agree">
                            <label for="agree">I agree to the <a href="#" class="sign__privacy">Privacy Policy</a></label>
                        </div>
                        <button type="submit" class="sign__button">Send</button>
                        <span class="sign__text sign__text-forgot">We will send a password to your Email</span>
                    </form>
                </div>
            </div>
        </section>
        
        <section class="hero">
            <div class="container">
                <div class="hero__content">
                    <a href="#" class="hero__card">
                        <div class="hero__cover">
                            <img src="./assets/images/hero/1.jpg" alt="" class="hero__image">
                            <button class="hero__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <span class="hero__rate">
                                <i class="fa-regular fa-star"></i>7.6
                            </span>
                            <div class="hero__details">
                                <h2 class="hero__title">Tenet</h2>
                                <ul class="hero__label">
                                    <li>Free</li>
                                    <li>Action</li>
                                    <li>2021</li>
                                </ul>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="hero__card">
                        <div class="hero__cover">
                            <img src="./assets/images/hero/2.jpg" alt="" class="hero__image">
                            <button class="hero__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <span class="hero__rate">
                                <i class="fa-regular fa-star"></i>9.1
                            </span>
                            <div class="hero__details">
                                <h2 class="hero__title">Money Plane</h2>
                                <ul class="hero__label">
                                    <li>Free</li>
                                    <li>Action</li>
                                    <li>2021</li>
                                </ul>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="hero__card">
                        <div class="hero__cover">
                            <img src="./assets/images/hero/3.jpg" alt="" class="hero__image">
                            <button class="hero__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <span class="hero__rate">
                                <i class="fa-regular fa-star"></i>8.3
                            </span>
                            <div class="hero__details">
                                <h2 class="hero__title">The Art of Political</h2>
                                <ul class="hero__label">
                                    <li>Free</li>
                                    <li>Documentary</li>
                                    <li>2019</li>
                                </ul>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="hero__card">
                        <div class="hero__cover">
                            <img src="./assets/images/hero/4.jpg" alt="" class="hero__image">
                            <button class="hero__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <span class="hero__rate">
                                <i class="fa-regular fa-star"></i>7.9
                            </span>
                            <div class="hero__details">
                                <h2 class="hero__title">Antebellum</h2>
                                <ul class="hero__label">
                                    <li>Free</li>
                                    <li>Horror</li>
                                    <li>2021</li>
                                </ul>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="hero__card">
                        <div class="hero__cover">
                            <img src="./assets/images/hero/5.jpg" alt="" class="hero__image">
                            <button class="hero__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <span class="hero__rate">
                                <i class="fa-regular fa-star"></i>8.4
                            </span>
                            <div class="hero__details">
                                <h2 class="hero__title">Kids Next Door</h2>
                                <ul class="hero__label">
                                    <li>Free</li>
                                    <li>Documentary</li>
                                    <li>2017</li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <div class="catalog">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="catalog__header">
                            <div class="catalog__navbar">
                                <div class="catalog__select">
                                    <div class="dropdown">
                                        <button class="genre" type="button" data-bs-toggle="dropdown" aria-expanded="false">All genres <span class="angle-down"><i class="fa-solid fa-angle-down"></i></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item dropdown-active" href="#">All genres</a></li>
                                            <li><a class="dropdown-item" href="#">Biography</a></li>
                                            <li><a class="dropdown-item" href="#">Documentary</a></li>
                                            <li><a class="dropdown-item" href="#">Drama</a></li>
                                            <li><a class="dropdown-item" href="#">History</a></li>
                                            <li><a class="dropdown-item" href="#">Science Fiction</a></li>
                                        </ul>
                                    </div>
                                    <div class="dropdown">
                                        <button class="year" type="button" data-bs-toggle="dropdown" aria-expanded="false">All the years <span class="angle-down"><i class="fa-solid fa-angle-down"></i></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item dropdown-active" href="#">All the years</a></li>
                                            <li><a class="dropdown-item" href="#">'80s</a></li>
                                            <li><a class="dropdown-item" href="#">'90s</a></li>
                                            <li><a class="dropdown-item" href="#">2000-10</a></li>
                                            <li><a class="dropdown-item" href="#">2010-20</a></li>
                                            <li><a class="dropdown-item" href="#">2021</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="catalog__tabs">
                                    <button class="checked__tabs" id="featbtn" onclick="feat()">Featured</button>
                                    <button id="popbtn" onclick="pop()">Popular</button>
                                    <button id="newbtn" onclick="news()">Newest</button>
                                </div>
                            </div>
                        </div>
                        <div class="catalog__content show__content" id="featured">
                            <div class="row row--grid">
                                <?php $i = 1 ?>
                                <?php foreach($film as $row): ?>
                                <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                                    <div class="card">
                                        <a class="card__cover" href="./main/details.php?id_film=<?php echo $row["id_film"]; ?>">
                                            <img src="./assets/images/card/<?php echo $row["image"]; ?>" class="card__image">
                                            <img src="./assets/images/icon/play.png" class="card__button">
                                        </a>
                                        <button class="card__save">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                        <span class="card__rate">
                                            <i class="fa-regular fa-star"></i><?php echo $row["rating"]; ?>
                                        </span>
                                        <h3 class="card__title">
                                            <a href="./main/details.php?id_film=<?php echo $row["id_film"]; ?>"><?php echo $row["title"]; ?></a>
                                        </h3>
                                        <ul class="card__label">
                                            <li><?php echo $row["label"]; ?></li>
                                            <li><?php echo $row["genre"]; ?></li>
                                            <li><?php echo $row["year"]; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php $i++ ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="catalog__content" id="popular">
                            <div class="row row--grid">
                                <?php $i = 1 ?>
                                <?php foreach($popular as $row): ?>
                                <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                                    <div class="card">
                                        <a class="card__cover" href="./main/details.php?id_film=<?php echo $row["id_film"]; ?>">
                                            <img src="./assets/images/card/<?php echo $row["image"]; ?>" class="card__image">
                                            <img src="./assets/images/icon/play.png" class="card__button">
                                        </a>
                                        <button class="card__save">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                        <span class="card__rate">
                                            <i class="fa-regular fa-star"></i><?php echo $row["rating"]; ?>
                                        </span>
                                        <h3 class="card__title">
                                            <a href="./main/details.php?id_film=<?php echo $row["id_film"]; ?>"><?php echo $row["title"]; ?></a>
                                        </h3>
                                        <ul class="card__label">
                                            <li><?php echo $row["label"]; ?></li>
                                            <li><?php echo $row["genre"]; ?></li>
                                            <li><?php echo $row["year"]; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php $i++ ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="catalog__content" id="newest">
                            <div class="row row--grid">
                                <?php $i = 1 ?>
                                <?php foreach($newest as $row): ?>
                                <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                                    <div class="card">
                                        <a class="card__cover" href="./main/details.php?id_film=<?php echo $row["id_film"]; ?>">
                                            <img src="./assets/images/card/<?php echo $row["image"]; ?>" class="card__image">
                                            <img src="./assets/images/icon/play.png" class="card__button">
                                        </a>
                                        <button class="card__save">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                        <span class="card__rate">
                                            <i class="fa-regular fa-star"></i><?php echo $row["rating"]; ?>
                                        </span>
                                        <h3 class="card__title">
                                            <a href="./main/details.php?id_film=<?php echo $row["id_film"]; ?>"><?php echo $row["title"]; ?></a>
                                        </h3>
                                        <ul class="card__label">
                                            <li><?php echo $row["label"]; ?></li>
                                            <li><?php echo $row["genre"]; ?></li>
                                            <li><?php echo $row["year"]; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php $i++ ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="row" method="post">
                    <div class="col">
                        <button class="catalog__more" name="more">Load more</button>
                    </div>
                </form>
            </div>
        </div>

        <section class="subscription">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="subs__title">Subscriptions</h2>
                    </div>
                </div>
                <div class="row row--grid">
                    <button class="subs__button subs__button-left"><i class="fa-solid fa-arrow-left"></i></button>
                    <button class="subs__button subs__button-right"><i class="fa-solid fa-arrow-right"></i></button>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                        <div class="card">
                            <a href="#" class="card__cover">
                                <img src="./assets/images/card/11.png" alt="" class="card__image">
                                <img src="./assets/images/icon/view.png" alt="" class="card__button card__button-subs">
                            </a>
                            <button class="card__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <h3 class="card__title card__title-subs">
                                <a href="#">Sports broadcasts</a>
                            </h3>
                            <ul class="card__label card__label-subs">
                                <li>More than 300 movies</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                        <div class="card">
                            <a href="#" class="card__cover">
                                <img src="./assets/images/card/15.png" alt="" class="card__image">
                                <img src="./assets/images/icon/view.png" alt="" class="card__button ">
                            </a>
                            <button class="card__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <h3 class="card__title card__title-subs">
                                <a href="#">Psychological films</a>
                            </h3>
                            <ul class="card__label card__label-subs">
                                <li>More than 200 movies</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                        <div class="card">
                            <a href="#" class="card__cover">
                                <img src="./assets/images/card/2.png" alt="" class="card__image">
                                <img src="./assets/images/icon/view.png" alt="" class="card__button ">
                            </a>
                            <button class="card__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <h3 class="card__title card__title-subs">
                                <a href="#">Crime drama movies</a>
                            </h3>
                            <ul class="card__label card__label-subs">
                                <li>More than 100 movies</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                        <div class="card">
                            <a href="#" class="card__cover">
                                <img src="./assets/images/card/1.png" alt="" class="card__image">
                                <img src="./assets/images/icon/view.png" alt="" class="card__button ">
                            </a>
                            <button class="card__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <h3 class="card__title card__title-subs">
                                <a href="#">Romantic movies</a>
                            </h3>
                            <ul class="card__label card__label-subs">
                                <li>More than 300 movies</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                        <div class="card">
                            <a href="#" class="card__cover">
                                <img src="./assets/images/card/18.png" alt="" class="card__image">
                                <img src="./assets/images/icon/view.png" alt="" class="card__button ">
                            </a>
                            <button class="card__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <h3 class="card__title" style="margin-bottom: 5px;">
                                <a href="#">Movies about the middle ages</a>
                            </h3>
                            <ul class="card__label card__label-subs">
                                <li>More than 200 movies</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                        <div class="card">
                            <a href="#" class="card__cover">
                                <img src="./assets/images/card/3.png" alt="" class="card__image">
                                <img src="./assets/images/icon/view.png" alt="" class="card__button ">
                            </a>
                            <button class="card__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <h3 class="card__title card__title-subs">
                                <a href="#">Fairy tales</a>
                            </h3>
                            <ul class="card__label card__label-subs">
                                <li>More than 100 movies</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <form class="subscription subscription--plan" method="post">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="subs__title">Select Your Plan</h2>
                        <p class="subs__text">No hidden fees, equipment rentals, or installation appointments.</p>
                    </div>
                </div>
                <div class="row row--grid">
                    <div class="col-12 col-md-6 col-xl-4 order-md-2 order-xl-1 col--grid">
                        <div class="plan">
                            <h3 class="plan__title">Regular</h3>
                            <ul class="plan__list">
                                <li><i class="fa-solid fa-check"></i>Films Originals</li>
                                <li><i class="fa-solid fa-check"></i>Switch plans or cancel anytime</li>
                                <li><i class="fa-solid fa-xmark"></i>Stream 65+ top Live</li>
                                <li><i class="fa-solid fa-xmark"></i>TV channels</li>
                            </ul>
                            <span class="plan__price">$11.99<span>/month</span></span>
                            <button class="plan__button">Select plan</button>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-xl-4 order-md-1 order-xl-2 col--grid">
                        <div class="plan plan--best">
                            <h3 class="plan__title">Premium</h3>
                            <ul class="plan__list">
                                <li><i class="fa-solid fa-check"></i>Films Originals</li>
                                <li><i class="fa-solid fa-check"></i>Switch plans or cancel anytime</li>
                                <li><i class="fa-solid fa-check"></i>Stream 65+ top Live</li>
                                <li><i class="fa-solid fa-xmark"></i>TV channels</li>
                            </ul>
                            <span class="plan__price">$34.99<span>/month</span></span>
                            <button class="plan__button">Select plan</button>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 order-md-3 order-xl-3 col--grid">
                        <div class="plan">
                            <h3 class="plan__title">Premium + TV channels</h3>
                            <ul class="plan__list">
                                <li><i class="fa-solid fa-check"></i>Films Originals</li>
                                <li><i class="fa-solid fa-check"></i>Switch plans or cancel anytime</li>
                                <li><i class="fa-solid fa-check"></i>Stream 65+ top Live</li>
                                <li><i class="fa-solid fa-check"></i>TV channels</li>
                            </ul>
                            <span class="plan__price">$49.99<span>/month</span></span>
                            <button class="plan__button">Select plan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-4 order-md-1 order-4">
                        <div class="logo footer__logo"><a href="#">Fil<span>ms</span></a></div>
                        <p class="footer__tagline">Movies & TV Shows, Online cinema,<br>Movie database HTML Website.</p>
                        <div class="footer__social">
                            <a href="#"><img src="./assets/images/social/facebook.png" alt=""></a>
                            <a href="#"><img src="./assets/images/social/twitter.png" alt=""></a>
                            <a href="#"><img src="./assets/images/social/instagram.png" alt=""></a>
                            <a href="#"><img src="./assets/images/social/vk.png" alt=""></a>
                            <a href="#"><img src="./assets/images/social/tiktok.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 order-md-2 order-1">
                        <h6 class="footer__title">Films</h6>
                        <div class="footer__nav">
                            <a href="#">About us</a>
                            <a href="#">My profile</a>
                            <a href="#">Pricing plans</a>
                            <a href="#">Contacts</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-4 order-md-3 order-3">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="footer__title">Browse</h6>
                            </div>
                            <div class="col-6">
                                <div class="footer__nav">
                                    <a href="#">Live TV</a>
                                    <a href="#">Live News</a>
                                    <a href="#">Live Sports</a>
                                    <a href="#">Streaming Library</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="footer__nav">
                                    <a href="#">TV Shows</a>
                                    <a href="#">Movies</a>
                                    <a href="#">Kids</a>
                                    <a href="#">Collections</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 order-md-4 order-2">
                        <h6 class="footer__title">Help</h6>
                        <div class="footer__nav">
                            <a href="#">Account & Billing</a>
                            <a href="#">Plans & Pricing</a>
                            <a href="#">Supported devices</a>
                            <a href="#">Accessibility</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="footer__content">
                            <div class="footer__copyright">
                                <span>© Films, 2022. Created by al, Design by Dmitry Volkov.</span> 
                            </div>
                            <div class="footer__link">
                                <a href="#">Privacy policy</a>
                                <a href="#">Terms and conditions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>