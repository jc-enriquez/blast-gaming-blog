<?php include "includes/db.php";

$code = $_GET['verification_code'];

$query = "UPDATE users SET verification_status = 1 WHERE verification_code = '$code' ";

$register_account_query = mysqli_query($connection, $query);
            
if(!$register_account_query) {
    die("QUERY FAILED" . mysqli_error($connection));
}

header("Location: index.php");

?>