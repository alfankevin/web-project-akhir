<?php
require '../main/functions.php';

$id_film = $_GET["id"];

if(delete($id_film) > 0) {
    echo "
    <script>
        alert('Film deleted');
        document.location.href='catalog.php';
    </script>";
} else {
    echo "
    <script>
        alert('Delete failed');
        document.location.href='catalog.php';
    </script> ";
    echo mysqli_error($conn);
}
?>