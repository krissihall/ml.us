<!DOCTYPE html>
<html>
<head>
	<% base_tag %>
	<title>$Title &raquo; $SiteConfig.Title</title>
	$MetaTags(false)
    
    <% require themedCSS(facebook) %>
    
    <% require javascript(themes/wolfblossom/js/jquery-1.7.2.min.js) %>
    <% require javascript(themes/wolfblossom/js/facebook.js) %>
</head>
<body id="facebook">

<div id="wrapper">
	$Layout
	$Form
</div><!-- closes FBwrapper -->

<div id="fb-root"></div>
<script type="text/javascript">
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=201655876520156";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
$SilverStripeNavigator
</body>
</html>