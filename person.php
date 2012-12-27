<?php
	// person.php 
	// version 1.0 (Dec, 17th. 2012)
	// created by kylejan for web2.0 project
	require_once "common/common.php";
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>MySpace</title>
	<link rel="stylesheet" type="text/css" href="styles/common_style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="styles/person_space.css" media="all" />
	
	<script src="js/jquery-1.7.1.js"></script>
	<script src="js/jquery-1.7.min.js" type="text/javascript"></script>
	<script src="js/jquery.masonry.min.js" type="text/javascript"></script>
	<script src="js/square.js" type="text/javascript"></script> 
</head>

<body>
	<?php
		require_once ROOT."common/header.php";
	?>
	
	<div id="main">
		<div id="left_content">
			<div class="info">
				<?php
					$con_user = mysql_connect(Config::$host, Config::$user, Config::$pass);
					mysql_select_db(Config::$db, $con_user);
					
					$sql_to_user = "select * from user where uid=" . $_SESSION['userid'];	
					$result_user = mysql_query( $sql_to_user ) or die( "No comment table!" );
					$record_user = mysql_fetch_array($result_user);
					$uname = $record_user['name'];
				?>
				<h1><?= $uname ?></h1>
				<img src="images/user.jpg" alt="MyPic"/>
				<p>一个向往着无穷无尽的创意世界，不断学习生活，享受生活的男孩</p>
			</div>

			<div class="Friend_Group">
				<h1>我的好友</h1>
				<div class="each">
					<img src="images/f1.jpg" />
					<p>卡卡罗特是神奇的超级萨亚人</p>
				</div>
				
				<div class="each">
					<img src="images/f2.jpg" />
					<p>路飞君</p>
				</div>
				
				<div class="each">
					<img src="images/f3.jpg" />
					<p>香吉士</p>
				</div>
				
				<div class="each">
					<img src="images/f4.jpg" />
					<p>娜美君</p>
				</div>
			</div>
			
			<div class="clear"></div>

			<div class="Friend_Group">
				<h1>我的小组</h1>
				<div class="each">
					<img src="images/f1.jpg" />
					<p>卡卡罗特</p>
				</div>
				
				<div class="each">
					<img src="images/f2.jpg" />
					<p>路飞君</p>
				</div>
				
				<div class="each">
					<img src="images/f3.jpg" />
					<p>香吉士</p>
				</div>
				
				<div class="each">
					<img src="images/f4.jpg" />
					<p>娜美君</p>
				</div>
			</div>
			
		</div>
		
		<div id="right_content">
			<h1>我的笔记</h1>
			<a href="upload_book.php"><h5>上传书籍</h5></a>
			<a href="create_group.php"><h5>创建小组</h5></a>
			<div class="clear"></div>
			<div class="us_bar"></div>
			
			<div class="footprint">
				<div class="item">  
					<img src="images/f1.jpg"   /></a> 
					<p>我是卡卡罗特，看我的龟波气功，超级赛亚人变身</p>
				</div>
				<div class="item">  
					<img src="images/f2.jpg"   /></a>  
				</div>  
				<div class="item">  
					<img src="images/f3.jpg"   /></a>  
				</div>  
				<div class="item">  
					<img src="images/f4.jpg"   /></a>  
				</div>  
				<div class="item">  
					<img src="images/f5.jpg"   /></a>  
				</div>  
				<div class="item">  
					<img src="images/f2.jpg"   /></a>  
				</div>  
				<div class="item">  
					<img src="images/f3.jpg"   /></a>  
				</div>  
				<div class="item">  
					<img src="images/f4.jpg"   /></a>  
				</div>  
			</div>
			
			<h1>我的评论</h1>
			<div class="clear"></div>
			<div class="us_bar"></div>
	
			<div class="footprint">
				<?php		
					$con_comment = mysql_connect(Config::$host, Config::$user, Config::$pass);
					mysql_select_db(Config::$db, $con_comment);
					
					$sql_to_comment = "select * from comment where uid=" . $_SESSION['userid'];	
					$result_comment = mysql_query( $sql_to_comment ) or die( "No comment table!" );
					
					while($record_comment = mysql_fetch_array($result_comment)){
						$did = $record_comment['did'];
						$content = $record_comment['content'];
						
						$con_document = mysql_connect(Config::$host, Config::$user, Config::$pass);
						mysql_select_db(Config::$db, $con_document);
						
						$sql_to_document = "select * from document where did=" . $did;
						$result_document = mysql_query( $sql_to_document ) or die( "No document table!" );
						$record_document = mysql_fetch_array($result_document);
						
						$title = $record_document['title'];
						$description = $record_document['description'];
						$picture = $record_document['picture'];
					
				?>
						<div class="item"> 
							<h2><?= $title ?></h2>
							<div class="clear"></div>
							<img src="<?= $picture ?>"   /></a>  
							<p><?= $description ?></p>
							<div class="us_bar"></div>
							<h3>Comment</h3>
							<p><?= $content ?></p>
						</div>
				<?php
					}
				?>
				<div class="item">  
					<h2>哈利波特与火焰杯</h2>
					<div class="clear"></div>
					<img src="images/f2.jpg"   /></a>  
					<p>我是卡卡罗特，看我的龟波气功，超级赛亚人变身</p>
					<div class="us_bar"></div>
					<h3>Comment</h3>
					<p>我是卡卡罗特，看我的龟波气功，超级赛亚人变身</p>
				</div>  
				<div class="item">  
					<h2>哈利波特与火焰杯</h2>
					<div class="clear"></div>
					<img src="images/f3.jpg"   /></a>  
					<p>我是卡卡罗特，看我的龟波气功，超级赛亚人变身</p>
					<div class="us_bar"></div>
					<h3>Comment</h3>
					<p>我是卡卡罗特，看我的龟波气功，超级赛亚人变身</p>
				</div>  
				<div class="item">  
					<h2>哈利波特与火焰杯</h2>
					<div class="clear"></div>
					<img src="images/f4.jpg"   /></a>  
					<p>我是卡卡罗特，看我的龟波气功，超级赛亚人变身</p>
					<div class="us_bar"></div>
					<h3>Comment</h3>
					<p>我是卡卡罗特，看我的龟波气功，超级赛亚人变身</p>
				</div>  
				<div class="item">  
					<img src="images/f5.jpg"   /></a>  
				</div>  
				<div class="item">  
					<img src="images/f2.jpg"   /></a>  
				</div>  
				<div class="item">  
					<img src="images/f3.jpg"   /></a>  
				</div>  
				<div class="item">  
					<img src="images/f4.jpg"   /></a>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="clear"></div>
	<?php
		require_once ROOT."common/footer.php";
	?>
</body>
</html>
