<?php
   include "includes/dbconnect.php";
   require "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>    
</head>
<body>
    <table>
        <h1 style="color: white">Search Results</h1>
    <?php
        if (isset($_POST['searchbtn'])) {
            $search=mysqli_real_escape_string($link, $_POST['search']);
            $sql="SELECT * FROM movies WHERE title LIKE '%$search%' OR synopsis LIKE '%$search%'";
            $result=mysqli_query($link, $sql);
            $queryResult=mysqli_num_rows($result);
            if($queryResult>0) {
                while($rows=$result->fetch_assoc()) {
    ?>
                    <tr>
                        <td class="poster"><img  height="100px"  src="includes/<?php echo $rows['imgloc']; ?>" title="<?php echo $rows['imgloc'] ?>" alt="<?php echo $rows['title'] ?> poster"/></td>
                        <td><?php echo "<a href='movie.php?movie=".$rows['title']."'><div>
                        <h3>".$rows['title']."</h3></div>";?></td>
                    </tr>
  <?php
                }
            }
        }

    ?>
    </table>

<div class="foot">
  <?php require "footer.php"; ?>
    
</div>
        
</body>
<style>
    body{
        background: #020d18;
    }
    h1{
        margin: 50px;
    }
    table{
        margin: 50px;
    }

    .poster{
        margin:0;

    }
    td{
        padding:5px; 
    }
    a{
        color: white;
        text-decoration: none;
    }
</style>
</html>