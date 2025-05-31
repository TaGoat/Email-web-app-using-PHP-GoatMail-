<!DOCTYPE html>
<html lang="en">

<head>
  <script src="../js/color-modes.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Users</title>

  <link href="../css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../includes/dashboars.css">
  <style>
    .forme {
      border-radius: 1rem;
    }



    .mybtns:hover {
      border: solid 2px;
      border-radius: 1rem;
    }
  </style>
</head>

<body>
  <?php
  include_once "../includes/color.html";
  include_once "../includes/dashboard.html";
  ?>

  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-1" id="main-content">
    <?php
    if (isset($_GET['id'])) {
      include_once "../php/config.php";
      $sql = "SELECT * FROM user where id = $_GET[id] ";
      $result = mysqli_query($conn, $sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "
            <form method='post' action='update.php'>
            <div class='row container-fluid d-flex my-5 justify-content-center'>
              <h1 class='justify-content-center m-auto d-flex mb-5'>Edit user</h1>
                      <input  name='id' value='" . $row['id'] . "' style='display:none'' >
                      <div class='col-md-4 mb-3'>
                        <label for='firstname' class='form-label'>First name</label>
                        <input type='text' name='fname' class='forme' value='" . $row['fname'] . "' id='firstname' required />
                      </div>
                      <div class='col-md-4'>
                        <label for='lastname' class='form-label'>Last name</label>
                        <input type='text' name='lname' class='forme'value='" . $row['lname'] . "' id='lastname' required />
                      </div>
                      <div class='col-md-4'>
                        <label for='dob' class='form-label'>Date of Brith</label>
                        <input type='date' name='dob' class='forme'value='" . $row['dob'] . "' id='dob' required />
                      </div>
                      <div class='col-md-4'>
                        <label for='gender' class='form-label'>Gender</label>
                        <input type='text' name='gend'  class='forme'value='" . $row['gender'] . "' id='gender' required />
                      </div>
                      <div class='col-md-4'>
                        <label for='user_name' class='form-label'>Username</label>
                        <input type='text' name='usern' class='forme'value='" . $row['username'] . "' id='user_name' required />
                      </div>
            
                      <div class='col-md-4'>
                        <label for='passWord' class='form-label'>password</label>
                        <input type='text' name='pass' class='forme' value='" . $row['pass'] . "'id='passWord' required />
                      </div>
                      <div class='col-6 mt-3'>
                        <button
                          type='submit'
                          class='mybtns btn w-100'
                          id='update'
                          name='update'
                        >
                          UPDATE
                        </button>
                      </div>
                      </div>
                      </form>
                    
                    
              
            ";
        }
      } else {
        echo "<h1 class='justify-content-center d-flex ms-auto my-4'>Error</h1>";
      }
    }
    if (isset($_POST['update'])) {
      $id = $_POST['id'];
      $fn = $_POST['fname'];
      $ln = $_POST['lname'];
      $dob = $_POST['dob'];
      $gender = $_POST['gend'];
      $usern = $_POST['usern'];
      $pass = $_POST['pass'];



      include_once "../php/config.php";

      $sql = "UPDATE `user` SET `fname` = '$fn', `lname` = '$ln', `dob` = '$dob', `username` = '$usern'
      , `pass` = '$pass' WHERE `user`.`id` = $id ";
      $result = mysqli_query($conn, $sql);
      if (mysqli_affected_rows($conn) > 0) {
    ?>
        <script>
          alert('Updated successfully!');
          window.location.href = '../dashboard/users.php';
        </script>
      <?php
      } else {
      ?>
        <script>
          alert("data dosen't changed");
          window.location.href = '../dashboard/users.php';
        </script>
    <?php
      }
    }
    ?>
  </main>


  <script src="../js/jquery-3.7.1.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>

</html>