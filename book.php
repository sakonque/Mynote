
<?php
	// book.php 
	// version 1.0 (Dec, 22th. 2012)
	// created by kylejan for web2.0 project
	require_once "common/common.php";
	require_once ROOT."functions/upload_validation.php";
	require_once ( ROOT."dbmodel/DBControl.php");
	require_once ( ROOT."class/Comment.php" );

	//Add the new record of the new uploaded book
	if(isset($_GET['action']) && $_GET['action'] == "upload"){
		
		// echo $_POST['code'];
		// echo $_SESSION['code'];
		//check the verify code
		//checkCode($_POST['code'], $_SESSION['code']);
	
		//check the doc name
		//checkUname($_POST['uname']);
		//checkPassword($_POST['psw'], $_POST['pswverify']);
		//checkNkname($_POST['nkname']);
		//checkEmail($_POST['email']);
		
		$doc = new Document();
		$doc->title = checkTitle($_POST['bookname']);

		$doc->author = checkAuthor($_POST['author']);

		$doc->pubdate = checkPubdate($_POST['pubdate']);

		$doc->description = checkDescription($_POST['description']);

		$doc->tag = "";

		$upload_size_flag = checkPic($_FILES['picture']['size'],$_FILES['picture']['name']);
		if($upload_size_flag){
			$pic_name = getdate();
			move_uploaded_file($_FILES["picture"]["tmp_name"], "./images/book/$pic_name[0].jpg");
			if(is_uploaded_file($_FILES["picture"]["tmp_name"])){
				$doc->picture = "./images/book/$pic_name[0].jpg";
			}
			else{
				$doc->picture = "./images/book/Admin_pic.jpg";
			}
		}
		else{
			if(!is_uploaded_file($_FILES["picture"]["tmp_name"]))
				$doc->picture = "./images/book/Admin_pic.jpg";
		}
		
		$doc->good = 0;
		$doc->bad = 0;

		AddDoc($doc);

		exit();	
	}
	elseif(isset($_GET['action']) && $_GET['action'] == "comment"){
		$com = new Comment();
		date_default_timezone_set('PRC');
		
		$com->content = $_POST['content'];
		//......暂未实现
		
		AddComment($com);
	}
	
?>