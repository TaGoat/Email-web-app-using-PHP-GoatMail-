<?php
// session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../sign-in/index.html');
    exit();
} else {
    $currentusername = $_SESSION['username'];
    include_once "../php/config.php";
    $start = 0;
    $rowsPerpage = 50;

    // Count queries for pagination (keeping your original logic)
    $inbox_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM email WHERE receiver = '$currentusername'");
    $inbox_count_row = mysqli_fetch_assoc($inbox_count);
    $nr_of_rows = $inbox_count_row['total'];
    $pages = ceil($nr_of_rows / $rowsPerpage);

    $allmails_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM email WHERE receiver = '$currentusername' OR sender = '$currentusername'");
    $allmails_count_row = mysqli_fetch_assoc($allmails_count);
    $nr_of_rows = $allmails_count_row['total'];
    $pages = ceil($nr_of_rows / $rowsPerpage);

    $star_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM email WHERE find_in_set('3',Status) AND (receiver = '$currentusername' OR sender = '$currentusername')");
    $star_count_row = mysqli_fetch_assoc($star_count);
    $nr_of_rows = $star_count_row['total'];
    $pages = ceil($nr_of_rows / $rowsPerpage);

    $spam_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM email WHERE find_in_set('6',Status) AND (receiver = '$currentusername' OR sender = '$currentusername')");
    $spam_count_row = mysqli_fetch_assoc($spam_count);
    $nr_of_rows = $spam_count_row['total'];
    $pages = ceil($nr_of_rows / $rowsPerpage);

    $sent_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM email WHERE sender = '$currentusername'");
    $sent_count_row = mysqli_fetch_assoc($sent_count);
    $nr_of_rows = $sent_count_row['total'];
    $pages = ceil($nr_of_rows / $rowsPerpage);

    if (isset($_GET['page-nr'])) {
        $page = $_GET['page-nr'] - 1;
        $start = $page * $rowsPerpage;
    }

    // Your original queries with ORDER BY added for most recent first
    $allmails = mysqli_query($conn, "SELECT * FROM email WHERE receiver = '$currentusername' OR sender = '$currentusername' ORDER BY created_at DESC LIMIT $start,$rowsPerpage");
    $inbox = mysqli_query($conn, "SELECT * FROM email WHERE receiver = '$currentusername' ORDER BY created_at DESC LIMIT $start,$rowsPerpage");
    $star = mysqli_query($conn, "SELECT * FROM email WHERE find_in_set('3',Status) AND (receiver = '$currentusername' OR sender = '$currentusername') ORDER BY created_at DESC LIMIT $start,$rowsPerpage");
    $spam = mysqli_query($conn, "SELECT * FROM email WHERE find_in_set('6',Status) AND (receiver = '$currentusername' OR sender = '$currentusername') ORDER BY created_at DESC LIMIT $start,$rowsPerpage");
    $sent = mysqli_query($conn, "SELECT * FROM email WHERE sender = '$currentusername' ORDER BY created_at DESC LIMIT $start,$rowsPerpage");
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
                "<td>" . htmlspecialchars($row["id"]) .
                "</td><td>" . htmlspecialchars($row["sender"]) .
                "</td><td>" . htmlspecialchars($row["receiver"]) .
                "</td><td>" . htmlspecialchars($row["subject"]) .
                "</td><td>" . htmlspecialchars($row["body"]) .
                "</td><td>" . htmlspecialchars($row["Status"]) .
                "</td><td>" . htmlspecialchars($row["created_at"]) .
                "</td></tr>";
        }
    } else {
        echo "<h1 class='justify-content-center d-flex ms-auto my-4'>There Is no Emails</h1>";
    }
}
