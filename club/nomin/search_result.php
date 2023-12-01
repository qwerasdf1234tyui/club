<!DOCTYPE HTML>
<html>
	<head>
		<title>iuu дугуйлан</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href = "style2.css">
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
						<form method="post">
						<!--Menu-->
						<ul class = "menu">
							<li><a href="../nomin/index.php">Home</a></li>
							<li><a href="">My account</a></li>
							<li><a href="./logout.php" >Logout</a></li>
							<li><input type="text" placeholder="Search.." name = "search" required="required"/></li><button>search</button>	
						</ul>
						</form>
					</nav>
					
				<!-- Main -->
				<div id="wrap">
					<div class="image-container">
						<div class="club_list">
						<!-- <a href="../munh/before_user_football.php" onclick = ""> -->
						<?php
								if ($_SERVER["REQUEST_METHOD"] == "POST") {
								$search_query = $_POST["search"];
								$sql = "SELECT * FROM club WHERE name LIKE '%$search_query%'";
								$result = $connection->query($sql);
								if($result->num_rows > 0) {	
									echo '<h2>result</h2>';
									while($row = $result->fetch_assoc()) {
										echo '<p>'.$row['name'].', </p';                                    
                                    }
										//추가적인 동아리 정보를 출력 가능.
								}else{
									echo '<p>검색 결과가 없습니다.xxxx</p>';
								}}
								?></a>
					</div></div>
				</div>
			</div>
	</body>
</html>