<?php

include_once "pagenation.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../js/color-modes.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>emailst</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../includes/dashboars.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -0.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        @media (min-width: 991.98px) {
            main {
                padding-left: 240px;
            }
        }


        .myb {
            border: 1px solid #00adb5;

        }

        .myb:hover {
            background-color: #00adb5;
        }

        .search {
            justify-content: end;
            margin-left: auto;
            margin-right: 2rem;
        }

        .hide {
            display: none;
        }
    </style>
</head>

<body>
    <?php
    include_once "../includes/color.html";
    require_once "../includes/dashboard.html";
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-1 " id="main-content">
        <div class="container-fluid p-0">

            <nav class="navbar fixed-top sticky-top  bg-body-tertiary">
                <input class="nav-item ms-3 ps-2 filter mycheck " type="checkbox" id="all"><span class="px-2">All</span>
                <button type="button" class="btn hide" title="mark Spam & Unspam" id="spam">
                    <i class="fa-solid fa-virus"></i></button>
                <button type="button" class="btn hide" title="Delete" id="deleteButton">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <form action="" method="post">
                    <button type="submit" name="spam" class="nav-item btn myb ms-3 px-2 ">spam</button>
                    <button type="submit" name="emails" class="nav-item btn myb ms-3 px-2 ">Emails</button>
                    <button type="submit" name="broadcast" class="nav-item btn myb ms-3 px-2 ">broadcast</button>
                </form>

                <ul class="pagination pagination-sm justify-content-end pt-3 ms-auto me-4">
                    <?php
                    if (isset($_GET['page-nr'])) {
                        if ($nr_of_rows != $rowsPerpage) {
                            $n_of_rows = $nr_of_rows;
                        } else {
                            $n_of_rows = $_GET['page-nr'] * $rowsPerpage;
                        }
                        $page = $_GET['page-nr'];
                    } else {
                        if ($nr_of_rows != $rowsPerpage) {
                            $n_of_rows = $nr_of_rows;
                        }
                        $page = 1;
                    }

                    ?>
                    <span class="me-5">Showing
                        <?php echo $page ?>
                        of
                        <?php echo $pages ?>
                        Pages

                    </span>

                    <li class="page-item">
                        <a class="page-link" href="?page-nr=1" title="first"><i class="fa-solid fa-backward-fast"></i></a>
                    </li>
                    <li class="page-item">
                        <?php
                        if (
                            isset($_GET['page-nr']) && $_GET['page-nr'] >
                            1
                        ) { ?>
                            <a class="page-link" href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>" title="previous"><i class="fa-solid fa-less-than"></i></a>
                        <?php
                        } else {
                        ?>
                            <a class="page-link" title="previous"><i class="fa-solid fa-less-than"></i></a>

                        <?php } ?>
                    </li>
                    <li class="page-item">
                        <?php if (!isset($_GET['page-nr'])) { ?>
                            <a class="page-link" href="?page-nr=2" title="next"><i class="fa-solid fa-greater-than"></i></a>

                            <?php } else {
                            if ($_GET['page-nr'] >= $pages) { ?>
                                <a class="page-link" title="next"><i class="fa-solid fa-greater-than"></i></a>

                            <?php
                            } else {
                            ?>
                                <a class="page-link" href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>" title="next"><i class="fa-solid fa-greater-than"></i></a>

                        <?php
                            }
                        }
                        ?>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?page-nr=<?php echo $pages ?>" title="last"><i class="fa-solid fa-forward-fast"></i></a>
                    </li>
                </ul>
            </nav>
            <div class="table-responsive  ms-1">
                <table class="table table-hover">
                    <tbody id="content">
                        <?php
                        if (isset($_POST['spam'])) {
                            displayrecords2($spam);
                        }
                        if (isset($_POST['broadcast'])) {
                            displayrecords2($broadcast);
                        }
                        if ((!isset($_POST['spam']) and !isset($_POST['broadcast'])) or isset($_POST['emails'])) {
                            displayrecords2($emails);
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </main>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>
    <script>
        //spam
        const spam = document.getElementById("spam");
        console.log(spam);
        spam.addEventListener("click", function() {
            const items = document.getElementsByClassName('xyz');
            for (i = 0; i < items.length; i++) {
                if (items[i].checked) {
                    id = items[i].id.split('_')[1];


                    $.get('spam.php?id=' + id, function(res) {
                        console.log(res);
                    })
                    //window.location = 'delete.php?id=' + id;

                    window.location.reload();
                }
            }
            confirm("the email have been spamed or unspamed");
            window.location.reload();

        });
        //deletebutton
        const deleteButton = document.getElementById("deleteButton");
        console.log(deleteButton);
        deleteButton.addEventListener("click", function() {
            const items = document.getElementsByClassName('xyz');
            for (i = 0; i < items.length; i++) {
                if (items[i].checked) {
                    id = items[i].id.split('_')[1];
                    if (confirm("Are you sure you want to delete this users?")) {
                        $.post('delete.php', {
                            id: id
                        }, function(res) {
                            console.log(res);
                        });
                        //window.location = 'delete.php?id=' + id;
                    }
                    window.location.reload();
                }
            }
        });

        const selectAll = document.getElementById("all");
        const checkboxes = Array.from(document.querySelectorAll(".mycheck"));
        const hiddenElements = document.querySelectorAll(".hide");

        // Handle "select all" checkbox change
        selectAll.addEventListener("change", function() {
            checkboxes.forEach(checkbox => checkbox.checked = selectAll.checked);
            hiddenElements.forEach(element => {
                element.style.display = checkboxes.some(box => box.checked) ? "block" : "none";
            });

            // Update "select all" checkbox state based on individual checkboxes
            selectAll.checked = checkboxes.every(box => box.checked);
        });

        // Handle individual checkbox changes
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", () => {
                hiddenElements.forEach((element) => {
                    element.style.display = checkboxes.some(box => box.checked) ? "block" : "none";
                });
                selectAll.checked = checkboxes.every(box => box.checked);
            });
        });
    </script>
</body>

</html>