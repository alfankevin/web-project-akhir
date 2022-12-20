<?php
$conn = mysqli_connect("localhost", "root", "", "films");

if(!$conn) {
    die("Connection Error: " . mysqli_connect_error());
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function more() {
    $sql = "SELECT * FROM film LIMIT 36";
    return query($sql);
}

function search($keyword) {
    $sql = "SELECT * FROM film INNER JOIN category on category.id_category = film.id_category WHERE
            title LIKE '%$keyword%' OR
            rating LIKE '%$keyword%' OR
            genre LIKE '%$keyword%' OR
            category LIKE '%$keyword%' OR
            label LIKE '%$keyword%' OR
            age LIKE '%$keyword%' ORDER BY film.id_film ASC";
    return query($sql);
}

function search_user($keyword) {
    $sql = "SELECT * FROM user INNER JOIN user_subs ON user_subs.id_user = user.id_user INNER JOIN subs ON subs.id_subs = user_subs.id_subs WHERE
            username LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            plan LIKE '%$keyword%' ORDER BY user.id_user ASC";
    return query($sql);
}
?>