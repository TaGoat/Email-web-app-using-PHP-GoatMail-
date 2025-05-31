<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Loction: ../sign-in/index.html');
} ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../js/color-modes.js"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../includes/dashboars.css">
</head>

<body>
    <?php
    include_once "../includes/color.html";
    include_once "../includes/dashboard.html";
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-1" id="main-content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        Share
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        Export
                    </button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                    <svg class="bi">
                        <use xlink:href="#calendar3" />
                    </svg>
                    This week
                </button>
            </div>
        </div>
        <div>
            <h6>Number of users :</h6>

            <?php
            include_once "../php/config.php";
            $sql = "SELECT * FROM user ";
            $result = mysqli_query($conn, $sql);
            $nousers = mysqli_num_rows($result);
            echo "<span class='ms-2'> $nousers</span>"
            ?>

            <hr>
            <h6>Number of banned users :</h6>

            <?php
            include_once "../php/config.php";
            $sql = "SELECT * FROM user ";
            $result = mysqli_query($conn, $sql);
            $nousers = mysqli_num_rows($result);
            echo "<span class='ms-2'> $nousers</span>"
            ?>

            <hr>
            <h6>Number of Emails :</h6>

            <?php
            include_once "../php/config.php";
            $sql = "SELECT * FROM email ";
            $result = mysqli_query($conn, $sql);
            $noemails = mysqli_num_rows($result);
            echo "<span class='ms-2'> $noemails</span>"
            ?>

            <hr>
            <h6>Number of spam Emails :</h6>

            <?php
            include_once "../php/config.php";
            $sql = "SELECT * FROM email where find_in_set('6',Status) ";
            $result = mysqli_query($conn, $sql);
            $spamemails = mysqli_num_rows($result);
            echo "<span class='ms-2'> $spamemails</span>"
            ?>

            <hr>
        </div>
    </main>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>