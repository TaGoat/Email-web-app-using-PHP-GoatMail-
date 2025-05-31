<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Loction: ../sign-in/index.html');
} else {
    include "../php/config.php";
    function toggleFavorite($item_id)
    {
        global $conn;

        // Get item ID from request body (assuming JSON format)
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data || !isset($data['starId'])) {
            return "Invalid request format"; 
        }
        $item_id = $data['starId'];

        // Check if item is already favorited
        $sql = "SELECT * FROM email WHERE find_in_set('3',Status)  AND id= $item_id";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            // Remove from favorites
            $sql = "UPDATE `email` Set Status = Replace(Status, '3',',') WHERE `email`.`id`  =  $item_id;";
            mysqli_query($conn, $sql);
            if ($conn->affected_rows > 0) {
                return "Item unfavorited successfully";
            } else {
                return "Failed to unfavorite item";
            }
        } else {
            // Add to favorites
            checkstatus($item_id);
            return "Item favorited successfully";
        }
    }
    //check status
    function checkstatus($idd)
    {
        $results = [];
        global $conn;

        for ($i = 1; $i < 8; $i++) {


            $sql = "SELECT * FROM `email` WHERE find_in_set('$i',Status) and `email`.`id` = $idd";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $results[] = $i;
            } else {
            }
        }


        $fresult = implode(',', $results);

        $sql = "UPDATE `email` SET `Status` = '$fresult,3' WHERE `email`.`id` = $idd";
        mysqli_query($conn, $sql);
    }



    // Process request (assuming you have a route for this script)
    $data = json_decode(file_get_contents('php://input'), true);
    if (!$data) {
        // Handle invalid request format (optional)
        die("Invalid request");
    }

    $item_id = $data['starId'];
    $response = toggleFavorite($item_id);

    echo $response;  // Send response message back to JavaScript

    // Close connection (optional, usually handled by connection pooling mechanisms)
    $conn->close();
}
