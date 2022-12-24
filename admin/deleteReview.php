<?php
require '../main/functions.php';

$id_view = $_GET["id"];

if(deleteReview($id_view) > 0) {
    echo "
    <script>
        alert('Review deleted');
        document.location.href='reviews.php';
    </script>";
} else {
    echo "
    <script>
        alert('Delete failed');
        document.location.href='reviews.php';
    </script> ";
    echo mysqli_error($conn);
}
?>