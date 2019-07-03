<html>
<head>
<link href="view.css" rel="stylesheet">
</head>
<body>
<?php
session_start();
$title=$_POST['response'];
    if(isset($_POST["view"]) && $title!='users'){
        require "dbh.inc.php";
        
        $query="SELECT * FROM ".$title."";
        $stmt=mysqli_prepare($conn, $query);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $record=mysqli_fetch_array($result);
        echo'Title: '.$record[1].'<br>';
        echo'Description: '.$record[2].'<br><br>';


        while($record=mysqli_fetch_array($result)){
            echo'Username: '.$record[3],'<br>';
            for($x = 4; $x < count($record)/2; $x++) {
                echo'Answer for question ';
                echo$x-3;
                echo': ';
                echo $record[$x];
                echo "<br>";
            }
            echo'<br><br><br>';
        }
    }

    else{
        header("Location:../dashboard.php");
        exit();
    }
    ?>

</body>
</html>


