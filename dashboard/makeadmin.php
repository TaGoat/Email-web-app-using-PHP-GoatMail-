<?php

$id = $_GET['id'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
include_once "../php/config.php";
$sql = "SELECT * FROM `admin` WHERE `admin`.`user_id` = $id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)) {
    $sql = "DELETE FROM `admin` WHERE `admin`.`user_id` = $id";
    mysqli_query($conn, $sql);
} else {
    $sql = "INSERT INTO `admin` (`id`, `user_id`) VALUES (NULL, '$id');";
    mysqli_query($conn, $sql);
}
