<?php
include "db.php";

$result = mysqli_query($conn, "SELECT * FROM students");

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['age']}</td>
            <td>{$row['address']}</td>
            
            <td>
                <button class='edit'
                data-id='{$row['id']}'
                data-name='{$row['name']}'
                data-age='{$row['age']}'
                data-address='{$row['address']}'
                >Edit</button>
                <button class='delete' data-id='{$row['id']}'>Delete</button>
            </td>
          </tr>";
}
?>
