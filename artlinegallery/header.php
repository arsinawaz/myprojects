<?
	$page = $_SERVER["PHP_SELF"];
	$pageName = explode("/",$page);
//echo $pageName[2];

if($pageName[2] == "index.php")
{
	$selectedMenu1 = "id='active'";
	$selectedMenu2 = "";
	$selectedMenu3 = "";
	$selectedMenu4 = "";
}
else if($pageName[2] == "Folio.php")
{
	$selectedMenu2 = "id='active'";
	$selectedMenu1 = "";
	$selectedMenu3 = "";
	$selectedMenu4 = "";
}
else if($pageName[2] == "About.php")
{
	$selectedMenu3 = "id='active'";
	$selectedMenu2 = "";
	$selectedMenu1 = "";
	$selectedMenu4 = "";
}
else if($pageName[2] == "Contact.php")
{
	$selectedMenu4 = "id='active'";
	$selectedMenu3 = "";
	$selectedMenu2 = "";
	$selectedMenu1 = "";
}
else
{
	$selectedMenu1 = "";
	$selectedMenu2 = "";
	$selectedMenu3 = "";
	$selectedMenu4 = "";
}
if($pageName[2] == "admin.php")
{
	$href = "index.php";
	$view = "View Website";
}
else
{
	$href = "Admin.php";
	$view = "Admin Panel";
}
?>
<h1><a href="index.php" id="logo"></a></h1>
<div style='float:right'>
<?
	if(isset($_SESSION['adminuser']))
	{
		if($_SESSION['adminuser'] == 1)
		{
			echo "<a href=\"$href\" style='padding-left:80px'><b>$view</b></a>";
			echo "<p style='color:white'><b>Welcome Admin, </b>";
			echo "<a href=\"logout.php\"><b>Log Out</b></a></p>";
		}
	}
?>
</div>
<nav>
	<ul id="menu">
		<li <?=$selectedMenu1?>><a href="index.php">Home</a></li>
		<li <?=$selectedMenu2?>><a href="Folio.php">Folio</a></li>
		<li <?=$selectedMenu3?>><a href="About.php">About</a></li>
		<li <?=$selectedMenu4?> class="end"><a href="Contact.php">Contact</a></li>
	</ul>
</nav>