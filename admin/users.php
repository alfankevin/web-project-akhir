<?php
require "../main/functions.php";

$user = query("SELECT * FROM user INNER JOIN user_subs ON user_subs.id_user = user.id_user INNER JOIN subs ON subs.id_subs = user_subs.id_subs ORDER BY user.id_user ASC");
$count = query("SELECT COUNT(id_user) AS count FROM user");

if(isset($_POST["search"])) {
    $user = search($_POST["keyword"]);
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
                    <li class="sidebar__nav-item"><a href="./admin.php"><i class="fa-solid fa-house margin"></i>Dashboard</li></a>
                    <li class="sidebar__nav-item"><a href="./catalog.php"><i class="fa-solid fa-film default"></i>Catalog</li></a>
                    <li class="sidebar__nav-item"><a href="#"><i class="fa-solid fa-folder"></i>Pages <i class="fa-solid fa-angle-down down default"></i></li></a>
                    <li class="sidebar__nav-item"><a href="./users.php" class="active actives"><i class="fa-solid fa-user-group user"></i>Users</li></a>
                    <li class="sidebar__nav-item"><a href="./comments.php"><i class="fa-regular fa-comment default"></i>Comments</li></a>
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
                            <?php $i = 1 ?> <?php foreach($count as $row): ?>
                            <h2 class="main__header-title">Users&ensp;<span><?php echo $row["count"]; ?> total</span></h2>
                            <?php $i++ ?> <?php endforeach; ?>
                            <form action="" method="post" spellcheck="false" autocomplete="off" class="nav__form nav__admin">
                                <input type="input" name="keyword" placeholder="Find user.." class="nav__search search__admin">
                                <button type="submit" name="search" class="nav__action-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12">
                        <table class="main__table">
                            <thead>
                                <tr>
                                    <td class="user__id">ID</td>
                                    <td class="user__info">BASIC INFO</td>
                                    <td class="user__username">USERNAME</td>
                                    <td class="user__plan">PRICING PLAN</td>
                                    <td class="user__comments">COMMENTS</td>
                                    <td class="user__reviews">REVIEWS</td>
                                    <td class="user__watch">WATCHLIST</td>
                                    <td class="user__date">CREATED DATE</td>
                                    <td class="user__actions">ACTIONS</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach($user as $row): ?>
                                <tr>
                                    <td class="user__id"><?php echo $row["id_user"]; ?></td>
                                    <td class="user__info">
                                        <img class="user__avatar" src="../assets/images/icon/user.jpeg" alt="" height="40px" width="40px">
                                        <p><?php echo $row["username"]; ?></p>
                                        <span><?php echo $row["email"]; ?></span>
                                    </td>
                                    <td class="user__username"><?php echo $row[""]; ?>Username</td>
                                    <td class="user__plan"><?php echo $row["plan"]; ?></td>
                                    <td class="user__comments"><?php echo $row[""]; ?></td>
                                    <td class="user__reviews"></td>
                                    <td class="user__save"><?php echo $row[""]; ?></td>
                                    <td class="user__date"><?php echo $row["create_date"]; ?></td>
                                    <td class="action__button"><a href=""><i class="fa-solid fa-pen"></i></a><a href="" onclick="return confirm('Delete user?')"><i class="fa-solid fa-trash"></i></a></td>
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