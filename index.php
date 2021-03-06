<?php
	require_once "common/common.php";
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>超级型男索女啊！</title>
</head>

<link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="styles/common_style.css" media="all" />
<link rel="stylesheet" type="text/css" href="styles/index.css" media="all" />
	
<!-- The JavaScript -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript">
    $(function() {
        var $menu				= $('#ei_menu > ul'),
            $menuItems			= $menu.children('li'),
            $menuItemsImgWrapper= $menuItems.children('a'),
            $menuItemsPreview	= $menuItemsImgWrapper.children('.ei_preview'),
            totalMenuItems		= $menuItems.length,
        
            ExpandingMenu 	= (function(){
                /*
                    @current
                    set it to the index of the element you want to be opened by default,
                    or -1 if you want the menu to be closed initially
                 */
                var current				= 2,
                /*
                    @anim
                    if we want the default opened item to animate initialy set this to true
                 */
                anim				= false,
                /*
                    checks if the current value is valid -
                    between 0 and the number of items
                 */
                validCurrent		= function() {
                    return (current >= 0 && current < totalMenuItems);
                },
                init				= function() {
                        /* show default item if current is set to a valid index */
                    if(validCurrent())
                        configureMenu();

                    initEventsHandler();
                },
                configureMenu		= function() {
                        /* get the item for the current */
                    var $item	= $menuItems.eq(current);
                        /* if anim is true slide out the item */
                    if(anim)
                        slideOutItem($item, true, 900, 'easeInQuint');
                    else{
                            /* if not just show it */
                        $item.css({width : '400px'})
                        .find('.ei_image')
                        .css({left:'0px', opacity:1});

                            /* decrease the opacity of the others */
                            $menuItems.not($item)
                                      .children('.ei_preview')
                                      .css({opacity:0.2});
                    }
                },
                initEventsHandler	= function() {
                        /*
                        when we click an item the following can happen:
                        1) The item is already opened - close it!
                        2) The item is closed - open it! (if another one is opened, close it!)
                        */
                    $menuItemsImgWrapper.bind('click.ExpandingMenu', function(e) {
                        var $this 	= $(this).parent(),
                        idx		= $this.index();

                        if(current === idx) {
                            slideOutItem($menuItems.eq(current), false, 1500, 'easeOutQuint', true);
                            current = -1;
                        }
                        else{
                            if(validCurrent() && current !== idx)
                                    slideOutItem($menuItems.eq(current), false, 250, 'jswing');

                            current	= idx;
                                slideOutItem($this, true, 250, 'jswing');
                        }
                        return false;
                    });
                },
                    /* if you want to trigger the action to open a specific item */
                    openItem			= function(idx) {
                        $menuItemsImgWrapper.eq(idx).click();
                    },
                    /*
                    opens or closes an item
                    note that "mLeave" is just true when all the items close,
                    in which case we want that all of them get opacity 1 again.
                    "dir" tells us if we are opening or closing an item (true | false)
                    */
                slideOutItem		= function($item, dir, speed, easing, mLeave) {
                    var $ei_image	= $item.find('.ei_image'),

                    itemParam	= (dir) ? {width : '400px'} : {width : '75px'},
                    imageParam	= (dir) ? {left : '0px'} : {left : '75px'};

                        /*
                        if opening, we animate the opacity of all the elements to 0.1.
                        this is to give focus on the opened item..
                        */
                    if(dir)
                    /*
                            alternative:
                            $menuItemsPreview.not($menuItemsPreview.eq(current))
                                             .stop()
                                             .animate({opacity:0.1}, 500);
                     */
                        $menuItemsPreview.stop()
                    .animate({opacity:0.1}, 1000);
                    else if(mLeave)
                        $menuItemsPreview.stop()
                    .animate({opacity:1}, 1500);

                        /* the <li> expands or collapses */
                    $item.stop().animate(itemParam, speed, easing);
                        /* the image (color) slides in or out */
                    $ei_image.stop().animate(imageParam, speed, easing, function() {
                            /*
                            if opening, we animate the opacity to 1,
                            otherwise we reset it.
                            */
                        if(dir)
                            $ei_image.animate({opacity:1}, 2000);
                        else
                            $ei_image.css('opacity', 0.2);
                    });
                };

                return {
                    init 		: init,
                    openItem	: openItem
                };
            })();
            
        /*
        call the init method of ExpandingMenu
        */
        ExpandingMenu.init();
    
    /*
    if later on you want to open / close a specific item you could do it like so:
    ExpandingMenu.openItem(3); // toggles item 3 (zero-based indexing)
    */
    });
