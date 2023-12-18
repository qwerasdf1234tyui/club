<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <title>Document</title>
</head>
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
                    ?>
<body>
<div class="col-md-12">
    <div class="card b-1 hover-shadow mb-20">
        <table>
    <?php
        while($row=$result->fetch_assoc()){
            echo "$row[lastname]";}
        ?>
        <div class="media card-body">
            <div class="media-left pr-12">
                <img class="avatar avatar-xl no-radius" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="...">
            </div>
            <div class="media-body">
                <div class="mb-2 == name">
                    <span class="fs-20 pr-16">Нэр: 
                        <?php
                        while($row=$result->fetch_assoc()){
                            echo "
                            <tr>
                            <td>$row[lastname]</td>";}
                        ?>
                    </span>
                </div>
            <small class="fs-16 fw-300 ls-1">Оюутаны код: 
                    <?php
                        while($row=$result->fetch_assoc()){
                            echo "
                            <td>$row[student_code]</td>";}
                    ?> 
                </small>
            </div>
            <div class="media-right text-right d-none d-md-block">
                <p class="fs-14 text-fade mb-12"><i class="fa fa-map-marker pr-1"></i>Анги: 
                <?php
                    while($row=$result->fetch_assoc()){
                        echo "
                        <td>$row[course]</td>
                        </tr>";}
                ?> 
            </p>
            </div>
        </div>
    </div>
    <!-- name, course, studetn_code -->

</div>
</body>
</html>