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
<title>Admin Panel - Trash</title>
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
<script type="text/javascript" src="js/json.js"></script>
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
						<h2>Trash</h2>
						<form id="ContactForm" action=<?=$PHP_SELF?> method='POST' onsubmit="">
							<div>
								<div class="wrapper">
									<span>Select Category:</span>
									<select id='catname' name='catname' class="input" style='width:300px;height:30px' onchange='ShowImages(this.value)'>
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
								<span>&nbsp;</span>
								<input type='submit' name='submit' id='submit' style='display:none'>
								<a href="#" class="button" onClick="document.getElementById('submit').click()">Update</a>
								<a href="#" class="button" onClick="document.getElementById('ContactForm').reset()">Clear</a>
							</div>
						</form>
						<div class="wrapper">
							<ul class="ulMenu2" id="imagesarea">
								
							</ul>
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
<script>
	var response;
	
	function ShowImages(catId)
	{
		//alert("catId-- "+catId);
		var catDetails = catId.split("@");
		catName = catDetails[1];
		catId = catDetails[0];
		
		if(catId.length == 0)
		{
			return;
		}
		if(window.XMLHttpRequest)
		{
			xmlhttp = new XMLHttpRequest();
		}
		else
		{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		x = document.getElementById("imagesarea");
		x.innerHTML = null;
		
		xmlhttp.onreadystatechange = function()
		{
			//alert("xmlhttp.readyState-- "+xmlhttp.readyState);
			//alert("xmlhttp.status-- "+ xmlhttp.status);
			
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				//debugger;
				//alert(xmlhttp.responseText);
				response = JSON.decode(xmlhttp.responseText);
				
				imagesCount = response.length;
				//alert(imagesCount);
				for(var j=0; j< imagesCount; j++)
				{
					imgPath = response[j].image_path;
					imgId = response[j].image_id;
					tdImgPath = "images/delete_icon.jpg";
					tdImgPath11 = "images/edit_icon.jpg";
					
					newLi = document.createElement("li");
					newLi.setAttribute("class","liMenu");
					
					newTable = document.createElement("table");
					newTable.setAttribute("border","0");
					newTable.setAttribute("cellspacing","0");
					newTable.setAttribute("cellpadding","0");
					
					newTr = document.createElement("tr");
					//newTr.setAttribute("","");
						
					newTd = document.createElement("td");
					newTd.setAttribute("align","right");
					
					newTd11 = document.createElement("td");
					newTd11.setAttribute("align","left");
					
					newTd2 = document.createElement("td");
					newTd2.setAttribute("colspan","2");
					
					newTdImg = document.createElement("img");
					newTdImg.setAttribute("src",tdImgPath);
					newTdImg.setAttribute("alt","Delete Image");
					newTdImg.setAttribute("width","15");
					newTdImg.setAttribute("height","15");
					newTdImg.setAttribute("title","Delete Image");
					newTdImg.setAttribute("onclick","DeleteImage("+imgId+");");
					
					newTdImg11 = document.createElement("img");
					newTdImg11.setAttribute("src",tdImgPath11);
					newTdImg11.setAttribute("alt","Change Image");
					newTdImg11.setAttribute("width","15");
					newTdImg11.setAttribute("height","15");
					newTdImg11.setAttribute("title","Restore Image");
					newTdImg11.setAttribute("onclick","RestoreImage("+imgId+");");
					
					newTr2 = document.createElement("tr");
					//newTr2.setAttribute("","");
					
					newA = document.createElement("a");
					newA.setAttribute("href",imgPath);
					newA.setAttribute("class","lightbox-image");
					newA.setAttribute("rel","prettyPhoto[group"+j+"]");
					
					newImg = document.createElement("img");
					newImg.setAttribute("src",imgPath);
					newImg.setAttribute("alt","");
					newImg.setAttribute("width","217");
					newImg.setAttribute("height","145");
					
					newTd.appendChild(newTdImg);
					newTd11.appendChild(newTdImg11);
					newTd2.appendChild(newA);
					newTr.appendChild(newTd11);
					newTr.appendChild(newTd);
					newTr2.appendChild(newTd2);
					newTable.appendChild(newTr);
					newTable.appendChild(newTr2);
					
					newA.appendChild(newImg);
					newLi.appendChild(newTable);
					x.appendChild(newLi);
					//alert("a" +x.innerHTML);
				}
			}
			//x.innerHTML = null;	
		}
		xmlhttp.open("POST","getimages.php?catId="+catId+"&deleted=yes",true);
		xmlhttp.send();
	}
	function DeleteImage(imgId)
	{
		alert("Delete Image "+imgId);
	}
	function RestoreImage(imgId)
	{
		alert("Restore Image "+ imgId);
	}
	$(document).ready(function() {
		//tabs.init();
		// for lightbox
		if ($("a[rel^='prettyPhoto']").length) {
			$(document).ready(function() {
				// prettyPhoto
				$("a[rel^='prettyPhoto']").prettyPhoto({theme:'light_square'});
			});
		} 
	});
</script>