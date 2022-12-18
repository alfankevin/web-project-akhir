<?php include("config.php");?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Films</title>
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
                    <li class="sidebar__nav-item"><a href="./admin.php"><i class="fa-solid fa-house margin"></i>Dashboard</li></a>
                    <li class="sidebar__nav-item"><a href="./catalog.php"><i class="fa-solid fa-film default"></i>Catalog</li></a>
                    <li class="sidebar__nav-item"><a href="#"><i class="fa-solid fa-folder"></i>Pages <i class="fa-solid fa-angle-down down default"></i></li></a>
                    <li class="sidebar__nav-item"><a href="./users.php"><i class="fa-solid fa-user-group user"></i>Users</li></a>
                    <li class="sidebar__nav-item"><a href="./comments.php" class="active"><i class="fa-regular fa-comment default"></i>Comments</li></a>
                    <li class="sidebar__nav-item"><a href="./reviews.php"><i class="fa-regular fa-star default margin"></i>Reviews</li></a>
                    <li class="sidebar__nav-item"><a href="../index.php"><i class="fa-solid fa-arrow-left default arrow"></i>Back to Films</li></a>
                </ul>
            </div>
            <p class="sidebar__footer">© Films, 2022,<br>Created by Alfarchi.</p>
        </section>

        <main class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="main__header">
                            <h2 class="main__header-title">Comments&ensp;<span>1000 total</span></h2>
                            <form action="" method="post" spellcheck="false" autocomplete="off" class="nav__form nav__admin">
                                <input type="input" name="keyword" placeholder="Key word..." class="nav__search">
                                <button type="submit" name="search" class="nav__action-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12">
                        <table class="main__table">
                            <thead>
                                <tr>
                                    <td class="comments__id">ID</td>
                                    <td class="comments__item">ITEM</td>
                                    <td class="comments__author">AUTHOR</td>
                                    <td class="comments__text">TEXT</td>
                                    <td class="comments__like">LIKE / DISLIKE</td>
                                    <td class="comments__date">CREATED DATE</td>
                                    <td class="comments__actions">ACTIONS</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="comments__id">1</td>
                                    <td class="comments__title"> in Another Language</td>
                                    <td class="comments__rating">Rating</td>
                                    <td class="comments__category">Movie</td>
                                    <td class="comments__views">0 / 0</td>
                                    <td class="comments__status">Visible</td>
                                    <td class="action__button"><a href=""><i class="fa-solid fa-pen"></i></a><a href=""><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="comments__id">1</td>
                                    <td class="comments__title"> in Another Language</td>
                                    <td class="comments__rating">Rating</td>
                                    <td class="comments__category">Movie</td>
                                    <td class="comments__views">1392</td>
                                    <td class="comments__status">Visible</td>
                                    <td class="action__button"><a href=""><i class="fa-solid fa-pen"></i></a><a href=""><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>