<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"><!-- InstanceBegin template="/Templates/BasePage.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Contact - Kristina L. Hall: Website Designer &amp; Developer</title>
<!-- InstanceEndEditable -->
<meta name="description" content="This is the portfolio of Kristina L. Hall. Within this website is the creative, professional, and personal portfolio of Kristina L. Hall. Included in this website is a resume of my education and of my experience in the field, a biography of my personal experiences in web design and development, and contact information for you to inquire about my services." />
<meta name="keywords" content="web design, web development, front-end development, javascript, jquery, CSS, CSS3, HTML, HTML5, asp.NET, PHP, Umbraco, CakePHP, portfolio, LESS, Flash, iOS, Windows 8 App, responsive design, browser testing, device testing" />
<!-- InstanceBeginEditable name="meta" -->
<meta name="description" content="This is my description." />
<meta name="keywords" content="web design, web development, front-end development, javascript, jquery, CSS, CSS3, HTML, HTML5, asp.NET, PHP, Umbraco, CakePHP, portfolio, LESS, Flash, iOS, Windows 8 App, responsive design, browser testing, device testing" />
<!-- InstanceEndEditable -->

<meta property="og:title" content="Kristina L. Hall: Website Designer and Developer" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.kristinalhall.com" />
<meta property="og:description" content="This is the portfolio of Kristina L. Hall. Within this website is the creative, professional, and personal portfolio of Kristina L. Hall. Included in this website is a resume of my education and of my experience in the field, a biography of my personal experiences in web design and development, and contact information for you to inquire about my services." />
<meta property="og:image" content="http://www.kristinalhall.com/images/layout/fb-icon.jpg" />
<meta property="og:site_name" content="Kristina L. Hall: Website Designer and Developer" />
<meta property="fb:admins" content="687466313" />

<link rel="shortcut icon" href="favicon.ico" />

<link rel="stylesheet" type="text/css" href="css/main.css" />

<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/waypoints.min.js"></script>
<script type="text/javascript" src="js/waypoints-sticky.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/jquery.touchwipe.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<!-- InstanceBeginEditable name="head" -->
<script type="text/javascript" src="js/jquery-validation-1.11.1.js"></script>
<script type="text/javascript">
var RecaptchaOptions = {
    theme : 'clean'
 };
</script>
<!-- InstanceEndEditable -->
</head>

