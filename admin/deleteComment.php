<?php
require '../main/functions.php';

$id_view = $_GET["id"];

if(deleteComment($id_view) > 0) {
    echo "
    <script>
        alert('Comment deleted');
        document.location.href='comments.php';
    </script>";
} else {
    echo "
    <script>
        alert('Delete failed');
        document.location.href='comments.php';
    </script> ";
    echo mysqli_error($conn);
}
?>