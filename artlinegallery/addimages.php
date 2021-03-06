<?
	session_start();
	$message = "";
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
	
	if(isset($_POST['submit']))
	{
		echo "<pre>";
		//print_r($_FILES);
		echo "</pre>";
		//return;
		$imgName = $_POST['imgname'];
		$imgArtist = $_POST['imgartist'];
		$imgDesc = $_POST['textarea'];
		$imgPath = "images/" . $_FILES["imgpath"]["name"];
		$catDetails = explode("@",$_POST['catname']);
		$catId = $catDetails[0];
		
		$allowed_filetypes = array('.jpg','.gif','.png');
		$max_filesize = 5242880; // Maximum filesize in BYTES (currently 5MB).
		$upload_path = './images/';
		
		$filename = $_FILES['imgpath']['name']; 
		$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
		
		$file_info = getimagesize($_FILES['imgpath']['tmp_name']);
		if(empty($file_info))
		{
			$message = "<font color=\"orangered\" size=\"+2\">The uploaded file doesn't seem to be an image.</font>";
		}
		else
		{
			if(filesize($_FILES['imgpath']['tmp_name']) > $max_filesize)
				$message = "<font color=\"orangered\" size=\"+2\">The file you attempted to upload is too large.</font>";
			
			if(!is_writable($upload_path))
				$message = "<font color=\"orangered\" size=\"+2\">You cannot upload to the specified directory, please CHMOD it to 777.</font>";
			
			include('classes/SimpleImage.php');
			$image = new SimpleImage();
			$image->load($_FILES["imgpath"]["tmp_name"]);
			//$image->resizeToHeight(600);
			$image->resizeToWidth(650);
			$image->save($_FILES["imgpath"]["tmp_name"]);
			
			if(move_uploaded_file($_FILES['imgpath']['tmp_name'],$upload_path . $filename))
				$message = "<font color=\"orangered\" size=\"+2\">Your file upload was successful.</font>";
			else
				$message = "<font color=\"orangered\" size=\"+2\">There was an error during the file upload. Please try again.</font>";
		}
		
		$response = $dataAccessObj->AddImages($imgName,$imgArtist,$imgPath,$imgDesc,$catId);
		if($response)
		{
			echo"<script>alert('Image added successfully.')</script>";
			echo"<script>location.href = 'folio.php'</script>";
		}
		else
			echo"<script>alert('There was some problem adding Image.')</script>";
		
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Panel - Add Images</title>
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
						<h2>Add Images</h2>
						<form id="ContactForm" action=<?=$PHP_SELF?> method='POST' enctype="multipart/form-data">
							<div>
								 <p><?php echo $message; ?></p>
								<div class="wrapper" style="padding-bottom:2px">
									<span>Category:</span>
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
									<span>Name:</span><input type="text" id="imgname" name="imgname" class="input" >
								</div>
								<div class="wrapper">
									<span>Artist:</span><input type="text" id="imgartist" name="imgartist" class="input" >								
								</div>
								<div class="wrapper">
									<span>Picture:</span><input type="file" id="imgpath" name="imgpath" class="input" >								
								</div>
								<div class="textarea_box">
									<span>Description:</span><textarea name="textarea" id="textarea" cols="1" rows="1"></textarea>								
								</div>
								<span>&nbsp;</span>
								<input type='submit' name='submit' id='submit' style='display:none'>
								<a href="#" class="button" onClick="document.getElementById('submit').click()">Add</a>
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
	document.getElementById('imgname').onkeypress = function(e){
    if (!e) e = window.event;   // resolve event instance
		if (e.keyCode == '13'){
			document.getElementById('imgartist').focus();
			//document.getElementById('submit').click();
			return false;
		}
	}
	document.getElementById('imgartist').onkeypress = function(e){
		if (!e) e = window.event;   // resolve event instance
		if (e.keyCode == '13'){
			document.getElementById('imgpath').focus();
			return false;
		}
	}
	document.getElementById('imgpath').onkeypress = function(e){
		if (!e) e = window.event;   // resolve event instance
		if (e.keyCode == '13'){
			document.getElementById('textarea').focus();
			return false;
		}
	}
</script>