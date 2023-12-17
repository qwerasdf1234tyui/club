
<!DOCTYPE HTML>
<html>
	<head>
		<title>iuu дугуйлан</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href = "change.css">
	</head>
	<body>
	<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'club');
	?>

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
						</a>
					</p>
						
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
					<form action="" accept-charset="utf-8" name="cc" method="post" >
					<fieldset>
						<legend>Art</legend>
							<?php
							$query = "SELECT * FROM club where category= 1";
							$query_run = mysqli_query($connection, $query) or die("Bad Query: $sql");
								if(mysqli_num_rows($query_run) > 0) {
								while($row= mysqli_fetch_array($query_run)) {
									echo "<a href = '../munh/guitar.php?ID={$row['id']}'>";
									echo '<img src="data:image;base64,'.base64_encode($row['image']).'" style="width: 250px; height:200px;"><br><br>';
									echo $row['name'].'<br>';
								}
							}
							?></a>
					</fieldset>
					<fieldset>
						<legend>Reading</legend>
						<?php
						$query = "SELECT * FROM club where category= 2";
						$query_run = mysqli_query($connection, $query) or die("Bad Query: $sql");
							if(mysqli_num_rows($query_run) > 0) {
							while($row= mysqli_fetch_array($query_run)) {
								echo "<a href = '../munh/guitar.php?ID={$row['id']}'>";
								echo '<img src="data:image;base64,'.base64_encode($row['image']).'" style="width: 250px; height:200px;"><br>';
								echo $row['name'].'<br>';
							}
						}
						?></a>
					</fieldset>
					<fieldset>
						<legend>Sport</legend>
						<?php
						$query = "SELECT * FROM club where category= 5";
						$query_run = mysqli_query($connection, $query) or die("Bad Query: $sql");
							if(mysqli_num_rows($query_run) > 0) {
							while($row= mysqli_fetch_array($query_run)) {
								echo "<a href = '../munh/guitar.php?ID={$row['id']}'>";
								echo '<img src="data:image;base64,'.base64_encode($row['image']).'" style="width: 250px; height:200px;"><br>';
								echo $row['name'].'<br>';
							}
						}
						?></a>
					</fieldset>
					</form>
					
				</div>
			</div>
		</div>
	</body>
</html>
