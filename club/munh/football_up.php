<html>
    <head>
        <tittle> </title>
        
        <style>
body{
    background-color:rgb(203, 135, 235);
    justify-content: space-evenly;

}
input{
    width: 40%;
    height: 5%;
    border: 1px;
    border-radius: 05px;
    padding: 8px 15px 8px 15px;
    margin: 10px 0px 15px 0px;
    box-shadow: 1px 1px 2px 1px grey;
}
</style>
</head>
<body>
    <center>
        <h1>Update</h1>

        <?php
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,'club');


            $query = "SELECT * FROM club where id='1' ";
            $query_run = mysqli_query($connection,$query);

            while($row = mysqli_fetch_array($query_run))
            {
                ?>
                
        <form action="" method="POST" class="button" action="football.php" enctype="multipart/form-data">
            
            <input type="text" name="name" value="<?php echo $row['name'] ?>"/></br>
            <input type="text" name="location" value="<?php echo $row['location'] ?>"/></br>
            <input type="text" name="email" value="<?php echo $row['email'] ?>"/></br>
            <input type="text" name="phone" value="<?php echo $row['phone'] ?>"/></br>
            <input type="text" name="date" value="<?php echo $row['date'] ?>"/></br>
            <input type="text" name="time" value="<?php echo $row['time'] ?>"/></br>
            <?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 100px"  >'; ?></br>
            <input type="file" style="background-color:white" name="image"></br>
            <input type="text" name="about" value="<?php echo $row['about'] ?>"/></br>
        
        <a href="football.php"><button type="button" style="width: 100px; height: 33px; margin-right: 80px; border-color: white; border-radius: 2mm;">Cancel</button></a>

            <input type="submit" name="Update" style="width: 100px" value="Update"/>
        </form>
        <?php
        }
    
    ?>
</center>
</body>
</html>

<?php
 $connection = mysqli_connect("localhost","root","");
 $db = mysqli_select_db($connection,'club');

 if(isset($_POST['Update']))
 {
    
    
    $name = $_POST['name'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $about = $_POST['about'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];

  if($image_temp != ""){

    move_uploaded_file($image_temp , "images/$image");


    $sql = "UPDATE club SET name='$name',location='$location',email='$email',phone='$phone',date='$date',time='$time',image='$image',about='$about' where id='1'";
    $query_run = mysqli_query($connection,$sql);

    if($query_run)
    {
        echo '<script> alert("Updated") </script>';
    }
    elseif (!$query_run) {
        echo '<script> alert("it doesnt worked")</script>';
    }
    else{
        echo '<script> alert("Not Updated") </script>';
    }
 }}

?>