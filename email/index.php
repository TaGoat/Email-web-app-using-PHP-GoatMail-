<!DOCTYPE html>
<html lang="en">

<head>
  <script src="../js/color-modes.js"></script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Email</title>
  <link href="../css/all.min.css" rel="stylesheet" />
  <link href="../css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../includes/style.css">

</head>

<body>
  <?php
  include_once "../includes/color.html";
  require_once "../includes/header.html";
  ?>
  <main style="margin-top: 86px" id="main-content">
    <div class="row container-fluid">

      <?php
      $id = $_GET['id'];
      include_once "../php/config.php";
      $sql = "SELECT * from email where id=$id";
      $result = mysqli_query($conn, $sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='col-md-12'>
        <h1 id='subject' class=' ms-4 d-flex'>" . $row["subject"] . "</h1></div><hr> 
        <div class='col-md-9' id='sender' style='font-size: 20px'> Sender : "
            . $row['sender'] .
            "</div>
          <div class='col-md-3'>" . $row['created_at'] . "</div><hr>
          <div id='body' class='col-md-12'><p>"
            . $row['body'] .
            "</p></div>
          <form action='../Compose/compose.php' method='post'>
          <input value='" . $row['id'] . "' name='id' style='display: none'>
          <div class='col-md-12  justify-content-start me-auto d-flex'>
          <button name='reply' type='submit' class='btn ms-2' style='background-color: #00adb5'>
            Replay
          </button>
          <button name='forward' type='submit' class='btn ms-2 ' style='background-color: #00adb5'>
            Forward
          </button>
        </div><form>";
        }
      } else {
        echo "<h1 class='justify-content-center d-flex ms-auto my-4'>There is no emails</h1>";
      }
      $conn->close();
      ?>
    </div>
  </main>
  <script src="../js/all.min.js"></script>
  <script src="../js/jquery-3.7.1.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>