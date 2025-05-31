<?php
// session_start();
if (!isset($_SESSION['username'])) {
    header('Loction: ../sign-in/index.html');
} else {
    $currentusername = $_SESSION['username'];

    include_once "../php/config.php";
    $start = 0;
    $rowsPerpage = 50;

    $inbox = mysqli_query($conn, "SELECT * from email where receiver ='$currentusername'  ");
    $nr_of_rows = $inbox->num_rows;
    $pages = ceil($nr_of_rows / $rowsPerpage);

    $allmails = mysqli_query($conn, "SELECT * from email where receiver ='$currentusername' or sender='$currentusername'  ");
    $nr_of_rows = $allmails->num_rows;
    $pages = ceil($nr_of_rows / $rowsPerpage);


    $star = mysqli_query($conn, "SELECT * FROM `email` WHERE find_in_set('3',Status)and (receiver ='$currentusername' or sender='$currentusername')");
    $nr_of_rows = $star->num_rows;
    $pages = ceil($nr_of_rows / $rowsPerpage);

    $spam = mysqli_query($conn, "SELECT * FROM `email` WHERE find_in_set('6',Status)and (receiver ='$currentusername' or sender='$currentusername')");
    $nr_of_rows = $spam->num_rows;
    $pages = ceil($nr_of_rows / $rowsPerpage);

    $sent = mysqli_query($conn, "SELECT * FROM `email` WHERE sender='$currentusername'");
    $nr_of_rows = $sent->num_rows;
    $pages = ceil($nr_of_rows / $rowsPerpage);


    if (isset($_GET['page-nr'])) {
        $page = $_GET['page-nr'] - 1;
        $start = $page * $rowsPerpage;
    }

    $allmails = mysqli_query($conn, "SELECT * from email where receiver ='$currentusername' 
    or sender='$currentusername' limit $start,$rowsPerpage ");
    $inbox = mysqli_query($conn, "SELECT * from email where receiver ='$currentusername' limit $start,$rowsPerpage");
    $star = mysqli_query($conn, "SELECT * FROM `email` WHERE find_in_set('3',Status)and (receiver ='$currentusername' or sender='$currentusername') limit $start,$rowsPerpage");
    $spam = mysqli_query($conn, "SELECT * FROM `email` WHERE find_in_set('6',Status)and (receiver ='$currentusername' or sender='$currentusername') limit $start,$rowsPerpage");
    $sent = mysqli_query($conn, "SELECT * FROM `email` WHERE sender='$currentusername' limit $start,$rowsPerpage");
}
function displayEmails($ob)

{
    if ($ob->num_rows > 0) {
        while ($row = $ob->fetch_assoc()) {
            echo "<tr><td><input type='checkbox' class='form-check-input mycheck xyz' id='id_$row[id]'/></td>";
            $sql = "SELECT * from email where find_in_set('3',Status) and id= " . $row['id'] . ";";
            global $conn;
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<td><button class='btn stars' style='border:none' type='button' onclick='toggleStar(this)'  id='id_$row[id]'><i class='fa-solid fa-star staricon'></i></button></td>";
            } else {
                echo "<td><button class='btn stars' style='border:none' type='button' onclick='toggleStar(this)'  id='id_$row[id]'><i class='far fa-star staricon'></i></button></td>";
            }
            echo "<td><a id='open' href='../email/index.php?id={$row['id']}'><button type='button' class='btn open'>Open</button></a></td>" .
                "<td>" . $row["id"] .
                "</td><td>" . $row["sender"] .
                "</td><td>" . $row["receiver"] .
                "</td><td>" . $row["subject"] .
                "</td><td>" . $row["body"] .
                "</td><td>" . $row["Status"] .
                "</td><td>" . $row["created_at"] .
                "</td></tr>";
        }
    } else {
        echo "<h1 class='justify-content-center d-flex ms-auto my-4'>There Is no Emails</h1>";
    }
}
