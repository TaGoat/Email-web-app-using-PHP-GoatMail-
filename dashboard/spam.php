<?php

$id = $_GET['id'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
include_once "../php/config.php";
$sql = "SELECT * FROM `email` WHERE find_in_set('6',Status) and `email`.`id` = $id";
$result = mysqli_query($conn, $sql);
$status = 6;
if (mysqli_num_rows($result) > 0) {
    $sql = "UPDATE `email` Set Status = Replace(Status, '6',',') WHERE `email`.`id`  = $id;";
    mysqli_query($conn, $sql);
} else {

    checkstatus($id);
}

function checkstatus($idd)
{
    $results = [];

    include "../php/config.php";
    for ($i = 1; $i < 8; $i++) {


        $sql = "SELECT * FROM `email` WHERE find_in_set('$i',Status) and `email`.`id` = $idd";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $results[] = $i;
        } else {
            echo "no status $i";
        }
    }


    $fresult = implode(',', $results);
    echo $fresult;
    $sql = "UPDATE `email` SET `Status` = '$fresult,6' WHERE `email`.`id` = $idd";
    mysqli_query($conn, $sql);
}
