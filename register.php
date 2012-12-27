<?php
	require_once "common/common.php";
	require_once ROOT."functions/register_validation.php";

	if(isset($_GET['action']) && $_GET['action'] == "register"){
		
		// echo $_POST['code'];
		// echo $_SESSION['code'];
		//check the verify code
		//checkCode($_POST['code'], $_SESSION['code']);
	
		//check the user name
		//checkUname($_POST['uname']);
		//checkPassword($_POST['psw'], $_POST['pswverify']);
		//checkNkname($_POST['nkname']);
		//checkEmail($_POST['email']);
		
		$user = new User();
		$user->name = checkUname($_POST['uname']);
		$user->password = checkPassword($_POST['psw'], $_POST['pswverify']);
		$user->nick = checkNkname($_POST['nkname']);
		$user->gender = checkSex($_POST['sex']);
		$user->face = checkPic($_POST['facepath']);
		$user->email = checkEmail($_POST['email']);
	
		//print_r($user);
		if(!Register($user)){
			echo "<script type='text/javascript'>
					alert('用户名已被使用！');
					history.back();
				</script>";
			die('username has been taken;');
		}
		else{
			header("Location:person.php");
			exit();
		}
		
	}
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="styles/common_style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="styles/register.css" media="all" />
	<script src="js/jquery-1.7.1.js"></script>
	<script src="js/jquery-1.7.min.js" type="text/javascript"></script>
	<script src="js/jquery.masonry.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/register.js"></script>
	<title>Register</title>
</head>
<body>
	<?php
		require_once ROOT."common/header.php";
	?>
	
	<div id="content">
		<h2>请填写以下注册信息</h2>
		<form action="register.php?action=register" method="post">
			<div id="unamewrapper" class="infos">
				<label for="uname">用户名：</label>
				<input type="text" name="uname" maxlength="15" class="text"/>
				<span class="reqstar">*</span>
				<span class="error">长度不得小于4位或大于10位，只可含有数字或字母</span>
			</div>
			<div id="pswwrapper" class="infos">
				<label for="psw">密码：</label>
				<input type="password" name="psw" maxlength="20" class="text"/>
				<span class="reqstar">*</span>
				<span class="error">长度不得小于8位火大于15位，只可含有数字或字母</span>
			</div>
			<div id="pswverifywrapper" class="infos">
				<label for="pswverify">确认密码：</label>
				<input type="password" name="pswverify" maxlength="20" class="text"/>
				<span class="reqstar">*</span>
				<span class="error">两次输入密码不同</span>
			</div>
			<div id="nknamewrapper" class="infos">
				<label for="nkname">昵称：</label>
				<input type="text" name="nkname" maxlength="16" class="text"/>
				<span class="reqstar">*</span>
				<span class="error">昵称不可为空</span>
			</div>
			<div id="picwrapper" class="infos">
				<label for="">选择头像：</label>
				<img src="images/face/m01.gif" alt="images/face/m01.gif" id="face"/>
				<input type="hidden" name="facepath" />
			</div>
			<div id="sexwrapper" class="infos">
				<label for="sex">性别：</label>
				<label class="sexy"><input type="radio" name="sex" value="male" checked="checked"/> 男</label>
				
				<label class="sexy"><input type="radio" name="sex" value="female"/> 女</label>
				<span class="reqstar">*</span>
			</div>
			<div id="emwrapper" class="infos">
				<label for="email">e-mail：</label>
				<input type="email" name="email" class="text"/>
			</div>
			<div id="code" class="infos">
				<label for="code">验证码：</label>
				<input type="text" name="code" id="code" class="text"/>
				<img src="functions/code.php" alt="" id="codeimg"/>
				<span class="reqstar">*</span>
				<span class="error">验证码错误</span>
			</div>
			<div id="submit" class="infos">
				<input type="submit" value="提 交"/>
			</div>
		</form>
	</div>
	
	<?php
		require_once ROOT."common/footer.php";
	?>
</body>
</html>