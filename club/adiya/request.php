<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="change.css">
        <title> member list</title>
    </head>
<body>
<div class="wrapper">
<nav class="nav">
                <!--Menu-->
                    <nav class="nav">
                        <!-- Logo -->
                        <div class="logo"><i class = "fas fa-blog"></i>
                        <p style="display:inline-block;">
                            <a href="index.php" class="logo">
                                <img src="../nomin/images/iuulogo_.jpg" alt="" />
                                <h1 class = "h1_logo">ОУУИС</h1>
                            </a>
                        </p>
                            
                        </div>
                        <form method="post" action = "search_result.php">
                        <!--Menu-->
                        <ul class = "menu">
                            <li><a href="../nomin/admin_home.php">Home</a></li>
                            <li><a href="../saruul/reg.php">Student registration</a></li>
                            <li><a href="../munh/club_burtgeh.php">Club registration</a></li>
                            <li><a href="../nomin/admin_account.php">My account</a></li>
                            <li><a href="../saruul/admin.php" >Logout</a></li>
        
                        </ul>
                        </form>
    </nav>
</div>
    <div class="button_">
            <button type=button class = 'requestbtn'><a href='./request.php'>Request</a></button>
            <button type=button class = ''><a href='./member.php'>Member</a></button>
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
    @session_start();
    $connection = new mysqli($servername, $username, $password, $database);
    if ($connection->connect_error){
        die("Connection failed: " .$connection->connect_error);
    }
    $sql = "SELECT * FROM request";
    $result=$connection->query($sql);

    if(!$result){
        die("Invalid query:" .$connection->error);
    }
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>{$row['id']}</td>
            <td>{$row['lastname']}</td>
            <td>{$row['firstname']}</td>
            <td>{$row['course']}</td>
            <td>{$row['student_code']}</td>
            <td>
                <button type='button' onclick='accept({$row['user_id_']})'><a href = 'accept.php'>Accept</button>
                <button type='button' onclick='reject({$row['user_id_']})'><a href = 'reject.php'>Reject</button>
            </td>
        </tr>";
    }
    ?>
    
    <script>
    function accept(user_id_) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert('Student ID: ' + user_id_ + ' accepted.');
                window.location.href = 'accept.php';
            }
        };
        xhttp.open("GET", "accept.php?user_id_=" + user_id_, true);
        xhttp.send();
    }
    
    function reject(user_id_) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.location.href = 'reject.php';
            }
        };
        xhttp.open("GET", "reject.php?user_id_=" + user_id_, true);
        xhttp.send();
    }
    //requestend oyutanii id baival request yavuulj bolohgue. 
    //baihgue bol avdag bolgono.
    </script>
    </table>
    
    </div>
</div>
</body>
</html>
