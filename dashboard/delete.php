<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $table = 'user';
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $table = 'email';
}
include_once "../php/config.php";
if (is_numeric($id) and $id != NULL) {

    $query = "DELETE FROM `$table` WHERE `$table`.id =$id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Records deleted successfully";
    } else {
        echo "Error deleting records: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo 'There is no data to Delete!';
}
