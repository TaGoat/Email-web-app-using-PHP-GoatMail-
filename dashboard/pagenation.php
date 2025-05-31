<?php
include_once "../php/config.php";
$start = 0;
$rowsPerpage = 50;

$records = mysqli_query($conn, "SELECT * from user");
$nr_of_rows = $records->num_rows;
$pages = ceil($nr_of_rows / $rowsPerpage);
$emails = mysqli_query($conn, "SELECT * from email");
$nr_of_rows = $emails->num_rows;
$pages = ceil($nr_of_rows / $rowsPerpage);


$banned = mysqli_query($conn, "SELECT * from user where status=1");
$nr_of_rows = $banned->num_rows;
$pages = ceil($nr_of_rows / $rowsPerpage);

$admin = mysqli_query($conn, "SELECT * from user RIGHT join admin on user.id = admin.user_id");
$nr_of_rows = $admin->num_rows;
$pages = ceil($nr_of_rows / $rowsPerpage);

$broadcast = mysqli_query($conn, "SELECT * from email RIGHT join broadcasts on email.id = broadcasts.message_id");
$nr_of_rows = $broadcast->num_rows;
$pages = ceil($nr_of_rows / $rowsPerpage);

$spam = mysqli_query($conn, "SELECT * FROM `email` WHERE find_in_set('6',Status) ");
$nr_of_rows = $spam->num_rows;
$pages = ceil($nr_of_rows / $rowsPerpage);

if (isset($_GET['page-nr'])) {
    $page = $_GET['page-nr'] - 1;
    $start = $page * $rowsPerpage;
}
$records = mysqli_query($conn, "SELECT * from user limit $start,$rowsPerpage");
$emails = mysqli_query($conn, "SELECT * from email limit $start,$rowsPerpage");
$banned = mysqli_query($conn, "SELECT * from user where status=1 limit $start,$rowsPerpage");
$admin = mysqli_query($conn, "SELECT * from user RIGHT join admin on user.id = admin.user_id limit $start,$rowsPerpage");
$spam = mysqli_query($conn, "SELECT * FROM `email` WHERE find_in_set('6',Status) limit $start,$rowsPerpage ");
$broadcast = mysqli_query($conn, "SELECT * from email RIGHT join broadcasts on email.id = broadcasts.message_id limit $start,$rowsPerpage");







// if (isset($_POST['ban'])) {
//     echo $_POST['ban1'];
//     $records = mysqli_query($conn, "SELECT * from user where status=1");
//     $nr_of_rows = $records->num_rows;
//     $pages = ceil($nr_of_rows / $rowsPerpage);
// } elseif (isset($_POST["admin"])) {
//     echo $_POST['admin'];
//     $records = mysqli_query($conn, "SELECT * from user RIGHT join admin on user.id = admin.user_id");
//     $nr_of_rows = $records->num_rows;
//     $pages = ceil($nr_of_rows / $rowsPerpage);
// } else {
//     $records = mysqli_query($conn, "SELECT * from user");
//     $nr_of_rows = $records->num_rows;
//     $pages = ceil($nr_of_rows / $rowsPerpage);
// }
function displayrecords($ob)
{
    if ($ob->num_rows > 0) {
        while ($row = $ob->fetch_assoc()) {
            echo "<tr><td><input type='checkbox' class='form-check-input mycheck xyz' id='id_$row[id]'/></td>
     " .
                "<td>" . $row["id"] .
                "</td><td>" . $row["fname"] .
                "</td><td>" . $row["lname"] .
                "</td><td>" . $row["dob"] .
                "</td><td>" . $row["gender"] .
                "</td><td>" . $row["username"] .
                "</td><td>" . $row["status"] .
                "</td><td>" . $row["pass"] .
                "</td><td>" . $row["created_at"] .
                "</td></tr>";
        }
    } else {
        echo "<h1 class='justify-content-center d-flex ms-auto my-4'>There Is no users</h1>";
    }
}
function displayrecords2($ob)
{
    if ($ob->num_rows > 0) {
        while ($row = $ob->fetch_assoc()) {
            echo "<tr><td><input type='checkbox' class='form-check-input mycheck xyz' id='id_$row[id]'/></td>
<td><button class='btn stars' style='border:none' type='button' onclick='toggleStar(this)'  id='id_$row[id]'><i class='far fa-star staricon'></i></button></td>";
            echo "<td><a href='../email/index.php?id={$row['id']}'><button type='button' class='btn open'>Open</button></a></td>" .
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


// $result = mysqli_query($conn, "SELECT * from email limit $start,$rowsPerpage");
// $inbox = mysqli_query($conn, "SELECT * from email where find_in_set('2',Status) limit $start,$rowsPerpage");
