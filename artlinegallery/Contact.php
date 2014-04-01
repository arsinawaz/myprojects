<?
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script> 
<script type="text/javascript" src="js/Terminal_Dosis_300.font.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<!--[if lt IE 9]>
	<script type="text/javascript" src="js/html5.js"></script>
	<style type="text/css">
		.bg {behavior:url(js/PIE.htc)}
	</style>
<![endif]-->
<!--[if lt IE 7]>
	<div style='clear:both;text-align:center;position:relative'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" alt="" /></a>
	</div>
<![endif]-->
</head>
<body id="page4">
<div class="body1">
	<div class="body2">
		<div class="body3">
			<div class="main">
<!-- header -->
				<header>
					<div class="wrapper">
						<?
						include_once('header.php');
						?>
					</div>
				</header>
<!-- / header-->
<!-- content -->
				<section id="content">
					<div class="wrapper">
						<h2>Contact Form</h2>
						<form id="ContactForm">
							<div>
								<div class="wrapper">
									<span>Your Name:</span><input type="text" class="input" >
								</div>
								<div class="wrapper">
									<span>Your E-mail:</span><input type="text" class="input" >								
								</div>
								<div class="textarea_box">
									<span>Your Message:</span><textarea name="textarea" cols="1" rows="1"></textarea>								
								</div>
								<span>&nbsp;</span>
								<a href="#" class="button" onClick="document.getElementById('ContactForm').reset()">Clear</a>
								<a href="#" class="button" onClick="document.getElementById('ContactForm').submit()">Send</a>
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<div class="body4">
	<div class="main">
		<section id="content2">
			<div class="line2 wrapper">
				<div class="wrapper">
					<article class="col1">
						<h2>Miscellaneous</h2>
						<div class="pad">
							Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.
						</div>
					</article>
					<article class="col2 pad_left1">
						<h2>My Contacts</h2>
						<div class="pad">
							<span class="col3">
								<strong>	
									Country:<br>
									State:<br>
									City:<br>
									Telephone:<br>
									Email:
								</strong>
							</span>	
							USA<br>
							California<br>
							San Diego<br>
							+354 5635600<br>
							<a href="mailto:">elenwhite@mail.com</a>
						</div>
					</article>
				</div>
			</div>				
		</section>
	</div>
</div>
<!-- / content -->
<div class="main">
<!-- footer -->
	<?
	include_once('footer.php');
	?>
<!-- / footer -->
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>