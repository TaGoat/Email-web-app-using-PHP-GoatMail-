<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once "../php/config.php";
    delete($id);
    echo delete($id);
} else {
    echo 'There is no data to Delete!';
}

function delete($id)
{

    global $conn;
    if (is_numeric($id) and $id != NULL) {
        $sql = "SELECT * from report where email_id=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $query = "DELETE FROM report WHERE email_id =$id";
            $result = mysqli_query($conn, $query);

            $query = "DELETE FROM email WHERE id =$id";
            $result = mysqli_query($conn, $query);
            return "Records deleted successfully";
        } elseif (!mysqli_num_rows($result) > 0) {

            $query = "DELETE FROM email WHERE id =$id";
            $result = mysqli_query($conn, $query);
            return "Records deleted successfully";
        } else {
            return "records already deleted";
        }

        mysqli_close($conn);
    } else {
        return "Error deleting records: " . mysqli_error($conn);
    }
}
