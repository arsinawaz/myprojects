<?php
class DataAccess
{
	public $username;
	public $password;
	public $hostname;
	public $dbname;
	
	function __construct()
	{
		$this->username = "root";
		$this->password = "";
		$this->hostname = "localhost";
		$this->dbname = "art_line_gallery";
	}
	function Connect()
	{
		mysql_connect($this->hostname,$this->username,$this->password) or die("Could not connect username/password is incorrect");
		mysql_select_db($this->dbname) or die("Database not found");
	}
	function GetRecentImages()
	{
		$query = mysql_query("SELECT * FROM images WHERE trash_level != '1' ORDER BY image_id DESC LIMIT 3") or die("Incorrect query");
		$response = array();
		$i=0;
		while($row = mysql_fetch_assoc($query))
		{
			$response[$i]['image_id'] = $row['image_id']; 
			$response[$i]['image_path'] = $row['image_path']; 
			$response[$i]['image_name'] = $row['image_name'];
			$response[$i]['image_artist'] = $row['image_artist']; 
			$response[$i]['image_description'] = $row['image_description']; 
			$response[$i]['trash_level'] = $row['trash_level']; 
			$response[$i]['category_id'] = $row['category_id']; 
			$i++;
		}
		return $response;
	}
	function GetAllCatImages($catId)
	{
		$query = mysql_query("SELECT * FROM images WHERE category_id = '$catId' AND trash_level != '1' ORDER BY image_id ASC") or die("Incorrect query");
		$response = array();
		$i=0;
		while($row = mysql_fetch_assoc($query))
		{
			$response[$i]['image_id'] = $row['image_id']; 
			$response[$i]['image_path'] = $row['image_path']; 
			$response[$i]['image_name'] = $row['image_name'];
			$response[$i]['image_artist'] = $row['image_artist']; 
			$response[$i]['image_description'] = $row['image_description']; 
			$response[$i]['trash_level'] = $row['trash_level']; 
			$response[$i]['category_id'] = $row['category_id']; 
			$i++;
		}
		return $response;
	}
	function GetAllCatDeletedImages($catId)
	{
		$query = mysql_query("SELECT * FROM images WHERE category_id = '$catId' AND trash_level = '1' ORDER BY image_id ASC") or die("Incorrect query");
		$response = array();
		$i=0;
		while($row = mysql_fetch_assoc($query))
		{
			$response[$i]['image_id'] = $row['image_id']; 
			$response[$i]['image_path'] = $row['image_path']; 
			$response[$i]['image_name'] = $row['image_name'];
			$response[$i]['image_artist'] = $row['image_artist']; 
			$response[$i]['image_description'] = $row['image_description']; 
			$response[$i]['trash_level'] = $row['trash_level']; 
			$response[$i]['category_id'] = $row['category_id']; 
			$i++;
		}
		return $response;
	}
	function GetAllCategories()
	{
		$query = mysql_query("SELECT * FROM categories WHERE trash_level != '1' ORDER BY category_id ASC") or die("Incorrect query");
		$response = array();
		$i=0;
		while($row = mysql_fetch_assoc($query))
		{
			$response[$i]['category_id'] = $row['category_id']; 
			$response[$i]['category_name'] = $row['category_name'];
			$response[$i]['trash_level'] = $row['trash_level']; 
			$i++;
		}
		return $response;
	}
	function Authenticate($userId,$password)
	{
		$query = mysql_query("SELECT * FROM users WHERE user_id = '$userId' and password = md5('$password')") or die("Incorrect query");
		while($row = mysql_fetch_assoc($query))
		{
			$dbUserId = $row['user_id']; 
			$dbPassword = $row['password'];
		}
		if($userId == $dbUserId && md5($password) == $dbPassword )
			return true;
		else
			return false;
	}
	function AddCategory($catName)
	{
		$query = mysql_query("insert into categories values('','$catName','')") or die("Incorrect query");
		if($query)
			return true;
		else
			return false;
	}
	function DeleteCategory($catId)
	{
		$query = mysql_query("update categories set trash_level = '1' where category_id = '16'") or die("Incorrect query");
		if($query)
			return true;
		else
			return false;
	}
	function UpdateCategory($catId,$newCatName)
	{
		$query = mysql_query("update categories set category_name = '$newCatName' where category_id = '$catId'") or die("Incorrect query");
		if($query)
			return true;
		else
			return false;
	}
	function AddImages($imgName,$imgArtist,$imgPath,$imgDesc,$catId)
	{
		$query = mysql_query("insert into images values('','$imgPath','$imgName','$imgArtist','$imgDesc','','$catId')") or die("Incorrect query");
		if($query)
			return true;
		else
			return false;
	}
}
?>