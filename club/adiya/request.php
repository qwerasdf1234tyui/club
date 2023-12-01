<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style2.css">
        <title> member list</title>
    </head>
<body>
<div class="wrapper">
<div class="container_my-5">
        <table class="table">
            <thead>
                <tr>
                <td> <a class='btn  btn-sm' href='../nomin/index.php'><picture><img  controls height="35" widght="35" src="./image/p1.png" alt="g" style="width:;"></picture></a></td>
                <td><picture><a class='btn  btn-sm' href='./logout.php'><img  controls height="35" widght="35" src="image/p2.jpg" alt="o" style="width:;"></picture> </a></td>
                <td><picture><a class='btn  btn-sm' href='myaccount.php'><img  controls height="35" widght="35" src="image/p3.jpg" alt="images" style="width:;"></picture></a.</td>
            </tr>
        </thead>
    </table>
</div>
    <div class="button_">
            <button type=button><a href='./request.php'>Request</a></button>
            <button type=button><a href='./list.php'>Member</a></button>
</div>
<div class="container_my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>lastname</th>
                    <th>firstname</th>
                    <th>course</th>
                    <th>student_code</th>
                </tr>
            </thead>
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="club";

    $connection = new mysqli($servername, $username, $password, $database);
    if ($connection->connect_error){
        die("Connection failed: " .$connection->connect_error);
    }
    $sql = "SELECT * FROM student";
    $result=$connection->query($sql);

    if(!$result){
        die("Invalid query:" .$connection->error);
    }
    while($row=$result->fetch_assoc()){
        echo "
        <tr>
        <td>$row[id]</td>
        <td>$row[lastname]</td>
        <td>$row[firstname]</td>
        <td>$row[course]</td>
        <td>$row[student_code]</td>
        <td>
        <button type= button><a href='accept.php'>Accept</a></button>
        <button type= button><a href='reject.php'>Reject</a></button>
        </td>
        </tr>

        ";
    }


    ?>
</table>
    </div>
</div>

</body>
</html>
