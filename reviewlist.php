<?php
require "header.php";
require_once "includes/dbconnect.php";
$mtitle = $_GET["movie"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Reviews</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
	<table>
        <h1 style="color: white"><a href="movie.php?movie=<?php echo $mtitle; ?>"><?php echo $mtitle; ?></a></h1>
       <button id="button">Write a Review</button>
    <?php
        $sql="SELECT * FROM reviews WHERE title = '$mtitle';";
        $result=mysqli_query($link, $sql);
        $queryResult=mysqli_num_rows($result);
        if($queryResult>0) {
            while($rows=$result->fetch_assoc()) {
            	if($_SESSION['username']==$rows['username']) {
            		$userrev=$rows['userreview'];
            	}
    ?>
    <tr>  
    <div class="revlist">      
        <p>Rate: <?php echo $rows['userrating'] ?>/10</p>
        <hr>
        <p style="margin-top: 5px;"><?php echo $rows['username'] ?> review,</p>
        <p><?php echo $rows['userreview'] ?></p>
        <p style="float: right;" id="updel"><?php 
        if($rows['username']==$_SESSION['username']) {
        	?>
        		Update/Delete Comment 
        <?php 
        }

        ?>
        	
        </p>
    </div>
    </tr>
  <?php
                }
            }

    ?>
    </table>
    <div class="bg-modal" id="bg-modal">
    	<div class="modal-content" id="modal-content">
    		<div class="close" id="close">+</div>
    		<h2><?php echo $mtitle; ?></h2>
    		<form action="includes/addreviews.php?movie=<?php echo $mtitle; ?>" method="POST">
    			<div class="rating">
    				<input type="radio" name="star" id="star1" value="10" required>
    				<label for="star1"></label>
    				<input type="radio" name="star" id="star2" value="9"><label for="star2"></label>
    				<input type="radio" name="star" id="star3" value="8"><label for="star3"></label>
    				<input type="radio" name="star" id="star4" value="7"><label for="star4"></label>
    				<input type="radio" name="star" id="star5" value="6"><label for="star5"></label>
    				<input type="radio" name="star" id="star6" value="5"><label for="star6"></label>
    				<input type="radio" name="star" id="star7" value="4"><label for="star7"></label>
    				<input type="radio" name="star" id="star8" value="3"><label for="star8"></label>
    				<input type="radio" name="star" id="star9" value="2"><label for="star9"></label>
    				<input type="radio" name="star" id="star10" value="1"><label for="star10"></label>
    			</div>
    			<textarea id="t1" name="rev" rows="4" cols="50" maxlength="500"></textarea>
    			<input type="submit" id="submitbtn" name="submitbtn" value="Submit"/>
    		</form>

    	</div>
    </div>
    <div class="bg-modal" id="bg-modal2">
    	<div class="modal-content" id="modal-content2">
    		<div class="close" id="close2">+</div>
    		<h2><?php echo $mtitle; ?></h2>
    		<form action="includes/updateordelete.php?movie=<?php echo $mtitle; ?>" method="POST">
    			<textarea id="t1" name="rev" rows="4" cols="50" maxlength="500">
    				<?php echo $userrev; ?></textarea>
    			<input type="submit" id="updatebtn" name="updatebtn" value="Update"/>
    			<input type="submit" id="delbtn" name="delbtn" value="Delete"/>
    		</form>

    	</div>
    </div>
</body>
<footer style="color: white">
  <div class="foot">
  <?php require "footer.php"; ?>
</div>
</footer>
<link href="revStyle.css" rel="stylesheet">
<script>
	document.getElementById('button').addEventListener('click', 
		function() {
			document.getElementById('bg-modal').style.display='flex';
	}) ;

	document.getElementById('close').addEventListener('click', 
		function() {
			document.getElementById('bg-modal').style.display='none';
	}) ;

	document.getElementById('updel').addEventListener('click', 
		function() {
			document.getElementById('bg-modal2').style.display='flex';
	}) ;
	document.getElementById('close2').addEventListener('click', 
		function() {
			document.getElementById('bg-modal2').style.display='none';
	}) ;

</script>
</html>