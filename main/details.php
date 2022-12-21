<?php
require "functions.php";

$id_film = $_GET["id_film"];
$film = query("SELECT * FROM film INNER JOIN category ON film.id_category = category.id_category WHERE id_film = $id_film");
$view = query("SELECT * FROM user INNER JOIN user_film ON user.id_user = user_film.id_user INNER JOIN film ON film.id_film = user_film.id_film");

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
        <!-- Icon -->
        <link rel="icon" href="../assets/images/icon/icon.png">
        <script src="https://kit.fontawesome.com/f6faa850c8.js" crossorigin="anonymous"></script>
        <!-- Personal assets -->
        <link rel="stylesheet" href="../assets/styles/style.css">
        <script type="text/javascript" src="../assets/js/script.js" defer></script>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </head>

    <body>
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-dark" id="navbar__details">
                <div class="container">
                    <div class="logo"><a href="../index.php">Fil<span>ms</span></a></div>
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
                                    <li><a class="dropdown-item" href="../admin/catalog.php">Admin pages</a></li>
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
                        <a class="sign__logo" href="./category.php">Fil<span>ms</span></a>
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
                        <a class="sign__logo" href="./category.php">Fil<span>ms</span></a>
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

        <section class="details">
            <div class="container">
                <div class="row">
                    <?php $i = 1 ?>
                    <?php foreach($film as $row): ?>
                    <div class="col-12 col-lg-8">
                        <div class="details__header">
                            <h1 class="details__title"><?php echo $row["title"]; ?></h1>
                            <ul class="details__label">
                                <li><i class="fa-regular fa-star"></i> <?php echo $row["rating"]; ?></li>
                                <li><span class="dot" id="label"></span></li>
                                <li><?php echo $row["genre"]; ?></li>
                                <li><span class="dot" id="label"></span></li>
                                <li><?php echo $row["category"]; ?></li>
                                <li><span class="dot" id="label"></span></li>
                                <li><?php echo $row["year"]; ?></li>
                                <li><span class="dot" id="label"></span></li>
                                <li><?php echo $row["age"]; ?>+</li>
                            </ul>
                            <p class="details__desc"><?php echo $row["film_desc"]; ?></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <form class="details__video" method="post">
                            <div class="video__cover">
                                <iframe width="100%" height="100%" src="<?php echo $row["video"]; ?>" allowfullscreen></iframe>
                            </div>
                            <div class="video__action">
                                <div class="video__download">
                                    <i class="fa-solid fa-download"></i>Download:
                                    <a href="#">480p</a>
                                    <a href="#">720p</a>
                                    <a href="#">1080p</a>
                                    <a href="#">4k</a>
                                </div>
                                <div class="video__save">
                                    <button onclick="return confirm('Add to watchlist?')"><i class="fa-regular fa-bookmark"></i>Add to watchlist</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="comment">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="comment__title">
                            <button class="title__active" id="combtn" onclick="com()">Comments <span>10</span></button>
                            <button id="revbtn" onclick="rev()">Reviews <span>10</span></button>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="comment__content" id="comment">
                                    <div class="comment__item">
                                        <div class="comment__author">
                                            <img class="comment__avatar" src="../assets/images/icon/user.jpeg" alt="">
                                            <span class="comment__name"><?php echo $row["username"]; ?>Alfan Farchi</span>
                                            <span class="comment__date"><?php echo $row["text_date"]; ?>17-12-2022 12:37:11</span>
                                        </div>
                                        <p class="comment__text"><?php echo $row["comment"]; ?>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste, magnam!</p>
                                    </div>
                                    <form action="" class="comment__form" method="post" spellcheck="false" autocomplete="off">
                                        <div class="sign__group">
                                            <textarea type="text" name="text" class="sign__textarea" placeholder="Add comment"></textarea>
                                        </div>
                                        <button type="submit" class="sign__button">Send</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="review__content" id="review">
                                    <div class="comment__item">
                                        <div class="comment__author">
                                            <img class="comment__avatar" src="../assets/images/icon/user.jpeg" alt="">
                                            <span class="comment__name"><?php echo $row["review_title"]; ?>The best</span>
                                            <span class="comment__date"><?php echo $row["text_date"]; ?>17-12-2022 12:37:11 by Alfan Farchi <?php echo $row["username"]; ?></span>
                                        </div>
                                        <div class="comment__text">
                                            <p><?php echo $row["review"]; ?>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste, magnam!</p>
                                        </div>
                                    </div>
                                    <div class="comment__item">
                                        <div class="comment__author">
                                            <img class="comment__avatar" src="../assets/images/icon/user.jpeg" alt="">
                                            <span class="comment__name"><?php echo $row["review__title"]; ?>kinda</span>
                                            <span class="comment__date"><?php echo $row["text_date"]; ?>17-12-2022 12:37:11 by Alfan Farchi<?php echo $row["username"]; ?></span>
                                        </div>
                                        <div class="comment__text">
                                            <p><?php echo $row["review"]; ?>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste, magnam!</p>
                                        </div>
                                    </div>
                                    <form action="" class="comment__form" method="post" spellcheck="false" autocomplete="off">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="sign__group">
                                                    <input type="text" name="title" placeholder="Title" class="sign__input">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="sign__group">
                                                    <input type="text" name="rating" placeholder="Rating" class="sign__input">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="sign__group">
                                                    <textarea type="text" name="text" class="sign__textarea" placeholder="Add review"></textarea>
                                                </div>
                                                <button type="submit" class="sign__button">Send</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="subscription">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <a href="./category.php" class="subs__title">Similar movies and TV series</a>
                    </div>
                </div>
                <div class="row row--grid">
                    <button class="subs__button subs__button-left"><i class="fa-solid fa-arrow-left"></i></button>
                    <button class="subs__button subs__button-right"><i class="fa-solid fa-arrow-right"></i></button>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 col--grid">
                        <div class="card">
                            <a class="card__cover" href="./details.php?id_film=1">
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
                                <a href="./details.php?id_film=1">The Good Lord Bird</a>
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
                            <a class="card__cover" href="./details.php?id_film=2">
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
                                <a href="./details.php?id_film=2">Peaky Blinders</a>
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
                            <a class="card__cover" href="./details.php?id_film=3">
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
                                <a href="./details.php?id_film=3">The Dictator</a>
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
                            <a class="card__cover" href="./details.php?id_film=4">
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
                                <a href="./details.php?id_film=4">Get On Up</a>
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
                            <a class="card__cover" href="./details.php?id_film=5">
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
                                <a href="./details.php?id_film=5">Interview With the Vampire</a>
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
                            <a class="card__cover" href="./details.php?id_film=6">
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
                                <a href="./details.php?id_film=6">Pawn Sacrifice</a>
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
                        <div class="logo footer__logo"><a href="#">Fil<span>ms</span></a></div>
                        <p class="footer__tagline">Movies & TV Shows, Online cinema,<br>Movie database HTML Website.</p>
                        <div class="footer__social">
                            <a href="#"><img src="../assets/images/social/facebook.png" alt=""></a>
                            <a href="#"><img src="../assets/images/social/twitter.png" alt=""></a>
                            <a href="#"><img src="../assets/images/social/instagram.png" alt=""></a>
                            <a href="#"><img src="../assets/images/social/vk.png" alt=""></a>
                            <a href="#"><img src="../assets/images/social/tiktok.png" alt=""></a>
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