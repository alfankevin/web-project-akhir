<?php
require "../main/functions.php";

$id_film = $_GET["id_film"];
$film = query("SELECT * FROM film INNER JOIN category ON film.id_category = category.id_category ORDER BY id_film DESC");
$count = query("SELECT COUNT(id_film) AS count FROM film");

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
                    <li class="sidebar__nav-item"><a href="./catalog.php" class="active"><i class="fa-solid fa-film default"></i>Catalog</li></a>
                    <li class="sidebar__nav-item"><a href="#"><i class="fa-solid fa-folder"></i>Pages <i class="fa-solid fa-angle-down default"></i></li></a>
                    <li class="sidebar__nav-item"><a href="./users.php"><i class="fa-solid fa-user-group"></i>Users</li></a>
                    <li class="sidebar__nav-item"><a href="./comments.php"><i class="fa-regular fa-comment default"></i>Comments</li></a>
                    <li class="sidebar__nav-item"><a href="./reviews.php"><i class="fa-regular fa-star default"></i>Reviews</li></a>
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
                            <h2 class="main__header-title">Catalog&ensp;<span><?php echo $row["count"]; ?> total</span></h2>
                            <?php $i++ ?> <?php endforeach; ?>
                            <div class="main__action">
                                <form action="" method="post" spellcheck="false" autocomplete="off" class="nav__form nav__catalog">
                                    <input type="input" name="keyword" placeholder="Find movie / tv series.." class="nav__search search__admin">
                                    <button type="submit" name="search" class="nav__action-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                                <a href="./upload.php" class="a"><button class="sign__button main__button">Add item</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <table class="main__table">
                            <thead>
                                <tr>
                                    <td class="film__id">NO</td>
                                    <td class="film__title">TITLE</td>
                                    <td class="film__rating">RATING</td>
                                    <td class="film__genre">GENRE</td>
                                    <td class="film__category">CATEGORY</td>
                                    <td class="film__label">LABEL</td>
                                    <td class="film__age">AGE</td>
                                    <td class="film__date">CREATED DATE</td>
                                    <td class="film__actions">ACTIONS</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach($film as $row): ?>
                                <tr>
                                    <td class="film__id"><?php echo $i; ?></td>
                                    <td class="film__title"><a class="catalog__title" href="../main/details.php?id_film=<?php echo $row["id_film"]; ?>"><?php echo $row["title"]; ?></a></td>
                                    <td class="film__rating"><i class="fa-regular fa-star"></i>&ensp;<?php echo $row["rating"]; ?></td>
                                    <td class="film__genre"><?php echo $row["genre"]; ?></td>
                                    <td class="film__category"><?php echo $row["category"]; ?></td>
                                    <td class="film__label"><?php echo $row["label"]; ?></td>
                                    <td class="film__age"><?php echo $row["age"]; ?>+</td>
                                    <td class="film__date"><?php echo $row["film_date"]; ?></td>
                                    <td class="actions__button"><a href="./update.php?id_film=<?php echo $row["id_film"]; ?>"><i class="fa-solid fa-pen"></i></a><a href="./delete.php?id_film=<?php echo $row["id_film"]; ?>" onclick="return confirm('Delete film?')"><i class="fa-solid fa-trash"></i></a></td>
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