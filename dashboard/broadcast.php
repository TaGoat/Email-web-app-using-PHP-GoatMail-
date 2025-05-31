<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Loction: ../sign-in/index.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../js/color-modes.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Compose</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../includes/dashboars.css">
    <link rel="stylesheet" href="../js/Trumbowyg-main/dist/ui/trumbowyg.min.css" />
    <style>
        .mybtns {
            margin-top: 1rem;
            background-color: #00adb5;
            border-radius: 1rem;
        }

        .mybtns:hover {
            border: 1px solid #00adb5;
        }

        *,
        *::after,
        *::before {
            box-sizing: border-box;
        }

        .model {
            position: fixed;
            top: 75%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: 200ms ease-in-out;
            border: 1px solid black;
            border-radius: 10px;
            z-index: 10;

            width: 500px;
            max-width: 80%;
        }

        .model.active {
            transform: translate(-50%, -50%) scale(1);
        }

        .model-header {
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid black;
        }

        .model-header .title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .model-header .close-button {
            cursor: pointer;
            border: none;
            outline: none;
            background: none;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .model-body {
            padding: 10px 15px;
        }

        #overlay1 {
            position: fixed;
            opacity: 0;
            transition: 200ms ease-in-out;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            pointer-events: none;
        }

        #overlay1.active {
            opacity: 1;
            pointer-events: all;
        }

        .attrea {
            border: solid 3px #00adb5;
            border-radius: 1rem;

        }
    </style>
</head>

<body>
    <?php
    include_once "../includes/color.html";
    include_once "../includes/dashboard.html";
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-1 " id="main-content">
        <?php

        include_once "../php/config.php";

        generateform();
        if (isset($_POST['send'])) {
            include_once "../php/config.php";
            $currentuser = $_SESSION['username'];
            $subject = $_POST['subject'];
            $body = $_POST['body'];

            $errors = [];
            // Validate Subject
            if (empty($subject)) {
                $errors['subject'] = "Please enter a subject.";
            }
            // Validate Body 
            if (empty($body)) {
                $errors['body'] = "Please enter a message body.";
            }
            // Handle form submission if no errors
            if (empty($errors)) {
                $sql = "SELECT username FROM user ";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    $users = $row['username'];
                    $sql = "INSERT INTO `email`  VALUES (NULL,'$currentuser', '$users', '$subject','$body','8',NOW())";
                    mysqli_query($conn, $sql);
                    $emailId = mysqli_insert_id($conn);
                    $sql = "INSERT INTO `broadcasts` (`id`, `message_id`, `send_by`) VALUES (NULL, '$emailId', 'admin')";
                    mysqli_query($conn, $sql);
                }

                if ($result) {
                    echo "<script>
            alert('Successfly sent');
            window.location = '../dashboard/index.php';
          </script>";
                } else {
                    echo "error";
                }
            } else {
                echo "Please correct the following errors:";
                echo "<ul>";
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul>";
                generateform($to, $subject, $body);
            }
        }

        if (isset($_POST['discard'])) {
        ?>

            <script>
                window.location = "../dashboard/index.php";
            </script>
        <?php


        }

        ?>
    </main>
    <?php
    function generateform($subject = "", $body = "")
    {
    ?>
        <form id="myform" action="" method="post" enctype="multipart/form-data">
            <div class="container-fluid">
                <p class="text-center">New Message</p>
                <div class="form-row mb-3">
                    <label for="subject" class="col-2 col-sm-1 col-form-label">Subject:</label>
                    <div class="col-10 col-sm-11">
                        <input type="text" class="form-control" id="subject" name="subject" value="<?= $subject ?>" placeholder="Subject" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-11 ml-auto">
                        <div class="form-group mt-4">
                            <textarea class="form-control bod" id="tiny" name="body" rows="12" placeholder="Click here to reply">
            <?= $body ?>
          </textarea>
                        </div>

                        <div class="form-group mb-2">
                            <button type="submit" id="send" name="send" class="btn bt mybtns">Send</button>
                            <button type="submit" name="discard" class="btn bt mybtns">Discard</button>

                        </div>
                    </div>
                </div>
        </form>
    <?php
    }
    ?>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script>
        window.jQuery ||
            document.write('<script src="../js/jquery-3.7.1.min.js"><\/script>');
    </script>
    <script src="../js/Trumbowyg-main/dist/trumbowyg.min.js"></script>
    <script src="../js/Trumbowyg-main/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js"></script>
    <script src="../js/Trumbowyg-main/dist/plugins/emoji/trumbowyg.emoji.min.js"></script>
    <script src="../js/Trumbowyg-main/dist/plugins/fontfamily/trumbowyg.fontfamily.min.js"></script>

    <script>
        $("#tiny").trumbowyg({
            btns: [
                ["viewHTML"],
                ["undo", "redo"], // Only supported in Blink browsers
                ["formatting"],
                ["strong", "em", "del"],
                ["superscript", "subscript"],
                ["link"],
                ["justifyLeft", "justifyCenter", "justifyRight", "justifyFull"],
                ["unorderedList", "orderedList"],
                ["horizontalRule"],
                ["removeformat", "emoji", "fontfamily"],
                ["fullscreen"],
            ],
        });

        //
        // $(document).ready(function() {
        //   $("#send").click(function(event) {
        //     let errorMessage = "";

        //     // Email validation
        //     const email = $("#to").val().trim();
        //     if (!email) {
        //       errorMessage += "To field is required.\n";
        //     } else if (!validateEmail(email)) {
        //       errorMessage += "Invalid email format. Please enter a valid email address.\n";
        //     }

        //     // Subject validation
        //     const subject = $("#subject").val().trim();
        //     if (!subject) {
        //       errorMessage += "Subject field is required.\n";
        //     }

        //     // Body validation
        //     const body = $(".bod").val();
        //     if (!body) {
        //       errorMessage += "Write your message.\n";
        //     }

        //     // Attachment validation
        //     const attachmentInput = $("#attachment");
        //     if (attachmentInput.get(0).files.length > 0) {
        //       const file = attachmentInput.get(0).files[0];
        //       const MAX_SIZE = 1048576 * 16; // 16MB in bytes

        //       if (file.size > MAX_SIZE) {
        //         errorMessage += `Attachment exceeds maximum size (16MB). Please choose a smaller file.\n`;
        //       }
        //     }

        //     if (errorMessage) {
        //       alert(errorMessage);
        //       event.preventDefault();
        //     }
        //   });
        // });

        // function validateEmail(email) {
        //   const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        //   return re.test(String(email).toLowerCase());
        // }
    </script>

</body>

</html>