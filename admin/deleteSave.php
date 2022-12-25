<?php
require '../main/functions.php';

$id_view = $_GET["id"];

if(deleteSave($id_view) > 0) {
    echo "
    <script>
        alert('Removed from watchlist');
        document.location.href='../main/watchlist.php';
    </script>";
} else {
    echo "
    <script>
        alert('Remove failed');
        document.location.href='../main/watchlist.php';
    </script> ";
    echo mysqli_error($conn);
}
?>