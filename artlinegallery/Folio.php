<?
	session_start();

	require_once("db.php");
	$dataAccessObj = new DataAccess();
	
	$dataAccessObj->Connect();
	$recentImages = $dataAccessObj->GetRecentImages();
	$allCategories = $dataAccessObj->GetAllCategories();
	$catCount = count($allCategories);
	
	for($i=0; $i< $catCount; $i++)
	{
		$catId = $allCategories[$i]['category_id'];
		$catName[$i] = $allCategories[$i]['category_name'];
		$allCatImages[$catName[$i]] = $dataAccessObj->GetAllCatImages($catId);
	}
	echo "<pre>";
	//print_r($allCatImages);
	echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Folio</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="all">
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
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/hover-image.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
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
<body id="page3">
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
					<div class="relative">
						<div id="gallery">
							<ul id="myRoundabout">
								<li><img src="<?=$recentImages[0]['image_path']?>" alt=""></li>
								<li><img src="<?=$recentImages[1]['image_path']?>" alt=""></li>
								<li><img src="<?=$recentImages[2]['image_path']?>" alt=""></li>
							</ul>
						</div>
					</div>
				</header>
<!-- / header-->
<!-- content -->
				<section id="content">
					<div class="line1 wrapper">
						<div class="wrapper tabs">
							<article class="col1">
								<h2>Categories</h2>
								<div class="pad">
									<ul class="nav">
										<?for($i=0; $i< $catCount; $i++)
										{
											if($i==0)
												$selectedClass = "class='selected'";
											else
												$selectedClass = "";
												
										?>
											<li <?=$selectedClass?>><a href="#<?=$allCategories[$i]['category_name']?>"><?=$allCategories[$i]['category_name']?></a></li>
										<?
										}?>
									</ul>
								</div>
							</article>
							<?for($i=0; $i< $catCount; $i++)
							{
							?>
							<article class="col2 pad_left1 tab-content" id="<?=$allCategories[$i]['category_name']?>">
								<h2><?=$allCategories[$i]['category_name']?> Category</h2>
								<ul class="gallery">
									<?
									$catImagesCount = count($allCatImages[$catName[$i]]);
									for($j=0; $j< $catImagesCount; $j++)
									{
										$imgPath = $allCatImages[$catName[$i]][$j]['image_path'];
										if($j%3 == 2)
											$class = "class='end'";
										else	
											$class = "";
									?>
									<li <?=$class?>>
										<a href="<?=$imgPath?>" class="lightbox-image" rel="prettyPhoto[group<?=$i?>]" >
											<img src="<?=$imgPath?>" alt="" width="217" height="145">
										</a>
										<span style='color:gray;font-family:halvetica;padding-left:3px'>Name</span>
									</li>
									<?}?>
								</ul>
							</article>
							<?}?>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<div class="body4">
	<div class="main">
		<section id="content2">
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
		tabs.init();
		// for lightbox
		if ($("a[rel^='prettyPhoto']").length) {
			$(document).ready(function() {
				// prettyPhoto
				$("a[rel^='prettyPhoto']").prettyPhoto({theme:'light_square'});
			});
		} 
	});
</script>
</body>
</html>