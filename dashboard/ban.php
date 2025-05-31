<?php

$id = $_GET['id'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
include_once "../php/config.php";
$sql = "SELECT `status` FROM `user` WHERE `user`.`id` = $id";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    $status = $row['status'];
}
echo $status;
if ($status === '1') {
    $sql = "UPDATE `user` SET `status` = b'0' WHERE `user`.`id` = $id;";
    mysqli_query($conn, $sql);
} else {
    $sql = "UPDATE `user` SET `status` = b'1' WHERE `user`.`id` = $id;";
    mysqli_query($conn, $sql);
}
