<?php
require "../main/functions.php";

$film = query("SELECT * FROM film INNER JOIN category ON film.id_category = category.id_category");

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
                    <li class="sidebar__nav-item"><a href="#"><i class="fa-solid fa-house margin"></i>Dashboard</li></a>
                    <li class="sidebar__nav-item"><a href="./catalog.php"><i class="fa-solid fa-film default"></i>Catalog</li></a>
                    <li class="sidebar__nav-item"><a href="#" class="active actives"><i class="fa-solid fa-folder"></i>Pages <i class="fa-solid fa-angle-down down default"></i></li></a>
                    <li class="sidebar__nav-item"><a href="./users.php"><i class="fa-solid fa-user-group user"></i>Users</li></a>
                    <li class="sidebar__nav-item"><a href="./comments.php"><i class="fa-regular fa-comment default"></i>Comments</li></a>
                    <li class="sidebar__nav-item"><a href="./reviews.php"><i class="fa-regular fa-star default margin"></i>Reviews</li></a>
                    <li class="sidebar__nav-item"><a href="../index.php"><i class="fa-solid fa-arrow-left default arrow"></i>Back to Films</li></a>
                </ul>
            </div>
            <p class="sidebar__footer">© Films, 2022,<br>Created by Alfarchi.</p>
        </section>

        <main class="main main--admin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="main__header main__admin">
                            <h2 class="main__header-title">Add new item</h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <form action="" class="comment__form form__admin" method="post" spellcheck="false" autocomplete="off">
                            <div class="row">
                                <div class="col-3">
                                    <div class="img__input">
                                        <label for="form__img-input" id="form__img-label" onclick="preview()">Upload image</label>
                                        <input id="form__img-input" name="img" type="file" accept=".png, .jpg, .jpeg" onchange="document.getElementById('form__img').src = window.URL.createObjectURL(this.files[0])" style="display: none">
                                        <img id="form__img" src="../assets/images/icon/clear.png" alt="" height="100%" width="100%">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="sign__group">
                                                <input type="text" name="title" placeholder="Title" class="sign__input">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="sign__group">
                                                <input type="text" name="age" placeholder="Age" class="sign__input">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="sign__group">
                                                <textarea type="text" name="text" class="sign__textarea" placeholder="Description" style="font-size: 14px"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="sign__group">
                                                <input type="text" name="year" placeholder="Release year" class="sign__input">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="sign__group">
                                                <input type="text" name="category" placeholder="Category" class="sign__input">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="sign__group">
                                                <input type="text" name="Genre" placeholder="Genre" class="sign__input">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="sign__group">
                                                <input type="text" name="rating" placeholder="Rating" class="sign__input">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="sign__group">
                                                <input type="text" name="video" placeholder="Add a link" class="sign__input">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="sign__button">Publish</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>