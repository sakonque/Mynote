<?php
	require_once "common/common.php";

?>

<!DOCTYPE HMTL>
<html>
	<head>
		<title>User Square</title>
		<meta charset="UTF-8" />
		
		<link rel="stylesheet" type="text/css" href="styles/user_square.css" />
		<link rel="stylesheet" type="text/css" href="styles/common_style.css" />
		
		<script src="js/jquery-1.7.1.js"></script>
		<script src="js/jquery-1.7.min.js" type="text/javascript"></script>
		<script src="js/jquery.masonry.min.js" type="text/javascript"></script>
		<script src="js/jquery.infinitescroll.min.js" type="text/javascript"></script>
		<script src="js/jquery.infinitescroll.js" type="text/javascript"></script>
 		<script src="js/pageSystem.js" type="text/javascript"></script>
		<script src="js/user_square.js" type="text/javascript"></script> 
	</head>
	
	<body>
		<?php
			require_once ROOT."common/header.php";
		?>	
		
		<div id="page">
			<div id="us_bar">
				用户广场
			</div>
			<div id="main">
	
			<?php
				$con = mysql_connect(Config::$host, Config::$user, Config::$pass);	
				mysql_select_db(Config::$db, $con);
				$sql = "select * from user";
				$result = mysql_query($sql,$con);
				while($row = mysql_fetch_array($result)){
					$arr[]=array(
						'nick' => $row['nick'],
						'gender' => $row['gender'],
						'uid' => $row['uid']
						//'face' => $row['face']
					);
			?>
			<div class="item">  
				<a href="public_person.php?uid=<?= $row['uid']?>">  
				<img src="images/f1.jpg"   /></a>  
			
				<h1><?= $row['nick'] ?></h1>
				<h2><?php if($row['gender']=="male"){echo "男";} else {echo "女";}?></h2>
				<p>dfsfdsfdfdsfdsfd fs fdsfdsdsa saasddsadasdsadasds addsad asd sadassadsas</p>	
				
			</div>  
			<?php
				}
				mysql_close();
			?>
			
			</div>
		</div>
		<?php
			require_once ROOT."common/footer.php";
		?>		
	</body>
</html>