<?php
include "db.php";

$id = $_POST['id'];
mysqli_query($conn, "DELETE FROM students WHERE id=$id");
?>
