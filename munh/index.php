<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'club');
$query = "SELECT * FROM club";
      $result = mysqli_query($connection, $query ) or die("Bad Query: $query");
      
      ?>

<!DOCTYPE html>
<html lang='en-US'>
    <head>
        <meta charset='utf-8'>
        <title>AAAA</title>
</head>
<body>
    <div id='container'>
<h1> My sfasfasf</h1>
<div id='content'>
<?php 
if(mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result)) {
    echo"<a href='guitar.php?ID={$row['id']}'>{$row['name']}</a><br>\n";
  }
}else{
echo"<h2>No Image to display</h2>";
}

?>  
</div>
</div>
</body>
</html>
