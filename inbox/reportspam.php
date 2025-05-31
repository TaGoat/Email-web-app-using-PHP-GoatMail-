<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once "../php/config.php";
    reportspam($id);
    echo reportspam($id);
} else {
    echo 'There is no data to report!';
}
function reportspam($id)
{
    global $conn;
    if (is_numeric($id) and $id != NULL) {
        $sql = "SELECT * from report where email_id=$id";
        $result = mysqli_query($conn, $sql);
        if (!mysqli_num_rows($result) > 0) {
            $query = "INSERT INTO `report` (`id`, `email_id`, `report`) VALUES (NULL, '$id', 'RPspam') ;";
            $result = mysqli_query($conn, $query);
            return "Records reported successfully";
        } else {
            return " records have been Reported: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