</script>
        
<body>
	<?php
		require_once ROOT."common/header.php";
	?>
	<div id="title">
		<h1>型男索女阅读交友中心</h1>
		<div id="login">
			<form action="" method="post" name="login">
				<label for="username">Username: <input class="login" type="text" maxlength="20" name="username" /></label>
				<label for="username">Password: <input class="login" type="password" maxlength="20" name="password" /></label>
				<!-- <input type="submit" name="submit" value="Login" id="submit"/> -->
				
			</form>
			<button id="submit">Login</button>
			<div id="hint">
				<input type="checkbox" name="remember" id="remember"/>
				<label for="remember">Remember Me</label>
				 | 
				 <a href="register.php">Register</a>
			</div>
			<span class="error" id="error1">用户名或密码不能为空！</span>
			<span class="error" id="error2">用户名或密码错误！</span>
			
		</div>
	</div>
    
   
    <div id="content_wrapper">
    
        <div id="example">
                    
        <div id="ei_menu" class="ei_menu">
					<ul>
						<li>
							<a href="#" class="pos1">
								<span class="ei_preview"></span>
								<span class="ei_image"></span>
							</a>
							<div class="ei_descr">
								<h2>USOPP</h2>
								<h3>B30,000,00</h3>
								<p>Usopp (ウソップ, Usoppu), nicknamed "King of Snipers Sogeking" (狙撃の王様, Sogeki no Ō-sama, renamed "Sniper King" in the Viz Media manga translation), is the crew's 19 year old marksman.</p>
							</div>
						</li>
						<li>
							<a href="#" class="pos2">
								<span class="ei_preview"></span>
								<span class="ei_image"></span>
							</a>
							<div class="ei_descr">
								<h2>ZORO</h2>
								<h3>B120,000,000</h3>
								<p>Roronoa Zoro (ロロノア・ゾロ, spelled as "Roronoa Zolo" in some English adaptations), named after François l'Olonnais,ch.28 nicknamed "Pirate Hunter" Zoro (海賊狩りのゾロ, Kaizoku-Gari no Zoro, spelled as "Pirate Hunter" Zolo in some English adaptations)[citation needed], is a 21 year old, skilled swordsman who uses up to three swords at once, clutching the third in his mouth.</p>
							</div>

						</li>
						<li>
							<a href="#" class="pos3">
								<span class="ei_preview"></span>
								<span class="ei_image"></span>
							</a>
							<div class="ei_descr">
								<h2>LUFFY</h2>
								<h3>B400,000,000</h3>
								<p>Monkey D. Luffy (モンキー・D・ルフィ, Monkī Dī Rufi), nicknamed "Straw Hat" Luffy (麦わらのルフィ, Mugiwara no Rufi), is the 19 year-old captain of The Straw Hat Pirates and the main protagonist of the franchise.</p>
							</div>
						</li>
						<li>
							<a href="#" class="pos4">
								<span class="ei_preview"></span>
								<span class="ei_image"></span>
							</a>
							<div class="ei_descr">
								<h2>NAMI</h2>
								<h3>B16,000,000</h3>
								<p>Nami (ナミ), nicknamed "Cat Burglar" Nami (泥棒猫のナミ, Dorobō Neko no Nami, renamed Nami the "Navigator" in the 4Kids anime), is the crew's 20 year oldch.27 navigator and thief.</p>
								
							</div>
						</li>
						<li>
							<a href="#" class="pos5">
								<span class="ei_preview"></span>
								<span class="ei_image"></span>
							</a>
							<div class="ei_descr">
								<h2>SANJI</h2>
								<h3>B77,000,000</h3>
								<p>Sanji (サンジ), nicknamed "Black Leg" Sanji (黒脚のサンジ, Kuro Ashi no Sanji)ch.435, is the crew's 21-year-oldch.55 chef.</p>
							</div>
						</li>
					</ul>
				</div>
    </div> 
    
	
    <?php
		require_once ROOT."common/footer.php";
	?>
</body>
</html>
