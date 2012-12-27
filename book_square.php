<?php 
/*$link=mysql_connect("localhost","root",""); 
if(!$link){die("error");}
else echo"success!";
*/?>

<?php
/*$(function(){ 
    var winH = $(window).height(); //页面可视区域高度 
    var i = 1; //设置当前页数 
    $(window).scroll(function () { 
        var pageH = $(document.body).height(); 
        var scrollT = $(window).scrollTop(); //滚动条top 
        var aa = (pageH-winH-scrollT)/winH; 
        if(aa<0.02){ 
            $.getJSON("result.php",{page:i},function(json){ 
                if(json){ 
                    var str = ""; 
                    $.each(json,function(index,array){ 
                        var str = "<div class=\"book\">";
						var str += "<div class=\"cover\">"+"<img src=\"路径/"+array['name']+".*\" alt=\"cover\" />"+"</div>"; 
                        var str += "<div class=\"info\">"+"<strong>书名</strong>"+array['name']+"<br/><strong>作者</strong>"+array['author']
							        +"<br/><strong>简介</strong>"+array['brief']+"<br/>"; 
                        $("#container").append(str); 
                    }); 
                    i++; 
                }else{ 
                    $(".nodata").show().html("别滚动了，已经到底了。。。"); 
                    return false; 
                } 
            }); 
        } 
    }); 
}); 
*/
?>


<?php
	require_once "common/common.php";
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/common_style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="styles/book_square.css" media="all" />
	<script src="js/jquery-1.7.min.js" type="text/javascript"></script>
	<script src="js/jquery.masonry.min.js" type="text/javascript"></script>
	<script src="js/square.js" type="text/javascript"></script> 
</head>
<body>
	<?php
		require_once ROOT."common/header.php";
	?>
	<div class="page">

    <?php 
	/*mysql_select_db("test", $link); //选择数据库 
    $q = "SELECT * FROM 'book'"; //SQL查询语句 
    $query= mysql_query($q, $link); //获取数据集 
    while ($row = mysql_fetch_row($query)) { 
		$name=$row[1];
		$author=$row[2];
		$brief=$row[3];*/
    ?> 
        <div class="books">
		书广场
		</div>

     <div class="footprint">
		<?php
			$con = mysql_connect(Config::$host, Config::$user, Config::$pass);	
			mysql_select_db(Config::$db, $con);
			$sql = "select * from document";
			$result = mysql_query($sql,$con);
			while($row = mysql_fetch_array($result)){
				$arr[]=array(
					'title' => $row['title'],
					'did' => $row['did']
				);
		?>	
		<div class="item">
			<div class="cover">
				<a href="public_person.php?uid=<?= $row['did']?>">  
				<img class="coverImg" src="images/b0.jpg" alt="cover" />
			</div>
			<p class="info">
				<strong class=bookName><?= $row['title']?><br/></strong>
				<strong>作者</strong>     尼玛 <br/>
				<strong>简介</strong>     <br/>向往着无穷无尽的创意世界，不断学习创意世界，不断尼玛尼玛尼玛尼玛尼玛尼玛尼玛年创意世界，不断尼玛尼玛尼玛尼玛尼玛尼玛尼玛年生活，啊啊啊啊啊啊啊<br/>
			</p>
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