<?
	session_start();
	
if(!isset($_SESSION['adminuser']))
{
		echo"<script>alert('You are not logged in as admin')</script>";
		echo"<script>location.href = 'Login.php'</script>";
}

?><!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Panel</title>
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
					<div class="line1">
						<div class="line2 wrapper">
							<div class="wrapper">
								<article class="col1">
									<h2>Add categories</h2>
									<!--<div class="pad">
										<p class="pad_bot2">
											<strong>Et harum quidem rerum</strong>
										</p>
										<p>
											<input type='button' value='Add Categories' name='addcategories' id='addcategories' class='adminbuttons' />
												<!--Facilis est et expedita distinctio. Nam libero tempore, culuta nobiest eligendo impedit quo minus id quod maxime placeat facere
											<a href="#" class="link2">[...]</a>-->
										<!--</p>
									</div>-->
									<div>
										<div class="pad">
											<p>
												<ul class='ulMenu'>
													<li class='liMenu'>
														<a href="#" class="book">
														Add categories
														</a>
													</li>
													
												</ul>
											</p>
										</div>
									</div>
									<h2>Add Images</h2>
									<div class="pad">
										<p class="pad_bot2">
											<strong>Veritatis quasi architecto beatae </strong>
										</p>
										Veritatis et quasi architecto beatae vitae dicta nemo enim ipsam volupta- tem quia voluptas sit aspernatur aut odit aut fugit, sed quia
										<a href="#" class="link2">[...]</a>
									</div>
								</article>
								<article class="col2 pad_left1">
									<h2>Edit Categories</h2>
									<div class="pad">
										<p class="pad_bot2">
											<strong>Unde omnis iste natus error </strong>
										</p>
										<p>
											Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibu saepe eveniet ut et voluptates repu- diandae sint et molestiae
											<a href="#" class="link2">[...]</a>
										</p>
									</div>
									<h2>Edit Images</h2>
									<div class="pad">
										<p class="pad_bot2">
											<strong>Duis ultricies pharetr magna </strong>
										</p>
										Quisque nulla. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Nulla facilisi. Aenean nec eros estibulum ante
										<a href="#" class="link2">[...]</a>
									</div>
								</article>
								<article class="col3 pad_left1">
									<h2>Delete Categories</h2>
									<div class="pad">
										<p class="pad_bot2">
											<strong>Quis nostrum exercitionem ullam </strong>
										</p>
										<p>
											Itaque earum rerum hic tenetur a sa- piente delectus, ut aut reiciendis vol- uptatibus maiores alias consequatur aut perferendis doloribus
											<a href="#" class="link2">[...]</a>
										</p>
									</div>
									<h2>Delete Images</h2>
									<div class="pad">
										<p class="pad_bot2">
											<strong>Aliquam congue fermentum nisl </strong>
										</p>
										Duis ultricies pharetr magna. Donec accums malesuada orci. Donec i amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit
										<a href="#" class="link2">[...]</a>
									</div>
								</article>
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
</body>
</html>