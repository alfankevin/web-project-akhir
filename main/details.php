<?php
require "functions.php";
$film = query("SELECT * FROM film LIMIT 18");

if(isset($_POST["search"])) {
    $film = search($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Films</title>
        <link rel="icon" href="../assets/images/icon/icon.png">
        <!-- Personal assets -->
        <link rel="stylesheet" href="../assets/styles/style.css">
        <script type="text/javascript" src="../assets/js/script.js" defer></script>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <!-- Font -->
        <script src="https://kit.fontawesome.com/f6faa850c8.js" crossorigin="anonymous"></script>
        <style> @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap'); </style>
    </head>

    <body>
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <div class="logo"><a href="./category.php">Fil<span>ms</span></a></div>
                    <div class="nav-menu">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="/web-project-akhir/index.php">Home <span class="dot"></span></a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catalog <span class="dot"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Catalog</a></li>
                                    <li><a class="dropdown-item" href="./category.php">Category</a></li>
                                    <li><a class="dropdown-item" href="./watchlist.php">Watchlist</a></li>
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
                                    <li><a class="dropdown-item" href="../admin/admin.php">Admin pages</a></li>
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
                        <a class="sign__logo" href="./category.php">Fil<span>ms</span></a>
                        <div class="sign__group">
                            <input type="text" name="email" placeholder="Email" class="sign__input">
                        </div>
                        <div class="sign__group">
                            <input type="password" name="password" placeholder="Password" class="sign__input">
                        </div>
                        <div class="sign__group">
                            <input type="checkbox" name="remember" checked="checked" class="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <button class="sign__button">Sign in</button>
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
                        <a class="sign__logo" href="./category.php">Fil<span>ms</span></a>
                        <div class="sign__group">
                            <input type="text" name="name" placeholder="Name" class="sign__input">
                        </div>
                        <div class="sign__group">
                            <input type="text" name="email" placeholder="Email" class="sign__input">
                        </div>
                        <div class="sign__group">
                            <input type="password" name="password" placeholder="Password" class="sign__input">
                        </div>
                        <div class="sign__group">
                            <input type="checkbox" name="remember" checked="checked" class="remember">
                            <label for="agree">I agree to the <a href="#" class="sign__privacy">Privacy Policy</a></label>
                        </div>
                        <button class="sign__button">Sign up</button>
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
                        <a class="sign__logo" href="./category.php">Fil<span>ms</span></a>
                        <div class="sign__group">
                            <input type="text" name="email" placeholder="Email" class="sign__input">
                        </div>
                        <div class="sign__group">
                            <input type="checkbox" name="agree" checked="checked" id="agree">
                            <label for="agree">I agree to the <a href="#" class="sign__privacy">Privacy Policy</a></label>
                        </div>
                        <button class="sign__button">Send</button>
                        <span class="sign__text sign__text-forgot">We will send a password to your Email</span>
                    </form>
                </div>
            </div>
        </section>

        <section class="details">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="details__header">
                            <h1 class="details__title">Peaky Blinders</h1>
                            <ul class="details__label">
                                <li><i class="fa-regular fa-star"></i> 9.0</li>
                                <li><span class="dot" id="label"></span></li>
                                <li>Action</li>
                                <li><span class="dot" id="label"></span></li>
                                <li>Action</li>
                                <li><span class="dot" id="label"></span></li>
                                <li>Action</li>
                                <li><span class="dot" id="label"></span></li>
                                <li>Action</li>
                            </ul>
                            <p class="details__desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat numquam quam eaque, dolor incidunt nisi soluta eius optio minus, aliquid saepe molestiae nemo, rem fugit neque. Numquam culpa et odio quaerat, mollitia saepe doloribus dignissimos molestiae cupiditate error ex ipsam?</p>
                        </div>
                    </div>
                    <div class="col-8">
                        <form class="details__video" method="post">
                            <div class="video__cover">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/2nsT9uQPIrk" allowfullscreen></iframe>
                            </div>
                            <div class="video__action">
                                <div class="video__download">
                                    <i class="fa-regular fa-circle-down"></i>Download:
                                    <a href="#">480p</a>
                                    <a href="#">720p</a>
                                    <a href="#">1080p</a>
                                    <a href="#">4k</a>
                                </div>
                                <div class="video__save">
                                    <button><i class="fa-regular fa-bookmark"></i>Add to favorites</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="comment">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="comment__title">
                            <h2>Comments</h2>
                            <h2>Reviews</h2>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="comment__item">
                            <div class="comment__author">
                                <img class="comment__avatar" src="../assets/images/icon/user.jpeg" alt="">
                                <span class="comment__name">Alfan Farchi</span>
                                <span class="comment__time">17-12-2022 12:37:11</span>
                            </div>
                            <div class="comment__text">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste, magnam!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="comment__item">
                            <div class="comment__author">
                                <img class="comment__avatar" src="../assets/images/icon/user.jpeg" alt="">
                                <span class="comment__name">Alfan Farchi</span>
                                <span class="comment__time">17-12-2022 12:37:11</span>
                            </div>
                            <div class="comment__text">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste, magnam!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <form action="" class="comment__form" method="post">
                            <div class="sign__group">
                                <textarea id="text" name="text" class="sign__textarea" placeholder="Add comment"></textarea>
                            </div>
                            <button class="sign__button">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="subscription">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <a href="#" class="subs__title">Similar movies and TV series</a>
                    </div>
                </div>
                <div class="row row--grid">
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                        <div class="card">
                            <a class="card__cover" href="#">
                                <img src="../assets/images/card/1.png" class="card__image">
                                <img src="../assets/images/icon/play.png" class="card__button">
                            </a>
                            <button class="card__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <span class="card__rate">
                                <i class="fa-regular fa-star"></i>8.3
                            </span>
                            <h3 class="card__title">
                                <a href="#">The Good Lord Bird</a>
                            </h3>
                            <ul class="card__label">
                                <li>Free</li>
                                <li>Action</li>
                                <li>2019</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                        <div class="card">
                            <a class="card__cover" href="#">
                                <img src="../assets/images/card/2.png" class="card__image">
                                <img src="../assets/images/icon/play.png" class="card__button">
                            </a>
                            <button class="card__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <span class="card__rate">
                                <i class="fa-regular fa-star"></i>9.6
                            </span>
                            <h3 class="card__title">
                                <a href="#">Peaky Blinders</a>
                            </h3>
                            <ul class="card__label">
                                <li>Free</li>
                                <li>Drama</li>
                                <li>2013</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                        <div class="card">
                            <a class="card__cover" href="#">
                                <img src="../assets/images/card/3.png" class="card__image">
                                <img src="../assets/images/icon/play.png" class="card__button">
                            </a>
                            <button class="card__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <span class="card__rate">
                                <i class="fa-regular fa-star"></i>8.1
                            </span>
                            <h3 class="card__title">
                                <a href="#">The Dictator</a>
                            </h3>
                            <ul class="card__label">
                                <li>Free</li>
                                <li>Comedy</li>
                                <li>2012</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                        <div class="card">
                            <a class="card__cover" href="#">
                                <img src="../assets/images/card/4.png" class="card__image">
                                <img src="../assets/images/icon/play.png" class="card__button">
                            </a>
                            <button class="card__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <span class="card__rate">
                                <i class="fa-regular fa-star"></i>8.8
                            </span>
                            <h3 class="card__title">
                                <a href="#">Get On Up</a>
                            </h3>
                            <ul class="card__label">
                                <li>Free</li>
                                <li>Biography</li>
                                <li>2014</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                        <div class="card">
                            <a class="card__cover" href="#">
                                <img src="../assets/images/card/5.png" class="card__image">
                                <img src="../assets/images/icon/play.png" class="card__button">
                            </a>
                            <button class="card__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <span class="card__rate">
                                <i class="fa-regular fa-star"></i>7.9
                            </span>
                            <h3 class="card__title">
                                <a href="#">Interview With the Vampire</a>
                            </h3>
                            <ul class="card__label">
                                <li>Free</li>
                                <li>Horror</li>
                                <li>1994</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                        <div class="card">
                            <a class="card__cover" href="#">
                                <img src="../assets/images/card/6.png" class="card__image">
                                <img src="../assets/images/icon/play.png" class="card__button">
                            </a>
                            <button class="card__save">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                            <span class="card__rate">
                                <i class="fa-regular fa-star"></i>8.6
                            </span>
                            <h3 class="card__title">
                                <a href="#">Pawn Sacrifice</a>
                            </h3>
                            <ul class="card__label">
                                <li>Free</li>
                                <li>History</li>
                                <li>2015</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-4 order-md-1 order-4">
                        <div class="logo"><a href="#">Fil<span>ms</span></a></div>
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