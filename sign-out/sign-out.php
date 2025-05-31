<?php
session_start();
unset($_SESSION);
session_destroy();
header('Location: ../sign-in/index.html')

    ?>