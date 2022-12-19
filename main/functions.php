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

function search($keyword) {
    $sql = "SELECT * FROM film WHERE title LIKE '%$keyword%'";
    return query($sql);
}

function more() {
    $sql = "SELECT * FROM film LIMIT 36";
    return query($sql);
}
?>