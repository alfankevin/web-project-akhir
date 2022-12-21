<?php
$conn = mysqli_connect("localhost", "root", "", "films");

if(!$conn) {
    die("Connection Error: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM film");

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

function searchUser($keyword) {
    $sql = "SELECT * FROM user INNER JOIN user_subs ON user_subs.id_user = user.id_user INNER JOIN subs ON subs.id_subs = user_subs.id_subs WHERE
            username LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            plan LIKE '%$keyword%' ORDER BY user.id_user ASC";
    return query($sql);
}

function insert($data) {
    global $conn;

    $title = htmlspecialchars($data["title"]);
    $label = htmlspecialchars($data["label"]);
    $rating = htmlspecialchars($data["rating"]);
    $genre = htmlspecialchars($data["genre"]);
    $year = htmlspecialchars($data["year"]);
    $age = htmlspecialchars($data["age"]);
    $image = htmlspecialchars($data["image"]);
    $video = htmlspecialchars($data["video"]);
    $film_desc = htmlspecialchars($data["film_desc"]);
    $id_category = htmlspecialchars($data["id_category"]);

    $query = "INSERT INTO film (id_film,title,label,rating,genre,year,age,image,video,film_desc,film_date,id_category) VALUES (null, '$title','$label',$rating,'$genre',$year,$age,'$image','$video','$film_desc',now(),$id_category)";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update($data) {
    global $conn;

    $id_film = $data["id_film"];
    $title = htmlspecialchars($data["title"]);
    $label = htmlspecialchars($data["label"]);
    $rating = htmlspecialchars($data["rating"]);
    $genre = htmlspecialchars($data["genre"]);
    $year = htmlspecialchars($data["year"]);
    $age = htmlspecialchars($data["age"]);
    $image = htmlspecialchars($data["image"]);
    $video = htmlspecialchars($data["video"]);
    $film_desc = htmlspecialchars($data["film_desc"]);
    $id_category = htmlspecialchars($data["id_category"]);
    
    $query = "UPDATE film SET
              title = '$title',
              label = '$label',
              rating = $rating,
              genre = '$genre',
              year = $year,
              age = $age,
              image = '$image',
              video = '$video',
              film_desc = '$film_desc',
              film_date = now(),
              id_category = $id_category
              WHERE id_film = $id_film";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id_film) {
    global $conn;
    mysqli_query($conn, "DELETE FROM film WHERE id_film = $id_film");
    return mysqli_affected_rows($conn);
}

function deleteUser($id_user) {
    global $conn;
    mysqli_query($conn, "DELETE FROM user_subs WHERE id_user = $id_user");
    mysqli_query($conn, "DELETE FROM user WHERE id_user = $id_user");
    return mysqli_affected_rows($conn);
}
?>