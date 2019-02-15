<!DOCTYPE HTML>
<html>
<head>
    <base href="/">
    <?= $this->getMeta(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/component.css" rel="stylesheet" type="text/css">
    
    
    <!--webfont-->
    <link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Dorsa' rel='stylesheet' type='text/css'>
    <!-- Custom Theme files -->
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen">
    <link rel='stylesheet' href="css/style.css" type='text/css'/>
    <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="megamenu/css/style.css">
    <link rel="stylesheet" href="megamenu/css/ionicons.min.css">
    <!-- Custom Theme files -->
    
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- typeahead for search -->
    <script src="js/typeahead.bundle.js" type="text/javascript"></script>
    <script src="js/jquery.easydropdown.js"></script>
    
</head>
<body>
    <?php $curr = \myshop\App::$registry->getProperty('currency'); ?>
    <div class="<?=$class_banner?>">
        <div class="container">
            <div class="header_top">
   	  	<div class="header_top_left">
                    <a href="cart/show" onclick="getCart(); return false;">
                        <div class="total_price">
                            <img src="images/cart-1.png" alt="">
                            <?php if (!empty($_SESSION['cart'])):?>
                            <span class="simpleCart_total">
                                <?=$curr['symbol_left'];?>
                                <?=$_SESSION['cart.sum'] * $curr['value'];?>
                                <?=$curr['symbol_right'];?>
                            </span>
                            <?php else :?>
                            <span class="simpleCart_total">Empty Cart</span>
                            <?php endif;?>
                            
                        </div>
                    </a>
                    <div class="clearfix"> </div>
                </div>
                <div class="header_top_right">
                <div class="lang_list">
                    <select id="currency" class="dropdown" tabindex="4">
                            <?php new app\widgets\currency\Currency() ?>
                    </select>
                </div>
                <ul class="header_user_info">
                    <a class="login" href="login.html">
                        <i class="user"> </i> 
                        <li class="user_desc">My Account</li>
                    </a>
                    <div class="clearfix"> </div>
                </ul>
                <!-- start search-->
                <div class="search-box">
                    <div id="sb-search" class="sb-search">
                        <form action="search" method="get" autocomplete="off">
                            <input class="sb-search-input typeahead" placeholder="Enter your search term..." type="search" name="s" id="typeahead">
                            <input class="sb-search-submit" type="submit" value="">
                            <span class="sb-icon-search"></span>
                            
                        </form>
                    </div>
                </div>
                
<!--                <div class="">
                    <div id="" class="">
                        <form action="search" method="get" autocomplete="off">
                            <input class="typeahead" placeholder="Enter your search term..." type="search" name="s" id="typeahead">
                            <input class="" type="submit" value="">
                            <span class="sb-icon-search"></span>
                            
                        </form>
                    </div>
                </div>-->
               
                <script src="js/classie1.js"></script>
                <script src="js/uisearch.js"></script>
                <script>
                    new UISearch( document.getElementById( 'sb-search' ) );
                </script>
                
                <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="header_bottom">
                <div class="logo">
                    <h1><a href="<?=URL;?>"><span class="m_1">W</span>atches</a></h1>
                </div>
                <div class="menu_right" >
                    <div class="menu-container">
                        <div class="menu">
                                <?php new \app\widgets\menu\Menu(); ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
	</div>
    </div>
    <?php //session_destroy();?>
    <?= $content; ?>
    <div class="footer">
   	 <div class="container">
   	 	<div class="newsletter">
			<h3>Newsletter</h3>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
			<form>
			  <input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
			  <input type="submit" value="SUBSCRIBE">
			</form>
		</div>
   		<div class="cssmenu">
		   <ul>
			<li class="active"><a href="#">Privacy</a></li>
			<li><a href="#">Terms</a></li>
			<li><a href="#">Shop</a></li>
			<li><a href="#">About</a></li>
			<li><a href="contact.html">Contact</a></li>
		  </ul>
		</div>
		<ul class="social">
			<li><a href=""> <i class="instagram"> </i> </a></li>
			<li><a href=""><i class="fb"> </i> </a></li>
			<li><a href=""><i class="tw"> </i> </a></li>
	    </ul>
	    <div class="clearfix"></div>
	    <div class="copy">
           <p> &copy; 2015 Watches. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
	    </div>
   	</div>
    </div>
<!-- Modal -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cart</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">continue shopping</button>
                <a href="cart/view" class="btn btn-primary">Buy All</a>
                <button id="clearCart" type="button" class="btn btn-primary" onclick="clearCart()">Remove all</button>
            </div>
        </div>
    </div>
</div>



    

<script>
    var path = '<?= URL;?>',
        course = <?= $curr['value'];?>,
        symbolLeft = '<?= $curr['symbol_left'];?>',
        symbolRight = '<?= $curr['symbol_right'];?>';
</script>    
<script src="js/main.js"> </script>
<script src="megamenu/js/megamenu.js"> </script>
<script defer="" src="js/jquery.flexslider.js"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
      });
    });
</script>
<?php
$logs = \R::getDatabaseAdapter()
    ->getDatabase()
    ->getLogger();

debug( $logs->grep( 'SELECT' ) );
?>
</body>

</html>		
