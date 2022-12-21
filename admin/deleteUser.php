<?php
require '../main/functions.php';

$id_user = $_GET["id_user"];

if(deleteUser($id_user) > 0) {
    echo "
    <script>
        alert('User deleted');
        document.location.href='users.php';
    </script>";
} else {
    echo "
    <script>
        alert('Delete failed');
        document.location.href='users.php';
    </script> ";
    echo mysqli_error($conn);
}
?>