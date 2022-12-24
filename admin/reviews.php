<?php
require "../main/functions.php";

$review = query("SELECT * FROM user INNER JOIN user_film ON user.id_user = user_film.id_user INNER JOIN film ON film.id_film = user_film.id_film WHERE review IS NOT NULL");
$count = query("SELECT COUNT(id_view) AS count FROM user INNER JOIN user_film ON user.id_user = user_film.id_user INNER JOIN film ON film.id_film = user_film.id_film WHERE review IS NOT NULL");

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
        <section class="sidebar">
            <a href="" class="sidebar__logo">Fil<span>ms</span></a>
            <div class="sidebar__user">
                <img class="sidebar__avatar" src="../assets/images/icon/user.jpeg" alt="" height="40px" width="40px">
                <span>Admin</span>
                <p>Alfan Farchi</p>
                <button class="sidebar__user-btn"><i class="fa-solid fa-arrow-right-to-bracket"></i></button>
            </div>
            <div class="sidebar__nav">
                <ul class="sidebar__nav-content">
                    <li class="sidebar__nav-item"><a href="#"><i class="fa-solid fa-house"></i>Dashboard</li></a>
                    <li class="sidebar__nav-item"><a href="./catalog.php"><i class="fa-solid fa-film default"></i>Catalog</li></a>
                    <li class="sidebar__nav-item"><a href="#"><i class="fa-solid fa-folder"></i>Pages <i class="fa-solid fa-angle-down default"></i></li></a>
                    <li class="sidebar__nav-item"><a href="./users.php"><i class="fa-solid fa-user-group"></i>Users</li></a>
                    <li class="sidebar__nav-item"><a href="./comments.php"><i class="fa-regular fa-comment default"></i>Comments</li></a>
                    <li class="sidebar__nav-item"><a href="./reviews.php" class="active"><i class="fa-regular fa-star default"></i>Reviews</li></a>
                    <li class="sidebar__nav-item"><a href="../index.php"><i class="fa-solid fa-arrow-left default"></i>Back to Films</li></a>
                </ul>
            </div>
            <p class="sidebar__footer">© Films, 2022,<br>Created by Alfarchi.</p>
        </section>

        <main class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="main__header">
                            <?php $i = 1 ?> <?php foreach($count as $row): ?>
                            <h2 class="main__header-title">Reviews&ensp;<span><?php echo $row["count"]; ?> total</span></h2>
                            <?php $i++ ?> <?php endforeach; ?>
                            <form action="" method="post" spellcheck="false" autocomplete="off" class="nav__form nav__admin">
                                <input type="input" name="keyword" placeholder="Key word.." class="nav__search search__admin">
                                <button type="submit" name="search" class="nav__action-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12">
                        <table class="main__table">
                            <thead>
                                <tr>
                                    <td class="reviews__id">NO</td>
                                    <td class="reviews__item">ITEM</td>
                                    <td class="reviews__author">AUTHOR</td>
                                    <td class="reviews__text">TEXT</td>
                                    <td class="reviews__rating">RATING</td>
                                    <td class="reviews__like">LIKE / DISLIKE</td>
                                    <td class="reviews__date">CREATED DATE</td>
                                    <td class="reviews__actions">ACTIONS</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach($review as $row): ?>
                                <tr>
                                    <td class="reviews__id"><?php echo $i; ?></td>
                                    <td class="reviews__item"><a class="catalog__title" href="../main/details.php?id=<?php echo $row["id_film"]; ?>"><?php echo $row["title"]; ?></a></td>
                                    <td class="reviews__author"><?php echo $row["username"]; ?></td>
                                    <td class="reviews__text">
                                        <div class="views__text"><p><?php echo $row["review"]; ?></p></div>
                                    </td>
                                    <td class="reviews__rating"><i class="fa-regular fa-star"></i>&ensp;<?php echo $row["rate"]; ?></td>
                                    <td class="reviews__like">0 / 0</td>
                                    <td class="reviews__date"><?php echo $row["text_date"]; ?></td>
                                    <td class="actions__button"><a href="" onclick="return confirm('Hide review?')"><i class="fa-solid fa-eye"></i></a><a href="./deleteReview.php?id=<?php echo $row["id_view"]; ?>" onclick="return confirm('Delete review?')"><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                                <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>