
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
<div class="container_my-4">
        <table class="table">
            <thead>
                <tr>
                    <td> <a class='btn  btn-sm' href='../nomin/index.php'><picture><img  controls height="35" widght="35" src="./image/p1.png" alt="g" ></picture></a></td>
                    <td><picture><a class='btn  btn-sm' href='../saruul/login.php'> <img  controls height="35" widght="35" src="./image/p2.jpg" alt="o" ></picture> </a></td>
                    <td><picture><a class='btn  btn-sm' href='../nomin/logout.php'><img  controls height="35" widght="35" src="./image/p3.jpg" alt="images" ></picture></a></td>
                </tr>
            </thead>
        </table>
</div>
<div class="button_">
            <button type=button><a href='slist.php'>Member</a></button>
</div>
    <div class="container_my-5" align="center">
        <table class="table">
            <thead>
                <tr>
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
                    
                    <td>$row[lastname]</td>
                    <td>$row[firstname]</td>
                    <td>$row[course]</td>
                    <td>$row[student_code]</td>
                    </tr>
                    ";
                }
                ?>
        </table>
    </div>
    </div>
</body>
</html>
