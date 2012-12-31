<?php
if ( isset($_POST['first_name']) ){
    $data_source = 'mysql:host=79.125.112.237;dbname=mixtape';
    $db_user = 'root';
    $db_password = 'Enterprise1=';

    $db = new PDO($data_source, $db_user, $db_password);

    $Name = $_POST['Name'];
    $Playlist = $_POST['Playlist'];
    

    $statement = "INSERT INTO tapes ( Name, Playlist ) VALUES ( '$Name', '$Playlist') ";
    $db->query($statement);

    echo "<h1>Thank You for the playlist</h1>";
}

?>


<!DOCTYPE html>
<html lang="en">
<html>
	<head>
	
	 <meta charset="utf-8">
        
        
        
		<title>Mix Tape Shelf Submission</title>
		<!--
		<meta name="keywords" content="flip, flipping, jquery, jquery plugin, plugin, animation plugin, javascript, css, border animation"/>
		<meta name="language" content="english"/>
		<meta name="robots" content="index,follow"/>
		<meta name="author" content="Luca Manno"/>
		<meta name="charset" content="utf-8"/> --> 
		<link rel="stylesheet" type="text/css" href="stylesheets/reset_html5.css"/>
	<!--	<link rel="stylesheet" type="text/css" href="stylesheets/flip_099.css"/> -->
		<link rel="stylesheet" type="text/css" href="stylesheets/foundation.css"/>
		<link rel="stylesheet" href="stylesheets/app.css">
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/start/jquery-ui.css" rel="stylesheet" />
	<!--	<link rel="stylesheet" type="text/css" href="stylesheets/rateit.css"/> -->
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<link rel="stylesheet" type="text/css" href="/lab/flip/flip_ie.css"/>
		<![endif]-->		
		<script src="http://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  // Load jQuery
		  google.load("jquery", "1");	
		</script>
		<script src="javascripts/jquery-1.8.3.min.js"></script>
		<script src="javascripts/jquery-ui-1.7.2.custom.min.js"></script>
		<script src="javascripts/jquery.flip.min.js"></script>
		<script src="javascripts/jquery.rateit.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script>
        <style>
            #progress-bar, #upload-frame {
                display: none;
            }
        </style>

	<head>

	</head>

<body>
<form method="post">
     	
     		<fieldset>
     			<legend> Mix Tape Submission </legend>
     				<ul>
     					<label>Name:</label>
     					<input type="text" id="Name" name="Name" placeholder="Type your name">
     				</ul>
     				<legend> Spotify Playlist: </legend>
     				<ul>
     					<label>Enter you spotify playlist address:</label>
     					<input type="url" id="Playlist" name="Playlist" placeholder="Paste your playlist here">
     				</ul>
     		</fieldset>
     		
     			<ul><input type="submit" value="S u b m i t"></ul>
     
</form>

</body>
	
</html>