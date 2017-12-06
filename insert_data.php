<!DOCTYPE html 
	PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd"
>
<html>
	<head profile="http://www.w3.org/2005/10/profile">
	    <link rel="icon" type="image/ico" href="https://lh3.googleusercontent.com/9Nl-kVPXUc5w4xcuSEIl2FBHPJRrp5D9PtY6tDS0q5ucb7Sw12N8IRC6ILvwLPXhCQ=w300">
		
		<title>PHP Test</title>
		<link rel="stylesheet" type="text/css" href="style_notify.css"/>
	 </head>
	 <body>
		<?php 
		
		 	//connect to the server
			$link=mysqli_connect("localhost","root","");
			
			if(!$link)
				die("Could not connect to server: ".mysqli_connect_error());
			
			$db_selected=mysqli_select_db($link,"signup");
					
			//insert data into table
			$sql="INSERT INTO userinput (email, username, password) VALUES ('$_POST[email]', '$_POST[username]', '$_POST[password]')";
			
			if(mysqli_query($link,$sql))
				 header("Location: login.html");
			else
				echo "Error entering data:".mysqli_error($link);
			
			
			
			
			mysqli_close($link);
		?> 
	 </body>
</html>
