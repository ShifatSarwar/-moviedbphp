<?php
    if(isset($_POST['submit-movie'])) {
   	    require 'dbconnect.php';
   	    $title=$_POST['title'];
   	    $year=$_POST['yearofrelease'];
   	    $synopsis=$_POST['synopsis'];
        $file=$_FILES['mposter'];
        $fileName=$_FILES['mposter']['name'];
        $fileTmpName=$_FILES['mposter']['tmp_name'];
        $fileSize=$_FILES['mposter']['size'];
        $fileError=$_FILES['mposter']['error'];

        $fileExt=explode('.', $fileName);
        $fileActualExt=strtolower(end($fileExt));
        $allowed=array('jpg','jpeg','png');

        if(in_array($fileActualExt, $allowed)) {
            if($fileError===0) {
                $fileNameNew=uniqid('', true).".".$fileActualExt;
                $fileDestination='uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql="SELECT * FROM movies WHERE title=?";
                $stmt=mysqli_stmt_init($link);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location:../addmovies.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $title);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultcheck=mysqli_stmt_num_rows($stmt);
                    if($resultcheck>0) {
                        header("Location:../addmovies.php?error=movieexists");
                        exit();
                    } else {
                    $sql="INSERT INTO movies (title, year, imgloc, synopsis)VALUES ('$title', '$year', '$fileDestination','$synopsis');";
                    mysqli_query($link,$sql);
                    if($sql) {
                        header("Location: ../addmovies.php?addmovie=success");
                        exit();
                    } else {
                        header("Location: ../addmovies.php?sqlerror");
                        exit();
                    }
                }
            }

        } else {
          header("Location:../addmovies.php?error=uploadproblem");
          exit();
        }
            
    } else {
        header("Location:../addmovies.php?error=imagefilenotaccepted");
        exit();  
    }
    } else {
   	   header("Location: ../addmovies.php");
   	   exit();
   }
?>