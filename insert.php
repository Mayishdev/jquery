<?php
include "db.php";

$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$address = $_POST['address'];

if($id == ""){
    mysqli_query($conn,
        "INSERT INTO students (name, age, address)
         VALUES ('$name', '$age', '$address')");
} else {
    mysqli_query($conn,
        "UPDATE students
         SET name='$name', age='$age', address='$address'
         WHERE id=$id");
}
?>

