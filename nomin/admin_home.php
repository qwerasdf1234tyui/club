
<!DOCTYPE HTML>
<html>
	<head>
		<title>iuu дугуйлан</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href = "style.css">
	</head>
	<body class="is-preload">
	<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "club";
	$connection = new mysqli($servername, $username, $password, $database);
	if ($connection->connect_error) {
		die("Connection failed". $connection->connect_error);}?>

	<!-- Wrapper -->
		<div id="wrapper">
				<!--Menu-->
				<nav class="nav">
					<!-- Logo -->
					<div class="logo"><i class = "fas fa-blog"></i>
					<p style="display:inline-block;">
						<a href="index.php" class="logo">
							<img src="images/iuulogo_.jpg" alt="" />
							<h1 class = "h1_logo">ОУУИС</h1>
						</a></p>
						
					</div>
					<form method="post" action = "search_result.php">
					<!--Menu-->
					<ul class = "menu">
						<li><a href="../nomin/index.php">Home</a></li>
						<li><a href="../munh/myacc1.php">My account</a></li>
						<li><a href="./logout.php" >Logout</a></li>
						<li><input type="text" placeholder="Search.." name = "search" required="required"/></li><button>search</button>
	
					</ul>
					</form>
				</nav>
			<!-- Main -->
			<div id="wrap">
				<div class="image-container">
						<?php
							$query = "select * from club ";
							$query_run = mysqli_query($connection, $query);
							while($row= mysqli_fetch_array($query_run)) {
								echo '<a href = "../munh/admin_football.php?a='.$row["id"].'">';
								echo '<img src="data:image;base64,'.base64_encode($row['image']).'" style="width: 250px; height:200px;">';
								echo $row['name'];
							}
						?>
					</a>
				</div>
			</div>
		</div>
	</body>
</html>
