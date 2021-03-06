<?php
	require_once "common/common.php";
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>MySpace</title>
	<link rel="stylesheet" type="text/css" href="styles/common_style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="styles/upload_book.css" media="all" />

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
				<h1>Kylejan奋斗学业</h1>
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
			<h1>创建小组</h1>
			
			<div class="clear"></div>
			<div class="us_bar"></div>
			
			<form action="group.php?action=create" method="post" enctype="multipart/form-data">
				<div id="unamewrapper" class="infos">
					<label for="groupname">小组名称：</label>
					<input type="text" name="groupname" maxlength="15" class="text"/>
					<span class="reqstar">*</span>
					<span class="error">长度不得小于4位或大于10位，只可含有数字或字母</span>
				</div>
				<div id="groupwrapper" class="infos">
					<label for="picture">小组图片：</label>
					<input type="file" name="picture" class="text"/>
					<span class="reqstar">*</span>
					<span class="error">长度必须为4位，只含有数字</span> 
				</div>
				<div id="descriptionwrapper" class="infos">
					<label for="description">小组简介：</label>
					<textarea rows="5" cols="32" name="description" class="text"/></textarea>
					<span class="reqstar">*</span>
					<span class="error">长度不得大于200位</span>
				</div>
				<div id="submit" class="infos">
					<input type="submit" value="提 交"/>
				</div>
			</form>
		</div>
	</div>
	
	<div class="clear"></div>
	<?php
		require_once ROOT."common/footer.php";
	?>
</body>
</html>
