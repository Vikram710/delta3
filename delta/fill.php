<html>
    <head><link href="fill.css" rel="stylesheet">
    </head>
    <body><form action="includes/fill.inc.php" method="post">
            
        <?php
        Session_start();
            $title=$_GET['title'];
            require "includes/dbh.inc.php";
            $num=$_GET['num'];
            
            $query="SELECT * FROM ".$title."";
            $stmt=mysqli_prepare($conn, $query);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            $record=mysqli_fetch_array($result);
            echo 'Title: '.$record[1].'<br>Description: '.$record[2].'<br>Created by: '. $record[3].'<br>';
            echo'<input type="username" name="user" placeholder="username"> <br>';
                for($x = 4; $x < count($record)/2; $x++) {
                    echo $record[$x].": <br>";
                    echo"<input type='text' name=".$x." placeholder='Answer'>";
                    echo "<br> <br> ";
                }
        echo'<input type="number" name="no" value='.(int)$_GET["num"].' hidden>';
        echo'<input type="text" name="title" value='.$_GET["title"].' hidden>';

        ?>
        <input type="submit" name="submit" value="submit">
        </form>
    </body>