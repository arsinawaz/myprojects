<?
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script> 
<script type="text/javascript" src="js/Terminal_Dosis_300.font.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
 <script src="js/roundabout.js" type="text/javascript"></script>
 <script src="js/roundabout_shapes.js" type="text/javascript"></script>
 <script src="js/jquery.easing.1.2.js" type="text/javascript"></script>
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
<body id="page1">
<div class="body1">
	<div class="body2">
		<div class="body3">
			<div class="main">
<!-- header -->
				<header>
					<div class="wrapper">
						<!--<form id="search" method="post">
							<div>
								<input type="submit" class="submit" value="">
								<input class="input" type="text" value="Site Search" onblur="if(this.value=='') this.value='Site Search'" onfocus="if(this.value =='Site Search' ) this.value=''">
							</div>
						</form>-->
						<?
						include_once('header.php');
						?>
					</div>
					<div class="relative">
						<div id="gallery">
							<ul id="myRoundabout">
								<li><img src="images/img1.jpg" alt=""></li>
								<li><img src="images/img2.jpg" alt=""></li>
								<li><img src="images/img3.jpg" alt=""></li>
							</ul>
						</div>
					</div>
				</header>
<!-- / header-->
<!-- content -->
				<section id="content">
					<div class="line1">
						<div class="line2 wrapper">
							<div class="wrapper">
								<!--<article class="col2 pad_left1">
									<h2>Experiences</h2>
									<div class="pad">
										<ul class="list1">
											<li><a href="#">Fashion Show</a>Maecenas ut ipsum id nibh cursus sagittis sit...</li>
											<li><a href="#">Animals Photo Session</a>Mauris iaculis semper magna in eleifend. Phasellus a...</li>
											<li><a href="#">Sport Shots</a>Quisque ipsum ipsum, tincidunt eu euismod non, blandit...</li>
										</ul>
									</div>
								</article>-->
								<article class="col1" style='width:590px;'>
									<h2>Shortly About Me</h2>
									<figure><img src="images/page1_img1.jpg" alt="" class="pad_bot1"></figure>
									<div class="pad">
										<p>	
											This Photographer’s Portfolio is one of <a href="http://blog.templatemonster.com/free-website-templates/ " target="_blank">free website templates</a> created by TemplateMonster.com team
										</p>
									</div>
								</article>
								<article class="col3 pad_left1">
									<h2>What’s New</h2>
									<div class="pad">
										<div class="wrapper">
											<span class="date"><span>22</span>may</span>
											<p>	
												<a href="#" class="link1">Sed ut perspiciatis</a><br>
												This <a href="http://blog.templatemonster.com/2011/05/16/free-website-template-photographers-portfolio/ " target="_blank">Free Website Template</a> goes with two packages. With PSD source files and without.
											</p>
										</div>
										<div class="wrapper">
											<span class="date"><span>28</span>may</span>
											<p>
												<a href="#" class="link1">Doperiam eaque ipsa </a><br>
												Quae ab illo inventore veritatis et quasi archiecto beatae vitaedic explicaob emo enim ipsam.
											</p>
										</div>
									</div>
								</article>
							</div>
							<div class="wrapper buttons">
								<article class="col1" style='width:590px;'>
									<a href="#" class="button">Read More</a>
								</article>
								<article class="col3 pad_left1">
									<a href="#" class="button">Read More</a>
								</article>
								<!--<article class="col3 pad_left1">
									<a href="#" class="button">News Archive</a>
								</article>-->
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
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
<script type="text/javascript">
	$(document).ready(function() {
		$('#myRoundabout').roundabout({
			 shape: 'square',
			 minScale: 0.93, // tiny!
			 maxScale: 1, // tiny!
			 easing:'easeOutExpo',
			 clickToFocus:'true',
			 focusBearing:'0',
			 duration:800,
			 reflect:true
		});
	});
</script>
</body>
</html>