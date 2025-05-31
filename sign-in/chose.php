<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Loction: ../sign-in/index.html');
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="../js/color-modes.js"></script>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="generator" content="Hugo 0.118.2" />
  <title>chose</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet" />

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

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, 0.1);
      border: solid rgba(0, 0, 0, 0.15);
      border-width: 1px 0;
      box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
        inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
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

    .form {
      padding: 50px;
    }

    .btn {
      border: solid#00adb5;
      border-radius: 2rem;
    }

    .btn:hover {
      background-color: #00adb5;
    }
  </style>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
  <?php
  include_once "../includes/color.html";
  ?>
  <div class="container align-items-center">
    <span class="justify-content-center d-flex m-auto">
      <h1>HI Admin Chose your Destination please</h1>
    </span>
    <hr />

    <form action="signin.php" method="post" class="justify-content-center d-flex form m-auto">
      <button class="btn me-2" name="dashboard" type="submit">
        DASHBOARD
      </button>
      <span>
        <h4>or</h4>
      </span>
      <button class="btn ms-2" name="inbox" type="submit">INBOX</button>
    </form>
  </div>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>