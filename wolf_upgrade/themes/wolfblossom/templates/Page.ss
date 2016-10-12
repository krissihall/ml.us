<!DOCTYPE html>
<html>
<head>
	<% base_tag %>
	<title>$Title &raquo; $SiteConfig.Title</title>
	$MetaTags(false)
    
    <!-- Facebook MetaData -->
    <meta property="og:title" content="$Title" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="http://wolfblossom.mysticallegends.us/assets/Uploads/Facebook-Files/fb-icon.jpg" />
    <meta property="og:description" content="$Description" />
    <meta property="og:site_name" content="Wolf Blossom" />
    
	<link rel="stylesheet" type="text/css" href="themes/wolfblossom/fonts/stylesheet.css" />
	<% require themedCSS(style) %>
	<% require themedCSS(layout) %>
	<% require themedCSS(typography) %>
	<% require themedCSS(jquery.jscrollpane) %>
	<% require themedCSS(form) %>
    <!--[if lt IE 10]>
    <link rel="stylesheet" type="text/css" href="themes/wolfblossom/css/ie.css" />
    <![endif]-->
	
    <% require javascript(themes/wolfblossom/js/jquery-1.7.2.min.js) %>
    <% require javascript(themes/wolfblossom/js/jquery.jscrollpane.min.js) %>
	<% require javascript(themes/wolfblossom/js/jquery.mousewheel.js) %>
    <% require javascript(themes/wolfblossom/js/main.js) %>
</head>
<body>

<div id="outside">
    <div id="wrapper">
        <div id="header">
			<div id="sakura"></div><!-- closes sakura -->
            <div id="paws">
            	<div class="paw paw_5">
                	<img src="http://wolfblossom.mysticallegends.us/themes/wolfblossom/images/paws/paw1.png" width="32" height="30" alt="paw print">
                </div>
            	<div class="paw paw_4">
                	<img src="http://wolfblossom.mysticallegends.us/themes/wolfblossom/images/paws/paw2.png" width="31" height="30" alt="paw print">
                </div>
            	<div class="paw paw_3">
                	<img src="http://wolfblossom.mysticallegends.us/themes/wolfblossom/images/paws/paw3.png" width="32" height="30" alt="paw print">
                </div>
            	<div class="paw paw_2">
                	<img src="http://wolfblossom.mysticallegends.us/themes/wolfblossom/images/paws/paw4.png" width="31" height="30" alt="paw print">
                </div>
            	<div class="paw paw_1">
                	<img src="http://wolfblossom.mysticallegends.us/themes/wolfblossom/images/paws/paw5.png" width="32" height="30" alt="paw print">
                </div>
            </div><!-- closes paws -->
		</div><!-- closes header -->
			
    </div><!-- closes wrapper -->
    <div id="content">
        <div id="navigation">
            <h1>Navigation</h1>
            <% include Navigation %>
			<div id="twitter-feed">
				<h2>Twitter Feed</h2>
				<div id="tweets">
					<div id="twitter_container">
						
					</div>
				</div><!-- closes tweets -->
			</div><!-- closes twitter-feed -->
        </div><!-- closes navigation -->
        <div id="main">
			$Layout
			$Form
			<div id="reviews">
				$PageComments
			</div>
		</div><!-- closes main -->
            <div class="clear"></div>
    </div><!-- closes content -->
    <div id="footer">
        <div id="foot-interior">
            <p>
                &copy;WolfBlossom <span class="line">|</span> All Original Stories and Characters &copy;WolfBlossom <span class="line">|</span> 
                Created by: <a href="http://www.fanfiction.net/u/22316/" target="_blank">Pokahydee</a>
            </p>
            <p class="links">
                <a href="/">Home</a> <span class="line">|</span>
                <a href="/fanfiction/">Fanfiction</a> <span class="line">|</span>
                <a href="/originals/">Originals</a> <span class="line">|</span>
                <a href="/fanart/">Fanart</a> <span class="line">|</span>
                <a href="/about/">About</a> <span class="line">|</span>
                Connect: <a href="http://www.fictionpress.com/u/503333" target="_blank" title="Fictionpress.com"><img src="themes/wolfblossom/images/icon-fpress.gif" alt="Fictionpress.com" /></a>
                <a href="http://www.fanfiction.net/u/334960/" target="_blank" title="Fanfiction.net"><img src="themes/wolfblossom/images/icon-ffnet.png" alt="Fanfiction.net" /></a> 
                <a href="http://wolf-blossom.deviantart.com/" target="_blank" title="DeviantArt"><img src="themes/wolfblossom/images/icon-da.png" alt="DeviantArt" /></a> 
            </p>
        </div><!-- closes foot-interior -->
    </div><!-- closes footer -->
</div><!-- closes outside -->
<div id="fb-root"></div>
<script type="text/javascript">
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<script src="//twitter.com/javascripts/blogger.js" type="text/javascript"></script>
<script src="//twitter.com/statuses/user_timeline/Wolf_Blossom.json?callback=twitterCallback2&count=10" type="text/javascript"></script>
$SilverStripeNavigator
</body>
</html>