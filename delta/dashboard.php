<?php
session_start();
?>

<html>
    <head>
        <title>php</title>
        <link href="dash.css" rel="stylesheet">
    </head>
    <body>
    <?php
        if(isset($_POST["create"])){
            header("Location:create.php");
            exit();
        }
    ?>
        <a name="home"></a>
        <div class="main">
            <nav>
                <div class="logo">GOOGLE FORMS</div>

                <ul class="menu-area">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <div class="form">
                    <form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="logout" >Log out</button>
                    </form>
                </div>
            </nav>

        </div><br><br><br><br><br>

        <form action="dashboard.php" method="post">
            <button type="create" name="create" >Create new form</button>
        </form>
        <form action="includes/view.inc.php" method="post">
            <input type="text" name="response" placeholder="Form name" >
            <button type="view" name="view" >View responses</button>
        </form>
            
                    
        <div class="bottom">
            <div class="about"><h2>About</h2><a name="about"></a>This is web application made to simplify surveying.
            </div>
            <div class="services"><h2>Services</h2><a name="services"></a>You can create a form of your choice and share with other people using this app and can view the responses. 
            </div>
            <div class="contact"><h2>Contact</h2><a name="contact"></a>vikram710v@gmail.com<br>9962447541
            </div>  
        </div>

    </body>
</html>


