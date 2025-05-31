<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Loction: ../sign-in/index.html');
}
include_once "pagenation.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script src="../js/color-modes.js"></script>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <title>inbox</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .hide {
      display: none;
    }

    *,
    *::after,
    *::before {
      box-sizing: border-box;
    }

    .model {
      position: fixed;
      top: 10%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0);
      transition: 200ms ease-in-out;
      border: 1px solid black;
      border-radius: 10px;
      z-index: 10;
      background-color: #00adb5;
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
      color: inherit;
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
      justify-items: center;
      margin: auto;
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
  </style>
  <link href="../css/all.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="../includes/style.css">
</head>

<body>
  <?php
  include_once "../includes/color.html";
  require_once "../includes/header.html";
  ?>
  <main style="margin-top: 86px" id="main-content">
    <div class="container-fuild">
      <nav class="navbar sticky-top">
        <input class="nav-item ms-3 ps-2 filter " type="checkbox" id="all"><span class="px-2">All</span>
        <button type="button" class="btn hide" title="Delete" id="deleteButton">
          <i class="fa-solid fa-trash-can"></i>
        </button>
        <button type="button" class="btn hide" id="reportspam" title="Report Spam">
          <i class="fa-solid fa-triangle-exclamation"></i>
        </button>
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
            <?php echo $page ?> of
            <?php echo $pages ?> Pages

          </span>

          <li class="page-item">
            <a class="page-link" href="?page-nr=1" title="first"><i class="fa-solid fa-backward-fast"></i></a>
          </li>
          <li class="page-item">
            <?php
            if (isset($_GET['page-nr']) && $_GET['page-nr'] > 1) {
            ?>
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
              if ($_GET['page-nr'] >= $pages) {
              ?>
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
      <div class="table-responsive ms-1">
        <table class="table table-hover">
          <tbody>
            <?php
            if (isset($_GET['page'])) {

              $requestedPage = $_GET['page'];

              if ($requestedPage === 'inbox') {
                displayEmails($inbox);
                $conn->close();
              }
              if ($requestedPage === 'stared') {
                displayEmails($star);
                $conn->close();
              }
              if ($requestedPage === 'allmails') {
                displayEmails($allmails);
                $conn->close();
              }
              if ($requestedPage === 'spam') {
                displayEmails($spam);
                $conn->close();
              }
              if ($requestedPage === 'sent') {
                displayEmails($sent);
                $conn->close();
              }
            } else {
              displayEmails($inbox);
              $conn->close();
            }


            ?>
          </tbody>
        </table>
      </div>
      <div class="model" id="model">
        <div class="model-header">
          <div id="done"></div>
          <!-- <button data-close-button class="close-button">&times;</button> -->
        </div>
        <div class="model-body">

        </div>
      </div>
      <div id="overlay1"></div>
    </div>
  </main>

  <script src="../js/all.min.js"></script>
  <script src="../js/jquery-3.7.1.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script>
    //open 
    // $(document).ready(function() {
    //   $("#open").on("click", async function(event) {
    //     event.preventDefault(); // Prevent default link behavior

    //     const dataTarget = $(this).data("target");

    //     async function fetchContent(targetUrl) {
    //       try {
    //         const response = await fetch(targetUrl);
    //         if (!response.ok) {
    //           throw new Error(`Error fetching content: ${response.statusText}`);
    //         }
    //         const html = await response.text();
    //         $("#main-content").html(html); // Update the content
    //       } catch (error) {
    //         console.error("Error fetching inbox content:", error);
    //       }
    //     }

    //     await fetchContent(dataTarget); // Call the function with the target URL
    //   });
    // });
    //report spam
    const report = document.getElementById("reportspam");
    report.addEventListener("click", function() {
      const items = document.getElementsByClassName('xyz');
      for (i = 0; i < items.length; i++) {
        if (items[i].checked) {
          id = items[i].id.split('_')[1];
          if (confirm("Are you sure this is spam?")) {
            $.get('../inbox/reportspam.php?id=' + id, function(res) {
              openmodel(model);
              const done = document.getElementById("done");
              done.textContent = res;

            })
          }
          // window.location = 'index.php';
        }
      }
    });
    //deletebutton
    const deleteButton = document.getElementById("deleteButton");
    console.log(deleteButton);
    deleteButton.addEventListener("click", function() {
      const items = document.getElementsByClassName('xyz');
      for (i = 0; i < items.length; i++) {
        if (items[i].checked) {
          id = items[i].id.split('_')[1];
          if (confirm("Are you sure you want to delete this items?")) {
            $.get('../inbox/delete.php?id=' + id, function(res) {
              openmodel(model);
              const done = document.getElementById("done");
              done.textContent = res;

            })
            //window.location = 'delete.php?id=' + id;
          }

        }
      }
    });
    //stars
    function toggleStar(clickedStar) {
      const starIcon = clickedStar; // Access the clicked star element directly
      const starIconElement = starIcon.querySelector('.staricon'); // Get the star icon within the button
      id = starIcon.id.split('_')[1];
      fetch('../inbox/stared.php', {
          method: 'POST',
          body: JSON.stringify({
            starId: id
          })
        })
        .then(response => response.text())
        .then(data => {
          if (data === "Item favorited successfully") {
            starIconElement.classList.remove("far");
            starIconElement.classList.add("fa-solid");


          }
          if (data === "Item unfavorited successfully") {
            starIconElement.classList.remove("fa-solid");
            starIconElement.classList.add("far");

          }
        })
        .catch(error => {
          console.error(error);
        })
    }

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
    // overlaybox
    const openmodelButtons = document.querySelectorAll("[data-model-target]");
    const closemodelButtons = document.querySelectorAll(
      "[data-close-button]"
    );
    const overlay1 = document.getElementById("overlay1");

    openmodelButtons.forEach((button) => {
      button.addEventListener("click", () => {
        const model = document.querySelector(button.dataset.modelTarget);
        openmodel(model);
      });
    });

    overlay1.addEventListener("click", () => {
      const models = document.querySelectorAll(".model.active");
      models.forEach((model) => {
        closemodel(model);
      });
    });

    closemodelButtons.forEach((button) => {
      button.addEventListener("click", () => {
        const model = button.closest(".model");
        closemodel(model);
      });
    });

    function openmodel(model) {
      if (model == null) return;
      model.classList.add("active");
      overlay1.classList.add("active");
    }

    function closemodel(model) {
      if (model == null) return;
      model.classList.remove("active");
      overlay1.classList.remove("active");
      window.location.reload();
    }
  </script>
</body>

</html>