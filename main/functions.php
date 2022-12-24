<?php
session_start();

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
    $sql = "SELECT * FROM film ORDER BY id_film DESC LIMIT 36";
    return query($sql);
}

function search($keyword) {
    $sql = "SELECT * FROM film INNER JOIN category on category.id_category = film.id_category WHERE
            title LIKE '%$keyword%' OR
            rating LIKE '%$keyword%' OR
            genre LIKE '%$keyword%' OR
            category LIKE '%$keyword%' OR
            label LIKE '%$keyword%' OR
            age LIKE '%$keyword%' ORDER BY film.id_film DESC";
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

function deleteComment($id_view) {
    global $conn;
    mysqli_query($conn, "DELETE FROM user_film WHERE id_view = $id_view");
    return mysqli_affected_rows($conn);
}

function deleteReview($id_view) {
    global $conn;
    mysqli_query($conn, "DELETE FROM user_film WHERE id_view = $id_view");
    return mysqli_affected_rows($conn);
}

function register($data) {
    global $conn;

    $email = strtolower(stripcslashes($data['email']));
    $username = htmlspecialchars($data['username']);
    $password = mysqli_real_escape_string($conn,$data['password']);
    $password2 = mysqli_real_escape_string($conn,$data['password2']);

    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if(mysqli_fetch_assoc($result)) {   
        echo "
        <script>
            alert('Email already registered');
        </script>";
        return false;
    }
    if($password != $password2) {
        echo "
        <script>
            alert('Passwords do not match');
        </script>";
        return false;
    }

    mysqli_query($conn, "INSERT INTO user VALUES(null, '$email', '$password', '$username', now())");
    mysqli_query($conn, "INSERT INTO user_subs VALUES(null, LAST_INSERT_ID(), 1, now())");

    return mysqli_affected_rows($conn);
}

function regular($data) {
    global $conn;
    $id_user = $data["id_user"];
    
    $query = "UPDATE user_subs SET
              id_subs = 2
              WHERE id_user = $id_user";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function premium($data) {
    global $conn;
    $id_user = $data["id_user"];
    
    $query = "UPDATE user_subs SET
              id_subs = 3
              WHERE id_user = $id_user";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cinematic($data) {
    global $conn;
    $id_user = $data["id_user"];
    
    $query = "UPDATE user_subs SET
              id_subs = 4
              WHERE id_user = $id_user";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function comment($data) {
    global $conn;
    $id_user = htmlspecialchars($data["id_user"]);
    $id_film = htmlspecialchars($data["id_film"]);
    $comment = htmlspecialchars($data["text"]);

    $query = "INSERT INTO user_film (id_view,id_user,id_film,comment,text_date) VALUES (null, $id_user, $id_film, '$comment', now())";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function review($data) {
    global $conn;
    $id_user = htmlspecialchars($data["id_user"]);
    $id_film = htmlspecialchars($data["id_film"]);
    $title = htmlspecialchars($data["title"]);
    $review = htmlspecialchars($data["text"]);
    $rating = htmlspecialchars($data["rating"]);

    $query = "INSERT INTO user_film (id_view,id_user,id_film,review_title,review,rate,text_date) VALUES (null, $id_user, $id_film, '$title', '$review', '$rating', now())";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>