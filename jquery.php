<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>User CRUD</h2>

<input type="hidden" id="user_id">

<input type="text" id="name"><br>
<input type="number" id="age"><br>
<input type="text" id="address"><br>
<button id="save">Save</button>

<br><br>

<table border="1" width="50%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="userTable"></tbody>
</table>

    <script>
$(document).ready(function(){

    loadUsers();
    function loadUsers(){
        $.ajax({
            url: "read.php",
            success: function(data){
                $("#userTable").html(data);
            }
        });
    }

    $("#save").click(function(){
        let id = $("#user_id").val();
        let name = $("#name").val();
        let age = $("#age").val();
        let address = $("#address").val();

        $.ajax({
            url: "insert.php",
            method: "POST",
            data: { id:id, name:name, age:age, address:address },
            success: function(){
                loadUsers();
                $("#user_id").val("");
                $("#name").val("");
                $("#age").val("");
                $("#address").val("");
            }
        });
    });

    $(document).on("click", ".edit", function(){
        $("#user_id").val($(this).data("id"));
        $("#name").val($(this).data("name"));
        $("#age").val($(this).data("age"));
        $("#adress").val($(this).data("address"));

    });

    $(document).on("click", ".delete", function(){
        let id = $(this).data("id");

        if(confirm("Delete this user?")){
            $.ajax({
                url: "delete.php",
                method: "POST",
                data: { id:id },
                success: function(){
                    loadUsers();
                }
            });
        }
    });

}); 
// $(document).ready(function(){
//     $("#btn").click(function(){
//         let name = $("#name").val();
//         alert("Hello " + name);
//     })

//     $("#btn").click(function(){
//         let age = $("#age").val();
//         alert("I am " + age + " years old"); 
//     })
// });
    </script>
</body>
</html>
