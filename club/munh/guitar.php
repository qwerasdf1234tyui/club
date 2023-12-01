<?php 
session_start();


 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Club</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body{background-color:rgb(203, 135, 235);}
        </style>
</head>
<body>
     <table class="main">
     <tr>

<td class="home"><ul>
    <li><a href="">Home</a></li>
    <li><a href="">Club</a></li>
    <li><a href="">My account</a></li>
    <li><a href="login.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are you sure you want to exit?');" >Logout</a></li>
</ul></td>
<td class=""><a href=""><button type="button">Request</button></a>
<td class="navbtn"><a href="guitar_up.php"><button type="button">Edit</button></a>
</td>
</tr>
<tr>      
        <td class="btn">
         <ul>
           <li><button type="button"><a href="#ab">About</button></li>
           <li><button type="button"><a href="#ac">Activity</button><li>
           <li><button type="button"><a href="#con"> Contact</button></li>
         </ul>
 </td></tr>

 <table class="main1">
 <?php
      $connection = mysqli_connect("localhost","root","");
      $db = mysqli_select_db($connection,'club');

     
      $query = "SELECT * FROM club Where id='2'";
      $query_run = mysqli_query($connection,$query); 
     
         while($row = mysqli_fetch_array($query_run)){
   ?>

 <tr class="zurag"><td class="zurag">
 <?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 275px; height: 183px;"  >'; ?>

 </td>
 <td class="location">
    <h1><?php echo $row['name']; ?></h1>
    <b>Location: <?php echo $row['location']; ?>
    <p>Date: Every <?php echo $row['date']; ?> <?php echo $row['time']; ?> </p></b>
    </tr>
    
    <tr class="about"><td>
        <h1 id="ab">About</h1>
        <p><b> <?php echo $row['about']; ?>
 <b></p></td>
 <?php
         }
         ?>
 
 <?php
      $connection = mysqli_connect("localhost","root","");
      $db = mysqli_select_db($connection,'club');

     
      $query = "SELECT * FROM activity Where id='1'";
      $query_run = mysqli_query($connection,$query); 
     
         while($row = mysqli_fetch_array($query_run)){
   ?>

 <tr class="activity"><td>
        <h1 id="ac">Activity</h1>
        <tr class="ac_zurag"><td class="ac_zurag">
        <div class="ac_zurag"> <?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 275px" >'; ?></div</td>
        <td class="ac_text">
        <b><?php echo $row['text']; ?></b>
     
</tr>
<?php
         }
         ?>
<?php
      $connection = mysqli_connect("localhost","root","");
      $db = mysqli_select_db($connection,'club');

     
      $query = "SELECT * FROM club Where id='1'";
      $query_run = mysqli_query($connection,$query); 
     
         while($row = mysqli_fetch_array($query_run)){
   ?>

<tr class="contact"><td>
        <h1 id="con">Contact</h1>
        <tr class="con-text"><td class="con-text">
        <b>Phone: <?php echo $row['phone']; ?>
    <p>Email: <?php echo $row['email'] ?></p></b>
</td></tr>
<?php
         }
         ?>
    
 </td>
 </tr>
</table>
</table>   
    </body>
    </html>
    
    