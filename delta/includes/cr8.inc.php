<?php
    session_start();
    if(isset($_POST["submit"])){
        require "dbh.inc.php";
        $num=$_POST['num'];
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $user=$_SESSION['username'];
        $i=1;
        $j=0;
        while($i<=2*$num){
            $question[$j]= $_POST["$i"];
            $i=$i+2;
            $j++;
        }

        $sql = "CREATE TABLE ".$title." (id INT(11) AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(30) NOT NULL,
        descr VARCHAR(80) NOT NULL,
        creator VARCHAR(30) NOT NULL)";

        if(mysqli_query($conn, $sql)){
            echo"table created <br>";
        }
        $query="INSERT INTO ".$title."(title,descr,creator) VALUES(?,?,?) ";
        $stmt=mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt,"sss",$title,$desc,$user);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        for($x = 0; $x < count($question); $x++) {
            $name=strval($x+1);
            $sqli="ALTER TABLE ".$title." ADD q".$name." VARCHAR(80) NOT NULL";
            if(mysqli_query($conn,$sqli)){
                echo"column created <br>";
            }
            $query1="UPDATE ".$title." SET q".$name." ='$question[$x]' WHERE id=1";
            if(mysqli_query($conn, $query1)){
                echo"details inserted <br>";
            }
            echo$question[$x];
            echo "<br>";
        }
        echo$title;
        echo$desc.'<br>';
        header("Location:http://localhost/delta//fill.php?title=".$title."&num=".$num,"");
        exit();

}

else{
    header("Location:../dashboard.php");
    exit();
}



?>
