<?php
session_start();
if (isset($_POST['signin'])) {
    include_once "../php/config.php";
    $username = trim($_POST['username']);
    $password =  trim($_POST['password']);
    if (!empty($_POST['username']) and !strlen($_POST['username']) <= 1) {

        $sql = "SELECT * FROM user where username='$username' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {

            while ($row = $result->fetch_assoc()) {
                $hashedPassword = $row['pass'];
                $id = $row['id'];
            }

            if (password_verify($password, $hashedPassword)) {
                $sql = "SELECT id from admin where user_id=$id ";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['username'] = $username;
                    header('Location: chose.php');
                } else {

                    $_SESSION['username'] = $username;
                    header('Location: ../inbox/index.php');
                }
            } else {

                echo '<script>alert(" invalid password. Please try agin.");</script>';
                echo '<script>window.location.href="index.html";</script>';
            }
        } else {

            echo '<script>alert(" invalid username or password. Please try agin.");</script>';
            echo '<script>window.location.href="index.html";</script>';
        }
    }
    mysqli_close($conn);
} else {
    echo 'please sign in';
}
if (isset($_POST['dashboard'])) {
    $_SESSION['username'] = $username;
    header('Location: ../dashboard/index.php');
}
if (isset($_POST['inbox'])) {
    $_SESSION['username'] = $username;
    header('Location: ../main/index.php');
}