<body>
<div id="wrapper">
	<header id="header">
    	<div class="fade"></div>
    	<div class="middle">
            <div class="right">
            	<div class="social">
                	<a href="https://www.facebook.com/pokahydee" title="Facebook" target="_blank" class="facebook">
                    	<img src="images/layout/icon_facebook.png" alt="Facebook" />
                    </a>
                    <a href="https://twitter.com/KrissiHall" title="Twitter" target="_blank" class="twitter">
                    	<img src="images/layout/icon_twitter.png" alt="Twitter" />
                    </a>
                	<a href="http://www.linkedin.com/pub/kristina-hall/6b/2b/518/" title="Linked In" target="_blank" class="linkedin">
                    	<img src="images/layout/icon_linkedin.png" alt="Linked In" />
                    </a>
                </div>
            </div><!-- closes right -->
            <div id="logo" class="left">
            	<a href="index.html" title="Kristina L. Hall, Website Designer &amp; Developer">
	            	<img src="images/layout/header-shadow.png" alt="Kristina L. Hall" />
                </a>
            </div><!-- closes logo -->
            <div class="clear"></div>
        </div><!-- closes center -->
        <div id="navigation">
        	<div class="middle-nav">
            	<a href="index.html" id="logo"><img src="images/layout/icon_logo3.png" alt="klh Logo" /></a>
                <ul>
                	<!-- InstanceBeginEditable name="Navi" -->
                    <li>
                    	<a href="index.html" id="home">Home</a>
                    </li>
                    <li>
                        <a href="work.html">Work</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="contact.php" class="active">Contact</a>
                    </li>
                    <!-- InstanceEndEditable -->
                </ul>
                <div class="clear"></div>
            </div><!-- closes middle -->
            <div class="background"></div>
        </div><!-- closes navigation -->
    </header><!-- closes header -->
    <div id="content">
        <div id="body">
            <div class="welcome">
            	<!-- InstanceBeginEditable name="Content" -->
                <?php
                if(isset($_GET["id"])){
					if($_GET["id"] == "success"){
				?>
                <div class="thankYou">
                    <h1>Thank You</h1>
                    <p>Thank you for contacting me, I will get back to you as soon as I can. If you do not hear back from me, I may not have gotten your message so feel free to re-send it in a week.</p>
                </div><!-- closes thankYou -->
                <?php } else { ?>
                <div class="fail">
                	<h1>Error</h1>
                    <p>I'm sorry, but there was a problem with your form submission. Please try again later.</p>
                </div>
                <?php } ?>
				<?php } else { ?>
				<div class="formHead">
                    <h1>Contact</h1>
                    <h2>Send Me a Message</h2>
                    <p>Please use the form below to send me a message if you have any questions or concerns about this website or if you would like to inquire about services. If you come across any issues or problems with the site, feel free to use the form. I will try to respond in a timely manner.</p>
                </div><!-- closes formHead -->
                <?php } ?>
                <!-- InstanceEndEditable -->
            </div><!-- closes welcome -->
        </div><!-- closes body -->
  	</div><!-- closes content -->
    <div id="subContent">
    	<div class="center">
        <!-- InstanceBeginEditable name="SubContent" -->
        	<div class="contactForm">
            	<?php
				if(isset($_GET["id"])){
					if($_GET["id"] == "success"){
				?>
                <!-- Thank You page gray section content -->
                <?php
					} else {
				?>
                <!-- Fail page gray section content -->
                <?php 
					}
				} else {
				?>
                <form id="contactForm" method="post" action="contactProcess.php">
                    <p class="required">Required form fields</p>
                    <label for="name" class="required">Name:</label>
                    <input type="text" name="name" class="required" value="<?php if(isset($_GET["name"])){echo $_GET["name"];} ?>" />
                    <label for="email" class="required">Email Address</label>
                    <input type="text" name="email" class="required" value="<?php if(isset($_GET["email"])){echo $_GET["email"];} ?>" />
                    <label for="message" class="required">Message:</label>
                    <textarea name="message" class="required"><?php if(isset($_GET["message"])){echo $_GET["message"];} ?></textarea>
                    <?php
						if(isset($_GET['error'])){
							if ($_GET['error']=="captcha"){
								print "<label class=\"error\" for=\"recaptcha_response_field\">Sorry, you did you enter the captcha text correctly.</label>";
							}
						}
						
						require_once('recaptchalib.php');
						$publickey = "6LfPH-cSAAAAAEwNiaMSbXOcZ9CNe6rD3ewGt272"; // you got this from the signup page
						echo recaptcha_get_html($publickey);
					?>
                    <input type="submit" name="submit" value="Submit" class="button submit" />
                </form>
                <?php } ?>
            </div><!-- closes form -->
			<!-- InstanceEndEditable -->
        </div><!-- closes center -->
    </div><!-- closes subContent -->
    <footer id="footer">
    	<div class="fade"></div>
    	<div class="middle">
        	<div class="left">
            	<div class="social">
                	<h2>Follow Me:</h2>
                    <div class="socialLinks">
                        <a href="https://www.facebook.com/pokahydee" title="Facebook" target="_blank" class="facebook">
                            <img src="images/layout/icon_facebook.png" alt="Facebook" />
                        </a>
                        <a href="https://twitter.com/KrissiHall" title="Twitter" target="_blank" class="twitter">
                            <img src="images/layout/icon_twitter.png" alt="Twitter" />
                        </a>
                        <a href="http://www.linkedin.com/pub/kristina-hall/6b/2b/518/" title="Linked In" target="_blank" class="linkedin">
                            <img src="images/layout/icon_linkedin.png" alt="Linked In" />
                        </a>
                    </div><!-- closes socialLinks -->
                </div>
            	<div class="likeBtn">
		    		<div class="fb-like" data-href="http://www.kristinalhall.com" data-width="180" data-layout="button_count" data-show-faces="true" data-send="false"></div>
                </div>
                <!-- InstanceBeginEditable name="FooterLinks" -->
                <!-- InstanceEndEditable -->
            </div>
            <div class="right">
                <p class="copyright">&copy;2013 <a href="http://kristinalhall.com">kristinalhall.com</a>. Kristina L. Hall.</p>
            </div>
            <div class="clear"></div>
        </div><!-- closes middle -->
    </footer><!-- closes footer -->
</div><!-- closes wrapper -->

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
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-44703479-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
<!-- InstanceEnd --></html>
