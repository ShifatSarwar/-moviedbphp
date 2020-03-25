<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Movies</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <h1 style="text-align: center; padding: 20px;">Add Movies to Database</h1>
    <div class="wrapper" >
		<div id="frm">
    		<form name="addmovie_form" action="includes/addmoviesprocess.php" method="POST" enctype="multipart/form-data">
    			<h1 style="margin-bottom: 10px">MovieDb:</h1>
    			<div style="margin-bottom: 10px">
    				<label style="padding-left: 5px; padding-right: 35px">Movie Title:</label>
    				<input type="text"  name="title"  required />
    			</div>
    			<div style="margin-bottom: 10px">
    				<label style="padding-left: 5px; padding-right: 25px">Movie Poster:</label>
    				<input type="file"  name="mposter" required />
    			</div>
    			<div style="margin-bottom: 10px">
    				<label style="padding-left: 5px; padding-right: 10px">Year of Release:</label>
    				<input type="date"  name="yearofrelease" required />
    			</div>
    			<div style="margin-bottom: 10px">
    				<label style="padding-left: 5px; padding-right: 50px; ">Synopsis:</label>
    			</div>
    			<div style="margin-bottom: 10px">
    				<textarea rows="10" cols="55" type="text"  name="synopsis" style="resize: none;" required></textarea>
    			</div>
    			<div>
    				<input type="submit" id="btn" name="submit-movie" value="Add Movie"/>
    			</div>
    		</form>
	</div> 
</div>
<style type="text/css">
    .wrapper{
    	border: solid gray 1px;
    	width: 30%;
    	border-radius: 50px;
    	margin: 100px auto;
    	background: white;
    	padding: 50px;
    }
    #btn{
        background-color: #1c87c9;
    	border: none;
    	color: white;
    	padding: 5px 14px;
    	text-align: center;
    	text-decoration: none;
    	display: inline-block;
    	font-size: 20px;
    	margin: 4px 2px;
    	cursor: pointer;
     }
</style>
</body>
</html>px;
