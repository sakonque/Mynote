<?php
	// DBControl.php 
	// version 1.0 (Dec, 12th. 2012)
	// created by chenzhao for web2.0 project
	// modified by Kylejan,Jacob (Dec, 24th. 2012)
	require_once( ROOT."dbmodel/Config.php" );
	require_once( ROOT."class/User.php" );
	require_once( ROOT."class/Document.php" );
	require_once( ROOT."class/Comment.php" );
	
	// to get specific user from database
	// return user( type: user ) or wrong message( type: int )
	function Login( $name, $password )
	{
		mysql_connect( Config::$host, Config::$user, Config::$pass ) or die( Config::$err1 );
		mysql_select_db( Config::$db ) or die( Config::$err2 );
		
		mysql_query('SET NAMES UTF8') or die(Config::$err3);
		// find the user
		$sql = "select * from user where name like '" . $name . "'";
		$result = mysql_query( $sql ) or die( "No user table!" );
		mysql_close();
		
		$password = sha1($password);
		
		// check existence
		if( mysql_num_rows( $result ) != 1 )
			return 1;
		// check password
		if( mysql_result( $result, 0, "password" ) != $password )
			return 2;
			
		// generate a user
		$user = new User();
		$user->id = mysql_result( $result, 0, "uid" );
		$user->name = mysql_result( $result, 0, "name" );
		$user->nick = mysql_result( $result, 0, "nick" );
		$user->email = mysql_result( $result, 0, "email" );
		$user->gender = mysql_result( $result, 0, "gender" );
		$user->signature = mysql_result( $result, 0, "signature" );
		$user->picture = mysql_result( $result, 0, "picture" );
		
		
		return $user;
	}
	
	// register a user
	// return the error message( type: boolean )
	// at the mean time, the user will be changed.
	function Register( $user )
	{
		mysql_connect( Config::$host, Config::$user, Config::$pass ) or die( Config::$err1 );
		mysql_select_db( Config::$db ) or die( Config::$err2 );
		
		mysql_query('SET NAMES UTF8') or die(Config::$err3);
		// insert into database
		$para = "('" . $user->name . "','" . $user->password . "','";
		$para .= $user->nick . "','" . $user->email . "','";
		$para .= $user->gender . "','" . $user->signature . "','" . $user->picture . "')";
		$sql = "insert into user( name, password, nick, email, gender, signature, picture ) value " . $para;
		$result = mysql_query( $sql );
		$user->id = mysql_insert_id();
		mysql_close();
		
		return $result;
	}
	
	// add a book to database
	// return the error message( type: boolean )
	// at the mean time, the doc will be changed.
	function AddDoc( $doc )
	{
		mysql_connect( Config::$host, Config::$user, Config::$pass ) or die( Config::$err1 );
		mysql_select_db( Config::$db ) or die( Config::$err2 );
		
		mysql_query('SET NAMES UTF8') or die(Config::$err3);
		// insert into document table
		$para = "('" . $doc->title . "','" . $doc->author . "','";
		$para .= $doc->pubdate . "','" . $doc->description . "','";
		$para .= $doc->tag . "','" . $doc->picture . "','";
		$para .= $doc->good . "','" . $doc->bad . "')";
		$sql = "insert into document( title, author, pubdate, description, tag, picture, good, bad ) value " . $para;
		$result = mysql_query( $sql );
		$doc->id = mysql_insert_id();
		mysql_close();
		
		return $result;
	}
	
	// search a document through ID
	// return the document( type: document ) or error message( type: bool )
	function FindDoc( $did )
	{
		mysql_connect( Config::$host, Config::$user, Config::$pass ) or die( Config::$err1 );
		mysql_select_db( Config::$db ) or die( Config::$err2 );
		
		mysql_query('SET NAMES UTF8') or die(Config::$err3);
		// select the document
		$sql = "select * from document where did = " . $did;
		$result = mysql_query( $sql ) or die( "No document table!" );
		mysql_close();
		
		// check existence
		if( mysql_num_rows( $result ) != 1 )
			return false;
		
		// generate a document
		$doc = new Document();
		$doc->id = mysql_result( $result, 0, "did" );
		$doc->title = mysql_result( $result, 0, "title" );
		$doc->author = mysql_result( $result, 0, "author" );
		$doc->pubdate = mysql_result( $result, 0, "pubdate" );
		$doc->description = mysql_result( $result, 0, "description" );
		$doc->tag = mysql_result( $result, 0, "tag" );
		$doc->picture = mysql_result( $result, 0, "picture" );
		$doc->good = mysql_result( $result, 0, "good" );
		$doc->bad = mysql_result( $result, 0, "bad" );
		return $doc;
	}
	
	// post a comment
	// return the error message( type: boolean )
	// meanwhile, the comment->id will be changed.
	function AddComment($comment){
		$con = mysql_connect(Config::$host, Config::$user, Config::$pass) or die(Config::$err1);
		mysql_select_db(Config::$db, $con) or die(Config::$err2);
		mysql_query('SET NAMES UTF8') or die(Config::$err3);
	
		//insert into database		
		$values = "('" . $comment->content . "','" . $comment->name . "','" . $comment->ctime . "','" . $comment->uid . "','" . $comment->did . "')";
		$sql_insert = "insert into comment(content, name, date, uid, did) value " . $values;
		$result = mysql_query($sql_insert, $con);
		//get id of the last insertion operation 
		$comment->cid = mysql_insert_id();
		mysql_close();
		
		return $result;
 	}
	
	//search a comment through ID(type=1::uid type=2::did type=3::cid)
	//return the comment(document) or error message(bool)
	function FindComment($id, $type){
		$con = mysql_connect(Config::$host, Config::$user, Config::$pass) or die( Config::$err1 );
		mysql_select_db(Config::$db, $con) or die(Config::$err2);
		
		//select the comment
		$tid = "";
		switch($type){
		case 1:
			$tid = "uid";
			break;
		case 2:
			$tid = "did";
			break;
		case 3:
			$tid = "cid";
			break;
		default:
			echo "parameter error";
		}
		$sql = "select * from comment where " . $tid . "= " . $id;
		$result = mysql_query($sql) or die ("No such comment!");
		mysql_close();
		
		//check existence
		if(mysql_num_rows($result) != 1){
			return false;
		}
		
		//generate a comment instance
		$com = new Comment();
		$com->content = mysql_result($result, 0, "content");
		$com->name = mysql_result($result, 0, "name");
		$com->ctime = mysql_result($result, 0, "date");
		$com->uid = mysql_result($result, 0, "uid");
		$com->did = mysql_result($result, 0, "did");
		$com->cid = mysql_result($result, 0, "cid");
			
		return $com;
	}
?>