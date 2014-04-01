<?
	session_start();
	if(!isset($_SESSION['adminuser']))
	{
		echo"<script>alert('You are not logged in as admin')</script>";
		echo"<script>location.href = 'Login.php'</script>";
		exit;
	}
	require_once("db.php");
	$dataAccessObj = new DataAccess();

	$dataAccessObj->Connect();
	$allCategories = $dataAccessObj->GetAllCategories();
	/*echo "<pre>";
	print_r($allCategories);
	echo "</pre>";*/
	if(isset($_POST['submit']))
	{
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/
		$catDetails = explode("@",$_POST['catname']);
		$catId = $catDetails[0];
		$catName = $catDetails[1];
		$newCatName = $_POST['newcatname'];
		if($newCatName)
		{
			$response = $dataAccessObj->UpdateCategory($catId,$newCatName);
			if($response)
			{
				echo"<script>alert('Category updated successfully.')</script>";
				//echo"<script>location.href = 'folio.php'</script>";
			}
			else
				echo"<script>alert('There was some problem updating category.')</script>";
		}
		else
		{
			echo"<script>alert('Please enter Category name.')</script>";
		}
	}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Panel - Update Categories</title>
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
						<h2>Update Categories</h2>
						<form id="ContactForm" action=<?=$PHP_SELF?> method='POST' onsubmit="">
							<div>
								<div class="wrapper">
									<span>Select Category:</span>
									<select id='catname' name='catname' class="input" style='width:300px;height:30px'>
										<?
										$catCount = count($allCategories);
										for($i=0;$i<$catCount;$i++)
										{
											echo "<option value='". $allCategories[$i]['category_id']. "@". $allCategories[$i]['category_name'] ."'>".
													$allCategories[$i]['category_name'] .
												"</option>";
										}
										?>
									</select>
								</div>
								<div class="wrapper">
									<span>New Category Name:</span><input type='text' id='newcatname' name='newcatname' class='input' style='width:290px;' />
								</div>
								<span>&nbsp;</span>
								<input type='submit' name='submit' id='submit' style='display:none'>
								<a href="#" class="button" onClick="document.getElementById('submit').click()">Update</a>
								<a href="#" class="button" onClick="document.getElementById('ContactForm').reset()">Clear</a>
							</div>
						</form>
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
<script>
	var newcatname = document.getElementById('newcatname');
	document.getElementById('catname').onkeypress = function(e){
    if (!e) e = window.event;   // resolve event instance
		if (e.keyCode == '13'){
			newcatname.focus();
			return false;
		}
	}
	newcatname.onkeypress = function(e){
		if (!e) e = window.event;   // resolve event instance
		if (e.keyCode == '13'){
			document.getElementById('submit').click();
			return false;
		}
	}
	
	function ConfirmDeletion()
	{
		var selectedCat = document.getElementById('catname').value;
		var catDetails = selectedCat.split("@");
		catName = catDetails[1];
		var r = confirm('Do you really want to delete '+ catName +' category');
		if (r != true)
		{
			return;
		}
	}
</script>