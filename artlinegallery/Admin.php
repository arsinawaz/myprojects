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
					<div class="">
						<div class=" wrapper">
							<div class="wrapper">
								<article class="">
									<h2>Admin Panel</h2>
									<div>
										<div class="pad">
											<p>
												<ul class='ulMenu' >
													<li class='liMenu'>
														<a href="addcategories.php" class="addcat" class="normaltip" title="Add categories">Add Categories</a>
													</li>
													<li class='liMenu'>
														<a href="updatecategories.php" class="editcat" class="normaltip" title="Edit categories">Update Categories</a>
													</li>
													<li class='liMenu'>
														<a href="deletecategories.php" class="delcat" class="normaltip" title="Delete categories">Delete Categories</a>
													</li>
													<li class='liMenu'>
														<a href="addimages.php" class="addimg" class="normaltip" title="Add Images">Add Images</a>
													</li>
													<li class='liMenu'>
														<a href="edit-deleteimages.php" class="editimg" class="normaltip" title="Edit Images">Edit/Delete Images</a>
													</li>
													<li class='liMenu'>
														<a href="trash.php" class="delimg" class="normaltip" title="Delete Images">Trash</a>
													</li>
												</ul>
											</p>
										</div>
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