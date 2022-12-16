<?php
$conn = mysqli_connect("localhost", "root", "", "films");

if(!$conn) {
    die('Connection Error : ' .mysqli_connect_errno()
    . ' - ' .mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM film");

function query($second_query) {
    global $conn;
    $result = mysqli_query($conn, $second_query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function search($keyword) {
    $sql = "SELECT * FROM film WHERE title LIKE '%$keyword%'";
    return query($sql);
}

function featured() {
    $sql = "SELECT * FROM film LIMIT 18";
    return query($sql);
}

function popular() {
    $sql = "SELECT * FROM film ORDER BY rating DESC LIMIT 18";
    return query($sql);
}

function newest() {
    $sql = "SELECT * FROM film ORDER BY year DESC LIMIT 18";
    return query($sql);
}

function more() {
    $sql = "SELECT * FROM film LIMIT 36";
    return query($sql);
}
?>