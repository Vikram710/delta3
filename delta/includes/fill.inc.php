<?php
session_start();
$user=$_POST['user'];
$title=$_POST['title'];
$query="SELECT * FROM ".$title."";
$stmt=mysqli_prepare($conn, $query);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
$record=mysqli_fetch_array($result);

$query1="SELECT username FROM users WHERE username=?";
$stmt1=mysqli_prepare($conn, $query1);
mysqli_stmt_bind_param($stmt1,"s",$user);
mysqli_stmt_execute($stmt1);
mysqli_stmt_store_result($stmt1);
$resultcheck=mysqli_stmt_num_rows($stmt1);
if($resultcheck >0){
     $username_exists=1;
}
    if(isset($_POST["submit"]) &&$username_exists==1 && $record[3]!=$user){
        require "dbh.inc.php";
        $num=$_POST['no'];
        echo$title;
        echo $num.'<br>';

        $i=4;
        while($i<=$num+3){
            $question[$i-4]= $_POST["$i"];
            $i=$i+1;
        }

        $query="INSERT INTO ".$title."(title,creator) VALUES(?,?) ";
        $stmt=mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt,"ss",$title,$user);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        for($x = 0; $x < count($question); $x++) {
            $name=strval($x+1);
            $query1="UPDATE ".$title." SET q".$name." ='$question[$x]' WHERE creator='$user'";
            if(mysqli_query($conn, $query1)){
                echo"details inserted <br>";
            }
            echo $question[$x] .'<br>';
            header("Location:../dashboard.php?fill=sucess");
            exit();
        }
    }

    else{
        header("Location:../signup.php?fill=fail");
        exit();
    }
