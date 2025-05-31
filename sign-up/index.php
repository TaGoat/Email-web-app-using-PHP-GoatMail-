<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="../js/color-modes.js"></script>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <title>Create Account</title>


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
  </style>

  <!-- Custom styles for this template -->
  <link href="sign-up.css" rel="stylesheet" />
</head>

<body class="d-flex bg-body-tertiary">
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg>

  <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
        <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#sun-fill"></use>
          </svg>
          Light
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#moon-stars-fill"></use>
          </svg>
          Dark
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#circle-half"></use>
          </svg>
          Auto
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
    </ul>
  </div>

  <main class="container m-5 p-4">
    <?php
    if (!isset($_POST['signup'])) {
      printForm();
    } else {
      include_once "../php/config.php";
      $erorrs = array();
      $fn = trim($_POST['fn']);
      $ln = trim($_POST['ln']);
      $dob = trim($_POST['dob']);
      $gender = trim($_POST['gender']);
      $username = trim($_POST['username']);
      $password = trim($_POST['password']);
      if (empty($fn) || strlen($fn) <= 1 || !ctype_alpha($fn)) {
        $errors[] = 'You forgot to enter your first name or you enterd invalid first name.';
      } else {
        $fn = mysqli_real_escape_string($conn, $fn);
      }
      if (empty($ln) || strlen($ln) < 3 || !ctype_alpha($ln)) {
        $errors[] = 'You forgot to enter your last name or you enterd invalid last name.';
      } else {
        $ln = mysqli_real_escape_string($conn, $ln);
      }
      $minage = 13;
      $maxdate = date('Y-m-d', strtotime('-' . $minage . 'years'));
      if (empty($_POST['dob'])) {
        $errors[] = 'You must enter a valid date of birth.';
      } else {
        $dob = mysqli_real_escape_string($conn, $dob);
        if (strtotime($dob) > strtotime($maxdate)) {
          $errors[] = 'You must be at least ' . $minage . ' years old to register.';
        } else {
          $dob = mysqli_real_escape_string($conn, $dob);
        }
      }
      if (empty($gender) || !ctype_alpha($gender)) {
        $errors[] = 'you must enter vaild gender';
      } else {
        $gender = $gender == 'o1' ? 0 : 1;
        $gender = mysqli_real_escape_string($conn, $gender);
      }
      if (empty($username) || strlen($username) <= 1 and !preg_match("[^a-zA-Z0-9\-\_\.]", $username)) {
        $errors[] = 'You forgot to enter your  user name or its invalid';
      } else {

        $username = mysqli_real_escape_string($conn, $username);
        $sql = "SELECT *FROM user where username='$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          $errors[] = "username already exsists.";
        } else {
          $username = mysqli_real_escape_string($conn, $username);
        }
      }
      $uppercase = preg_match('/[A-Z]/', $password);
      $lowercase = preg_match('/[a-z]/', $password);
      $number = preg_match('/[0-9]/', $password);
      $special = preg_match('/[!@#$%^&*()_+\-=\[\]{};:\'\"\\|,.<>?]/', $password);

      if (empty($password) || strlen($password) < 8 || !$uppercase || !$lowercase || !$number || !$special) {
        $errors[] = 'Please enter a password that contains a combination of at least 8 letters, numbers, and special characters, and must contain at least one uppercase, lowercase, and special character.';
      } elseif ($password != $_POST['password1']) {
        $errors[] = 'Your password did not match the confirmed password.';
      } else {
        $password = mysqli_real_escape_string($conn, trim($password));
      }
      if (empty($errors)) {

        $query = "INSERT INTO `user` (`id`, `fname`, `lname`, `dob`, `gender`, `username`, `status`, `pass`, `created_at`)
           VALUES (NULL, '$fn', '$ln', '$dob', '$gender', '$username@goatmail.com', 0, '" . password_hash($password, PASSWORD_DEFAULT) . "', NOW())";

        $r = mysqli_query($conn, $query);

        if ($r) {
          echo '<h1>Thank you!</h1><p>You are now registered!</p><a href="../sign-in/index.html">Now Sign-in</a><p><br/></p>';
        } else {
          echo '<h1>System Error</h1><p class="error">You could not be registered due to a system error.
        We apologize for any inconvenience.</p>';
          echo '<p>' . mysqli_error($conn) . '<br/><br/>Query: ' . $query . '</p>';
        }

        mysqli_close($conn);
        exit();
      } else {
        echo '<h1>Error!</h1><p class="error">The following error(s) occurred:<br/>';
        foreach ($errors as $msg) {
          echo $msg . '<br/>';
        }
        echo '</p><p>Please try again.</p><p><br/></p>';
        printForm($fn, $ln, $dob);
        mysqli_close($conn);
      }
    }
    function printForm($fn = "", $ln = "", $dob = "")
    {
    ?>
      <h1 style="text-align: center; margin-bottom: 50px">Create Accaount</h1>
      <form method="post" class="row g-3 needs-validation" novalidate>
        <div class="col-md-4">
          <label for="validationCustom01" class="form-label">First name</label>
          <input type="text" class="form-control" id="validationCustom01" name="fn" value="<?= $fn ?>" required />
          <div class="valid-feedback">Looks good!</div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">Last name</label>
          <input type="text" class="form-control" id="validationCustom02" name="ln" value="<?= $ln ?>" required />
          <div class="valid-feedback">Looks good!</div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom03" class="form-label">Date of Brith</label>
          <input type="date" class="form-control" id="validationCustom03" name="dob" value="<?= $dob ?>" required />
          <div class="invalid-feedback">Please fill Your DOB</div>
          <div class="valid-feedback">Look good!</div>
        </div>
        <div class="col-md-3">
          <label for="validationCustom04" class="form-label">Gender</label>
          <select class="form-select" id="validationCustom04" name="gender" required>
            <option selected disabled value="">Choose your Gender</option>
            <option name="o1">Male</option>
            <option>Female</option>
          </select>
          <div class="invalid-feedback">Please select your gender.</div>
        </div>

        <div class="col-md-4">
          <label for="validationCustomUsername" class="form-label">Username</label>
          <div class="input-group has-validation">
            <input type="text" class="form-control" id="validationCustomUsername" name="username" aria-describedby="inputGroupPrepend" required />


            <div class="invalid-feedback">Please choose a username.</div>
          </div>
        </div>
        <div class="col-md-2">

          <label for="validationCustomUsername" class="form-label">Doamin</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input disabled value="Goatmail.com" type="text" class="form-control" id="validationCustomUsername1" name="username" aria-describedby="inputGroupPrepend" />
          </div>
        </div>

        <div class="col-md-4">
          <label for="floatingPassword" class="form-label">password</label>
          <input type="password" class="form-control" id="floatingPassword" name="password" required />
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="showPassword">
            <label class="form-check-label" for="showPassword">Show password</label>
          </div>
          <div class="invalid-feedback">
            Please Enter password that contains a combination of at least 8
            letters and numbers and must contain at least one uppercase and
            lowercase letter and one speacial charcter!
          </div>
        </div>
        <div class="col-md-4">
          <label for="floatingPassword1" class="form-label"> Confirm password</label>
          <input type="password" class="form-control" id="floatingPassword1" name="password1" required />
          <div class="invalid-feedback">
            Please Confirm your Password
          </div>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required />
            <label class="form-check-label" for="invalidCheck">
              Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
              You must agree before submitting.
            </div>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit" name="signup">Sign-Up</button>
        </div>
      </form>
    <?php
    }
    ?>
  </main>

  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="Signup.js"></script>
  <script src="script.js"> </script>
</body>

</html>